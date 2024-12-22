<div class="header-container">
    <div class="logo">
        <a href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>
    </div>

    <a href="#register" class="register-button">REGISTER FREE</a>

    <div class="menu-toggle" onclick="toggleMenu()">
        <i class="fas fa-bars"> </i>
    </div>
    <nav class="nav-links" id="nav-links">
        <a href="#browse-profiles">Browse Profiles</a>
        <a href="#login">Member Login <i class="fas fa-user"></i></a>
        <a href="#help">Help <i class="fas fa-caret-down"></i></a>
    </nav>
    
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
