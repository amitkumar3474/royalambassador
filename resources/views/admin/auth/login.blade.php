<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/fav-icon.png') }}">
    <!-- Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <header>
        <div class="inner-header">
            <div class="col-6">
                <a href="#"><img src="{{ asset('img/pub_consulate_link.jpg') }}" alt=""></a>
            </div>
            <div class="col-6">
                <a href="#" class="pug-logo"><img src="{{ asset('img/pub_logo_main.jpg') }}" alt=""></a>
            </div>
        </div>
    </header>
    <div class="login-body">
        <div class="login_box">
            <h1>Account Login</h1>
            <div id="login_form">
                <p>Please enter your email and password to access your account.</p>
                <form action="{{ route('admin.authenticate') }}" method="POST">
                    @csrf
                    <div class="email">
                        <label for="email">Email Address:</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <div class="password">
                        <label for="password">Password:</label>
                        <input id="password" type="password" name="password" value="{{ old('password') }}">
                    </div>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <div class="submit">
                        <button type="submit">Login</button>
                    </div>
                    <div class="forget">
                        <a href="#">Forgot your Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <div id="copy_right">
            <p><span class="special">©2023 Royal Ambassador</span>
            15430 Innis Lake Road, Caledon, Ontario, L7C 2Z1 
            <span class="special">(905) 584-6868</span> 
            info@royalambassador.ca</p> 
          </div>
    </footer>
</body>
</html>