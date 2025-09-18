<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SetiaNet</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/particles.js"></script>
</head>
<body class="auth-body">

    <div id="particles-js"></div>

    <div class="auth-container">
        {{-- LEFT --}}
        <div class="auth-left">
            <div class="logo">
                <div style="background-color: transparent" class="logo-circle"><img src="logo/logonet.png" alt=""></div>
            </div>

            <h2>Welcome to <span>SetiaNet</span></h2>
            <p>High speed internet with stable connection. Join us to experience the best service with affordable price.</p>

            <a href="{{ route('register') }}" class="btn-primary">Join Now</a>

            <img src="{{ asset('img/burung.png') }}" alt="3D Wifi Illustration" class="auth-illustration">
        </div>

        {{-- RIGHT --}}
        <div class="auth-right">
            <h3>Sign In</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label>Email</label>
                <input type="email" name="email" required placeholder="Enter your email">

                <label>Password</label>
                <input type="password" name="password" required placeholder="Enter your password">

                <div class="form-options">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>

                <button type="submit" class="btn-primary w-full">Sign In</button>
            </form>

            <p class="text-small">Don’t have an account? <a href="{{ route('register') }}">Register</a></p>
            <a href="{{ url('/') }}" class="back-link">← Back to Landing</a>
        </div>
    </div>

    {{-- Particles Background --}}
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 60 },
                "size": { "value": 3 },
                "move": { "speed": 1.2 },
                "line_linked": { "enable": true, "color": "#423F3E" },
                "color": { "value": "#362222" }
            }
        });
    </script>
</body>
</html>
