<div class="blog-section">
    <h2><a href="{{route('blog')}}" style="text-decoration: none; color:black;"> Tips, Stories & Relationship Advice!</a></h2>
    <p>"Perfect Partner, Happy Life – Dating Tips, Marriage Stories & More"</p>
    {{-- Blog data fetch --}}
    <div class="row mt-3">
        @foreach ($blog as $post)
            <div class="col-6 col-lg-4 col-xl-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-sm border-0 rounded-lg">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top rounded-top" alt="{{ $post->title }}" height="160px" style="object-fit: cover;">

                    <div class="card-body">
                        <h6 class="card-title">
                            <a href="{{ route('blog.show', $post->id) }}" class="text-dark text-decoration-none">
                                {{ Str::limit($post->title, 50) }}
                            </a>
                        </h6>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary">👁️ {{ $post->views }}</span>

                            <span class="text-danger">❤️ {{ $post->likes }}</span>
                            <button class="btn share-btn" data-url="{{ route('blog.show', $post->id) }}">
                                <i class="bi bi-share icon" title="Share"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .blog-section {
        text-align: center;
        padding: 10px;
        background-color: #f9f9f9;
        border-radius: 10px;
        margin: 20px 0;
    }
    a{
        text-decoration: none;
    }

    .card img {
        height: 150px;
        object-fit: cover;
    }
    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
    }
    .card-text {
        font-size: 0.9rem;
        color: #555;
    }
    .likes, .views {
        font-size: 0.9rem;
        color: #888;
    }
</style>