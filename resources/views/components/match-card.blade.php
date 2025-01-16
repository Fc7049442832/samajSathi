<div class="match-profile-container row  ">
    <div class="row mb-5"></div>
    {{-- user profile box--}}
    <div class="profile-box col-5 row">
        <div class="col-7 pt-3 details_show text-center">
            <p>
                <h4><strong>{{ $user->name }} </strong></h4>
                <span>{{ $user->age }}</span> Yrs / {{$user->height}}</strong> <br>
                    {{$user->marital_status}} / {{$user->state}}<br>

                    @if(!empty($user->religion))
                     {{$user->religion}} /
                    @endif
                    @if(!empty($user->education))
                     {{$user->education}} 
                    @endif
                    <br>
                    @if(!empty($user->working_as))
                     {{$user->working_as}} /
                    @endif
                    @if(!empty($user->income))
                     {{$user->income}} 
                    @endif            
            </p>
        </div>
        <div class="image-box col-5">
            <img src="{{asset('storage/'.$user->profile_image)}}" alt="user image" width="100%" height="200px" >
        </div>
    </div>
    {{-- Matching Percentage Center box --}}
    <div class="match-percentage col-2 text-center row justify-content-center">
        <div class="box-matching-no"><span id="match_percentage" style="font-size:24px; font:800 ;"></span>% <p>Match</p></div> 
    </div>
    {{-- Girls Data display box --}}
    <div class="profile-box col-5 row">
        <div class="image-box col-5">
            <img id="profileImage" class="profile-image" alt="Partner Image"> 
        </div>
        <div class="col-7 text-center pt-3 details_show  ">
            <p>
                <h4><strong  id="name"></strong></h4>
                <span id="age"></span> Yrs / <span id="height"></span><br>
                <span id="marital_status"></span> / <span id="state"></span><br>
                <span id="religion"></span>  / <span id="education"></span><br>
                <span id="working_as"></span> / <span id="income"></span><br>
            </p>
        </div>
    </div>
   {{-- Next and Preview Button code --}}
    <div class="navigation-buttons .row mt-5">
        <button onclick="navigatePreview()" id="previewButton"><i class="bi bi-arrow-left"></i> Preview</button>
        <a href="" class="btn btn-danger mt-3"> Full Details</a>
        <button onclick="navigateNext()" id="nextButton" >Next <i class="bi bi-arrow-right"></i></button>
    </div>
</div>

<script>
    const data = @json($partner);    
    let currentIndex = 0;
    console.log(data);

    
    function displayData(index) {
        if (!data || !data[index]) {
            console.error(`Invalid index or undefined data at index ${index}`);
            return; // Exit the function if the index is invalid
        }

        const person = data[index];
        
        // Fetching profile image URL from the data attribute
        const profileImage = person.profile_image 
                ? `/storage/${person.profile_image}` 
                : 'images/set_partner_per.jpg';
        document.querySelector('.profile-image').setAttribute('src', profileImage);

        document.getElementById('name').innerText = `${person.name}`;
        document.getElementById('age').innerText = `${person.age}`;
        document.getElementById('height').innerText = `${person.height}`;
        document.getElementById('marital_status').innerText = `${person.marital_status}`;
        document.getElementById('state').innerText = `${person.state}`;
        document.getElementById('religion').innerText = `${person.reiligon}`;
        document.getElementById('education').innerText = `${person.education}`;
        document.getElementById('working_as').innerText = `${person.working_as}`;
        document.getElementById('income').innerText = `${person.income}`;
        document.getElementById('match_percentage').innerText =`${person.match_percentage}`;

        // Enable or disable the preview button based on current index
        const previewButton = document.getElementById('previewButton');
        const nextButton = document.getElementById('nextButton');

        if (currentIndex === 0) {
            previewButton.disabled = true; 
        } else {
            previewButton.disabled = false; 
        }

        if (currentIndex === data.length - 1) {
            nextButton.disabled = true; 
        } else {
            nextButton.disabled = false; 
        }
    }

    function navigatePreview() {
        currentIndex--;
       if (currentIndex < 0 ) {
         currentIndex = data.length -1;
        }  
        displayData(currentIndex);
    }

    function navigateNext() {
       currentIndex++;
       if (currentIndex >= data.length) {
         currentIndex = 0;
        }   
        displayData(currentIndex);
    }

    displayData(currentIndex);

</script>
<Style>
    .match-profile-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 2px solid black;
        padding: 20px;
        color: antiquewhite;
        border-radius: 10px;
        margin: 20px auto;
        background: linear-gradient(125deg, rgba(248, 82, 17, 0.849),  rgba(202, 10, 170, 0.7));
    }

    .match-select{
        background: transparent;
        color: azure;
        border: none;
        padding: 5px;
    }
    .match-select option{
        background: orange;
        padding: 3px;
        border-radius: 5px;
        border:none;
    }
    .details_show{
        align-items: center;
        justify-content: center;
    }

    .image-box {
        padding: 0%;
        height: 200px;
        border: 2px solid black;
        border-radius: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        cursor: pointer;
    }

    .profile-image {
    
        height: 200px;
        width: 100%;
        /* object-fit: cover; */
    }

    .match-percentage {
        text-align: center;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: bold;
    }

    .box-matching-no{
        height: 105px;
        width:105px;
        padding-top: 18px;
        align-items: center;
        border: 3.5px solid white;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(99, 219, 19, 0.884),  rgba(31, 145, 27, 0.7));
    }

    .navigation-buttons {
        display: flex;
        justify-content: space-between;
        width: 360px;
        margin: 20px auto 0;
    }

    .navigation-buttons button {
        padding: 10px 20px;
        border: none;
        background-color: transparent;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .navigation-buttons button:hover {
        background-color: #fa0d0d38;
    }

</Style>