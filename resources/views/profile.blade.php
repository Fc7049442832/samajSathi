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
                      {{ $user->livingSitustion ?? 'Living with Family' }}
                    </div>
                    <div class="col-md-3 col-6">House Ownership</div>
                    <div class="col-md-3 col-6"><b>:</b>
                      {{ $user->houseOwnership ?? 'Rent' }}
                    </div>
                    <div class="col-md-3 col-6">Diet</div>
                    <div class="col-md-3 col-6"><b>:</b>
                      {{ $user->diet ?? 'Non-Vegetarian' }}
                    </div>
                    <div class="col-md-3 col-6">Drink</div>
                    <div class="col-md-3 col-6"><b>:</b>
                      {{ $user->drink ?? 'Yes' }}
                    </div>
                    <div class="col-md-3 col-6">Smoke</div>
                    <div class="col-md-3 col-6"><b>:</b>
                      {{ $user->smoke ?? 'Yes' }}
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
                      <select name="living_situation" class="profile-input" id="" valu="{{ $user->living_situation ?? 'Prefer not to Say' }}" >
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
                      <b>:</b> {{ $user->religion ?? 'Not Available' }}
                    </div>
                    <div class="col-md-3 col-6">
                      Gothra / Gothrom
                    </div>
                    <div class="col-md-3 col-6">
                      <b>:</b> {{ $user->religion ?? 'Not Available' }}
                    </div>
                    <div class="col-md-3 col-6">
                      Caste
                    </div>
                    <div class="col-md-3 col-6">
                      <b>:</b> {{ $user->caste ?? 'Not Available' }}
                    </div>
                    <div class="col-md-3 col-6">
                      Mother Tongue
                    </div>
                    <div class="col-md-3 col-6">
                      <b>:</b> {{ $user->motherTongue ?? 'Not Available' }}
                    </div>
                    <div class="col-md-3 col-6">
                      Sub-caste
                    </div>
                    <div class="col-md-3 col-6">
                      <b>:</b> {{ $user->subCaste ?? 'Not Available' }}
                    </div>
                  </div>
                </div>
                {{-- Religious Background edit form --}}
                <form action="" method="post" id="edit-relgious">
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
                      <input type="text" name="caste" class="profile-input" id="" value="{{ $user->caste ?? 'Caste Name' }}">
                    </span>
                  </div>
                  {{-- Sub Community --}}
                  <div class="info-row">
                    <span>Sub Community</span>
                    <span><b>:</b>
                      <input type="text" name="subCommunity" class="profile-input" id="" value="{{ $user->subCommunity ?? 'Sub Community' }}">
                    </span>
                  </div>
                  {{-- Mother Tongue --}}
                  <div class="info-row">
                    <span>Mother Tongue</span>
                    <span><b>:</b>
                      <select name="motherTongue" class="profile-input" id="" value="{{ $user->motherTongue ?? 'Mother Tongue' }}">
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
                      <input type="text" name="gorthra" id="" class="profile-input" value="{{ $user->gorthra ?? 'Gothra / Gothram' }}" \>
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
                 <div id="education-info" class="row mt-5 justify-content-between">
                  <h5 class="col-md-4 col-8 ">
                    Location of Groom
                  </h5>
                  <span class="edit-icon  col-md-2 col-4" onclick="toggleDivAndForm('education-info', 'edit-education-info', true)">
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
                {{-- Location of Groom Section code end --}}
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
    #edit-about, #edit-info, #edit-style, #edit-relgious, #edit-family-info , #edit-education-info{
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
