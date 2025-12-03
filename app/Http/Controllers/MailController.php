<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MailLog;
use App\Mail\CustomMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MailController extends Controller
{
    // Admin mail dashboard
    public function index(Request $request)
    {
        $stats = $this->mailStats();

        // history with pagination (latest first)
        $logs = MailLog::orderBy('created_at','desc')->paginate(25);

        return view('admin.mailpage', compact('stats','logs'));
    }

    // Single reusable stats function
    public function mailStats(): array
    {
        return [
            'total'    => MailLog::count(),
            'sent'     => MailLog::where('status','sent')->count(),
            'pending'  => MailLog::where('status','pending')->count(),
            'failed'   => MailLog::where('status','failed')->count(),
        ];
    }

    public function writeNewMail(){
        $users = User::get();
        return view("admin.writemail" ,compact("users"));
    }

    // Main send method called by the form
    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'user_type' => 'required'
        ]);

        $emails = [];

        if ($request->user_type === 'all') {
            $emails = User::whereNotNull('email')->pluck('email')->toArray();
        }

        if ($request->user_type === 'custom' && !empty($request->selected_emails)) {
            $emails = array_merge($emails, $request->selected_emails);
        }

        if (!empty($request->email)) {
            $emails[] = $request->email;
        }

        $emails = array_unique(array_filter($emails));

        if (count($emails) === 0) {
            return back()->with('error', 'No email selected!');
        }

        // Track counters and failed list
        $total = count($emails);
        $success = 0;
        $failed = 0;
        $failedList = [];

        foreach ($emails as $email) {
            // create pending log
            $log = MailLog::create([
                'email' => $email,
                'subject' => $request->subject,
                'status' => 'pending',
                'meta' => [
                    'template' => $request->template ?? 'default',
                    'from' => config('mail.from.address'),
                ],
            ]);

            try {
                // Try hostinger first, fallback to gmail inside sendMailWithFailover
                $this->sendMailWithFailover($email, $request->subject, $request->body);

                // update log to sent
                $log->update([
                    'status' => 'sent',
                    'error_message' => null
                ]);

                $success++;
            } catch (\Exception $e) {
                // update log to failed with message
                $log->update([
                    'status' => 'failed',
                    'error_message' => $e->getMessage()
                ]);

                Log::error('Mail send error for '.$email.': '.$e->getMessage());
                $failed++;
                $failedList[] = ['email' => $email, 'error' => $e->getMessage()];
            }
        }

        $report = [
            'total' => $total,
            'delivered' => $success,
            'failed' => $failed,
            'failed_list' => $failedList
        ];

        return back()->with(['success' => 'Mail sending completed.', 'report' => $report]);
    }

    /**
     * Try sending via primary mailer (hostinger) and on exception try gmail fallback.
     */
    protected function sendMailWithFailover(string $email, string $subject, string $bodyHtml)
    {
        try {
            Mail::mailer('hostinger')->to($email)->send(new CustomMail($subject, $bodyHtml));

            // If the driver supports failures() you could check Mail::failures() here.
            // But if an exception is thrown it is caught below.
            return true;
        } catch (\Exception $e) {
            // If primary fails, try gmail
            try {
                Mail::mailer('gmail')->to($email)->send(new CustomMail($subject, $bodyHtml));
                return true;
            } catch (\Exception $ex) {
                // Throw final exception to be handled by caller
                throw $ex;
            }
        }
    }

    // Optional: retry a failed mail by id
    public function retry($id)
    {
        $log = MailLog::findOrFail($id);

        if ($log->status !== 'failed') {
            return back()->with('error', 'Only failed mails can be retried.');
        }

        try {
            $this->sendMailWithFailover($log->email, $log->subject, $log->meta['body'] ?? '');
            $log->update(['status' => 'sent', 'error_message' => null]);

            return back()->with('success', 'Mail retried and sent.');
        } catch (\Exception $e) {
            $log->update(['error_message' => $e->getMessage()]);
            return back()->with('error', 'Retry failed: '.$e->getMessage());
        }
    }

    // Optional: download CSV of logs
    public function exportCsv()
    {
        $filename = 'mail_logs_'.date('Y_m_d_H_i').'.csv';

        $response = new StreamedResponse(function() {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['id','email','subject','status','error_message','created_at']);

            MailLog::orderBy('id')->chunk(200, function($rows) use ($handle) {
                foreach ($rows as $row) {
                    fputcsv($handle, [
                        $row->id,
                        $row->email,
                        $row->subject,
                        $row->status,
                        $row->error_message,
                        $row->created_at
                    ]);
                }
            });

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="'.$filename.'"');

        return $response;
    }
}
