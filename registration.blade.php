<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPT/FPT Application Management System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #6a82c3;
            color: #333;
            line-height: 1.5; /* Improves readability */
        }

        .container {
            margin: 3cm auto;
            width: 90%; /* Responsive width */
            max-width: 400px; /* Limit max width */
            padding: 20px;
            border-radius: 10px;
            background-color: #f4f4f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }

        .header {
            background-color: #55679c;
            border-radius: 10px 10px 0 0;
            padding: 1.5em 0; /* Use em instead of cm for responsive padding */
            text-align: center;
            color: #fff;
        }

        h1 {
            margin: 0;
            font-size: 26px; /* Increased font size */
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .form-group {
            margin: 15px 0;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        label {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #55679c;
        }

        input[type="text"], input[type="email"], input[type="password"], select {
            width: 100%;
            padding: 12px; /* Increased padding for better touch targets */
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus {
            outline: none;
            border-color: #55679c;
            box-shadow: 0 0 5px rgba(85, 103, 156, 0.5);
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #55679c;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            margin-top: 15px;
        }

        button:hover,
        button:focus {
            background-color: #7c93c3;
            transform: translateY(-2px);
        }

        .alert {
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 15px;
            width: 100%;
            box-sizing: border-box;
            text-align: center;
        }

        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
        }

        .alert-danger {
            background-color: #f2dede;
            color: #a94442;
        }

        .text-danger {
            color: #a94442;
            font-size: 14px;
            margin-top: 5px;
        }

        .link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #55679c;
            text-decoration: none;
            font-size: 15px;
            transition: color 0.3s;
        }

        .link:hover {
            color: #7c93c3;
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Accessibility styles */
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus,
        button:focus {
            outline: 2px solid #ffcc00; /* Clear focus outline */
            outline-offset: 2px; /* Space between element and outline */
        }

        /* Responsive styles */
        @media (max-width: 480px) {
            .container {
                margin: 1.5cm auto; /* Less margin on smaller screens */
                padding: 15px; /* Reduced padding */
            }

            h1 {
                font-size: 22px; /* Smaller font size for the header */
            }

            input[type="text"],
            input[type="email"],
            input[type="password"],
            select {
                font-size: 14px; /* Smaller input font size */
            }

            button {
                font-size: 14px; /* Smaller button font size */
            }
        }
    </style>
</head>
<body>
    <div class="container" role="main">
        <div class="header">
            <h1>Registration</h1>
        </div>
        <div class="form">
            <form action="{{ url('/register') }}" method="post" aria-labelledby="registration-form">
                @csrf
                @if(session('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif
                @if(session('fail'))
                    <div class="alert alert-danger" role="alert">{{ session('fail') }}</div>
                @endif

                <div class="form-group">
                    <label for="name">First name</label>
                    <input type="text" id="name" name="fname" value="{{ old('fname') }}" required aria-required="true">
                    <span class="text-danger">@error('fname') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="name">Last name</label>
                    <input type="text" id="name" name="lname" value="{{ old('lname') }}" required aria-required="true">
                    <span class="text-danger">@error('lname') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required aria-required="true">
                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required aria-required="true">
                    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" name="role" required aria-required="true">
                        <option value="">Register as!!</option>
                        <option value="Students">Students</option>
                        <option value="Human Resources(HRs)">Human Resources(HRs)</option>
                        <option value="Head of departments">Head of departments</option>
                       <option value="Lectures">Lectures</option>
                    </select>
                    <span class="text-danger">@error('role') {{ $message }} @enderror</span>
                </div>

                <button type="submit">Register</button>
            </form>
            <a href="login" class="link">Already have an account? Log in</a>
        </div>
    </div>
</body>
</html>


