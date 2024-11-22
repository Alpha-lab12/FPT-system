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
            background-color: #6a82c3;
            font-family: Arial, sans-serif;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            line-height: 1.5; /* Improve readability */
        }

        .container {
            width: 90%; /* Use percentages for width */
            max-width: 400px;
            background-color: #f4f4f9;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            animation: fadeIn 0.8s ease;
        }

        .header {
            background-color: #55679c;
            border-radius: 8px 8px 0 0;
            padding: 1.5em 0;
            text-align: center;
            color: #fff;
        }

        h1 {
            margin: 0;
            font-size: 26px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .form-group {
            margin: 15px 0;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            color: #55679c;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: calc(100% - 2px);
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #55679c;
            box-shadow: 0 0 5px rgba(85, 103, 156, 0.3);
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
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
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive styles */
        @media (max-width: 400px) {
            .container {
                padding: 15px; /* Reduced padding on smaller screens */
            }

            h1 {
                font-size: 22px; /* Smaller font size for the header */
            }

            input[type="email"],
            input[type="password"] {
                font-size: 14px; /* Smaller input font size */
            }

            button {
                font-size: 14px; /* Smaller button font size */
            }
        }

        /* Accessibility styles */
        input[type="email"]:focus,
        input[type="password"]:focus,
        button:focus {
            outline: 2px solid #ffcc00; /* Clear focus outline */
            outline-offset: 2px; /* Space between element and outline */
        }
    </style>
</head>
<body>
    <div class="container" role="main">
        <div class="header">
            <h1>Login</h1>
        </div>
        <div class="form">
            <form action="{{ url('/signin') }}" method="post" aria-labelledby="login-form">
                @csrf
                @if(session('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif
                @if(session('fail'))
                    <div class="alert alert-danger" role="alert">{{ session('fail') }}</div>
                @endif

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

                <button type="submit">Login</button>
            </form>
            <a href="registration" class="link">New member? Register here</a>
        </div>
    </div>
</body>
</html>
