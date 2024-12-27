
<div class="profile-row">
    <div class="profile-header">
        <div class="profile-details">
            <div class="profile-image">{{substr($user->name, 0, 1)}} </div>
            <div class="profile-info">
                <h2>{{ $user->name}} </h2>
                <p>{{ $user->age }} Yrs, 5' 09" (175 cm)</p>
                <p>India, Chhattisgarh, Raipur</p>
                <p><strong>+91- {{ $user->phone }} </strong></p>
            </div>
        </div>
        <div class="profile-progress">
            <div class="progress-circle">
                <span>90%</span>
            </div>
            <p>Profile Completion</p>
            <p>Last Edited on {{ \Carbon\Carbon::parse($user->created_at)->format('jS M Y') }}</p>
        </div>
    </div>
</div>

<style>
  .profile-row {
        
        margin: 0px;
        background: linear-gradient(to right, #d61c16, #d17fdb);
        padding: 10px;
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
</style>