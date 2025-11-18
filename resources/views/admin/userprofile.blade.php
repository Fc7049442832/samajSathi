@extends('layouts.dashboard')
@section('content')

<div class="row justify-content-between" style="width:88vw;">
    <div class="col-4 text-start">
        <h5>User Profile</h5>
    </div>
</div>

<div class="row mt-2" style="width:88vw;">
    <div class="container mt-4 mb-4">
    <div class="text-center mb-4">
        <img src="{{ asset($user->profile->profile_image ?? 'images/default-user.png') }}" 
             alt="Profile Image" class="profile-image mb-2">
        <h3 class="fw-bold">{{ $user->name }}</h3>
        <p class="text-muted">User ID: {{ $user->custom_id }}</p>
    </div>

    <!-- Personal Info -->
    <div class="profile-card">
        <h5 class="section-title">Personal Information</h5>
        <div class="row">
            <div class="col-md-4"><strong>Age:</strong> {{ $user->age }}</div>
            <div class="col-md-4"><strong>Gender:</strong> {{ strtoupper($user->gender) }}</div>
            <div class="col-md-4"><strong>Date of Birth:</strong> {{ $user->profile->dob ?? 'N/A' }}</div>
            <div class="col-md-4"><strong>Marital Status:</strong> {{ $user->profile->marital_status ?? 'N/A' }}</div>
            <div class="col-md-4"><strong>Citizenship:</strong> {{ $user->profile->citizenship ?? 'N/A' }}</div>
            <div class="col-md-4"><strong>Immigration:</strong> {{ $user->profile->immigration ?? 'N/A' }}</div>
            <div class="col-md-4"><strong>Blood Group:</strong> {{ $user->profile->blood_group ?? 'N/A' }}</div>
            <div class="col-md-4"><strong>Special Case:</strong> {{ $user->profile->special_case ?? 'None' }}</div>
        </div>
    </div>
    
    <!-- Contact & Account -->
    <div class="profile-card">
        <h5 class="section-title">Account Details</h5>
        <div class="row">
            <div class="col-md-4"><strong>Email:</strong> {{ $user->email }}</div>
            <div class="col-md-4"><strong>Phone:</strong> {{ $user->phone }}</div>
            <div class="col-md-4">
                <strong>Verified:</strong>
                <form action="{{ route('user.toggleVerified', $user->custom_id) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" 
                            class="badge {{ $user->is_verified ? 'bg-success' : 'bg-danger' }} border-0"
                            style="cursor: pointer;">
                        {{ $user->is_verified ? 'Yes' : 'No' }}
                    </button>
                </form>
            </div>

            <div class="col-md-4"><strong>Role:</strong> {{ ucfirst($user->role) }}</div>
            <div class="col-md-4"><strong>Joined:</strong> {{ $user->created_at->format('d M Y') }}</div>
            <div class="col-md-4"><strong>Last Updated:</strong> {{ $user->updated_at->format('d M Y, h:i A') }}</div>
        </div>
    </div>

    <!-- Physical Info -->
    <div class="profile-card">

        <div class="d-flex justify-content-between align-items-center">
            <h5 class="section-title mb-0">Physical Attributes</h5>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editPhysicalModal">
                ✏️ Edit
            </button>
        </div>

        <div class="row mt-3">
            <div class="col-md-4"><strong>Body Type:</strong> {{ $user->profile->body_type ?? 'N/A' }}</div>
            <div class="col-md-4"><strong>Height:</strong> {{ $user->profile->height ?? 'N/A' }}</div>
            <div class="col-md-4"><strong>Weight:</strong> {{ $user->profile->weight ?? 'N/A' }}</div>
            <div class="col-md-4"><strong>Complexion:</strong> {{ $user->profile->complexion ?? 'N/A' }}</div>
            <div class="col-md-4"><strong>Features:</strong> {{ $user->profile->features ?? 'N/A' }}</div>
        </div>

    </div>

    <!-- Family Info Section -->
    <div class="profile-card">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="section-title mb-0">Family Information</h5>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editFamilyModal">
                ✏️ Edit
            </button>
        </div>

        <div class="row mt-3">
            <div class="col-md-4"><strong>Father’s Status:</strong> {{ $user->profile->father_status ?? 'N/A' }}</div>
            <div class="col-md-4"><strong>Mother’s Status:</strong> {{ $user->profile->mother_status ?? 'N/A' }}</div>
            <div class="col-md-4"><strong>Total Brothers:</strong> {{ $user->profile->total_brother ?? 0 }}</div>
            <div class="col-md-4"><strong>Total Sisters:</strong> {{ $user->profile->total_sister ?? 0 }}</div>
            <div class="col-md-4"><strong>Family Type:</strong> {{ $user->profile->family_type ?? 'N/A' }}</div>
            <div class="col-md-4"><strong>Family Values:</strong> {{ $user->profile->family_values ?? 'N/A' }}</div>
            <div class="col-md-4"><strong>Family Status:</strong> {{ $user->profile->family_status ?? 'N/A' }}</div>
        </div>
    </div>

    <!-- Education & Career -->
    <div class="profile-card">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="section-title mb-0">Education & Career</h5>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editEducationModal">
                ✏️ Edit
            </button>
        </div>

        <div class="row mt-3">
            <div class="col-md-4"><strong>Education:</strong> {{ $user->profile->education ?? 'N/A' }}</div>
            <div class="col-md-4"><strong>Working As:</strong> {{ $user->profile->working_as ?? 'N/A' }}</div>
            <div class="col-md-4"><strong>Working With:</strong> {{ $user->profile->working_with ?? 'N/A' }}</div>
            <div class="col-md-4"><strong>Income:</strong> {{ $user->profile->income ?? 'N/A' }}</div>
        </div>
    </div>
    <!-- Location -->
    <div class="profile-card">
      <h5 class="section-title d-flex justify-content-between align-items-center">
          Location
          <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editLocationModal">
              Edit
          </button>
      </h5>

      <div class="row">
          <div class="col-md-4"><strong>Country:</strong> {{ $user->profile->country ?? 'N/A' }}</div>
          <div class="col-md-4"><strong>State:</strong> {{ $user->profile->state ?? 'N/A' }}</div>
          <div class="col-md-4"><strong>City:</strong> {{ $user->profile->city ?? 'N/A' }}</div>
          <div class="col-md-4"><strong>Postal Code:</strong> {{ $user->profile->postal_code ?? 'N/A' }}</div>
          <div class="col-md-4"><strong>Native Place:</strong> {{ $user->profile->native_place ?? 'N/A' }}</div>
      </div>
    </div>
