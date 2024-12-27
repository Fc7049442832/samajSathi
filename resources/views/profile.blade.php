@extends('layouts.app')
@section('content')
  <div class="row">
    <x-ProfileCard :user="$user" />
  </div>
  
  <hr>
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
          {{-- About Me Section code start --}}
          <!-- Default Display -->
          <div id="about-view" class="row justify-content-between">
              <h5 class="col-md-4 col-7">About Me</h5>
              <span class="edit-icon col-md-2 col-4" onclick="toggleDivAndForm('about-view', 'edit-about', true)">
                  <i class="bi bi-pencil"></i> Edit
              </span>
              <p id="about-text">
                @if(!empty($userDetail->about_me))
                  {{ $userDetail->about_me }}
                @else
                  I am a simple boy with a good personality. I reside in a beautiful city of India.
                @endif
              </p>
          </div>

          <!-- About Me Edit Form -->
          <form action="{{ route('update.about_me', $userDetail->user_id )}}" method="post" id="edit-about">
            @csrf
            <h5>About Me</h5>
            <textarea id="about-input" name="about_me" maxlength="500" 
                      oninput="updateCharCount()"
                      placeholder="Write something about yourself...">I am a simple boy with a good personality. I reside in a beautiful city of India.</textarea>
            <div class="char-counter-container">
                <span id="char-counter">0</span>/500 characters
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-update">Update</button>
                <button type="button" class="btn btn-cancel" onclick="toggleDivAndForm('about-view', 'edit-about', false)">Cancel</button>
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

              <div class="info-content">
                  <div class="row justify-content-start">
                      <div class="col-md-3 col-6">Gender</div> <div class="col-md-3 col-6"><b>:</b> {{ $user->gender }} </div>
                      <div class="col-md-3 col-6">Blood Group</div> <div class="col-md-3 col-6"><b>:</b> {{ $userDetail->blood_group }} </div>
                 
                      <div class="col-md-3 col-6">Age</div> <div class="col-md-3 col-6"><b>:</b> {{ $user->age }} </div>
                      <div class="col-md-3 col-6">Special Case</div> <div class="col-md-3 col-6"><b>:</b> {{ $userDetail->special_case ??'Not Specified' }} </div>
                                                
                      <div class="col-md-3 col-6">Date of Birth</div> <div class="col-md-3 col-6"><b>:</b> {{ $userDetail->dob ? \Carbon\Carbon::parse($userDetail->dob)->format('d-m-Y') : 'dd-mm-yy' }} </div>
                      <div class="col-md-3 col-6">Body Type</div> <div class="col-md-3 col-6"><b>:</b> {{ $userDetail->body_type ?? 'Not Specified' }} </div>
                  
                      <div class="col-md-3 col-6">Marital Status</div> <div class="col-md-3 col-6"><b>:</b> {{ $userDetail->marital_status ?? 'Never Married' }}</div>
                      <div class="col-md-3 col-6">Body Weight</div> <div class="col-md-3 col-6"><b>:</b> {{ $userDetail->weight ?? 'Not Specified' }} </div>
                 
                      <div class="col-md-3 col-6">Citizenship</div> <div class="col-md-3 col-6"><b>:</b> {{ $userDetail->citizenship ?? 'Indian' }}</div>
                      <div class="col-md-3 col-6">Immigration Status</div> <div class="col-md-3 col-6"><b>:</b> {{ $userDetail->immigration ?? 'Not Specified' }}</div>
                  
                      <div class="col-md-3 col-6">Height</div> <div class="col-md-3 col-6"><b>:</b> {{ $userDetail->height ?? 'Not Specified' }}</div>
                      <div class="col-md-3 col-6">Complexion</div> <div class="col-md-3 col-6"><b>:</b> {{ $userDetail->complexion ?? 'Not Specified' }}</div>
                  
                      <div class="col-md-3 col-6">Features</div> <div class="col-md-3 col-6"><b>:</b> {{ $userDetail->features ?? 'Not Specified' }}</div>  
                  </div>
              </div>
          </div>

          {{-- Basics information edit form  --}}
          <form action="{{ route('update-basic-info', $userDetail->user_id )}}" method="POST" id="edit-info">
            @csrf
            <div id="basics-info" class="row mt-4 justify-content-between">
                <h5 class="col-md-4 col-5">Edit Basics Information</h5>
            </div>
            <div class="p-3">
                <div class="info-content">
                    <!-- Gender -->
                    <div class="info-row">
                        <span>Gender</span>
                        <span><b>:</b>
                            <select name="gender" class="profile-input">
                                <option disabled>Select</option>
                                <option value="Male" {{ old('gender', $userDetails->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender', $userDetails->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </span>
                    </div>
        
                    <!-- Blood Group -->
                    <div class="info-row">
                        <span>Blood Group</span>
                        <span><b>:</b>
                            <select name="blood_group" class="profile-input">
                                <option disabled>Not Specified</option>
                                @foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $bloodGroup)
                                    <option value="{{ $bloodGroup }}" {{ old('blood_group', $userDetail->blood_group ?? '') == $bloodGroup ? 'selected' : '' }}>
                                        {{ $bloodGroup }}
                                    </option>
                                @endforeach
                                <option value="" {{ old('blood_group', $userDetail->blood_group ?? '') == '' ? 'selected' : '' }}>Do Not Know</option>
                            </select>
                        </span>
                    </div>
        
                    <!-- Age -->
                    <input type="hidden"  id="age" name="age" class="profile-input" placeholder="Auto fill DOB base" readonly
                                   value="{{ old('age', $userDetail->age ) }}">
                    <!-- Special Case -->
                    <div class="info-row">
                        <span>Special Case</span>
                        <span><b>:</b>
                            <select name="special_case" class="profile-input">
                                <option disabled>Not Specified</option>
                                @foreach(['None', 'HIV Positive', 'Mentally Challenged', 'Physically Challenged', 'Other', 'Thalassemia Major'] as $case)
                                    <option value="{{ $case }}" {{ old('special_case', $userDetail->special_case ?? '') == $case ? 'selected' : '' }}>
                                        {{ $case }}
                                    </option>
                                @endforeach
                            </select>
                        </span>
                    </div>
        
                    <!-- Date of Birth -->
                    <div class="info-row">
                        <span>Date of Birth</span><b>:</b>
                        <span>
                            <input type="date" id="dob" class="profile-input" name="dob" required style="color: #333"
                                   value="{{ old('dob', $userDetail->dob ?? '') }}" onchange="calculateAge()">
                        </span>
                    </div>
        
                    <!-- Body Type -->
                    <div class="info-row">
                        <span>Body Type</span>
                        <span><b>:</b>
                            <select name="body_type" class="profile-input">
                                @foreach(['Athletic', 'Thin', 'Slim', 'Medium', 'Slightly Heavy', 'Heavy', 'Prefer Not to Say'] as $type)
                                    <option value="{{ $type }}" {{ old('body_type', $userDetail->body_type ?? '') == $type ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </span>
                    </div>
        
                    <!-- Other fields (similar pattern applied) -->
                    <div class="info-row">
                        <span>Marital Status</span>
                        <span><b>:</b>
                            <select name="marital_status" class="profile-input">
                                <option disabled>Select Marital Status</option>
                                @foreach(['Never Married', 'Divorced', 'Widowed', 'Awaiting Divorced', 'Annulled'] as $status)
                                    <option value="{{ $status }}" {{ old('marital_status', $userDetail->marital_status ?? '') == $status ? 'selected' : '' }}>
                                        {{ $status }}
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
                              @foreach(['Underweight', 'Normal', 'Overweight', 'Obese', 'Prefer Not to Say'] as $weight)
                                  <option value="{{ $weight }}" {{ old('body_weight', $userDetails->body_weight ?? '') == $weight ? 'selected' : '' }}>
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
                              @foreach(['Citizen', 'Permanent Resident', 'Work Permit', 'Student Visa', 'Other'] as $citizen)
                                  <option value="{{ $citizen }}" {{ old('citizenship', $userDetails->citizenship ?? '') == $citizen ? 'selected' : '' }}>
                                      {{ $citizen }}
                                  </option>
                              @endforeach
                          </select>
                      </span>
                    </div>

                    {{-- Height --}}
                    <div class="info-row">
                      <span>Height</span>
                      <span><b>:</b>
                          <select name="height" class="profile-input">
                              @foreach([
                                "Below 4' 9\"(145 cm)"=> 145, 
                                  "4' 10\" (147 cm)" => 147,
                                  "4' 11\" (150 cm)" => 150,
                                  "5' 0\" (152 cm)" => 152,
                                  "5' 1\" (155 cm)" => 155,
                                  "5' 2\" (157 cm)" => 157,
                                  "5' 3\" (160 cm)" => 160,
                                  "5' 4\" (163 cm)" => 163,
                                  "5' 5\" (165 cm)" => 165,
                                  "5' 6\" (168 cm)" => 168,
                                  "5' 7\" (170 cm)" => 170,
                                  "5' 8\" (173 cm)" => 173,
                                  "5' 9\" (175 cm)" => 175,
                                  "5' 10\" (178 cm)" => 178,
                                  "5' 11\" (180 cm)" => 180,
                                  "6' 0\" (183 cm)" => 183,
                                   "Above 6 ' (183 cm)"=>185,
                              ] as $text => $cm)
                                  <option value="{{ $text }}" {{ old('height', $userDetail->height ?? '') == $text ? 'selected' : '' }}>
                                      {{ $text }}
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
                              @foreach(['Fair', 'Wheatish', 'Dark', 'Prefer Not to Say'] as $complexion)
                                  <option value="{{ $complexion }}" {{ old('complexion', $userDetail->complexion ?? '') == $complexion ? 'selected' : '' }}>
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
                              @foreach(['Sharp', 'Average', 'Unique', 'Prefer Not to Say'] as $features)
                                  <option value="{{ $features }}" {{ old('features', $userDetail->features ?? '') == $features ? 'selected' : '' }}>
                                      {{ $features }}
                                  </option>
                              @endforeach
                          </select>
                      </span>
                    </div>

                    <!-- Immigration Status -->
                    <div class="info-row">
                      <span>Immigration Status</span>
                      <span><b>:</b>
                          <select name="immigration" class="profile-input">
                              @foreach(['Citizen', 'Permanent Resident', 'Work Permit', 'Student Visa', 'Other'] as $immigration)
                                  <option value="{{ $immigration }}" {{ old('immigration_status', $userDetail->immigration_status ?? '') == $immigration ? 'selected' : '' }}>
                                      {{ $immigration }}
                                  </option>
                              @endforeach
                          </select>
                      </span>
                    </div>
                </div>
            </div>
            <!-- Submit and Cancel -->
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Update</button>
                <span class="edit-icon col-md-2 col-4" onclick="toggleDivAndForm('basics-info', 'edit-info', false)">
                    <i class="bi bi-x"></i> Cancel
                </span>
            </div>
          </form>
          {{-- Basics information section code end --}}

          {{-- Life Sytle section code start --}}
            {{-- Default Display --}}
          <div id="life-style" class="row mt-3 justify-content-between">
            <h5 class="col-md-4 col-8 ">
              Life Style
            </h5>
            <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('life-style', 'edit-style', true)">
              <i class="bi bi-pencil"></i> Edit
            </span>
            <div class="row">
              <div class="col-md-3 col-6">Living Situation</div>
              <div class="col-md-3 col-6"><b>:</b>
                {{ $userDetail->living_situation ?? 'Living with Family' }}
              </div>
              <div class="col-md-3 col-6">House Ownership</div>
              <div class="col-md-3 col-6"><b>:</b>
                {{ $userDetail->houseOwnership ?? 'Rent' }}
              </div>
              <div class="col-md-3 col-6">Diet</div>
              <div class="col-md-3 col-6"><b>:</b>
                {{ $userDetail->diet ?? 'Non-Vegetarian' }}
              </div>
              <div class="col-md-3 col-6">Drink</div>
              <div class="col-md-3 col-6"><b>:</b>
                {{ $userDetail->drink ?? 'Yes' }}
              </div>
              <div class="col-md-3 col-6">Smoke</div>
              <div class="col-md-3 col-6"><b>:</b>
                {{ $userDetail->smoke ?? 'Yes' }}
              </div>
            </div>
          </div>

          {{-- Life Style Edit Form --}}
          <form action="{{ route('update-life-style', $userDetail->user_id) }}" method="post" id="edit-style">
            @csrf
            <h5 class="col-md-4 col-5 h5">Edit Life Style</h5>
            <span class="edit-icon col-md-2 col-4" onclick="toggleDivAndForm('life-style', 'edit-style', false)">
                <i class="bi bi-x"></i> Cancel
            </span>

            {{-- Living Situation --}}
            <div class="info-row">
                <span>Living Situation</span>
                <span><b>:</b>
                    <select name="living_situation" class="profile-input">
                        <option value="Prefer not to Say" {{ (old('living_situation', $userDetail->living_situation) == 'Prefer not to Say') ? 'selected' : '' }}>Prefer not to Say</option>
                        <option value="Living with Family" {{ (old('living_situation', $userDetail->living_situation) == 'Living with Family') ? 'selected' : '' }}>Living with Family</option>
                        <option value="Living with Friends" {{ (old('living_situation', $userDetail->living_situation) == 'Living with Friends') ? 'selected' : '' }}>Living with Friends</option>
                        <option value="Living Alone" {{ (old('living_situation', $userDetail->living_situation) == 'Living Alone') ? 'selected' : '' }}>Living Alone</option>
                        <option value="Other" {{ (old('living_situation', $userDetail->living_situation) == 'Other') ? 'selected' : '' }}>Other</option>
                    </select>
                </span>
                @error('living_situation')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- House Ownership --}}
            <div class="info-row">
                <span>House Ownership</span>
                <span><b>:</b>
                    <select name="house_ownership" class="profile-input">
                        <option value="Prefer not to Say" {{ (old('house_ownership', $userDetail->house_ownership) == 'Prefer not to Say') ? 'selected' : '' }}>Prefer not to Say</option>
                        <option value="Own" {{ (old('house_ownership', $userDetail->house_ownership) == 'Own') ? 'selected' : '' }}>Own</option>
                        <option value="Rent" {{ (old('house_ownership', $userDetail->house_ownership) == 'Rent') ? 'selected' : '' }}>Rent</option>
                        <option value="Other" {{ (old('house_ownership', $userDetail->house_ownership) == 'Other') ? 'selected' : '' }}>Other</option>
                    </select>
                </span>
                @error('house_ownership')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Diet --}}
            <div class="info-row">
                <span>Diet</span>
                <span><b>:</b>
                    <select name="diet" class="profile-input">
                        <option value="Prefer not to Say" {{ (old('diet', $userDetail->diet) == 'Prefer not to Say') ? 'selected' : '' }}>Prefer not to Say</option>
                        <option value="Vegetarian" {{ (old('diet', $userDetail->diet) == 'Vegetarian') ? 'selected' : '' }}>Vegetarian</option>
                        <option value="Non-Vegetarian" {{ (old('diet', $userDetail->diet) == 'Non-Vegetarian') ? 'selected' : '' }}>Non-Vegetarian</option>
                        <option value="Other" {{ (old('diet', $userDetail->diet) == 'Other') ? 'selected' : '' }}>Other</option>
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
                        <option value="Prefer not to Say" {{ (old('drink', $userDetail->drink) == 'Prefer not to Say') ? 'selected' : '' }}>Prefer not to Say</option>
                        <option value="Yes" {{ (old('drink', $userDetail->drink) == 'Yes') ? 'selected' : '' }}>Yes</option>
                        <option value="No" {{ (old('drink', $userDetail->drink) == 'No') ? 'selected' : '' }}>No</option>
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
                        <option value="Prefer not to Say" {{ (old('smoke', $userDetail->smoke) == 'Prefer not to Say') ? 'selected' : '' }}>Prefer not to Say</option>
                        <option value="Yes" {{ (old('smoke', $userDetail->smoke) == 'Yes') ? 'selected' : '' }}>Yes</option>
                        <option value="No" {{ (old('smoke', $userDetail->smoke) == 'No') ? 'selected' : '' }}>No</option>
                    </select>
                </span>
                @error('smoking')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="mt-2">
                <button type="submit" class="btn btn-update">Update</button>
                <span class="edit-icon col-md-2 col-4" onclick="toggleDivAndForm('life-style', 'edit-style', false)">
                    <i class="bi bi-x"></i> Cancel
                </span>
            </div>
          </form>
          {{-- Life Sytle section code end --}}

          {{-- Religious Background section code start --}}
            {{-- Default display --}}
          <div id="religious-bg" class="row mt-5 justify-content-between">
            <h5 class="col-md-4 col-8 ">
              Religious Background
            </h5>
            <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('religious-bg', 'edit-relgious', true)">
              <i class="bi bi-pencil"></i> Edit
            </span>
            <div class="row mt-2">
              <div class="col-md-3 col-6">
                Religion
              </div>
              <div class="col-md-3 col-6">
                <b>:</b> {{ $userDetail->religion ?? 'Not Available' }}
              </div>
              <div class="col-md-3 col-6">
                Gothra / Gothrom
              </div>
              <div class="col-md-3 col-6">
                <b>:</b> {{ $userDetail->gothra ?? 'Not Available' }}
              </div>
              <div class="col-md-3 col-6">
                Caste
              </div>
              <div class="col-md-3 col-6">
                <b>:</b> {{ $userDetail->caste ?? 'Not Available' }}
              </div>
              <div class="col-md-3 col-6">
                Mother Tongue
              </div>
              <div class="col-md-3 col-6">
                <b>:</b> {{ $userDetail->mother_tongue ?? 'Not Available' }}
              </div>
              <div class="col-md-3 col-6">
                Sub-caste
              </div>
              <div class="col-md-3 col-6">
                <b>:</b> {{ $userDetail->sub_caste ?? 'Not Available' }}
              </div>
            </div>
          </div>
          {{-- Religious Background edit form --}}
          <form action="{{ route('update-religious-bg', $userDetail->user_id) }} " method="post" id="edit-relgious">
            @csrf
            <h5 class="col-md-4 mt-5 col-6">
              Edit Religion Background
            </h5>
            <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('religious-bg', 'edit-relgious', false)">
              <i class="bi bi-x"></i> Cancel
            </span>
            @csrf
            {{-- Religion --}}
            <div class="info-row">
              <span>Religion</span>
              <span><b>:</b>
                <select name="religion" class="profile-input" id="">
                  <option disabled>Select Religion</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Muslim">Muslim</option>
                  <option value="Christian">Christian</option>
                  <option value="Sikh">Sikh</option>
                  <option value="Buddhist">Buddhist</option>
                  <option value="Jain">Jain</option>
                  <option value="Other">Other</option>
                </select>
              </span>
            </div>
            {{-- Caste --}}
            <div class="info-row">
              <span>Caste</span>
              <span><b>:</b>
                <input type="text" name="caste" class="profile-input" id="" value="{{ $userDetail->caste ?? 'Caste Name' }}">
              </span>
            </div>
            {{-- Sub Community --}}
            <div class="info-row">
              <span>Sub Coste</span>
              <span><b>:</b>
                <input type="text" name="sub_caste" class="profile-input" id="" value="{{ $userDetail->subCommunity ?? 'Sub Community' }}">
              </span>
            </div>
            {{-- Mother Tongue --}}
            <div class="info-row">
              <span>Mother Tongue</span>
              <span><b>:</b>
                <select name="mother_tongus" class="profile-input" id="" value="{{ $userDetail->mother_tongus ?? 'Mother Tongue' }}">
                  <option value="Prefer not to Say">Prefer not to Say</option>
                  <option value="Hindi">Hindi</option>
                  <option value="English">English</option>
                  <option value="Bengali">Bengali</option>
                  <option value="Gujarati">Gujarati</option>
                  <option value="Punjabi">Punjabi</option>
                  <option value="Marathi">Marathi</option>
                  <option value="Tamil">Tamil</option>
                  <option value="Telugu">Telugu</option>
                  <option value="Kannada">Kannada</option>
                  <option value="Malayalam">Malayalam</option>
                  <option value="Odia">Odia</option>
                  <option value="Urdu">Urdu</option>
                  <option value="Other">Other</option>
                </select>
              </span>
            </div>
            {{-- Gothra / Gothram --}}
            <div class="info-row">
              <span>Gothra / Gothram</span>
              <span><b>:</b>
                <input type="text" name="gorthra" id="" class="profile-input" value="{{ $userDetail->gorthra ?? 'Gothra / Gothram' }}" \>
              </span>
            </div>
            {{-- form submit button --}}
            <div class="mt-2">
              <button type="submit" class="btn btn-update">Update</button>
              <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('relgious-bg', 'edit-relgious', false)">
                <i class="bi bi-x"></i> Cancel
              </span>
            </div>
          </form>
          {{-- Religious Backgroud section code end --}}

          {{-- Family Details section code start --}}
            {{-- Default display --}}
          <div id="family-info" class="row mt-5 justify-content-between">
            <h5 class="col-md-4 col-8 ">
              Family Details
            </h5>
            <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('family-info', 'edit-family-info', true)">
              <i class="bi bi-pencil"></i> Edit
            </span>
            <div class="row mt-2">
              <div class="col-md-3 col-6">
                Father's Status :
              </div>
              <div class="col-md-3 col-6">
                <b>:</b> {{ $user->father_status ?? 'Not Specified' }}
              </div>
              <div class="col-md-3 col-6">
                Mother's Status
              </div>
              <div class="col-md-3 col-6">
                <b>:</b> {{ $user->mother_status ?? 'Not Specified' }}
              </div>
              <div class="col-md-3 col-6">
                Family Values
              </div>
              <div class="col-md-3 col-6">
                <b>:</b> {{ $user->family_values ?? 'Not Specified' }}
              </div>
              <div class="col-md-3 col-6">
                Family Type
              </div>
              <div class="col-md-3 col-6">
                <b>:</b> {{ $user->family_type ?? 'Not Specified' }}
              </div>
              <div class="col-md-3 col-6">
                No. of Brothers
              </div>
              <div class="col-md-3 col-6">
                <b>:</b> {{ $user->brothersNo ?? 'Not Specified' }}
              </div>
              <div class="col-md-3 col-6">
                No. of Sisters
              </div>
              <div class="col-md-3 col-6">
                <b>:</b> {{ $user->sistersNo ?? 'Not Specified' }}
              </div>
              <div class="col-md-3 col-6">
                Family Status
              </div>
              <div class="col-md-3 col-6">
                <b>:</b> {{ $user->family_status ?? 'Not Specified' }}
              </div>
              <div class="col-md-3 col-6">
                Native Place
              </div>
              <div class="col-md-3 col-6">
                <b>:</b> {{ $user->native_place ?? 'Not Specified' }}
              </div>
            </div>
          </div>
          {{-- Religious Background edit form --}}
          <form action="" method="post" id="edit-family-info">
            <h5 class="col-md-4 mt-5 col-6">
              Edit Family Details
            </h5>
            <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('family-info', 'edit-family-info', false)">
              <i class="bi bi-x"></i> Cancel
            </span>
            @csrf
            {{-- Father's Status --}}
            <div class="info-row">
              <span>Father's Status</span>
              <span><b>:</b>
                <select name="father_status" class="profile-input" id="">
                  <option value>- Select One -</option>
                  <option value="Social Service">Social Service</option>
                  <option value="Business Man"> Business Man</option>
                  <option value="Working Private">Working Private</option>
                  <option value="Working Government">Working Government</option>
                  <option value="Retired">Retired</option>
                  <option value="Self Employed">Self Employed</option>
                  <option value="Expired">Expired</option>
                  <option value="Other">Other</option>
                </select>
              </span>
            </div>
            {{-- Mother's Status --}}
            <div class="info-row">
              <span>Mother's Status</span>
              <span><b>:</b>
                <select name="mother_status" id="" class="profile-input">
                  <option value>- Select One -</option>
                  <option value="House Wife">House Wife</option>
                  <option value="Social Service">Social Service</option>
                  <option value="Business Man"> Business Man</option>
                  <option value="Working Private">Working Private</option>
                  <option value="Working Government">Working Government</option>
                  <option value="Retired">Retired</option>
                  <option value="Self Employed">Self Employed</option>
                  <option value="Expired">Expired</option>
                  <option value="Other">Other</option>
                </select>
              </span>
            </div>
            {{-- Family Values --}}
            <div class="info-row">
              <span>Family Values</span>
              <span><b>:</b>
                  <select name="family_values" id="" class="profile-input" valu="{{ $user->family_values ?? '' }}" >
                    <option value>- Select One -</option>
                    <option value="Conservativ">Conservativ</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Modern">Modern</option>
                    <option value="Other">Other</option>
                  </select>
              </span>
            </div>
            {{-- Family Type --}}
            <div class="info-row">
              <span>Family Type</span>
              <span><b>:</b>
                <select name="family_type" class="profile-input" id="" value="{{ $user->family_type ?? '' }}">
                  <option value>-Select One-</option>
                  <option value="Joint Family">Joint Family</option>
                  <option value="Nuclear Family">Nuclear Family</option>
                  <option value="Single Parent">Single Parent</option>
                  <option value="Other">Other</option>
                </select>
              </span>
            </div>
            {{-- Family Status --}}
            <div class="info-row">
              <span>Family Status</span>
              <span><b>:</b>
                <select name="family_status" id="" class="profile-input" value="{{ $user->family_status ?? '' }}">
                  <option value>- Select One -</option>
                  <option value="Lower Middle Class">Lower Middle Class</option>
                  <option value="Middle Class">Middle Class</option>
                  <option value="Upper Middle Class">Upper Middle Class</option>
                  <option value="Upper Class">Upper Class</option>
                </select>
              </span>
            </div>
            {{-- No of Brother --}}
            <div class="info-row">
              <span>No. of Brother</span>
              <span><b>:</b>
                <input type="number" name="no_of_brother" id="" class="profile-input" value="{{ $user->no_of_brother ?? '' }}">
              </span>
            </div>
            {{-- No of Sister --}}
            <div class="info-row">
              <span>No. of Sister</span>
              <span><b>:</b>
                <input type="number" name="no_of_sister" id="" class="profile-input
                " value="{{ $user->no_of_sister ?? '' }}">
              </span>
            </div>
            {{-- Native Place --}}
            <div class="info-row">
              <span>Native Place</span>
              <span><b>:</b>
                <input type="text" name="native_place" id="" class="profile-input" valu
                e="{{ $user->native_place ?? '' }}">
              </span>
            </div>
                  
            {{-- form submit button --}}
            <div class="mt-2">
              <button type="submit" class="btn btn-update">Update</button>
              <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('family-info', 'edit-family-info', false)">
                <i class="bi bi-x"></i> Cancel
              </span>
            </div>
          </form>
          {{-- Family Details section code end --}}

          {{-- Education & Career section code start --}}
            {{-- Default Display --}}
            <div id="education-info" class="row mt-5 justify-content-between">
            <h5 class="col-md-4 col-8 ">
              Education & Career
            </h5>
            <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('education-info', 'edit-education-info', true)">
              <i class="bi bi-pencil"></i> Edit
            </span>
            <div class="row mt-2">
              <div class="col-md-3 col-6">Education</div>
              <div class="col-md-3 col-6"><b>:</b>
                {{ $user->education ?? 'Not Specified' }}
              </div>
              <div class="col-md-3 col-6">Working As</div>
              <div class="col-md-3 col-6"><b>:</b>
                {{ $user->working_as ?? 'Not Specified' }}
              </div>
              <div class="col-md-3 col-6">Working with</div>
              <div class="col-md-3 col-6"><b>:</b>
                {{ $user->working_with ?? 'Not Specified' }}
              </div>
              <div class="col-md-3 col-6">Annual Income</div>
              <div class="col-md-3 col-6"><b>:</b>
                {{ $user->income ?? 'Not Specified' }}
              </div>
            </div>
          </div>

            {{-- Education & Career edit form --}}
          <form action="" method="post" id="edit-education-info">
            <h5 class="col-md-4  col-5 mt-5">
              Edit Education & Career
            </h5>
            <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('education-info', 'edit-education-info', false)">
              <i class="bi bi-x"></i> Cancel
            </span>
            @csrf
            {{-- Higher Education --}}
            <div class="info-row">
              <span> Education </span>
              <span><b>:</b>
                <input type="text" name="education" class="profile-input" id="" placeholder="Example: BA, B.Com, MBA etc." value="{{ $user->education ?? '' }}" >
              </span>
            </div>
            {{-- Working As --}}
            <div class="info-row">
              <span> Working As </span>
              <span><b>:</b>
                <input type="text" name="working_as" class="profile-input" id="" value="{{ $user->working_as ?? '' }}" >
              </span>
            </div>
            {{-- Working with --}}
            <div class="info-row">
              <span> Working with </span>
              <span><b>:</b>
                <input type="text" name="working_with" class="profile-input" id="" valu
                e="{{ $user->working_with ?? '' }}" >
              </span>
            </div>
            {{-- Annual Income --}}
            <div class="info-row">
              <span> Annual Income </span>
              <span><b>:</b>
                <input type="text" name="income" class="profile-input" id="" placeholder="Example : 250K " value="{{ $user->income ?? '' }}" >
              </span>
            </div>
            {{-- form submit button --}}
            <div class="mt-2">
              <button type="submit" class="btn btn-update">Update</button>
              <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('education-info', 'edit-education-info', false)">
                <i class="bi bi-x"></i> Cancel
              </span>
            </div>
          </form>
          {{-- Education & Career Section code end --}}

          {{-- Location of Groom section code start --}}
            {{-- Default Display --}}
          <div id="location" class="row mt-5 justify-content-between">
            <h5 class="col-md-4 col-8 ">
              Location of Groom
            </h5>
            <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('location', 'edit-location', true)">
              <i class="bi bi-pencil"></i> Edit
            </span>
            <div class="row mt-2">
              <div class="col-md-3 col-6">Country</div>
              <div class="col-md-3 col-6"><b>:</b>
                {{ $user->education ?? 'Not Specified' }}
              </div>
              <div class="col-md-3 col-6">State</div>
              <div class="col-md-3 col-6"><b>:</b>
                {{ $user->working_as ?? 'Not Specified' }}
              </div>
              <div class="col-md-3 col-6">City</div>
              <div class="col-md-3 col-6"><b>:</b>
                {{ $user->working_with ?? 'Not Specified' }}
              </div>
              <div class="col-md-3 col-6">Postal Code</div>
              <div class="col-md-3 col-6"><b>:</b>
                {{ $user->income ?? 'Not Specified' }}
              </div>
            </div>
          </div>

          {{-- Education & Career edit form --}}
          <form action="" method="post" id="edit-location">
            <h5 class="col-md-4  col-5 mt-5">
              Edit Location
            </h5>
            <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('location', 'edit_location', false)">
              <i class="bi bi-x"></i> Cancel
            </span>
            @csrf
            {{-- Higher Education --}}
            <div class="info-row">
              <span> Country </span>
              <span><b>:</b>
                <input type="text" name="education" class="profile-input" id="" placeholder="Example: BA, B.Com, MBA etc." value="{{ $user->education ?? '' }}" >
              </span>
            </div>
            {{-- Working As --}}
            <div class="info-row">
              <span> State </span>
              <span><b>:</b>
                <input type="text" name="working_as" class="profile-input" id="" value="{{ $user->working_as ?? '' }}" >
              </span>
            </div>
            {{-- Working with --}}
            <div class="info-row">
              <span> City </span>
              <span><b>:</b>
                <input type="text" name="working_with" class="profile-input" id="" valu
                e="{{ $user->working_with ?? '' }}" >
              </span>
            </div>
            {{-- Annual Income --}}
            <div class="info-row">
              <span> Postal Code </span>
              <span><b>:</b>
                <input type="text" name="income" class="profile-input" id=" " value="{{ $user->income ?? '' }}" >
              </span>
            </div>
            {{-- form submit button --}}
            <div class="mt-2">
              <button type="submit" class="btn btn-update">Update</button>
              <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('location', 'edit-location', false)">
                <i class="bi bi-x"></i> Cancel
              </span>
            </div>
          </form>
          {{-- Location of Groom Section code end --}}
        </div>
  </div>

  {{-- Profile Page Java Script code --}}
  <script>
     // Initialize character counter
     function updateCharCount() {
          const textarea = document.getElementById('about-input');
          const charCounter = document.getElementById('char-counter');
          charCounter.textContent = textarea.value.length;
      }

      // Update the counter on page load (for pre-filled text)
      document.addEventListener('DOMContentLoaded', function () {
          updateCharCount();
      });
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
  </script>
@endsection
{{-- Profile page CSS code  --}}
<style>
    /* All profile page Css */
    .profile-row {
            max-width: 800px;
            margin: 20px auto;
            background: linear-gradient(to right, #d61c16, #d17fdb);
            padding: 20px;
            border-radius: 8px;
            color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .profile-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap; /* Adjust for smaller screens */
        }

        .profile-details {
            display: flex;
            align-items: center;
            flex-wrap: wrap; /* Allow wrapping on smaller screens */
        }

        .profile-image {
            width: 100px;
            height: 100px;
            background-color: #ccc;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .profile-info {
            margin-left: 20px;
        }

        .profile-info h2 {
            margin: 0;
            font-size: 1.5rem; /* Responsive font size */
        }

        .profile-info p {
            margin: 5px 0;
            font-size: 1rem; /* Responsive font size */
        }

        .profile-progress {
            text-align: center;
            margin-top: 20px;
        }

        .progress-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 6px solid #fff;
            border-right-color: #f00;
            border-bottom-color:#f00;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 10px auto;
        }

        .progress-circle span {
            color: #fff;
            font-weight: bold;
            font-size: 1rem; /* Responsive font size */
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
    #edit-about, #edit-info, #edit-style, #edit-relgious, #edit-family-info , #edit-education-info, #edit-location{
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

     /* Styling for the character counter */
     .char-counter-container {
        text-align: right;
        font-size: 0.9em;
        color: gray;
        margin-top: 5px;
    }

    textarea {
        width: 100%;
        height: 100px;
        resize: none;
    }
</style>