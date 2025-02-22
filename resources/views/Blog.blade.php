@extends('layouts.app')
@section('content')
@include('partials.schema-home')
<div class="row justify-content-between">
    <div class="col-6">
        <h4><a href="{{route('blog')}}" style="text-decoration: none; color:black;"> Tips, Stories & Relationship Advice!</a></h4>
    </div>
    <div class="col-md-4 mb-4 ">
        <form method="post" action="{{ route('blog.filter') }}" class="d-flex align-items-center gap-2">
            @csrf
            <label for="categorySelect" class="me-2 fw-bold">Category:</label>

            <select id="categorySelect"  name="category" class="form-select w-auto">
                <option class="bg-white text-dark" value="" selected>All Categories</option>
                <option class="bg-white text-dark" value="tips">Tips</option>
                <option class="bg-white text-dark" value="stories">Stories</option>
                <option class="bg-white text-dark" value="advices">Advices</option>
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="row">
    @foreach ($blogs as $post)
        <div class="col-md-6 col-lg-4 col-xl-3 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card shadow-sm border-0 rounded-lg">
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top rounded-top" alt="{{ $post->title }}" height="160px" style="object-fit: cover;">

                <div class="card-body">
                    <h6 class="card-title">
                        <a href="{{ route('blog.show', $post->id) }}" class="text-dark text-decoration-none">
                            {{ Str::limit($post->title, 50) }}
                        </a>
                    </h6>

                    <p class="card-text text-muted">
                        @php
                            $words = explode(' ', $post->content);
                            $content = implode(' ', array_slice($words, 0, 20)) . (count($words) > 20 ? '...' : '');
                        @endphp
                        {{ $content }} <a href="{{ route('blog.show', $post->id) }}" class="text-primary">more</a>
                    </p>

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-danger">❤️ {{ $post->likes }}</span>
                        
                        <button class="btn btn-outline-secondary btn-sm share-btn" data-url="{{ route('blog.show', $post->id) }}">
                            🔗 Share
                        </button>

                        <span class="text-secondary">👁️ {{ $post->views }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
