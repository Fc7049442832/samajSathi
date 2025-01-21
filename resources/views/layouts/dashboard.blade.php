<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SamajSathi Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    {{-- icon cdn Link --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            position: fixed;
            height: 100vh;
            background-color: #343a40;
            color: #ffffff;
        }
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
        }
        .sidebar a:hover {
            background-color: #495057;
            color: #ffffff;
        }

        .header {
            position: fixed;
            left: 160px;
            width: 88vw;
            background-color: #e9e9e9;
            border-bottom: 1px solid #dee2e6;
            z-index: 1;
        }
        .header .navbar-brand {
            font-weight: bold;
        }
        .content {
            padding: 20px;
            position: absolute;
            top: 50px;
            left: 160px;
        }

        .admin-sm{
            font-size: 14px;
            font-weight: 400;
            color: #f5f7fa;
            padding: 3px 9px;
            margin: 4px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h4 class="text-center">SamajSathi</h4>
            <hr class="text-light">
            <a href="#">Dashboard</a>
            <a href="#">Users</a>
            <a href="#">Reports</a>
            <a href="{{route('admin.setting')}}">Settings</a>
            <a href="#">Logout</a>
        </div>

        <!-- Main Content -->

        <div class="flex-grow-1">
            <!-- Header -->
            <nav class="header navbar navbar-light px-4">
                <a class="navbar-brand" href="#">Welcome to Dashboard</a>
                <div class="d-flex align-items-center">
                    <span class="me-3">Admin</span>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <li><a class="dropdown-item" href="#">Profile</a></li>
                          <li><a class="dropdown-item" href="#">Setting</a></li>
                          <li><a class="dropdown-item" href="#">
                            <span class="btn btn-danger sm">Logout</span></a>   
                          </li>
                        </ul>
                      </div>
                </div>
            </nav>

            <!-- Content Area -->
            
            <div class="content">
                @yield('content')
                {{-- <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Users</h5>
                                <p class="card-text">1,234</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Active Users</h5>
                                <p class="card-text">567</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Pending Requests</h5>
                                <p class="card-text">45</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Reported Issues</h5>
                                <p class="card-text">12</p>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="card">
                    <div class="card-header">Overview</div>
                    <div class="card-body">
                       
                        <p class="card-text">Welcome to the SamajSathi Dashboard. Use the navigation menu to access different sections.</p>

                        @for($i=0; $i<10; $i++)
                         <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis doloremque esse cum asperiores incidunt placeat iure quae facilis rem reiciendis et natus inventore aut ex eius totam, tempora officiis eum.</p>
                        @endfor
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
