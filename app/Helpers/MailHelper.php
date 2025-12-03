<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Mail;
use App\Models\User;

class MailHelper
{
    /**
     * Universal Mail Sender
     *
     * @param string $bladeFile - View file
     * @param mixed  $to        - "all" | single email | array of emails
     * @param array  $options   - optional settings
     *
     * Options:
     * [
     *   'subject' => 'Custom Subject',
     *   'logo' => 'path/logo.png',
     *   'attachments' => [...],
     *   'cc' => [...],
     *   'bcc' => [...],
     *   'queue' => true,
     *   'data' => [...]
     * ]
     */
    public static function sendMail($bladeFile, $to, $options = [])
    {
        $subject     = $options['subject'] ?? "Notification Email";
        $logo        = $options['logo'] ?? null;
        $attachments = $options['attachments'] ?? [];
        $cc          = $options['cc'] ?? [];
        $bcc         = $options['bcc'] ?? [];
        $useQueue    = $options['queue'] ?? false;
        $data        = $options['data'] ?? [];

        // Merge custom data with logo
        $mailData = array_merge($data, ['logo' => $logo]);

        // Handle "all" users
        if ($to === "all") {
            $emails = User::whereNotNull('email')->pluck('email')->toArray();
        }
        // Handle array of emails
        elseif (is_array($to)) {
            $emails = $to;
        }
        // Single email
        else {
            $emails = [$to];
        }

        foreach ($emails as $email) {
            self::processMail($bladeFile, $email, $subject, $mailData, $attachments, $cc, $bcc, $useQueue);
        }

        return "Mail Sent Successfully!";
    }

    private static function processMail($bladeFile, $email, $subject, $data, $attachments, $cc, $bcc, $queue)
    {
        if ($queue) {
            Mail::queue($bladeFile, $data, function ($message) use ($email, $subject, $attachments, $cc, $bcc) {
                $message->to($email)->subject($subject);

                if ($cc)  $message->cc($cc);
                if ($bcc) $message->bcc($bcc);

                foreach ($attachments as $file) {
                    $message->attach($file);
                }
            });
        } else {
            Mail::send($bladeFile, $data, function ($message) use ($email, $subject, $attachments, $cc, $bcc) {
                $message->to($email)->subject($subject);

                if ($cc)  $message->cc($cc);
                if ($bcc) $message->bcc($bcc);

                foreach ($attachments as $file) {
                    $message->attach($file);
                }
            });
        }
    }
}