@extends('layouts.app')
@section('content')
    <hr>

    <div class="row">
        <div class="col-md-8">

            <div class="profile-Container">
                {{-- About Me Section code start --}}
                <!-- Default Display -->
                <div id="about-view" class="row justify-content-between">
                    <h5 class="col-md-4 col-7">About Me</h5>
                    <span class="edit-icon col-md-2 col-4" onclick="toggleDivAndForm('about-view', 'edit-about', true)">
                        <i class="bi bi-pencil"></i> Edit
                    </span>
                    <p id="about-text">I am a simple boy with a good personality. I reside in a beautiful city of India.</p>
                </div>

                <!-- About Me Edit Form -->
                <form action="" method="post" id="edit-about" >
                    <h5>About Me</h5>
                    <textarea id="about-input" required>I am a simple boy with a good personality. I reside in a beautiful city of India.</textarea>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-update">Update</button>
                        <button type="button" class="btn btn-cancel"
                            onclick="toggleDivAndForm('about-view', 'edit-about', false)">Cancel</button>
                    </div>
                </form>
                {{-- About Me Section code end --}}

                {{-- Basics information section code start --}}
                {{-- Default Display --}}
                <div id="basics-info" class="row mt-4 justify-content-between">
                    <h5 class="col-md-4 col-5">Basics Information </h5>
                    <span class="edit-icon  col-md-2 col-4 " onclick="toggleDivAndForm('basics-info', 'edit-info', true)">
                        <i class="bi bi-pencil"></i> Edit
                    </span>

                    <div class="p-3">
                        <div class="info-content">
                            <div class="info-row">
                                <span>Gender</span> <span><b>:</b> Male</span>
                                <span>Blood Group</span> <span><b>:</b> Not Specified</span>
                            </div>

                            <div class="info-row">
                                <span>Age</span> <span><b>:</b> 25</span>
                                <span>Special Case</span> <span><b>:</b> Not Specified</span>
                            </div>

                            <div class="info-row">                                 
                                <span>Date of Birth</span> <span><b>:</b> 12-Dec-1999</span>
                                <span>Body Type</span> <span><b>:</b> Not Specified</span>
                            </div>

                            <div class="info-row">
                                <span>Marital Status</span> <span><b>:</b> Never Married</span>
                                <span>Body Weight</span> <span><b>:</b> Not Specified</span>
                            </div>

                            <div class="info-row">
                                <span>Citizenship</span> <span><b>:</b> Not Specified</span>
                                <span>Immigration Status</span> <span><b>:</b> Not Specified</span>
                            </div>

                            <div class="info-row">
                                <span>Height</span> <span><b>:</b> 5' 09" (175 cm)</span>
                                <span>Complexion</span> <span><b>:</b> Not Specified</span>
                            </div>
                            <div class="info-row">
                                <span>Features</span> <span><b>:</b> Not Specified</span>
                                <span></span> <span></span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Basics information edit form  --}}
                <form action="" method="POST" id="edit-info">
                    <div id="basics-info" class="row mt-4 justify-content-between">
                      <h5 class="col-md-4 col-5">Edit
                          Basics Information </h5>
                      <span class="edit-icon  col-md-2 col-4"
                          onclick="toggleDivAndForm('basics-info', 'edit-info', false)">
                          <i class="bi bi-x"></i> Cancel
                      </span>
                    </div>

                    <div class="p-3">
                      <div class="info-content">
                        <div class="info-row">
                          <span>Gender</span> 
                          <span><b>:</b> 
                              <select name="gender" id="" class="profile-input" valu="">
                                <option disabled >Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              </select>
                          </span>
                        </div>
                        <div class="info-row">
                          <span>Blood Group</span>
                          <span><b>:</b> 
                            <select name="bloodGroup" id="" class="profile-input">
                              <option disabled >Not Specified</option>
                              <option value="A+">A+</option>
                              <option value="A-">A-</option>
                              <option value="B+">B+</option>
                              <option value="B-">B-</option>
                              <option value="AB+">AB+</option>
                              <option value="AB-">AB-</option>
                              <option value="O+">O+</option>
                              <option value="O-">O-</option>
                              <option value="">Do Not Know</option>
                            </select>
                          </span>
                        </div>
                        <div class="info-row">
                          <span>Age</span> <span><b>:</b> <input type="text" id="age" name="age" class="profile-input" placeholder="Auto fill DOB base" readonly></span>
                        </div>
                        <div class="info-row">
                            <span>Special Case</span>
                            <span><b>:</b>
                              <select name="specialCase" id="" class="profile-input">
                                <option disabled >Not Specified</option>
                                <option value="None">None</option>
                                <option value="HIV Positive">HIV Positive</option>
                                <option value="Mentally Challenged">Mentally Challenged</option>
                                <option value="Physically Challenged">Physically Challenged</option>
                                <option value="Other">Other</option>
                                <option value="Thalassemia Major">Thalassemia Major</option>
                              </select>  
                            </span>
                        </div>
                        <div class="info-row">
                          <span>Date of Birth</span> <b>:</b>
                          <span> <input type="date" id="dob" class="profile-input" name="dob" required
                            onchange="calculateAge()"></span>
                        </div>
                        <div class="info-row">
                            <span>Body Type</span>
                            <span><b>:</b> 
                              <select name="bodyType" id="" class="profile-input">
                                <option value="Athletic">Athletic</option>
                                <option value="Thin">Thin</option>
                                <option value="Slim">Slim</option>
                                <option value="Medium">Medium</option>
                                <option value="Slightly Heavy">Slightly Heavy</option>
                                <option value="Heavy">Heavy</option>
                                <option value="Prefer Not to Say">Prefer Not to Say</option>
                              </select>
                            </span>
                        </div>
                        <div class="info-row">
                            <span>Marital Status</span> 
                            <span><b>:</b> 
                              <select name="maritalStatus" id="" class="profile-input">
                                <option disabled >Select Marital Status</option>
                                <option value="Never Married">Never Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Awaiting Divorced">Awaiting Divorced</option>
                                <option value="Annulled">Annulled</option>
                              </select>
                            </span>
                        </div>
                        <div class="info-row">
                            <span>Body Weight</span>
                            <span><b>:</b> 
                              <input type="number" name="bodyWeight" class="profile-input" id="" placeholder="Body Weight in K.G." >
                            </span>
                        </div>
                        <div class="info-row">
                          <span>Citizenship</span>
                          <span><b>:</b> 
                            <select name="citizenship" id="" class="profile-input">
                              <option disabled >Select Citizenship</option>
                              <option value="Indian">Indian</option>
                              <option value="NRI">NRI</option>
                            </select>
                          </span>
                        </div>
                        <div class="info-row">
                          <span>Immigration Status</span> 
                          <span><b>:</b>
                            <select name="immigrationStatus" class="profile-input" id="">
                                <option disabled >Select Immigration Status</option>
                                <option value="Permanent Resident">Permanent Resident</option>
                                <option value="Exchang visitor">Exchang Visitor</option>
                                <option value="Temporary Resident">Temporary Resident</option>                        
                            </select>
                          </span>
                        </div>
                        <div class="info-row">
                          <span>Height</span>
                          <span><b>:</b>
                            <select name="height" class="profile-input" id="">
                              <option disabled >Select Height</option>
                              <option value="Below 120">Below 4'</option>
                              {{-- loop --}}
                              <option value="Above 182">Above 6'</option>
                            </select>
                          </span>
                        </div>
                        <div class="info-row">
                          <span>Complexion</span>
                          <span><b>:</b>
                            <select name="complexion" class="profile-input" id="">
                              <option disabled >Select Complexion</option>
                              <option value="Fair">Fair</option>
                              <option value="Wheatish">Wheatish</option>
                              <option value="Dark">Dark</option>
                              <option value="Prefer Not to Say">Prefer Not to Say</option>
                            </select>
                          </span>
                        </div>
                        <div class="info-row">
                          <span>Features</span> 
                          <span><b>:</b>
                            <select name="features" class="profile-input" id="">
                              <option value="Prefer not to Say">Prefer not to Say</option>
                              <option value="Sharp">Sharp</option>
                              <option value="Handsome">Handsome</option>
                              <option value="Good Looking">Good Looking</option>
                              <option value="Average">Average</option>
                            </select>
                          </span>
                        </div>
                      </div>
                    </div>
                    {{-- form submit Button and form Cancel button --}}
                    <div class="mt-2">
                      <button type="submit" class="btn btn-success">Update</button>
                      <span class="edit-icon  col-md-2 col-4"
                          onclick="toggleDivAndForm('basics-info', 'edit-info', false)">
                          <i class="bi bi-x"></i> Cancel
                      </span>
                    </div>
                </form>
                {{-- Basics information section code end --}}

                {{-- Life Sytle section code start --}}
                 {{-- Default Display --}}
                <div id="life-style" class="row mt4 justify-content-between">
                  <h5 class="col-md-4 col-8 ">
                    Life Style
                  </h5>
                  <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('life-style', 'edit-style', true)">
                    <i class="bi bi-pencil"></i> Edit
                  </span>
                  <div class="row">
                    <div class="col-md-3 col-6">Living Situation</div>
                    <div class="col-md-3 col-6"><b>:</b>
                     Living with Family
                    </div>
                    <div class="col-md-3 col-6">House Ownership</div>
                    <div class="col-md-3 col-6"><b>:</b>
                     Rent
                    </div>
                    <div class="col-md-3 col-6">Diet</div>
                    <div class="col-md-3 col-6"><b>:</b>
                     Vegetarian
                    </div>
                    <div class="col-md-3 col-6">Drink</div>
                    <div class="col-md-3 col-6"><b>:</b>
                     No
                    </div>
                    <div class="col-md-3 col-6">Smoke</div>
                    <div class="col-md-3 col-6"><b>:</b>
                     No
                    </div>
                  </div>
                </div>

                 {{-- life style edit form --}}
                <form action="" method="post" id="edit-style">
                  <h5 class="col-md-4 col-5 h5">
                    Edit Life Style
                  </h5>
                  <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('life-style', 'edit-style', false)">
                    <i class="bi bi-x"></i> Cancel
                  </span>
                  @csrf
                  {{-- Liviin Situation --}}
                  <div class="info-row">
                    <span>Living Situation</span>
                    <span><b>:</b>
                      <select name="living_situation" class="profile-input" id="">
                        <option value="Prefer not to Say">Prefer not to Say</option>
                        <option value="Living with Family">Living with Family</option>
                        <option value="Living with Friends">Living with Friends</option>
                        <option value="Living Alone">Living Alone</option>
                        <option value="Other">Other</option>
                      </select>
                    </span>
                  </div>
                  {{-- House Ownership --}}
                  <div class="info-row">
                    <span>House Ownership</span>
                    <span><b>:</b>
                      <select name="houseOwnership" class="profile-input" id="">
                        <option value="Prefer not to Say">Prefer not to Say</option>
                        <option value="Own">Own</option>
                        <option value="Rent">Rent</option>
                        <option value="Other">Other</option>
                      </select>
                    </span>
                  </div>
                  {{-- Diet --}}
                  <div class="info-row">
                    <span>Diet</span>
                    <span><b>:</b>
                      <select name="diet" class="profile-input" id="">
                        <option value="Prefer not to Say">Prefer not to Say</option>
                        <option value="Vegetarian">Vegetarian</option>
                        <option value="Non-Vegetarian">Non-Vegetarian</option>
                        <option value="Other">Other</option>
                      </select>
                  </div>
                  {{-- Drinking --}}
                  <div class="info-row">
                    <span>Drinking</span>
                    <span><b>:</b>
                      <select name="drinking" class="profile-input" id="">
                        <option value="Prefer not to Say">Prefer not to Say</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                     </select>
                    </span>
                  </div>
                  {{-- Smoking --}}
                  <div class="info-row">
                    <span>Smoking</span>
                    <span><b>:</b>
                      <select name="smoking" class="profile-input" id="">
                        <option value="Prefer not to Say">Prefer not to Say</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </span>
                  </div>
                  {{-- form submit button --}}
                  <div class="mt-2">
                    <button type="submit" class="btn btn-update">Update</button>
                    <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('life-style', 'edit-style', false)">
                      <i class="bi bi-x"></i> Cancel
                    </span>
                  </div>
                </form>
                {{-- Life Sytle section code end --}}

                {{-- Religious Background section code start --}}
                <div id="religious-bg" class="row mt-4 justify-content-between">
                  <h5 class="col-md-4 col-8 ">
                    Religious Background
                  </h5>
                  <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('religious-bg', 'edit-relgious', true)">
                    <i class="bi bi-pencil"></i> Edit
                  </span>

                </div>

                {{-- Religious Backgroud section code end --}}
              </div>

        

        </div>
    </div>

    {{-- Profile Page Java Script code --}}
    <script>
        // calculate age from dob
        function calculateAge() {
            const dobInput = document.getElementById('dob').value;

            if (!dobInput) {
                document.getElementById('age').value = '';
                return;
            }

            const dob = new Date(dobInput);
            const today = new Date();

            let age = today.getFullYear() - dob.getFullYear();
            const monthDiff = today.getMonth() - dob.getMonth();
            const dayDiff = today.getDate() - dob.getDate();

            // Adjust age if the current date is before the birth date in the year
            if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
                age--;
            }
            if(age >=18){
            document.getElementById('age').value = age;
            }
            else{                        
              alert('Minimum age 18 year required!!!');
              document.getElementById('dob').value = ''; // Clear DOB field
              document.getElementById('age').value = ''; // Clear Age field
            }

         }

        // Function to toggle between div and form
        function toggleDivAndForm(divId, formId, showForm) {
            const divElement = document.getElementById(divId);
            const formElement = document.getElementById(formId);

            if (divElement && formElement) {
                if (showForm) {
                    divElement.style.display = 'none'; // Hide the div
                    formElement.style.display = 'block'; // Show the form
                } else {
                    divElement.style.display = 'block'; // Show the div
                    formElement.style.display = 'none'; // Hide the form
                }
            } else {
                console.error('Provided div ID or form ID does not exist.');
            }
        }

        // Function to set min and max dates for the input field
            const setDateRange = () => {
            const dateInput = document.getElementById('dob');

            // Get today's date
            const today = new Date();

            // Calculate the maximum date (45 years ago)
            const maxDate = new Date(
              today.getFullYear() - 18,
              today.getMonth(),
              today.getDate()
            ).toISOString().split('T')[0];

            // Calculate the minimum date (18 years ago)
            const minDate = new Date(
              today.getFullYear() - 45,
              today.getMonth(),
              today.getDate()
            ).toISOString().split('T')[0];

            // Set the min and max attributes
            dateInput.setAttribute('min', minDate);
            dateInput.setAttribute('max', maxDate);
          };

          // Call the function to set the date range
          setDateRange();
        // Function to populate the height select element
        function populateHeightSelect() {
            const heightSelect = document.getElementById("height-select");
            for (let i = 4; i <= 6; i++) {
                for (let j = 0; j <= 11; j++) {
                    const opt = document.createElement("option");
                    let feet = 30.48;
                    let inch = 2.54;
                    let height_value = (i * feet) + (j * 2.54);
                    // let floor_value = height_value.toFixed(2); //for exact value after decimal

                    let floor_value = Math.floor(height_value); //for floor value after decimal

                    opt.value = floor_value;
                    opt.textContent = i + "'" + j + "(" + floor_value + " cm)"
                    heightSelect.appendChild(opt);
                }
            }
        }

        // Call the function to populate the height options
        populateHeightSelect();
    </script>
    </div>
    </div>