</div>

<!-- Modal For Editing Physical Attributes -->
<div class="modal fade" id="editPhysicalModal" tabindex="-1" aria-labelledby="editPhysicalModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <form action="{{ route('profile.updatePhysical', $user->custom_id) }}" method="POST">
        @csrf

        <div class="modal-header">
          <h5 class="modal-title" id="editPhysicalModalLabel">Edit Physical Attributes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

          <div class="row g-3">

            <div class="col-md-6">
              <label class="form-label">Body Type</label>
              <input type="text" name="body_type" value="{{ $user->profile->body_type }}" class="form-control">
            </div>

            <div class="col-md-6">
              <label class="form-label">Height</label>
              <input type="text" name="height" value="{{ $user->profile->height }}" class="form-control">
            </div>

            <div class="col-md-6">
              <label class="form-label">Weight</label>
              <input type="text" name="weight" value="{{ $user->profile->weight }}" class="form-control">
            </div>

            <div class="col-md-6">
              <label class="form-label">Complexion</label>
              <input type="text" name="complexion" value="{{ $user->profile->complexion }}" class="form-control">
            </div>

            <div class="col-md-6">
              <label class="form-label">Features</label>
              <input type="text" name="features" value="{{ $user->profile->features }}" class="form-control">
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save Changes</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- Modal for Editing Family Info -->
<div class="modal fade" id="editFamilyModal" tabindex="-1" aria-labelledby="editFamilyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('profile.updateFamily', $user->custom_id) }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="editFamilyModalLabel">Edit Family Information</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Father’s Status</label>
              <input type="text" name="father_status" value="{{ $user->profile->father_status }}" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Mother’s Status</label>
              <input type="text" name="mother_status" value="{{ $user->profile->mother_status }}" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Total Brothers</label>
              <input type="number" name="total_brother" value="{{ $user->profile->total_brother }}" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Total Sisters</label>
              <input type="number" name="total_sister" value="{{ $user->profile->total_sister }}" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Family Type</label>
              <input type="text" name="family_type" value="{{ $user->profile->family_type }}" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Family Values</label>
              <input type="text" name="family_values" value="{{ $user->profile->family_values }}" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Family Status</label>
              <input type="text" name="family_status" value="{{ $user->profile->family_status }}" class="form-control">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal For Editing Education & Career -->
<div class="modal fade" id="editEducationModal" tabindex="-1" aria-labelledby="editEducationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <form action="{{ route('profile.updateEducation', $user->custom_id) }}" method="POST">
        @csrf

        <div class="modal-header">
          <h5 class="modal-title" id="editEducationModalLabel">Edit Education & Career</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="row g-3">

            <div class="col-md-6">
              <label class="form-label">Education</label>
              <input type="text" name="education" value="{{ $user->profile->education }}" class="form-control">
            </div>

            <div class="col-md-6">
              <label class="form-label">Working As</label>
              <input type="text" name="working_as" value="{{ $user->profile->working_as }}" class="form-control">
            </div>

            <div class="col-md-6">
              <label class="form-label">Working With</label>
              <input type="text" name="working_with" value="{{ $user->profile->working_with }}" class="form-control">
            </div>

            <div class="col-md-6">
              <label class="form-label">Income</label>
              <input type="text" name="income" value="{{ $user->profile->income }}" class="form-control">
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save Changes</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- Edit Location Modal -->
<div class="modal fade" id="editLocationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Location Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('admin.updateLocation', $user->custom_id) }}" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" value="{{ $user->profile->country }}" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">State</label>
                            <input type="text" name="state" value="{{ $user->profile->state }}" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">City</label>
                            <input type="text" name="city" value="{{ $user->profile->city }}" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Postal Code</label>
                            <input type="text" name="postal_code" value="{{ $user->profile->postal_code }}" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Native Place</label>
                            <input type="text" name="native_place" value="{{ $user->profile->native_place }}" class="form-control">
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-success">Save Changes</button>
                </div>

            </form>

        </div>
    </div>
</div>

<style>
    body { background: #f8f9fa; }
    .profile-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        padding: 25px;
        margin-bottom: 20px;
    }
    .profile-image {
        width: 160px;
        height: 160px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #0d6efd;
    }
    .section-title {
        border-bottom: 2px solid #0d6efd;
        margin-bottom: 15px;
        padding-bottom: 5px;
        font-weight: bold;
        color: #0d6efd;
    }
    strong { color: #333; }
</style>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection