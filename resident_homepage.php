<?php 
    error_reporting(E_ALL ^ E_WARNING);
    include('classes/resident.class.php');
    
    // 1. Get user data first so we have the ID
    $userdetails = $eusebia->get_userdata();
    $current_user_id = $userdetails['id_resident']; // Store the ID for easy use

    $dt = new DateTime("now", new DateTimeZone('Asia/Manila'));
    $tm = new DateTime("now", new DateTimeZone('Asia/Manila'));
    $cdate = $dt->format('Y/m/d');
    $ctime = $tm->format('H');
?>



<script> 
    function logout() {
    window.location.href = "logout.php";
    }
    function profile() {
    window.location.href = "resident_profile.php";
    }
</script>


<!DOCTYPE html> 
<html>

    <head> 
    <title> EUSEBIA PAZ ARROYO NATIONAL HIGH SCHOOL </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- responsive tags for screen compatibility -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- custom css --> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
        <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Source+Serif+4:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">

        

    <style>

    /* Navbar Buttons */

  .service-card {
    transition: all 0.3s ease;
    border-radius: 15px;
  }

  .service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
  }

  .icon-box {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    font-size: 1.8rem;
  }

  /* Soft Background Colors */
  .bg-primary-light { background-color: #e7f1ff; }
  .bg-success-light { background-color: #eafaf1; }
  .bg-warning-light { background-color: #fef9e7; }
  
    .btn1 {
    border-radius: 20px;
    border: none; /* Remove borders */
    color: white; /* White text */
    font-size: 16px; /* Set a font size */
    cursor: pointer; /* Mouse pointer on hover */
    margin-left: 23%;
    padding: 12px 22px;
    }

    .btn2 {
    border-radius: 20px;
    border: none; /* Remove borders */
    color: white; /* White text */
    font-size: 16px; /* Set a font size */
    cursor: pointer; /* Mouse pointer on hover */
    padding: 12px 22px;
    margin-left: .1%;
    }

    .btn3 {
    border-radius: 20px;
    border: none; /* Remove borders */
    color: white; /* White text */
    font-size: 16px; /* Set a font size */
    cursor: pointer; /* Mouse pointer on hover */
    padding: 12px 22px;
    margin-left: .1%;
    }


    .top-link {
    transition: all 0.25s ease-in-out;
    position: fixed;
    bottom: 0;
    right: 0;
    display: inline-flex;
    cursor: pointer;
    align-items: center;
    justify-content: center;
    margin: 0 3em 3em 0;
    border-radius: 50%;
    padding: 0.25em;
    width: 80px;
    height: 80px;
    background-color: #3661D5;
    }
    .top-link.show {
    visibility: visible;
    opacity: 1;
    }
    .top-link.hide {
    visibility: hidden;
    opacity: 0;
    }
    .top-link svg {
    fill: white;
    width: 24px;
    height: 12px;
}
    .screen-reader-text {
    position: absolute;
    clip-path: inset(50%);
    margin: -1px;
    border: 0;
    padding: 0;
    width: 1px;
    height: 1px;
    overflow: hidden;
    word-wrap: normal !important;
    clip: rect(1px, 1px, 1px, 1px);
    }
    .screen-reader-text:focus {
    display: block;
    top: 5px;
    left: 5px;
    z-index: 100000;
    clip-path: none;
    background-color: #eee;
    padding: 15px 23px 14px;
    width: auto;
    height: auto;
    text-decoration: none;
    line-height: normal;
    color: #444;
    font-size: 1em;
    clip: auto !important;
    }


    /* Footer Style */
    
    .footerlinks{
        color:white;
        }
    .shfooter .collapse {
        display: inherit;
    }
        @media (max-width:767px) {
    .shfooter ul {
            margin-bottom: 0;
    }

    .shfooter .collapse {
            display: none;
    }

    .shfooter .collapse.show {
            display: block;
    }

    .shfooter .title .fa-angle-up,
    .shfooter .title[aria-expanded=true] .fa-angle-down {
            display: none;
    }

    .shfooter .title[aria-expanded=true] .fa-angle-up {
            display: block;
    }

    .shfooter .navbar-toggler {
            display: inline-block;
            padding: 0;
    }

    }

    .resize {
        text-align: center;
    }
    .resize {
        margin-top: 3rem;
        font-size: 1.25rem;
    }
    /*RESIZESCREEN ANIMATION*/
    .fa-angle-double-right {
        animation: rightanime 1s linear infinite;
    }

    .fa-angle-double-left {
        animation: leftanime 1s linear infinite;
    }
    @keyframes rightanime {
        50% {
            transform: translateX(10px);
            opacity: 0.5;
    }
        100% {
            transform: translateX(10px);
            opacity: 0;
    }
    }
    @keyframes leftanime {
        50% {
            transform: translateX(-10px);
            opacity: 0.5;
    }
        100% {
            transform: translateX(-10px);
            opacity: 0;
    }
    }

    /* Contact Chip */

    .chip {
    display: inline-block;
    padding: 0 25px;
    height: 50px;
    line-height: 50px;
    border-radius: 25px;
    background-color: #2C54C1;
    margin-top: 5px;
    }

    .chip img {
    float: left;
    margin: 0 10px 0 -25px;
    height: 50px;
    width: 50px;
    border-radius: 50%;
    }


    </style>
    <body> 

        <!-- Back-to-Top and Back Button -->

        <a data-toggle="tooltip" title="Back-To-Top" class="top-link hide" href="" id="js-top">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 6"><path d="M12 6H0l6-6z"/></svg>
            <span class="screen-reader-text">Back to top</span>
        </a>

        <!-- Eto yung navbar -->

        <nav class="navbar navbar-dark bg-primary sticky-top">
            <a class="navbar-brand" href="resident_homepage.php">EUSEBIA PAZ ARROYO NATIONAL HIGH SCHOOL</a>
            
           
           <div class="dropdown ml-auto">
                <button title="Your Account" class="btn btn-primary dropdown-toggle" style="margin-right: 2px;" type="button" data-toggle="dropdown"><?= $userdetails['surname'];?>, <?= $userdetails['firstname'];?>
                    <span class="caret" style="margin-left: 2px;"></span>
                </button>
                <ul class="dropdown-menu" style="width: 175px;" >
                    <a class="btn" href="resident_profile.php?id_resident=<?= $userdetails['id_resident'];?>"> <i class="fas fa-user"> &nbsp; </i>Personal Profile  </a>
                    <a class="btn" href="resident_changepass.php?id_resident=<?= $userdetails['id_resident'];?>"> <i class="fas fa-lock" >&nbsp;</i> Change Password  </a>
                    <a class="btn" href="logout.php"> <i class="fas fa-sign-out-alt">&nbsp;</i> Logout  </a>
                </ul>
            </div>
        </nav>
<br> <br> <br><br>

  

        <div id="down1"></div>

        <br>

        <section class="heading-section"> 
            <div class="container text-center"> 
                <div class="row"> 
                    <div class="col"> 
                        
                        <br>
                        <br>

                        <div class="header"> 
                            <h2> Welcome to EUSEBIA PAZ ARROYO NATIONAL HIGH SCHOOL</h2><bR>
                            <h3> You may select your grade level below </h3>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>

            <div class="container"> 
                
                <div class="row">
                    <div class="col"> 
                        <a href="grade7.php ?id_resident=<?= $userdetails['id_resident'];?>">
                            <div class="zoom1"> 
                                <div class="card"> 
                                    <div class="card-body text-center">
                                        <i class="bi bi-file-earmark-medical-fill"></i> 
                                        <h4> GRADE-7 </h4> 
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col"> 
                        <a href="grade8.php ?id_resident=<?= $userdetails['id_resident'];?>">
                            <div class="zoom1">
                                <div class="card"> 
                                    <div class="card-body text-center"> 
                                        <i class="bi bi-person-vcard-fill"></i>
                                        <h4> GRADE-8 </h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col"> 
                        <a href="grade9.php ?id_resident=<?= $userdetails['id_resident'];?>">
                            <div class="zoom1">
                                <div class="card"> 
                                    <div class="card-body text-center"> 
                                        <i class="bi bi-briefcase-fill"></i>
                                        <h4> GRADE-9 </h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <br>
                <div class="row card-spacing"> 
                    <div class="col">
                        <a href="grade10.php ?id_resident=<?= $userdetails['id_resident'];?>"> 
                        <div class="zoom1">    
                            <div class="card"> 
                                <div class="card-body text-center"> 
                                <i class="bi bi-house-check-fill"></i>
                                    <h4> GRADE-10 </h4>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="grade11.php ?id_resident=<?= $userdetails['id_resident'];?>"> 
                        <div class="zoom1">    
                            <div class="card"> 
                                <div class="card-body text-center">
                                <i class="bi bi-shield-lock-fill"></i> 
                                    <h4> GRADE-11 </h4>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="grade12.php ?id_resident=<?= $userdetails['id_resident'];?>"> 
                        <div class="zoom1">    
                            <div class="card"> 
                                <div class="card-body text-center">
                                <i class="bi bi-people-fill"></i> 
                                    <h4> GRADE-12 </h4>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <br>
        <br>
        <br>
        <script>
            $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>

        <script>
            $(document).ready(function(){
            // Add smooth scrolling to all links
            $("a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
                } // End if
            });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../BarangaySystem/bootstrap/js/bootstrap.bundle.js" type="text/javascript"> </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="../BarangaySystem/bootstrap/js/bootstrap.bundle.js" type="text/javascript"> </script>
    </body>
</html>