@endsection
{{-- Profile page CSS code  --}}
<style>
    /* All profile page Css */
    .profile-Container {
        margin: 20px;
        border: 1px solid #ddd;
        padding: 10px 20px;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .profile-input{
      color: black;
      padding:0px;
      margin:0px;
      width: 80%;
      border:none;
      border-bottom:1px solid #353535;
    }

    .profile-input option{
      color: black;
      background: rgb(255, 255, 255);
    }

    .profile-Container h5 {
        color: #e74c3c;
    }

    .edit-icon {
        cursor: pointer;
        color: #aaa;
    }

    .edit-icon:hover {
        color: #555;
    }

    .about-view {
        position: relative;
    }

    .basics-info {
        position: relative;
    }

    /* only about field css  start */
    #edit-about, #edit-info, #edit-style {
        display: none;
    }

    #edit-about textarea {
        width: 100%;
        height: 80px;
        resize: none;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    /* only about field css end */
    .btn-update {
        background-color: #e74c3c;
        border: none;
        color: white;
        padding: 5px 15px;
        border-radius: 3px;
    }

    .btn-update:hover {
        background-color: #c0392b;
    }

    .btn-cancel {
        background-color: #7f8c8d;
        border: none;
        color: white;
        padding: 5px 15px;
        border-radius: 3px;
    }

    .btn-cancel:hover {
        background-color: #5a6d6f;
    }

    .info-content {
        margin-top: 10px;
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .info-row span {
        display: inline-block;
        width: 100%;
        color: #555;
    }

    .info-row span:first-child {
        color: #333;
    }
</style>
