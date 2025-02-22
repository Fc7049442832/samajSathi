<div class="blog-section">
    <h2><a href="{{route('blog')}}" style="text-decoration: none; color:black;"> Tips, Stories & Relationship Advice!</a></h2>
    <p>"Perfect Partner, Happy Life – Dating Tips, Marriage Stories & More"</p>

    <div class="row justify-content-around">
        @foreach ($blog as $post)
            <div class="col-md-6 col-lg-4 col-xl-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('blog.show',$post->id)}}">{{ $post->title }}</a></h5>
                        <p class="card-text">
                            @php
                                $words = explode(' ', $post->content);
                                $content = implode(' ', array_slice($words, 0, 20)) . (count($words) > 20 ? '...' : '');
                            @endphp
                            {{$content}} <a href="{{route('blog.show',$post->id)}}">more</a>
                        </p>
                        <div class="d-flex justify-content-between">
                            <span class="likes">❤️ {{ $post->likes }}</span>
                            <span class="views">👁️ {{ $post->views }}</span>
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