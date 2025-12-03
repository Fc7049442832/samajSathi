@extends('layouts.dashboard')
@section('content')



    <div class="container mt-4">
    <h3>Mail Dashboard</h3>

    {{-- Stats cards --}}
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="card p-3">
                <h6>Total</h6>
                <h3>{{ $stats['total'] }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <h6>Delivered</h6>
                <h3>{{ $stats['sent'] }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <h6>Pending</h6>
                <h3>{{ $stats['pending'] }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <h6>Failed</h6>
                <h3>{{ $stats['failed'] }}</h3>
            </div>
        </div>
    </div>

    {{-- Buttons --}}
    <div class="mb-3">
        <a href="{{ route('admin.mail') }}" class="btn btn-sm btn-secondary">Refresh</a>
        <a href="{{ route('mail.export') }}" class="btn btn-sm btn-outline-primary">Export CSV</a>
        <a href="{{ route('write.new.mail') }}" class="btn btn-primary btn-sm">Write New Mail</a>
    </div>

    {{-- Mail logs table --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Mail History</h5>

            @if(session('report'))
                <div class="alert alert-info">
                    <strong>Report:</strong>
                    Total: {{ session('report.total') }},
                    Delivered: {{ session('report.delivered') }},
                    Failed: {{ session('report.failed') }}
                </div>
            @endif

            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Error</th>
                        <th>Sent At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->id }}</td>
                        <td>{{ $log->email }}</td>
                        <td>{{ Str::limit($log->subject, 60) }}</td>
                        <td>
                            @if($log->status == 'sent') <span class="badge bg-success">Sent</span>
                            @elseif($log->status == 'pending') <span class="badge bg-warning text-dark">Pending</span>
                            @else <span class="badge bg-danger">Failed</span>
                            @endif
                        </td>
                        <td style="max-width:240px;word-wrap:break-word">
                            {{ Str::limit($log->error_message, 120) }}
                        </td>
                        <td>{{ $log->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            @if($log->status == 'failed')
                                <form action="{{ route('mail.retry', $log->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-success" type="submit">Retry</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $logs->links() }}
        </div>
    </div>

    </div>
@endsection