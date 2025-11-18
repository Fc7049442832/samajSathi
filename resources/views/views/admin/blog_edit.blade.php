 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
 <div class="container">
    <div class="row">
        <h4>Blog Edit</h4>
        <hr>
    </div>
    <div class="row">
        <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Method Spoofing for Update Request -->
        
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Keywords</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="keywords" name="keywords" value="{{ old('keywords', $blog->keywords) }}" required>
                @error('keywords')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select @error('type') is-invalid @enderror" name="type">
                    <option disabled>Select Type</option>
                    <option value="Tips" {{ old('type', $blog->type) == 'Tips' ? 'selected' : '' }}>Tips</option>
                    <option value="Stories" {{ old('type', $blog->type) == 'Stories' ? 'selected' : '' }}>Stories</option>
                    <option value="Advice" {{ old('type', $blog->type) == 'Advice' ? 'selected' : '' }}>Advice</option>
                    <option value="Other" {{ old('type', $blog->type) == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        
                <!-- Show Old Image -->
                @if($blog->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="150">
                    </div>
                @endif
            </div>
        
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="8" required>{{ old('content', $blog->content) }}</textarea>
                
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                
                    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
                    <script>
                        CKEDITOR.replace('content');
                    </script>

            </div>
        
            <div class="modal-footer">
                
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
 </div>

