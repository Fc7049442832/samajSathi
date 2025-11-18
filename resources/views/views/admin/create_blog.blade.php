  <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
  <div class="container">
    <div class="row justify-content-around">
        <div class="col-10">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="header" class="form-label">Title</label>
                    <input type="text" class="form-control" id="header" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="header" class="form-label">Keywords</label>
                    <input type="text" class="form-control" id="keywords" name="keywords" required>
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
                    <textarea class="form-control" id="content" name="content" rows="9" required></textarea>
                    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
                    <script>
                        CKEDITOR.replace('content');
                    </script>

                </div>

                
                <a href="{{ route('admin.blog')}}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save</button>
               
            </form>
        </div>
    </div>
  </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
               