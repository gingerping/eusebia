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

    //include('autoloader.php');
    require('classes/main.class.php');
    $eusebia->login();

   
?>

<!DOCTYPE html> 
<html> 
<head> 
    <title>Eusebia Paz Arroyo National High School</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Source+Serif+4:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>

    <style> 
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('icons/eusebia.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
        }

        .container-fluid {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        /* Header Styling */
        .header-content {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-logo {
    background-color: rgba(255, 255, 255, 0.9); /* Soft white circle */
    padding: 10px;
    border-radius: 50%; /* Keeps it circular like the seal */
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
filter: saturate(1.2) brightness(1.1);

        .system-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .sub-title {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* The Login Card */
        .card.main-card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            color: #333; /* Dark text inside the white card */
        }

        .card-body {
            padding: 30px;
        }

        .input-container {
            display: flex;
            width: 100%;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            background: white;
        }

        .icon {
            padding: 12px;
            background: #1e88e5;
            color: white;
            min-width: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            border: none;
            outline: none;
        }

        .btn-primary {
            background-color: #1e88e5;
            border: none;
            padding: 12px;
            width: 100%;
            font-weight: bold;
            border-radius: 8px;
        }

        .btn-success {
            background-color: #2e7d32;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 8px;
        }

        .registration-section {
            text-align: center;
            font-size: 0.9rem;
        }
        
        label {
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    
    <div class="container-fluid"> 
        <div class="header-content">
            <img src="icons/eusebia.png" class="login-logo" alt="Logo">
            <div class="header-text">
                <h2 class="system-title">Eusebia Paz Arroyo National High School</h2>
                <p class="sub-title">Buluang, Baao</p>
            </div>
        </div>

        <div class="card main-card"> 
            <div class="card-body"> 
                <form method="post"> 
                    <label>Email</label>
                    <div class="input-container">
                        <i class="fa fa-envelope icon"></i>
                        <input class="input-field" type="text" placeholder="Enter Email or Phone number" name="login_identity" required>
                    </div>

                    <label>Password</label>
                    <div class="input-container">
                        <i class="fa fa-key icon"></i>
                        <input class="input-field" type="password" placeholder="Enter Password" id="myInput" name="password" required>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" onclick="myFunction()" id="switch1">
                        <label class="form-check-label" for="switch1">Show Password</label>
                    </div>
                    
                    <button class="btn btn-primary" type="submit" name="login">Log-in</button>
                </form>

                <hr>

                <div class="registration-section"> 
                    <p class="mb-0"><strong>Don't have an account?</strong></p> 
                    <br>
                    <button class="btn btn-success" onclick="trying();">Create Account</button> 
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            x.type = (x.type === "password") ? "text" : "password";
        }

        function trying() {
            window.location.href = "resident_registration.php";
        }
    </script>
</body>
</html>