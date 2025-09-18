<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SetiaNet</title>
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


            <h2>Create your <span>SetiaNet</span> account</h2>
            <p>Enjoy unlimited, fast, and reliable internet connection. Sign up now to get started.</p>

            <a href="{{ route('login') }}" class="btn-primary">Already have an account?</a>

            <img src="{{ asset('img/koala.png') }}" alt="3D Wifi Illustration" class="auth-illustration">
        </div>

        {{-- RIGHT --}}
        <div class="auth-right">
            <h3>Register</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <label>Name</label>
                <input type="text" name="name" required placeholder="Enter your name">

                <label>Email</label>
                <input type="email" name="email" required placeholder="Enter your email">

                <label>Password</label>
                <input type="password" name="password" required placeholder="Enter your password">

                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" required placeholder="Confirm your password">

                <button type="submit" class="btn-primary w-full">Register</button>
            </form>

            <p class="text-small">Already have an account? <a href="{{ route('login') }}">Login</a></p>
            <a href="{{ url('/') }}" class="back-link">← Back to Landing</a>
        </div>
    </div

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
