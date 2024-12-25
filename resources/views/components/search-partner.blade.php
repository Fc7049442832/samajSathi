<div class="search-section">
    <div class="overlay" id="targetDiv">
        <h3 class="mb-4">Someone Somewhere is Dreaming of You</h3>

        <form class="search-form">
            <div class="form-group">
                <label for="looking-for">Looking for</label>
                <select id="looking-for" name="looking-for">
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select>
            </div>

            <div class="form-group">
                <label for="age">Mini Age</label>
                <select name="" id="">
                    @for ($i = 18; $i <= 45; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <span>To</span>
            <div class="form-group">
                <label for="age">Max Age</label>
                <select name="" id="">
                    @for ($i = 21; $i <= 50; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label for="religion">Religion</label>
                <select id="religion" name="religion">
                    <option value="any">Any</option>
                    <option value="hindu">Hindu</option>
                    <option value="muslim">Muslim</option>
                    <option value="christian">Christian</option>
                </select>
            </div>

            <button type="submit" class="search-button ">Search Partner</button>
        </form>
    </div>
    <div id="formContainer">
        <form class="search-form">
            <div class="form-group">
                <label for="looking-for">Looking for</label>
                <select id="looking-for" name="looking-for">
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select>
            </div>

            <div class="form-group">
                <label for="age">Mini Age</label>
                <select name="" id="">
                    @for ($i = 18; $i <= 45; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <span>To</span>
            <div class="form-group">
                <label for="age">Max Age</label>
                <select name="" id="">
                    @for ($i = 21; $i <= 50; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label for="religion">Religion</label>
                <select id="religion" name="religion">
                    <option value="any">Any</option>
                    <option value="hindu">Hindu</option>
                    <option value="muslim">Muslim</option>
                    <option value="christian">Christian</option>
                </select>
            </div>

            <button type="submit" class="search-button ">Search Partner</button>
        </form>
    </div>
</div>


<style>
    /* top form ih header which show on scrolling */
    #formContainer {
        position: fixed;
        top: 1px;
        /* right: 20px; */
        z-index: 1;
        border: 1px solid #ccc;
        padding: 20px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        display: none;
        width: 100%;
        backdrop-filter: blur(15px);
        background: linear-gradient(45deg, rgba(71, 206, 117, 0.4), rgba(106, 240, 177, 0.2));
    }



    #targetDiv.hidden {
        /* Make the selector more specific */
        visibility: hidden !important;
        /* Forcefully apply hidden styles */
        opacity: 0 !important;
        /* Ensure opacity is overridden */
        /* pointer-events: none; */
    }

    #myForm {
        display: flex;
        flex-direction: column;
        /* Stack the form elements vertically */
        align-items: center;
        /* Center the form elements */
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    .overlay {
        background-color: rgb(0 0 0 / 80%);
        padding: 20px;
        /* Reduced padding */
        border-radius: 10px;
        text-align: center;
        color: white;
        max-width: 100%;
        margin-top: -80px;
        /* Adjusted margin for smaller screens */
        width: 90%;
        /* Slightly narrower for mobile screens */
        border: 2px solid white;
        /* Slightly thinner border */
    }

    .search-section {
        width: auto;
        position: relative;
        background: url('background.jpg') no-repeat center center/cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    h1 {
        margin-bottom: 15px;
        /* Reduced margin */
        font-size: 20px;
        /* Reduced font size */
    }

    h3 {
        font-size: 2rem;
        /* Reduced font size */
        margin-bottom: 15px;
        /* Reduced margin */
    }

    .search-form {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        justify-content: center;
        gap: 10px;
        /* Reduced gap between form elements */
    }

    .form-group {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    select {
        padding: 8px;
        /* Reduced padding */
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 18px;
        /* Reduced font size */
    }

    input[type="number"] {
        width: 60px;
        /* Reduced width */
        text-align: center;
    }

    .search-button {
        margin: 10px 5px 5px 30px;
        /* Reduced margins */
        padding: 5px 15px;
        /* Reduced padding */
        background-color: #e74c3c;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        /* Reduced font size */
        cursor: pointer;
    }

    .search-button:hover {
        background-color: #c0392b;
    }

    span {
        margin: 15px 5px;
        /* Reduced margin */
        font-size: 14px;
        /* Reduced font size */
        color: white;
    }

    /* Media query for smaller screens */
    @media (max-width: 600px) {
        .overlay {
            margin-top: -50px;
            /* Adjusted for smaller screens */
            width: 95%;
            padding: 15px;
            /* Further reduced padding */
        }

        h3 {
            font-size: 16px;
            /* Further reduced font size */
        }

        label {
            font-size: 12px;
            /* Further reduced font size */
        }

        .search-form {
            gap: 8px;
            /* Further reduced gap */
        }

        select {
            padding: 6px;
            /* Further reduced padding */
            font-size: 10px;
            /* Further reduced font size */
        }

        .search-button {
            padding: 4px 10px;
            /* Further reduced padding */
            font-size: 12px;
            /* Further reduced font size */
        }

        span {
            font-size: 12px;
            /* Further reduced font size */
        }
    }
</style>

<script>
    const targetDiv = document.getElementById('targetDiv');
    const formContainer = document.getElementById('formContainer');
    let lastScrollPosition = 0; // Track last scroll position

    window.addEventListener('scroll', () => {
        const currentScrollPosition = window.pageYOffset;
        const targetRect = targetDiv.getBoundingClientRect();
        console.log("currentScrollPosition", currentScrollPosition);
        console.log("targetRect", targetRect);

        if (targetRect.top <= 0 && targetRect.bottom >= 0) {
            // Show form and completely hide targetDiv
            formContainer.style.display = 'block';

            targetDiv.classList.add('hidden');
        } else if (targetRect.top <= 0 && targetRect.bottom <= 0) {
            // Show form and completely hide targetDiv
            formContainer.style.display = 'block';

            targetDiv.classList.add('hidden');
        } else if (currentScrollPosition < lastScrollPosition) {
            // On scroll up, show targetDiv and hide form
            formContainer.style.display = 'none';

            targetDiv.classList.remove('hidden');
        }

        // Update last scroll position
        lastScrollPosition = currentScrollPosition;
    });
</script>
