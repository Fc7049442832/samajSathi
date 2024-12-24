<div class="header-container">
    <div class="logo">
        <a href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>
    </div>
    <!-- Link trigger modal -->
    <a href="#" class="btn btn-primary register-button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Registration Free
    </a>
    {{-- <a href="#register" class="">REGISTER FREE</a> --}}

    <div class="menu-toggle" onclick="toggleMenu()">
        <i class="fas fa-bars"> </i>
    </div>
    <nav class="nav-links" id="nav-links">
        <a href="#browse-profiles">Browse Profiles</a>
        <a href="#login">Member Login <i class="fas fa-user"></i></a>
        <a href="#help">Help <i class="fas fa-caret-down"></i></a>
    </nav>
    
</div>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Register</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{-- Form Start --}}
          <form action="{{route('Basic_Contact')}}" method="post">
            @csrf
            <input type="text" name="name" id="" placeholder="Full Name">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="text" name="age" id="" placeholder="Age (only two digit number)">

            <select name="gender" id="" class="ml-3" style=" ">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <input type="email" name="email" id="" placeholder="Email id">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="text" name="phone" id="" placeholder="Phone No." >
            @error('phone')
            <span class="text-danger">{{ $message }} </span>
            @enderror

            <input type="password" name="password" id="" placeholder="Password (Minmum 5 digit)">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
          </form>
          {{-- Form End --}}
      </div>
    </div>
  </div>

<style>
    .header-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 20px;
        background-color: #f8f9fa;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .logo img {
        height: 120px;
    }

    .menu-toggle {
        display: none;
        font-size: 24px;
        cursor: pointer;
    }

    .nav-links {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .nav-links a {
        text-decoration: none;
        font-size: 16px;
        color: #333;
        font-weight: 500;
        padding: 5px 10px;
    }

    .nav-links a:hover {
        color: #e74c3c;
        text-decoration: none;
    }
    .register-button {
        background-color: #e74c3c;
        color: white;
        border-radius: 5px;
        padding: 8px 15px;
        font-size: 14px;
        font-weight: bold;
        width: 140px;
        text-align: center;
        margin-right: -20px;
    }

    .register-button:hover {
        background-color: #c0392b;
    }

    .nav-links i {
        margin-left: 3px;
    }

    .modal-dialog {
        margin-top: 170px ;
        max-width: 600px;
    }

    /* Make modal background 60% transparent */
    .modal-content {
        background-color: rgba(48, 70, 99, 0.6); /* White background with 60% transparency */
        border: none; /* Optional: Removes border if needed */
        box-shadow: none; /* Optional: Removes shadow if needed */
    }
    .modal-title{
        color: #ddd;
        font-weight: 700;
        font-size: 22px;
    }
    input, select{
        width: 90%;
        background: transparent;
        padding: 5px;
        margin:10px;
        color: #f8f9fa;
        border: none;
        border-bottom: 3px solid black;
        font-size: 18px;
    }
    option{
        background: #000;
    }
  

    /* For mobile screens */
    @media screen and (max-width: 768px) {
        .menu-toggle {
            display: block;
        }
        .logo img {
            height: 70px;
         }

        .nav-links {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 60px;
            right: 20px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 8px;
            width: 200px;
        }
        .nav-links a {
            padding: 10px;
            font-size: 13px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .nav-links a:last-child {
            border-bottom: none;
        }

        .register-button {
            display: block;
            width :20vw;
            padding: 4px 10px;
            text-align: center;
            font-size: 10px;
            margin-right: -60px;
        }
    }

        /* For smaller modal widths */
    @media (max-width: 500px) {
        .modal-content {
            background-color: rgba(44, 36, 80, 0.95); /* 80% transparency for even smaller widths */
        }
    }

    @media (max-width: 400px) {
        .modal-title{
            color: #ddd;
        }
        .modal-content {
            background-color: rgba(44, 36, 80, 0.95); /* 80% transparency for even smaller widths */
        }
    }
</style>
<script>
    function toggleMenu() {
        const navLinks = document.getElementById('nav-links');
        if (navLinks.style.display === 'flex') {
            navLinks.style.display = 'none';
        } else {
            navLinks.style.display = 'flex';
        }
    }
</script>