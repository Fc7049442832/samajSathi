@extends('layouts.dashboard')
@section('content')
<div class="card ">
    <div class="card-header h5">Manage Blog</div>
        <div class="card-body">
             <!-- blog write page link -->
            <a href="{{ route('newblog')}}" class="btn btn-primary">New Blog</a>
            <hr>

            @foreach($blogs as  $key=>$blog)
                <div class="row m-2">
                    <div class="col-2">
                        <button type="button" class="btn btn-secondary" >
                            <img src="{{ asset('storage/'.$blog->image) }}" alt="Blog Image" width="140px" height="130px">                        
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
                            $content = implode(' ', array_slice($words, 0, 25)) . (count($words) > 25 ? '...' : '');
                            @endphp
                            {!!$content!!}
                        </div>
                        {{-- <small>
                               <b>Keywords : </b>  {!!$blog->keywords!!}
                        </small> --}}
                        <div class="row">
                            <small class="col-2">Type : {{$blog->type}}</small>
                            <small class="col-4">Date : {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y h:i A') }}</small>
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