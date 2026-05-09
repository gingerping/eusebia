<?php 
    require('classes/main.class.php');
    require('classes/resident.class.php');
    
    $userdetails = $eusebia->get_userdata();
    // Changed to nine
    $eusebia->create_ten(); 
?>

<!DOCTYPE html>
<html>
  <head> 
    <title> EUSEBIA PAZ ARROYO NATIONAL HIGH SCHOOL </title>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="../BarangaySystem/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
      <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
        <style>
            /* Keeping your original styles... */
            .btn1, .btn2, .btn3, .btn4, .btn5 { border-radius: 20px; border: none; color: white; font-size: 16px; cursor: pointer; padding: 8px 22px; }
            .btn1 { margin-left: 23%; }
            .btn2, .btn3, .btn4, .btn5 { margin-left: .1%; }
            .btn1:hover, .btn2:hover, .btn3:hover, .btn4:hover, .btn5:hover { background-color: RoyalBlue; color: black; }
            .container2 { margin-top: 20px; background-color: #f5f8fa; }
            .container1 { background-color: #ffffff; height: 342px; color: black; font-family: Arial, sans-serif; text-align: center; }
            .applybutton { width: 100% !important; height: 50px !important; border-radius: 20px; margin-top: 5%; margin-bottom: 8%; font-size: 25px; letter-spacing: 3px; }
            .text1 { margin-top: 30px; font-size: 50px; }
            .picture { height: 120px; width: 120px; }
            .card1, .card2, .card3, .card4 { width: 195px; height: 210px; margin: auto; color: white; }
            a { color:white; }
        </style>
  </head>

    <body>
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
                        <h1 class="text1">GRADE 10 ENROLLMENT </h1>
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
        <br><br>

        <div class="container text-center">
            <h1>Procedure</h1>
            <hr style="background-color: black;">
            <div class="row">
                <div class="col">
                    <i class="fas fa-id-card fa-7x"></i>
                    <h3>Step 1: Prepare</h3>
                    <p>Prepare all information for Grade 9 admission.</p>
                </div>
                <div class="col">
                    <i class="fas fa-laptop fa-7x"></i>
                    <h3>Step 2: Fill-Up</h3>
                    <p>Select your <strong>Specialization/Course</strong> and fill the form.</p>
                </div>
                </div>
        </div>

        <div id="down1"></div>
        <br><br>

        <div class="container">
            <h1 class="text-center">Grade 10 Enrollment Form</h1>
            <hr style="background-color:black;">

            <div class="col text-center">   
                <button type="button" class="btn btn-primary applybutton" data-toggle="modal" data-target="#enrollmentModal">
                    Open Grade 10 Form
                </button>
            </div>

            <div class="modal fade" id="enrollmentModal" tabindex="-1" role="dialog" aria-labelledby="enrollmentModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="enrollmentModalTitle">Grade 10 Enrollment System</h5>
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
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label><strong>Choose TLE Specialization (Course):</strong></label>
                                            <select name="course" class="form-control border-primary" required>
                                                <option value="">-- Select Course --</option>
                                                <option value="ICT">ICT - Computer Programming</option>
                                                <option value="Animation">ICT - Animation</option>
                                                <option value="BAP">Home Economics - Bread and Pastry</option>
                                                <option value="Automotive">Industrial Arts - Automotive</option>
                                                <option value="Welding">Industrial Arts - Welding (SMAW)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>LRN:</label>
                                            <input name="lrn" type="text" class="form-control" placeholder="Learner Reference No." required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                        <div class="col-md-4">
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
                                <textarea name="current_address" class="form-control" rows="2" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Permanent Address:</label>
                                <textarea name="perm_address" class="form-control" rows="2" required></textarea>
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
                    <h6>Parent's / Guardian's Information:</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Last Grade Level Completed</label>
                            <input name="lglc" type="text" class="form-control" required>
                            <label>Last School Attended</label>
                            <input name="lsa" type="text" class="form-control mt-1" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Last School Year Completed</label>
                            <input name="lysc" type="text" class="form-control mt-1" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>School Id</label>
                            <input name="school_id" type="text" class="form-control mt-1" required>
                        </div>
                    </div>
                                
                                <div class="modal-footer mt-3">
                                    <input name="id_resident" type="hidden" value="<?= $userdetails['id_resident'] ?? ''; ?>">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                    <button name="create_ten" type="submit" class="btn btn-primary">Submit Grade 10 Enrollment</button>
                                </div> 
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>