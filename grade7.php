<?php 
    require('classes/main.class.php');
    require('classes/resident.class.php');
    
    $userdetails = $eusebia->get_userdata();
    $eusebia->create_seven();

?>

<!DOCTYPE html>

<html>
  <head> 
    <title> EUSEBIA PAZ ARROYO NATIONAL HIGH SCHOOL </title>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js" integrity="sha512-/HL24m2nmyI2+ccX+dSHphAHqLw60Oj5sK8jf59VWtFWZi9vx7jzoxbZmcBeeTeCUc7z1mTs3LfyXGuBU32t+w==" crossorigin="anonymous"></script>
      <!-- responsive tags for screen compatibility -->
      <meta name="viewport" content="width=device-width, initial-scale=1"><!-- bootstrap css --> 
      <link href="../BarangaySystem/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
      <!-- fontawesome icons --> 
      <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
        <style>

            /* Navbar Buttons */

            .btn1 {
            border-radius: 20px;
            border: none; /* Remove borders */
            color: white; /* White text */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
            margin-left: 23%;
            padding: 8px 22px;
            }

            .btn2 {
            border-radius: 20px;
            border: none; /* Remove borders */
            color: white; /* White text */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
            padding: 8px 22px;
            margin-left: .1%;
            }

            .btn3 {
            border-radius: 20px;
            border: none; /* Remove borders */
            color: white; /* White text */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
            padding: 8px 22px;
            margin-left: .1%;
            }

            .btn4 {
            border-radius: 20px;
            border: none; /* Remove borders */
            color: white; /* White text */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
            padding: 8px 22px;
            margin-left: .1%;
            }

            .btn5 {
            border-radius: 20px;
            border: none; /* Remove borders */
            color: white; /* White text */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
            padding: 8px 22px;
            margin-left: .1%;
            }

            /* Darker background on mouse-over */
            .btn1:hover {
            background-color: RoyalBlue;
            color: black;
            }

            .btn2:hover {
            background-color: RoyalBlue;
            color: black;
            }

            .btn3:hover {
            background-color: RoyalBlue;
            color: black;
            }

            .btn4:hover {
            background-color: RoyalBlue;
            color: black;
            }

            .btn5:hover {
            background-color: RoyalBlue;
            color: black;
            }

            /* Back-to-Top */

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
            background-color: #dfe3ee;
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
            .top-link:hover {
            background-color: #f5f7f8;
            }
            .top-link:hover svg {
            fill: #000000;
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
            .container2 
            {
                margin-top: 20px;
                background-color: #f5f8fa;
            }
            .container1
            {
                background-color: #ffffff;
                height: 342px;
                color: black;
                font-family: Arial, Helvetica, sans-serif;
                text-align: center;
            }

            .applybutton
            {
                width: 100% !important;
                height: 50px !important;
                border-radius: 20px;
                margin-top: 5%;
                margin-bottom: 8%;
                font-size: 25px;
                letter-spacing: 3px;
            }

            .paa
            {
                margin-top: 10px;
                position: relative;
                left: -28%;
            }

            .text1{
                margin-top: 30px;
                font-size: 50px;
            }

            .picture{
                height: 120px;
                width: 120px;
            }

            /* width */
            ::-webkit-scrollbar {
            width: 5px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
            background: #f1f1f1; 
            }
            
            /* Handle */
            ::-webkit-scrollbar-thumb {
            background: #888; 
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
            background: #555; 
            }


            .card4 {
                width: 195px;
                height: 210px;
                margin: auto;
                color: white;
            }

            .card3 {
                width: 195px;
                height: 210px;
                margin: auto;
                color: white;
            }

            .card2 {
                width: 195px;
                height: 210px;
                margin: auto;
                color: white;
            }

            .card1 {
                width: 195px;
                height: 210px;
                margin: auto;
                color: white;
            }

            a{
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
            background-color: #e4e6ec;
            margin-top: 5px;
            }

            .chip img {
            float: left;
            margin: 0 10px 0 -25px;
            height: 50px;
            width: 50px;
            border-radius: 50%;
            }

            .zoom {
            transition: transform .3s;
            }

            .zoom:hover {
            -ms-transform: scale(1.4); /* IE 9 */
            -webkit-transform: scale(1.4); /* Safari 3-8 */
            transform: scale(1.4); 
            }

        </style>
  </head>

    <body>

        <!-- Eto yung navbar -->

        <nav class="navbar navbar-dark bg-primary sticky-top">
            <a class="navbar-brand" href="resident_homepage.php">EUSEBIA PAZ ARROYO NATIONAL HIGH SCHOOL </a>
            <a href="resident_homepage.php" data-toggle="tooltip" title="Home" class="btn1 bg-primary"><i class="fa fa-home fa-lg"></i></a>
           
           
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

        <div class="container-fluid container1"> 
            <div class="row"> 
                <div class="col"> 
                    <div class="header">
                        <h1 class="text1">GRADE 7 ENROLLMENT </h1>
                    </div>

                    <br>

                    <img class="picture" src="icons/Documents/eusebia.png">

                    <img class="picture" src="icons/Documents/docu3.png">

                    <img class="picture" src="icons/Documents/deped.png">
                </div>
            </div>
        </div>
        <p style="text-align: center;"><strong>"It always seems impossible until it's done." <br>- Nelson Mandela</strong></p>
        <div id="down3"></div>

        <br>

        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <h1>Procedure</h1>
                    <hr style="background-color: black;">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <i class="fas fa-id-card fa-7x"></i>
                    
                    <br>
                    <br>

                    <h3>Step 1: Prepare</h3>
                    <p>Prepare all information for Grade 7 admission.</p>
                </div>

                <div class="col">
                    <i class="fas fa-laptop fa-7x"></i>

                    <br>
                    <br>

                    <h3>Step 2: Fill-Up</h3>
                    <p>Second step is to Fill-Up the entire form in our system.</p>
                </div>
                <div class="col">
                    <i class="fa fa-hourglass-half fa-7x fa-fw" style="color: #333;"></i>

                    <br>
                    <br>

                    <h3>Step 3: Wait </h3>
                    <p> Wait for announcement</p>
                </div>


            </div>

            <div id="down2"></div>

            <br>
            <br>
            <br>

            
        <div id="down1"></div>
        <!-- Button trigger modal -->

        <div class="container">

            <h1 class="text-center">Grade 7 Enrollment Form</h1>
<hr style="background-color:black;">

<div class="col text-center">   
    <button type="button" class="btn btn-primary applybutton" data-toggle="modal" data-target="#enrollmentModal">
        Open Enrollment Form
    </button>
</div>

<div class="modal fade" id="enrollmentModal" tabindex="-1" role="dialog" aria-labelledby="enrollmentModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enrollmentModalTitle">Enrollment System</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" class="was-validated">
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>School Year:</label>
                                <select name="sy" class="form-control" required>
                                    <option value="2026-2027">2026-2027</option>
                                    <option value="2027-2028">2027-2028</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>LRN:</label>
                                <input name="lrn" type="text" class="form-control" placeholder="Learner Reference No." required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>School ID:</label>
                                <input name="school_id" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h6>Learner Information:</h6>
                    <div class="row"> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Last Name:</label>
                                <input name="lname" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>First Name:</label>
                                <input name="fname" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Middle Name:</label>
                                <input name="mi" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Birth Date:</label>
                                <input name="bdate" type="date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sex:</label>
                                <select name="sex" class="form-control" required>
                                    <option value="">Select Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Age:</label>
                                <input name="age" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Contact:</label>
                                <input name="contact" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Email:</label>
                                <input name="email" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Current Address:</label>
                                <textarea name="current_address" class="form-control" rows="1" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Permanent Address:</label>
                                <textarea name="perm_address" class="form-control" rows="1" required></textarea>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h6>Parent's / Guardian's Information:</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Father's Name:</label>
                            <input name="ffname" type="text" class="form-control" placeholder="First Name" required>
                            <input name="flname" type="text" class="form-control mt-1" placeholder="Last Name" required>
                            <label>Contact:</label>
                            <input name="contact_f" type="text" class="form-control mt-1" placeholder="Contact No." required>
                        </div>
                        <div class="col-md-6">
                            <label>Mother's Maiden Name:</label>
                            <input name="mfname" type="text" class="form-control" placeholder="First Name" required>
                            <input name="mlname" type="text" class="form-control mt-1" placeholder="Last Name" required>
                            <label>Contact:</label>
                            <input name="contact_m" type="text" class="form-control mt-1" placeholder="Contact No." required>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-8">
                            <label>Last Grade Level Completed</label>
                            <input name="lglc" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label>Last School Attended</label>
                            <input name="lsa" type="text" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-8">
                            <label>Last School Year Completed</label>
                            <input name="lysc" type="text" class="form-control mt-1" required>
                        </div>
                        <div class="col-md-4">
                            <label>School Id</label>
                            <input name="school_id" type="text" class="form-control mt-1" required>
                        </div>
                    </div>
            </div> 
            <div class="modal-footer">
                <input name="id_resident" type="hidden" value="<?= $userdetails['id_resident'] ?? ''; ?>">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                <button name="create_seven" type="submit" class="btn btn-primary">Submit Enrollment</button>
            </div> 
                </form> </div>
    </div>
</div>
        </form>

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

        <script src="../BarangaySystem/bootstrap/js/bootstrap.bundle.js" type="text/javascript"> </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
</html>
