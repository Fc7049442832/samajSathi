{{-- resources/views/statuses/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Latest Statuses</h3>
    <div class="row">
        @foreach($statuses as $status)
        <div class="col-md-4 mb-3 status-card" data-status-id="{{ $status->id }}">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $status->title }}</h5>
                    <video width="100%" controls preload="metadata" poster="{{ asset('images/video-placeholder.png') }}" data-video-src="{{ Storage::url($status->video_path) }}" class="status-video">
                        <source src="{{ Storage::url($status->video_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p class="mt-2 small text-muted">{{ Str::limit($status->description, 120) }}</p>

                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <div>
                            <button class="btn btn-sm btn-outline-primary btn-like">
                                <span class="like-text">Like</span> <span class="likes-count">{{ $status->likes_count }}</span>
                            </button>
                            <button class="btn btn-sm btn-outline-secondary btn-share">Share <span class="shares-count">{{ $status->shares_count }}</span></button>
                        </div>
                        <div>
                            <small class="views-count">{{ $status->views_count }}</small> views
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
(function(){
    // Create or get device id
    let deviceId = localStorage.getItem('device_id');
    if (!deviceId) {
        deviceId = 'dev_' + Math.random().toString(36).slice(2) + Date.now().toString(36);
        localStorage.setItem('device_id', deviceId);
    }

    // Helper to post JSON
    function postJson(url, data) {
        return fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        }).then(r => r.json());
    }

    // Record view on video play (only once per device due to server unique constraint)
    document.querySelectorAll('.status-video').forEach(video => {
        const container = video.closest('.status-card');
        const statusId = container.getAttribute('data-status-id');

        let viewed = false;
        video.addEventListener('play', function() {
            if (viewed) return;
            postJson(`/statuses/${statusId}/view`, { device_id: deviceId })
                .then(res => {
                    if (res.views_count !== undefined) {
                        container.querySelector('.views-count').textContent = res.views_count;
                    }
                }).catch(e => console.error(e));
            viewed = true;
        });
    });

    // Like handler
    document.querySelectorAll('.btn-like').forEach(btn => {
        btn.addEventListener('click', function() {
            const container = btn.closest('.status-card');
            const statusId = container.getAttribute('data-status-id');
            postJson(`/statuses/${statusId}/like`, { device_id: deviceId })
                .then(res => {
                    if (res.likes_count !== undefined) {
                        container.querySelector('.likes-count').textContent = res.likes_count;
                        btn.classList.toggle('active', res.liked);
                    }
                }).catch(e => console.error(e));
        });
    });

    // Share handler: use Web Share API when available then record
    document.querySelectorAll('.btn-share').forEach(btn => {
        btn.addEventListener('click', function() {
            const container = btn.closest('.status-card');
            const statusId = container.getAttribute('data-status-id');
            const url = window.location.origin + '/statuses#' + statusId;

            const doRecord = (platform=null) => {
                postJson(`/statuses/${statusId}/share`, { device_id: deviceId, platform })
                .then(res => {
                    if (res.shares_count !== undefined) {
                        container.querySelector('.shares-count').textContent = res.shares_count;
                    }
                }).catch(e => console.error(e));
            };

            if (navigator.share) {
                navigator.share({
                    title: 'Check this status',
                    url
                }).then(() => doRecord('native'));
            } else {
                // fallback: copy to clipboard
                navigator.clipboard.writeText(url).then(() => {
                    alert('Link copied — paste and share');
                    doRecord('copied_link');
                }).catch(() => {
                    window.open(`https://wa.me/?text=${encodeURIComponent(url)}`, '_blank');
                    doRecord('whatsapp_fallback');
                });
            }
        });
    });

})();
</script>
@endpush