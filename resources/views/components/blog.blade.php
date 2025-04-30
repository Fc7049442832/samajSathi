<div class="blog-section">
    <h2>
        <a href="{{ route('blog') }}" style="text-decoration: none; color: black;">
            Tips, Stories & Relationship Advice - SamajSathi Blog
        </a>
    </h2>
    <p>Perfect Partner, Happy Life – Explore Dating Tips, Marriage Success Stories, Relationship Advice, and More!</p>

    {{-- Blog data fetch --}}
    <div class="row mt-4">
        @forelse ($blog as $post)
            <div class="col-6 col-lg-4 col-xl-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-sm border-0 rounded-3 h-100">
                    <a href="{{ route('blog.show', $post->id) }}">
                        <img src="{{ asset('storage/' . $post->image) }}" 
                             class="card-img-top rounded-top" 
                             alt="{{ $post->title }}" 
                             height="100px" 
                             style="object-fit: cover;">
                    </a>

                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title mb-2">
                            <a href="{{ route('blog.show', $post->id) }}" class="text-dark text-decoration-none">
                                {{ Str::limit($post->title, 60) }}
                            </a>
                        </h6>

                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <small class="text-muted">👁️ {{ $post->views }} Views</small>
                            <small class="text-danger">❤️ {{ $post->likes }} Likes</small>
                            <button class="btn btn-link p-0 share-btn" data-url="{{ route('blog.show', $post->id) }}" title="Share this post">
                                <i class="bi bi-share"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted">No blog posts available yet. Stay tuned for updates!</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    .blog-section {
        text-align: center;
        padding: 30px 10px;
        background-color: #f9f9f9;
        border-radius: 12px;
        margin: 40px 0;
    }
    .blog-section h2 {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 10px;
    }
    .blog-section p {
        font-size: 1rem;
        color: #666;
        margin-bottom: 25px;
    }
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .card-title a {
        font-size: 1rem;
        font-weight: bold;
        color: #222;
        text-decoration: none;
    }
    .card-title a:hover {
        color: #e91e63;
    }
    .share-btn {
        border: none;
        background: none;
        color: #007bff;
        font-size: 1.2rem;
    }
    .share-btn:hover {
        color: #0056b3;
    }
</style>