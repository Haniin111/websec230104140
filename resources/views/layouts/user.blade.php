<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'User Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Navbar style */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            padding: 0 20px;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 16px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #575757;
            color: white;
        }

        .container {
            padding: 20px;
        }

        /* Responsive Navbar */
        @media screen and (max-width: 600px) {
            .navbar a {
                float: none;
                display: block;
                text-align: left;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <a href="{{ route('user.profile') }}">Profile</a>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('settings') }}">Settings</a>
        <a href="{{ route('logout') }}">Logout</a>
    </div>

    <!-- Content -->
    <div class="container">
        @yield('content')
    </div>

</body>
</html>
