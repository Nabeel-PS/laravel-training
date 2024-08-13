<!-- @extends('layouts.master'); -->
    <!-- @section('title','home') -->
    <!-- @section('content') -->
    
    <!-- @endsection -->

    <!DOCTYPE html>

        <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .login-container label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .login-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .login-container .forgot-password {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
        }

        .login-container .forgot-password:hover {
            text-decoration: underline;
        }
    </style>
</head> 
<body>
<div class="login-container">
    <h3>Sign In</h3>
    @if(session()->has('message'))
        <h6>{{ session()->get('message') }}</h6>
    @endif

    <form action="{{ route('do.login') }}" method="post">
        @csrf

        <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        </div>
        <!-- Remember Me Checkbox -->
        <div class="form-group">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember Me</label>
        </div>

        <input type="submit" value="Login">

        <a href="#" class="forgot-password">Forgot Password?</a>
    </form>
</div>

</body>
</html>

