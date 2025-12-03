<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Mail - Samajsathi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<style>
    .mail-container {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .template-box {
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
        background: #fafafa;
    }
    .template-box:hover {
        background: #e8f0fe;
        border-color: #4285f4;
    }
</style>

<div class="container mt-4">
    <div class="row">

        <!-- LEFT SIDE - MAIL WRITE FORM -->
        <div class="col-md-8">
            <div class="mail-container">

                <h4><b>✉️ Write a New Mail</b></h4>
                <hr>

                <form action="{{ route('mail.send') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label><b>Mail Subject</b></label>
                        <input type="text" name="subject" id="mailSubject" class="form-control" placeholder="Enter mail subject" required>
                    </div>

                    <div class="form-group mb-3">
                        <label><b>Select Users</b></label>
                        <select name="user_type" id="userType" class="form-control">
                            <option value="all">📢 Send to All Users</option>
                            <option value="custom">👤 Send to Specific Email</option>
                        </select>
                    </div>

                    <!-- THIS SECTION WILL SHOW WHEN CUSTOM OPTION SELECTED -->
                    <div id="customUserList" class="mt-2" style="display: none;">
                        <label><b>Select Email(s)</b></label>

                        <div class="border p-2 rounded" style="max-height: 200px; overflow-y: auto;">
                            @foreach($users as $user)
                                <div class="form-check">
                                    <input 
                                        class="form-check-input" 
                                        type="checkbox" 
                                        name="selected_emails[]" 
                                        value="{{ $user->email }}" 
                                        id="user{{ $user->id }}"
                                    >

                                    <label class="form-check-label" for="user{{ $user->id }}">
                                        {{ $user->name }} — {{ $user->email }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label><b>Custom Email (optional)</b></label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email (optional)">
                    </div>

                    <div class="form-group mb-3">
                        <label><b>Mail Body</b></label>
                        <textarea name="body" id="mailBody" class="form-control" rows="8" placeholder="Write mail here..." required></textarea>
                    </div>

                    <!-- CKEditor CDN -->
                    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

                    <script>
                        // Apply CKEditor to mailBody textarea
                        CKEDITOR.replace('mailBody');
                    </script>


                    <button class="btn btn-primary px-4">Send Mail</button>
                </form>

            </div>
        </div>

        <!-- RIGHT SIDE - DEMO TEMPLATES -->
        <div class="col-md-4">
            <h5><b>📑 Demo Templates</b></h5>

            <div class="template-box mb-3" onclick="applyTemplate(1)">
                <h6><b>🎉 Welcome Template</b></h6>
                <p>Welcome to our platform. We are happy to have you!</p>
            </div>

            <div class="template-box mb-3" onclick="applyTemplate(2)">
                <h6><b>📰 New Blog Template</b></h6>
                <p>A new blog is live! Check out the latest article now.</p>
            </div>

            <div class="template-box mb-3" onclick="applyTemplate(3)">
                <h6><b>⚠️ Alert Template</b></h6>
                <p>Please update your profile information for better security.</p>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('userType').addEventListener('change', function() {
        if (this.value === 'custom') {
            document.getElementById('customUserList').style.display = 'block';
        } else {
            document.getElementById('customUserList').style.display = 'none';
        }
    });
</script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>