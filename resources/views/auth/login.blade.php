<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Admin DDTV</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100% !important;
            overflow: hidden !important;
        }

        body.login-page {
            background: url("{{ asset('assets/Untitled (2).png') }}") no-repeat center center fixed !important;
            background-size: cover !important;
            height: 100vh !important;
            min-height: 100vh !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-family: 'Source Sans Pro', sans-serif;
            padding: 0 !important;
            margin: 0 !important;
            position: relative;
            overflow: hidden !important;
        }

        /* ── WRAPPER ── */
        .login-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 400px;
            padding: 20px;
            position: relative;
            z-index: 10;
        }


        .logo-area img {
            width: 500px;
            height: auto;
            margin-top: -150px;

        }

        /* ── CARD ── */
        .glass-card {
            background: rgba(255, 255, 255, 0.241);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.13);
            border-radius: 28px;
            width: 100%;
            padding: 40px 34px 32px;
        }

        .glass-card h3 {
            text-align: center;
            font-size: 1.7rem;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 0.04em;
            margin-bottom: 28px;
        }

        .field {
            position: relative;
            margin-bottom: 20px;
        }

        .field input {
            width: 100%;
            background: rgba(0, 0, 0, 0.318);
            border: 1.5px solid rgb(62, 167, 236);
            border-radius: 999px;
            color: #fff;
            padding: 18px 48px 6px 22px;
            font-size: 0.95rem;
            outline: none;
            box-sizing: border-box;
            height: 58px;
            transition: border-color 0.25s, background 0.25s;
        }

        .field input:focus {
            border-color: #ffffff;
            background: rgba(90, 143, 168, 0.12);
            box-shadow: none !important;
        }

        .field label {
            position: absolute;
            left: 22px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2.0fr;
            color: rgb(255, 255, 255);
            pointer-events: none;
            transition: all 0.2s ease;
        }

        .field input:focus+label,
        .field input:not(:placeholder-shown)+label {
            top: 11px;
            transform: none;
            font-size: 0.70rem;
            color: #7bbdd4;
            letter-spacing: 0.04em;
        }

        .field .field-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
            font-size: 16px;
            pointer-events: none;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #0c79ac 0%, #3d9694 100%);
            border: none;
            border-radius: 999px;
            color: white;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 4px 20px rgba(53, 59, 59, 0.89);
            margin-top: 6px;
        }

        .btn-login::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.14) 0%, transparent 60%);
            border-radius: 999px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(90, 143, 168, 0.5);
            color: white;
        }

        .btn-login:active {
            transform: scale(0.98);
        }

        .alert-danger {
            border-radius: 999px;
            font-size: 0.88rem;
            margin-bottom: 16px;
            background: rgba(220, 53, 69, 0.25);
            border-color: rgba(220, 53, 69, 0.35);
            color: #fff;
            padding: 10px 18px;
            text-align: center;
        }

        .glass-card h3 {
            text-align: center;
            font-size: 1.7rem;
            font-weight: 7900;
            letter-spacing: 0.04em;
            margin-bottom: 28px;
            background: linear-gradient(90deg, #0c79ac 0%, #3d9694 );
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 200% auto;
            animation: gradientMove 7s linear infinite;
        }

            @keyframes gradientMove {
                0% {
                    background-position: 0% center;
                }

                100% {
                    background-position: 200% center;
                }
            }

    </style>
</head>

<body class="login-page">

    <div class="login-wrapper">

        <div class="logo-area">
            <img src="{{ asset('assets/Gemini_Generated_Image_z8sh8pz8sh8pz8sh-removebg-preview.png') }}">
        </div>

        <div class="glass-card">

            <h3><b>LOGIN</b></h3>
            <hr>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="field">
                    <input type="email" id="email" name="email" placeholder=" " required>
                    <label>Email Address</label>
                    <span class="field-icon">✉</span>
                </div>

                <div class="field">
                    <input type="password" id="password" name="password" placeholder=" " required>
                    <label>Password</label>
                    <span class="field-icon">🔒</span>
                </div>

                <button type="submit" class="btn-login">LOGIN</button>

            </form>
            <hr>
        </div>

    </div>

</body>

</html>
