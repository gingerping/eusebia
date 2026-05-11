<?php 
error_reporting(E_ALL ^ E_WARNING);

if(!isset($_SESSION)) {
    $showdate = date("Y-m-d");
    date_default_timezone_set('Asia/Manila');
    $showtime = date("h:i:a");
    $_SESSION['storedate'] = $showdate;
    $_SESSION['storetime'] = $showdate;
    session_start();
}

require('classes/main.class.php');
$eusebia->login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>EPANHS | Login</title>

    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
                        background-image: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url('icons/eusebia.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        /* Login Card Container */
        .login-container {
            max-width: 460px;
            width: 100%;
            margin: 0 auto;
        }

        .header-content {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-logo {
            width: 90px;
            height: 90px;
            background: white;
            border-radius: 50%;
            padding: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            margin-bottom: 1rem;
            transition: transform 0.2s;
        }
        .login-logo:hover {
            transform: scale(1.02);
        }

        .system-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.8rem;
            background: #ffffff;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 0.25rem;
        }

        .sub-title {
            color: #ffffff;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }

        /* Modern Card */
        .login-card {
            background: white;
            border: none;
            border-radius: 36px;
            box-shadow: 0 25px 45px -12px rgba(0,0,0,0.25);
            overflow: hidden;
            transition: transform 0.2s;
        }

        .login-card .card-body {
            padding: 2rem 1.8rem;
        }

        /* Form fields */
        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #1f3a5f;
            margin-bottom: 0.5rem;
        }

        .input-group-custom {
            display: flex;
            align-items: center;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            transition: all 0.2s;
            margin-bottom: 1.2rem;
        }
        .input-group-custom:focus-within {
            border-color: #2a6f9c;
            box-shadow: 0 0 0 3px rgba(42,111,156,0.15);
            background: white;
        }
        .input-icon {
            padding: 0.75rem 0 0.75rem 1.2rem;
            color: #2a6f9c;
            font-size: 1rem;
        }
        .input-field {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 0.5rem;
            border: none;
            background: transparent;
            outline: none;
            font-size: 0.95rem;
            font-weight: 500;
        }
        .input-field::placeholder {
            color: #a0afc0;
            font-weight: 400;
        }

        /* Checkbox */
        .form-switch-custom {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 1.5rem;
        }
        .form-switch-custom .form-check-input {
            width: 2rem;
            cursor: pointer;
            background-color: #cbd5e1;
            border-color: #94a3b8;
        }
        .form-switch-custom .form-check-input:checked {
            background-color: #2a6f9c;
            border-color: #2a6f9c;
        }
        .form-switch-custom label {
            font-size: 0.85rem;
            color: #334155;
            cursor: pointer;
        }

        /* Buttons */
        .btn-login {
            background: linear-gradient(135deg, #0b2b5c, #1f5a9e);
            border: none;
            border-radius: 40px;
            padding: 0.8rem;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            color: white;
            transition: all 0.2s;
            margin-bottom: 1.2rem;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #1f3a6b, #2a6f9c);
            box-shadow: 0 8px 18px rgba(11,43,92,0.25);
        }

        .btn-register {
            background: #eef2ff;
            border: 1px solid #cbd5e1;
            border-radius: 40px;
            padding: 0.7rem;
            font-weight: 600;
            font-size: 0.9rem;
            width: 100%;
            color: #1f3a5f;
            transition: all 0.2s;
        }
        .btn-register:hover {
            background: #e2e8f0;
            transform: translateY(-1px);
        }

        hr {
            margin: 1.5rem 0;
            opacity: 0.3;
        }

        .footer-note {
            text-align: center;
            margin-top: 1.2rem;
            font-size: 0.75rem;
            color: #5a687c;
        }

        @media (max-width: 500px) {
            .login-card .card-body {
                padding: 1.5rem;
            }
            .system-title {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="header-content">
        <img src="icons/eusebia.png" class="login-logo" alt="School Seal">
        <h2 class="system-title">Eusebia Paz Arroyo Memorial National High School</h2>
        <p class="sub-title">Buluang, Baao, Camarines Sur</p>
    </div>

    <div class="card login-card">
        <div class="card-body">
            <form method="post">
                <div class="form-label">Email or Phone</div>
                <div class="input-group-custom">
                    <div class="input-icon"><i class="fas fa-envelope"></i></div>
                    <input class="input-field" type="text" placeholder="your.email@example.com" name="login_identity" required autofocus>
                </div>

                <div class="form-label">Password</div>
                <div class="input-group-custom">
                    <div class="input-icon"><i class="fas fa-key"></i></div>
                    <input class="input-field" type="password" placeholder="••••••••" id="myInput" name="password" required>
                </div>

                <div class="form-switch-custom">
                    <input class="form-check-input" type="checkbox" onclick="myFunction()" id="showPasswordSwitch">
                    <label class="form-check-label" for="showPasswordSwitch">Show password</label>
                </div>

                <button class="btn btn-login" type="submit" name="login">
                    <i class="fas fa-sign-in-alt me-2"></i> Log in
                </button>
            </form>

            <hr>

            <div class="text-center mb-3">
                <p class="mb-2 fw-semibold">Don't have an account yet?</p>
                <button class="btn btn-register" onclick="window.location.href='resident_registration.php';">
                    <i class="fas fa-user-plus me-2"></i> Create Account
                </button>
            </div>

        </div>
    </div>
</div>

<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        x.type = (x.type === "password") ? "text" : "password";
    }
</script>

</body>
</html>