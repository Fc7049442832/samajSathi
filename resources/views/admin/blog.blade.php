@extends('layouts.dashboard')
@section('content')
<div class="card ">
    <div class="card-header h5">Manage Blog</div>
        <div class="card-body">
             <!-- Button to Open Modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#blogModal">
                Create Blog
            </button>
            <hr>

            @foreach($blogs as  $key=>$blog)
                <div class="row m-2">
                    <div class="col-2">
                        <button type="button" class="btn btn-secondary" >
                            <img src="{{ asset('storage/'.$blog->image) }}" alt="Blog Image" width="150px" height="140px">                        
                        </button>                       
                    </div>

                    <div class="col-8">
                        <div class="row">
                            <a href="{{route('blog.show',$blog->id)}}" target="_blank" rel="noopener noreferrer">                              
                                <h5>{{$blog->title}}</h5>
                            </a>
                        </div>
                        <div class="row">
                            @php
                            $words = explode(' ', $blog->content);
                            $content = implode(' ', array_slice($words, 0, 40)) . (count($words) > 40 ? '...' : '');
                            @endphp
                            {{$content}}
                        </div>
                        <div class="row mt-3">
                            <small class="col-2">Type : {{$blog->type}}</small>
                            <small class="col-4">Date : {{$blog->created_at}}</small>
                            <small class="col-2">View : {{$blog->views}}</small>
                            <small class="col-2">Like : {{$blog->likes}}</small>
                        </div>
                    </div>
                    <div class="col-2 mt-5">
                        <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <form action="{{ route('admin.blog.delete', $blog->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

  <!-- Blog Create Modal -->
<div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noticeModalLabel">Blog Write</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- blog creating Form -->
                <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="header" class="form-label">Title</label>
                        <input type="text" class="form-control" id="header" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="header" class="form-label">Type</label>
                        <select class="form-select" name="type" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="Tips">Tips</option>
                            <option value="Stories">Stories</option>
                            <option value="Advice">Advice</option>
                            <option value="Other">Other</option>
                          </select>
                    </div>

                    <div class="mb-3">
                        <label for="media" class="form-label">Image</label>

                        <input type="file" class="form-control" id="media" name="image" >
                    </div>
                    
                    <div class="mb-3">
                        <label for="message" class="form-label">Content</label>
                        <textarea class="form-control" id="message" name="content" rows="9" required></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- image show modal --}}
<!-- Modal -->




@endsection
<style>
    .card-body {
        width: 86vw;
        height: auto;
        overflow: hidden;
        padding: 10px;
    }
    a h5{
        text-decoration: none;
       
        color: black;
    }
</style>