@extends('layouts.dashboard')
@section('content')
<div class="card ">
    <div class="card-header h5">Manage Notifications</div>
        <div class="card-body">
             <!-- Button to Open Modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#noticeModal">
                Create Notification
            </button>

            <table class="table table-hover">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Media</th>
                    <th>Time</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($notices as $notice)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$notice->header}}</td>
                        <td>{{$notice->message}} </td>
                        <td>{{$notice->media ? $notice->media : 'No Media'}}</td>
                        <td>{{$notice->created_at}} </td>
                        <td>
                            <a href="{{ route('admin.notices.edit', $notice->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                            <form action="{{ route('admin.notices.destroy', $notice->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>


  <!-- Notice Create Form Modal -->
<div class="modal fade" id="noticeModal" tabindex="-1" aria-labelledby="noticeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noticeModalLabel">Create Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Notice Form -->
                <form action="{{ route('notice.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="header" class="form-label">Header</label>
                        <input type="text" class="form-control" id="header" name="header" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="media" class="form-label">Image/Video</label>
                        <input type="file" class="form-control" id="media" name="media" accept="image/*,video/*">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send Notification</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteNotification(userId, notificationId) {
        fetch(`/admin/notification/${userId}/${notificationId}`, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
        }).then(response => response.json())
        .then(data => console.log(data));
    }
</script>

@endsection
<style>
    .card-body {
        width: 86vw;
        height: auto;
        overflow: hidden;
        padding: 10px;
    }
</style>