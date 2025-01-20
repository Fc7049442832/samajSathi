<div class="row">
    <div class="col-md-6 feedback-rating-container">
        <h2>Overall Rating</h2>
        
        <div class="feedback-user">
            <x-carousel />
        </div>

        <div class="stars mt-5">
            @php $rating = 4; @endphp
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $rating)
                    <i class="fa fa-star filled"></i> <!-- Filled star -->
                @else
                    <i class="fa fa-star"></i> <!-- Empty star -->
                @endif
            @endfor
        </div>
        <p class="rating-text">{{ $rating }} out of 5</p>
    </div>

    <div class="feedback-form-container col-md-6">
        <h2>We Value Your Feedback</h2>
        <p>Your opinions help us improve our services. Please share your thoughts with us!</p>
        <form method="POST" action="{{ route('feedback.submit') }}">
            @csrf
            <!-- Name Field -->
            <div class="form-group mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input 
                    type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="name" 
                    name="name" 
                    value="{{ old('name') }}" 
                    placeholder="Enter your name" 
                    required>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="form-group mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input 
                    type="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    placeholder="Enter your email" 
                    required>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Rating Field -->
            <div class="form-group mb-3">
                <label for="rating" class="form-label">Rate Your Experience</label>
                <select 
                    class="form-control @error('rating') is-invalid @enderror" 
                    id="rating" 
                    name="rating" 
                    required>
                    <option value="" disabled selected>Select Rating</option>
                    <option value="5">Excellent</option>
                    <option value="4">Good</option>
                    <option value="3">Average</option>
                    <option value="2">Poor</option>
                    <option value="1">Very Poor</option>
                </select>
                @error('rating')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Feedback Field -->
            <div class="form-group mb-3">
                <label for="feedback" class="form-label">Your Feedback</label>
                <textarea 
                    class="form-control @error('feedback') is-invalid @enderror" 
                    id="feedback" 
                    name="feedback" 
                    rows="4" 
                    placeholder="Share your thoughts here..." 
                    required>{{ old('feedback') }}</textarea>
                @error('feedback')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary w-100">Submit Feedback</button>
            </div>
        </form>
    </div>
</div>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
    }

    .feedback-form-container {
        background: #fff;
        padding: 30px;
        margin: 20px auto;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        max-width: 600px;
    }

    .feedback-form-container h2 {
        margin-bottom: 20px;
        color: #333;
        font-size: 2rem;
        text-align: center;
    }

    .feedback-form-container p {
        font-size: 1rem;
        color: #555;
        margin-bottom: 20px;
        text-align: center;
    }

    .feedback-form-container .form-control {
        border-radius: 5px;
        border: 1px solid #ccc;
        transition: border-color 0.3s;
    }

    .feedback-form-container .form-control:focus {
        border-color: #6200ea;
        box-shadow: 0 0 4px rgba(98, 0, 234, 0.5);
    }

    .feedback-form-container .btn {
        background-color: #6200ea;
        border: none;
        font-size: 1rem;
        transition: background-color 0.3s;
        padding: 10px;
    }

    .feedback-form-container .btn:hover {
        background-color: #4500b5;
        color: #fff;
    }

    .feedback-rating-container {
        background: #fff;
        border-radius: 10px;
        padding: 40px 70px;
        margin: 20px auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .feedback-rating-container h5 {
        padding: 30px;
        margin: 20px auto;
        
        font-size: 1.2rem;
        color: #333;
    }

    .stars {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-bottom: 15px;
    }

    .stars .fa-star {
        font-size: 1.8rem;
        color: #ddd;
        transition: color 0.3s;
    }

    .stars .fa-star.filled {
        color: #ffcc00;
    }

    .rating-text {
        font-size: 1rem;
        color: #555;
    }
    .feedback-user .carosel-image{
        height: 48vh;
    }
</style>
