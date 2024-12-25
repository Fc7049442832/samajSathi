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

                <!-- Edit Form -->
                <form id="edit-about" onsubmit="updateAbout(event)">
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
                    <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('basics-info', 'edit-info', true)">
                        <i class="bi bi-pencil"></i> Edit
                    </span>

                    <div class="p-3">
                        <div class="info-content">
                            <div class="info-row">
                                <span>Gender</span> <span><b>:</b> Male</span><br>
                                <span>Blood Group</span> <span><b>:</b> Not Specified</span>

                            </div>

                            <div class="info-row">
                                <span>Age</span> <span><b>:</b> <input type="text" id="age" name="age"
                                        readonly></span>
                                <span>Special Case</span> <span><b>:</b> Not Specified</span>
                            </div>

                            <div class="info-row">
                                <span>Date of Birth</span> <b>:</b><span><input type="date" id="dob" name="dob"
                                        required onchange="calculateAge()"></span>
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
                <form action="" id="edit-info" onsubmit="updateAbout(event)">
                    <div id="basics-info" class="row mt-4 justify-content-between">
                        <h5 class="col-md-4 col-5">Edit
                            Basics Information </h5>
                        <span class="edit-icon  col-md-2 col-4"
                            onclick="toggleDivAndForm('basics-info', 'edit-info', false)">
                            <i class="bi bi-pencil"></i> Cancel
                        </span>

                        <div class="p-3">
                            <div class="info-content">
                                <div class="info-row">
                                    <span>Gender</span>
                                    <span><b>:</b>
                                        <select name="gender" id="" class="profile-input" valu="">
                                            <option disabled>Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </span>
                                    <span>Blood Group</span>
                                    <span><b>:</b>
                                        <select name="bloodGroup" id="" class="profile-input">
                                            <option disabled>Not Specified</option>
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
                                    <span>Age</span> <span><b>:</b> <input type="text" id="age" name="age"
                                            class="profile-input" placeholder="Auto fill DOB base" readonly></span>

                                    <span>Special Case</span>
                                    <span><b>:</b>
                                        <select name="specialCase" id="" class="profile-input">
                                            <option disabled>Not Specified</option>
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
                                    <span> <input type="date" id="dob" class="profile-input" name="dob"
                                            required onchange="calculateAge()"></span>
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
                                            <option disabled>Select Marital Status</option>
                                            <option value="Never Married">Never Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Awaiting Divorced">Awaiting Divorced</option>
                                            <option value="Annulled">Annulled</option>
                                        </select>
                                    </span>
                                    <span>Body Weight</span>
                                    <span><b>:</b>
                                        <input type="number" name="bodyWeight" class="profile-input" id="">KG.
                                    </span>
                                </div>
                                <div class="info-row">
                                    <span>Citizenship</span> <span><b>:</b> Not Specified</span>
                                    <span>Immigration Status</span>
                                    <span><b>:</b>
                                        <select name="immigrationStatus" class="profile-input" id="">
                                            <option disabled>Select Immigration Status</option>
                                            <option value="Permanent Resident">Permanent Resident</option>
                                            <option value="Exchang visitor">Exchang Visitor</option>
                                            <option value="Temporary Resident">Temporary Resident</option>
                                        </select>
                                    </span>
                                </div>
                                <div class="info-row">
                                    <span>Height</span>
                                    <span><b>:</b>
                                        <select name="height" class="profile-input" id="height-select"
                                            style="color: white">
                                            <option disabled>Select Height</option>
                                            {{-- <option value="Below 120">Below 4'</option> --}}
                                            {{-- loop --}}
                                            {{-- <option value="Above 182">Above 6'</option> --}}
                                        </select>
                                    </span>
                                    <span>Complexion</span>
                                    <span><b>:</b>
                                        <select name="complexion" class="profile-input" id="">
                                            <option disabled>Select Complexion</option>
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
                                    <span></span> <span></span>
                                </div>
                            </div>
                        </div>
                </form>



            </div>


        </div>
    </div>


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
            if (age >= 18) {
                document.getElementById('age').value = age;
            } else {
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

        // Function to populate the height select element
        function populateHeightSelect() {
            const heightSelect = document.getElementById("height-select");
            for (let i = 4; i <= 6; i++) {
                for (let j = 0; j <= 11; j++) {
                    const opt = document.createElement("option");
                    let feet = 30.48;
                    let inch = 2.54;
                    let height_value = (i * feet) + (j * 2.54);
                    let floor_value = Math.floor(height_value);
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

    #age,
    #dob {
        color: black;
        padding: 0px;
        margin: 0px;
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
    #edit-about {
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

    #edit-info {
        display: none;
    }

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
