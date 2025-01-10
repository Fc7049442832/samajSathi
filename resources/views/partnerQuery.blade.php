@extends('layouts.app')
@section('content')
    <h2>Partner Prefence</h2>

 {{-- main Page content --}}
 <div class="col-md-8">
    {{-- error display --}}
     @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif
   <div class="profile-Container">
       {{-- Basics information section code start --}}
       <form action="{{ route('basic-requeriment', $userDetail->user_id )}}" method="POST">
         @csrf
         <div id="basics-info" class="row mt-4 justify-content-between">
             <h5 class="col-md-4 col-12">Basics Information for Partner</h5>
         </div>
         <div class="p-3">
             <div class="info-content">     
                 <!-- Required Age -->
                 <div class="info-row">
                     <span>Age</span>
                     <span class="text-md-center"><b>:</b>
                        <label for="age">Min</label>
                        <select name="min_age" id="min_age" class="profile-input" onchange="updateMaxAge()">
                          @for ($i = 18; $i <= 45; $i++)
                              <option value="{{ $i }}" {{ (old('min_age', $partner_Query->min_age ?? '') == $i) ? 'selected' : '' }}>
                                  {{ $i }}
                              </option>
                          @endfor
                      </select>
                     </span>
                     <span>
                        <label for="age">Max</label>
                        <select name="max_age" id="max_age" class="profile-input">
                            <option value="">- Select Max Age -</option>
                            @for ($i = 18; $i <= 45; $i++)
                                <option value="{{ $i }}" {{ (old('max_age', $partner_Query->max_age ?? '') == $i) ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                     </span>
                 </div>

                 {{-- Required Height --}}
                 <div class="info-row">
                  <span>Height</span>
                  <span class="text-center"><b>:</b>
                    <label for="">Min</label>
                    <select name="min_height" id="min_height" class="profile-input" onchange="updateMaxHeight()">
                      @foreach([
                          "Below 4' 9\"(145 cm)" => 145, "4' 10\" (147 cm)" => 147, "4' 11\" (150 cm)" => 150,
                          "5' 0\" (152 cm)" => 152, "5' 1\" (155 cm)" => 155, "5' 2\" (157 cm)" => 157,
                          "5' 3\" (160 cm)" => 160, "5' 4\" (163 cm)" => 163, "5' 5\" (165 cm)" => 165,
                          "5' 6\" (168 cm)" => 168, "5' 7\" (170 cm)" => 170, "5' 8\" (173 cm)" => 173,
                          "5' 9\" (175 cm)" => 175, "5' 10\" (178 cm)" => 178, "5' 11\" (180 cm)" => 180,
                          "6' 0\" (183 cm)" => 183, "Above 6' (185 cm)" => 185,
                      ] as $text => $cm)
                          <option value="{{ $cm }}" {{ old('min_height', $partner_Query->min_height ?? '') == $cm ? 'selected' : '' }}>
                              {{ $text }}
                          </option>
                      @endforeach
                    </select>
                  </span>
                  <span><label>Max</label>
                    <select name="max_height" id="max_height" class="profile-input">
                        <option value="">- Select Max Height -</option>
                        @foreach([
                            "Below 4' 9\"(145 cm)" => 145, "4' 10\" (147 cm)" => 147, "4' 11\" (150 cm)" => 150,
                            "5' 0\" (152 cm)" => 152, "5' 1\" (155 cm)" => 155, "5' 2\" (157 cm)" => 157,
                            "5' 3\" (160 cm)" => 160, "5' 4\" (163 cm)" => 163, "5' 5\" (165 cm)" => 165,
                            "5' 6\" (168 cm)" => 168, "5' 7\" (170 cm)" => 170, "5' 8\" (173 cm)" => 173,
                            "5' 9\" (175 cm)" => 175, "5' 10\" (178 cm)" => 178, "5' 11\" (180 cm)" => 180,
                            "6' 0\" (183 cm)" => 183, "Above 6' (185 cm)" => 185,
                        ] as $text => $cm)
                            <option value="{{ $cm }}" {{ old('max_height', $partner_Query->max_height ?? '') == $cm ? 'selected' : '' }}>
                                {{ $text }}
                            </option>
                        @endforeach
                    </select>
                  </span>
                </div>
                
                <!-- Marital Status -->
                <div class="info-row mt-5">
                    <span>Marital Status</span>
                    <span><b>:</b>
                        <select name="marital_status" class="profile-input">
                            <option disabled>Select Marital Status</option>
                            @foreach(['Never Married', 'Divorced', 'Widowed', 'Awaiting Divorced', 'Annulled'] as $status)
                                <option value="{{ $status }}" {{ old('marital_status', $partner_Query->marital_status ?? '') == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </span>
                </div>

                 <!-- Special Case -->
                 <div class="info-row">
                     <span>Special Case</span>
                     <span><b>:</b>
                         <select name="special_case" class="profile-input">
                             <option disabled>Not Specified</option>
                             @foreach(['None', 'HIV Positive', 'Mentally Challenged', 'Physically Challenged', 'Other', 'Thalassemia Major'] as $case)
                                 <option value="{{ $case }}" {{ old('special_case', $partner_Query->special_case ?? '') == $case ? 'selected' : '' }}>
                                     {{ $case }}
                                 </option>
                             @endforeach
                         </select>
                     </span>
                 </div>
     
                 <!-- Body Type -->
                 <div class="info-row">
                     <span>Body Type</span>
                     <span><b>:</b>
                         <select name="body_type" class="profile-input">
                             @foreach(["Doesn't Matter", 'Athletic', 'Thin', 'Slim', 'Medium', 'Slightly Heavy', 'Heavy', 'Prefer Not to Say'] as $type)
                                 <option value="{{ $type }}" {{ old('body_type', $partner_Query->body_type ?? '') == $type ? 'selected' : '' }}>
                                     {{ $type }}
                                 </option>
                             @endforeach
                         </select>
                     </span>
                 </div>
    
                 <!-- Body Weight -->
                 <div class="info-row">
                   <span>Body Weight</span>
                   <span><b>:</b>
                       <select name="weight" class="profile-input">
                           @foreach(["Doesn't Matter", 'Underweight', 'Normal', 'Overweight', 'Obese', 'Prefer Not to Say'] as $weight)
                               <option value="{{ $weight }}" {{ old('body_weight', $partner_Query->body_weight ?? '') == $weight ? 'selected' : '' }}>
                                   {{ $weight }}
                               </option>
                           @endforeach
                       </select>
                   </span>
                 </div>

                 <!-- Citizenship -->
                 <div class="info-row">
                   <span>Citizenship</span>
                   <span><b>:</b>
                       <select name="citizenship" class="profile-input">
                           @foreach(["Doesn't Matter", 'Citizen', 'Permanent Resident', 'Work Permit', 'Student Visa', 'Other'] as $citizen)
                               <option value="{{ $citizen }}" {{ old('citizenship', $partner_Query->citizenship ?? '') == $citizen ? 'selected' : '' }}>
                                   {{ $citizen }}
                               </option>
                           @endforeach
                       </select>
                   </span>
                 </div>

                 <!-- Complexion -->
                 <div class="info-row">
                   <span>Complexion</span>
                   <span><b>:</b>
                       <select name="complexion" class="profile-input">
                           @foreach(["Doesn't Matter", 'Fair', 'Wheatish', 'Dark', 'Prefer Not to Say'] as $complexion)
                               <option value="{{ $complexion }}" {{ old('complexion', $partner_Query->complexion ?? '') == $complexion ? 'selected' : '' }}>
                                   {{ $complexion }}
                               </option>
                           @endforeach
                       </select>
                   </span>
                 </div>

                 <!-- Features -->
                 <div class="info-row">
                   <span>Features</span>
                   <span><b>:</b>
                       <select name="Features" class="profile-input">
                           @foreach([ "Doesn't Matter", 'Sharp', 'Average', 'Unique', 'Prefer Not to Say'] as $features)
                               <option value="{{ $features }}" {{ old('features',$partner_Query->features ?? '') == $features ? 'selected' : '' }}>
                                   {{ $features }}
                               </option>
                           @endforeach
                       </select>
                   </span>
                 </div>

                {{-- Higher Education --}}
                <div class="info-row">
                  <span> Education </span>
                  <span><b>:</b>
                    <select name="education" class="profile-input" id="">
                        @php
                            $educationOptions = ["Doesn't Matter",'10th', '12th', 'BA', 'B.Com', 'MBA', 'MCA', 'B.Tech', 'M.Tech','B.Ed','BCA', 'B.sc','Other'];
                        @endphp
                        @foreach ($educationOptions as $option)
                        <option value="{{ $option }}" {{ old('education', $partner_Query->education ?? '') == $option ? 'selected' : '' }}>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                 {{-- Working As --}}
                <div class="info-row">
                    <span> Working As </span>
                    <span><b>:</b>
                        <select name="working_as" class="profile-input" id="">
                            @php
                                $workingAsOptions = ["Doesn't Matter",'Govt Job', 'Business Man', 'Private Job', 'Developer', 'Manager','HR', 'Team Leader', 'Teacher', 'Engineer', 'Designer','Docter', 'Lawyer', 'Other','Self Emplyeer' ];
                            @endphp
                            @foreach ($workingAsOptions as $option)
                              <option value="{{ $option }}" {{ old('working_as', $partner_Query->working_as ?? '') == $option ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </span>
                </div>
          
                 <!-- Income -->
                <div class="info-row">
                  <span>Annual Income</span>
                  <span><b>:</b>
                      <select name="income" class="profile-input">
                          @foreach([ "Doesn't Matter", 'upto 100k', '100k-250k', '250k-350k', '350k-500k', '500k-more'] as $features)
                              <option value="{{ $features }}" {{ old('features', $partner_Query->features ?? '') == $features ? 'selected' : '' }}>
                                  {{ $features }}
                              </option>
                          @endforeach
                      </select>
                  </span>
                </div>
            </div>
         </div>
         <!-- Submit and Cancel -->
         <div class="mt-2 text-center">
              <button class="btn btn-danger">
                <i class="bi bi-x"></i> Cancel
              </button> 
              <button type="submit" class="btn btn-success">Save/Update</button>
         </div>
       </form>
       {{-- Basics information section code end --}}

       {{-- Life Sytle section code start --}}
        <form action="{{ route('life-style-requeriment', $userDetail->user_id) }}" method="post">
         @csrf
         <h5 class="col-md-4 col-5 h5">Life Style</h5>
         {{-- Diet --}}
         <div class="info-row">
              <span>Diet</span>
              <span><b>:</b>
                  <select name="diet" class="profile-input">
                      <option value="Doesn't Matter" {{ (old('diet', $partner_Query->diet ?? '') == "Doesn't Matter") ? 'selected' : '' }}>Doesn't Matter</option>
                      <option value="Vegetarian" {{ (old('diet', $partner_Query->diet ?? '') == 'Vegetarian') ? 'selected' : '' }}>Vegetarian</option>
                      <option value="Non-Vegetarian" {{ (old('diet', $partner_Query->diet ?? '') == 'Non-Vegetarian') ? 'selected' : '' }}>Non-Vegetarian</option>
                      <option value="Other" {{ (old('diet', $partner_Query->diet ?? '') == 'Other') ? 'selected' : '' }}>Other</option>
                  </select>
              </span>
              @error('diet')
              <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>      

         {{-- Drinking --}}
         <div class="info-row">
             <span>Drinking</span>
             <span><b>:</b>
                 <select name="drink" class="profile-input">
                     <option value="Doesn't Matter" {{ (old('drink', $partner_Query->drink) == "Doesn't Matter") ? 'selected' : '' }}>Doesn't Matter</option>
                     <option value="Yes" {{ (old('drink', $partner_Query->drink) == 'Yes') ? 'selected' : '' }}>Yes</option>
                     <option value="No" {{ (old('drink', $partner_Query->drink) == 'No') ? 'selected' : '' }}>No</option>
                 </select>
             </span>
             @error('drink')
             <div class="text-danger">{{ $message }}</div>
             @enderror
         </div>

         {{-- Smoking --}}
         <div class="info-row">
             <span>Smoke</span>
             <span><b>:</b>
                 <select name="smoke" class="profile-input">
                     <option value="Doesn't Matter" {{ (old('smoke', $partner_Query->smoke) == "Doesn't Matter") ? 'selected' : '' }}>Doesn't Matter</option>
                     <option value="Yes" {{ (old('smoke', $partner_Query->smoke) == 'Yes') ? 'selected' : '' }}>Yes</option>
                     <option value="No" {{ (old('smoke', $partner_Query->smoke) == 'No') ? 'selected' : '' }}>No</option>
                 </select>
             </span>
             @error('smoking')
             <div class="text-danger">{{ $message }}</div>
             @enderror
         </div>

         {{-- Submit Button --}}
         <div class="mt-2 text-center">
          <span class="edit-icon btn btn-danger  col-md-2 col-4" >
            <i class="bi bi-x"></i> Cancel
          </span> 
          <button type="submit" class="btn btn-update btn-success">Save/Update</button>
        
         </div>
        </form>
       {{-- Life Sytle section code end --}}

       {{-- Religious Background edit form --}}
       <form action="{{ route('social-requeriment', $userDetail->user_id) }}" method="post">
         @csrf
         <h5 class="col-md-4 mt-5 col-6">
           Religion & Social Background
         </h5>

         {{-- Religion --}}
         <div class="info-row">
           <span>Religion</span>
           <span><b>:</b>
             @php 
                $religions = ['Hindu', 'Muslim', 'Christian', 'Buddhist', 'Jain', 'Sikh', 'Other'];
             @endphp
             <select name="religion" class="profile-input" id="">
               @foreach($religions as $religion)
                <option value="{{ $religion }}" {{ old('education', $userDetail->religion?? '') == $religion ? 'selected' : '' }}>{{ $religion }}</option>
               @endforeach
             </select>
           </span>
         </div>
         {{-- Caste --}}
         <div class="info-row">
           <span>Caste</span>
           <span><b>:</b>
             <input type="text" name="caste" class="profile-input" placeholder="Caste Name" id="" value="{{ $partner_Query->caste ?? '' }}">
           </span>
         </div>

         {{-- Mother Tongue --}}
         <div class="info-row">
           <span>Mother Tongue</span>
           <span><b>:</b>
            @php
             $motherTongues = ['Hindi', 'English','Bengali','Marathi','Gujarati','Tamil','Telugu', 'Kannada', 'Malayalam','Punjabi', 'Odia', 'Urdu','Other'];
            @endphp
             <select name="mother_tongus" class="profile-input" id="" value="{{ $userDetail->mother_tongus ?? 'Mother Tongue' }}">
               @foreach($motherTongues as $motherTongue)
               <option value="{{ $motherTongue }}" {{ old('mother_tongus', $userDetail->$motherTongue?? '') == $motherTongue ? 'selected' : '' }}>{{ $motherTongue }}</option>
               @endforeach
             </select>
           </span>
         </div>
         {{-- Gothra / Gothram --}}
         <div class="info-row">
           <span>Gothra / Gothram</span>
           <span><b>:</b>
             <input type="text" name="gorthra" id="" class="profile-input" placeholder="Gothra / Gothram" value="{{ $partner_Query->gorthra ?? '' }}" \>
           </span>
         </div>
          {{-- Family Type --}}
          <div class="info-row">
            <span>Family Type</span>
            <span><b>:</b>
              <select name="family_type" class="profile-input" id="family_type">
                <option value="" {{ (old('family_type', $partner_Query->family_type ?? '') == '') ? 'selected' : '' }}>- Select One -</option>
                <option value="Joint Family" {{ (old('family_type', $partner_Query->family_type ?? '') == 'Joint Family') ? 'selected' : '' }}>Joint Family</option>
                <option value="Nuclear Family" {{ (old('family_type', $partner_Query->family_type ?? '') == 'Nuclear Family') ? 'selected' : '' }}>Nuclear Family</option>
                <option value="Single Parent" {{ (old('family_type', $partner_Query->family_type ?? '') == 'Single Parent') ? 'selected' : '' }}>Single Parent</option>
                <option value="Other" {{ (old('family_type', $partner_Query->family_type ?? '') == 'Other') ? 'selected' : '' }}>Other</option>
              </select>            
            </span>
          </div>
          {{-- Family Status --}}
          <div class="info-row">
            <span>Family Status</span>
            <span><b>:</b>
              <select name="family_status" id="family_status" class="profile-input">
                <option value="" {{ (old('family_status', $partner_Query->family_status ?? '') == '') ? 'selected' : '' }}>- Select One -</option>
                <option value="Lower Middle Class" {{ (old('family_status', $partner_Query->family_status ?? '') == 'Lower Middle Class') ? 'selected' : '' }}>Lower Middle Class</option>
                <option value="Middle Class" {{ (old('family_status', $partner_Query->family_status ?? '') == 'Middle Class') ? 'selected' : '' }}>Middle Class</option>
                <option value="Upper Middle Class" {{ (old('family_status', $partner_Query->family_status ?? '') == 'Upper Middle Class') ? 'selected' : '' }}>Upper Middle Class</option>
                <option value="Upper Class" {{ (old('family_status', $partner_Query->family_status ?? '') == 'Upper Class') ? 'selected' : '' }}>Upper Class</option>
              </select>            
            </span>
          </div>

           {{-- Country selection --}}
         <div class="info-row">
          <span> Country </span>
          <span><b>:</b>
            <select name="country" class="profile-input" id="country">
                <option value="" {{ old('country', $partner_Query->country ?? '') === '' ? 'selected' : '' }}>- Select Country -</option>
                <option value="India" {{ old('country', $partner_Query->country ?? '') === 'India' ? 'selected' : '' }}>India</option>
                <option value="Other" {{ old('country', $partner_Query->country ?? '') === 'Other' ? 'selected' : '' }}>Other</option>
            </select>
          
          </span>
        </div>

        {{-- state input --}}
        <div class="info-row">
          <span> State </span>
          <span><b>:</b>
            <select name="state" class="profile-input" id="state">
              @php
                  $states = [
                      'Andhra Pradesh', 'Arunachal Pradesh', 'Assam', 'Bihar', 'Chhattisgarh', 
                      'Goa', 'Gujarat', 'Haryana', 'Himachal Pradesh', 'Jharkhand', 
                      'Karnataka', 'Kerala', 'Madhya Pradesh', 'Maharashtra', 'Manipur', 
                      'Meghalaya', 'Mizoram', 'Nagaland', 'Odisha', 'Punjab', 
                      'Rajasthan', 'Sikkim', 'Tamil Nadu', 'Telangana', 'Tripura', 
                      'Uttar Pradesh', 'Uttarakhand', 'West Bengal', 'Andaman and Nicobar Islands', 
                      'Chandigarh', 'Dadra and Nagar Haveli and Daman and Diu', 'Delhi', 
                      'Jammu and Kashmir', 'Ladakh', 'Lakshadweep', 'Puducherry', 'Other'
                  ];
              @endphp
              <option value="" disabled {{ old('state', $partner_Query->state ?? '') === '' ? 'selected' : '' }}>Select State</option>
             
              @foreach ($states as $state)
                  <option id="state-selection" value="{{ $state }}" {{ old('state', $partner_Query->state ?? '') == $state ? 'selected' : '' }}>{{ $state }}</option>
              @endforeach    
            </select>
          </span>
        </div>


         {{-- form submit button --}}
         <div class="mt-2 text-center">
          <span class="edit-icon btn btn-danger  col-md-2 col-4" >
            <i class="bi bi-x"></i> Cancel
          </span> 
          <button type="submit" class="btn btn-update btn-success">Save/Update</button>
         </div>
       </form>
       {{-- Religious Backgroud section code end --}}
     </div>
</div>

{{-- Profile Page Java Script code --}}
<script>
  // age for function
    function updateMaxAge() {
        const minAge = document.getElementById('min_age').value;
        const maxAgeSelect = document.getElementById('max_age');
        
        // Clear previous selections
        for (let i = 0; i < maxAgeSelect.options.length; i++) {
            maxAgeSelect.options[i].disabled = false;
        }

        // Disable options less than selected min_age
        for (let i = 0; i < maxAgeSelect.options.length; i++) {
            if (parseInt(maxAgeSelect.options[i].value) < parseInt(minAge)) {
                maxAgeSelect.options[i].disabled = true;
            }
        }

        // Reset max_age value if the selected value is less than min_age
        if (parseInt(maxAgeSelect.value) < parseInt(minAge)) {
            maxAgeSelect.value = '';
        }
    }

  // height for function
  function updateMaxHeight() {
        const minHeight = parseInt(document.getElementById('min_height').value, 10);
        const maxHeightSelect = document.getElementById('max_height');
        
        // Enable all options first
        for (let i = 0; i < maxHeightSelect.options.length; i++) {
            maxHeightSelect.options[i].disabled = false;
        }

        // Disable options that are less than the selected min_height
        for (let i = 0; i < maxHeightSelect.options.length; i++) {
            const optionValue = parseInt(maxHeightSelect.options[i].value, 10);
            if (!isNaN(optionValue) && optionValue < minHeight) {
                maxHeightSelect.options[i].disabled = true;
            }
        }

        // Reset max_height value if it becomes invalid
        if (parseInt(maxHeightSelect.value, 10) < minHeight) {
            maxHeightSelect.value = '';
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


 // Get the State name and other state
 const countrySelect = document.getElementById('country');
   const stateSelect = document.getElementById('state'); // Ensure the state dropdown has an ID "state"

   countrySelect.addEventListener('change', function () {
     if (this.value === 'Other') {
       stateSelect.value = 'Other'; // Set state dropdown to "Other"
       stateSelect.disabled = true; // Disable the dropdown
     } else {
       stateSelect.value = ''; // Reset state dropdown
       stateSelect.disabled = false; // Enable the dropdown
     }
 });
</script>
@endsection
{{-- Profile page CSS code  --}}
<style>
 /* All profile page Css */
 form{
  margin: 50px 0px;
 }
     /* Media Query for Mobile Devices */
     @media (max-width: 768px) {
         .profile-container {
             padding: 15px;
         }

         .profile-header {
             flex-direction: column;
             align-items: center; /* Center align items */
         }

         .profile-details {
             flex-direction: column;
             align-items: center; /* Center align items */
             text-align: center; /* Center text for mobile */
         }

         .profile-image {
             width: 80px;
             height: 80px;
             font-size: 20px; /* Smaller font size */
         }

         .profile-info {
             margin-left: 0;
             margin-top: 10px; /* Add spacing for better layout */
         }

         .profile-info h2 {
             font-size: 1.25rem; /* Smaller font size */
         }

         .profile-info p {
             font-size: 0.9rem; /* Smaller font size */
         }

         .progress-circle {
             width: 50px;
             height: 50px;
             border-width: 5px;
         }

         .progress-circle span {
             font-size: 0.8rem; /* Smaller font size */
         }
     }

     /* Media Query for Extra Small Devices */
     @media (max-width: 480px) {
         .profile-row {
             padding: 10px;
         }

         .profile-info h2 {
             font-size: 1rem; /* Even smaller font size for tiny screens */
         }

         .profile-info p {
             font-size: 0.8rem;
         }

         .progress-circle {
             width: 40px;
             height: 40px;
             border-width: 4px;
         }

         .progress-circle span {
             font-size: 0.7rem;
         }
     }

  h5{
    color: #e74c3c;
  }
 .edit-icon {
     cursor: pointer;
     color: #aaa;
 }

 .edit-icon:hover {
     color: #555;
 }

 .profile-input{
   width: 60%;
   margin:0px;
   padding: 0px;
   padding:5px;
   font-size: 14px;
   background: #f7f7f7;
   border-radius:5px;
   color:black;
 }
 .profile-input option{
   background: #f3f2f2;
   color: black;
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