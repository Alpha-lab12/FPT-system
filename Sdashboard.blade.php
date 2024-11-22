<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPT/FPT Application Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Base Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #2c3e50;
            padding: 20px 20px;  /* Increased padding for a taller navbar */
            color: #ecf0f1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar h1 {
            margin: 0;
            font-size: 2rem;  /* Increased font size */
            color: #f39c12;
            display: flex;
            align-items: center;
        }
        .navbar .logo {
            margin-right: 15px;
            width: 50px;
            height: 50px;
            background-color: #f39c12;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .navbar .menu {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .navbar .menu a {
            text-decoration: none;
            color: #ecf0f1;
            font-size: 1rem;
            display: flex;
            align-items: center;
        }
        .navbar .menu a:hover {
            color: #f39c12;
        }

        /* Horizontal Lines */
        .horizontal-lines {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            margin-bottom: 20px;
        }
        .horizontal-lines div {
            border-bottom: 1px solid #ddd;
            margin: 5px 0;
        }

        /* Vertical Sidebar */
        .sidebar {
            background-color: #34495e;
            width: 250px;
            padding: 20px;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 100px;
            bottom: 0;
        }
        .sidebar h3 {
            color: #fff;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .sidebar a {
            display: block;
            text-decoration: none;
            color: #ecf0f1;
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            margin: 5px 0;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: #f39c12;
            color: #fff;
        }

        /* Main Content */
        .main-content {
            padding: 20px;
            margin-left: 280px; /* Space for the sidebar */
        }
        .main-content p {
            font-size: 1.2rem;
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #555;
        }
    </style>
</head>
<body>
    <!-- Navbar Section -->
    <div class="navbar">
        <div class="navbar-left">
            <h1><div class="logo">F</div> FPT/IPT Application Management</h1>
        </div>
        <div class="menu">
            <!-- Profile Icon with Dropdown -->
            <div class="profile-icon" onclick="toggleProfileDropdown()">
                <i class="fas fa-user"></i>
            </div>
            <div class="profile-dropdown" id="profileDropdown">
                <a href="{{ url('profile') }}">Profile</a>
                <a href="{{ url('loginHistory') }}">Login History</a>
                <a href="{{ url('changePassword') }}">Change Password</a>
                <form action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Horizontal Lines Below Navbar -->
    <div class="horizontal-lines">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Sidebar Section -->
    <div class="sidebar">
        <h3>Student Dashboard</h3>
        <a href="{{ url('apply') }}">Apply for Field</a>
        <a href="{{ url('personalDetails') }}">Personal Details</a>
        <a href="{{ url('notifications') }}">Notifications</a>
    </div>

    <!-- Main Content Section -->
    <div class="main-content">
        <p>Welcome to the FPT/IPT Application System dashboard. Explore and manage your applications easily!</p>
    </div>

    <script>
        function toggleProfileDropdown() {
            const profileDropdown = document.getElementById('profileDropdown');
            profileDropdown.style.display = profileDropdown.style.display === 'block' ? 'none' : 'block';
        }

        // Close dropdown when clicking outside
        window.onclick = function(event) {
            if (!event.target.closest('.profile-icon') && !event.target.closest('.profile-dropdown')) {
                document.getElementById('profileDropdown').style.display = 'none';
            }
        }
    </script>
</body>
</html>
