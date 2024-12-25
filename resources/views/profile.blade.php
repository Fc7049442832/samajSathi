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
                                <span>Gender</span> <span><b>:</b> Male</span>
                                <span>Blood Group</span> <span><b>:</b> Not Specified</span>
                            </div>

                            <div class="info-row">
                                <span>Age</span> <span><b>:</b> <input type="text" id="age" name="age" readonly
                                        ></span>
                                <span>Special Case</span> <span><b>:</b> Not Specified</span>
                            </div>

                            <div class="info-row">                                 
                                <span>Date of Birth</span> <b>:</b><span><input type="date" id="dob" name="dob"
                                        required
                                        onchange="calculateAge()"></span>
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
                                        <select name="gender" id="" class="" valu="">
                                            <option disabled>Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </span>
                                    <span>Blood Group</span>
                                    <span><b>:</b>
                                        <select name="bloodGroup" id="">
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
                                    <span>Age</span> <span><b>:</b> 25</span>
                                    <span>Special Case</span> <span><b>:</b> Not Specified</span>
                                </div>
                                <div class="info-row">
                                    <span>Date of Birth</span> <span><b>:</b> 12-Dec-1999</span>
                                    <span>Body Type</span> <span><b>:</b> Not Specified</span>
                                </div>
                                <div class="info-row">
                                    <span>Marital Status</span>
                                    <span><b>:</b>
                                        <select name="maritalStatus" id="">
                                            <option disabled>Select Marital Status</option>
                                            <option value="Never Married">Never Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Awaiting Divorced">Awaiting Divorced</option>
                                            <option value="Annulled">Annulled</option>
                                        </select>
                                    </span>
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

    #age,#dob{
      color: black;
      padding:0px;
      margin:0px;
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
        width: 45%;
        color: #555;
    }

    .info-row span:first-child {
        color: #333;
    }
</style>
