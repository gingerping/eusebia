<?php 
     require('classes/resident.class.php');
    $residenteusebia->create_resident();
     //$data = $bms->get_userdata();

     
?>

<!DOCTYPE html> 
<html> 
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Source+Serif+4:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <style>
            :root {
      --navy-dark:    #0a2e5c;
      --navy-mid:     #103f80;
      --navy-light:   #1a5ca8;
      --gold:         #ffd700;
      --gold-soft:    rgba(255, 215, 0, 0.75);
      --white:        #ffffff;
      --bg:           #f7f8fc;
      --card-bg:      #ffffff;
      --border:       rgba(10, 46, 92, 0.12);
      --text-primary: #1a1e2e;
      --text-muted:   #5a6478;
      --blue-light:   #e6f1fb;
      --green-light:  #eaf3de;
      --purple-light: #eeedfe;
      --blue-accent:  #185fa5;
      --green-accent: #3b6d11;
      --purple-accent:#534ab7;
    }

            .navbar {
      background: rgba(10, 46, 92, 0.97);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(255, 215, 0, 0.15);
      position: sticky;
      top: 0;
      z-index: 100;
    }
        .field-icon {
        margin-left: 74%;
        margin-top: -8%;
        position: absolute;
        z-index: 2;
        }
    footer {
      background: var(--navy-dark);
      text-align: center;
      padding: 1.2rem 1.5rem;
    }

    footer p {
      color: var(--gold-soft);
      font-size: 12.5px;
      font-weight: 300;
      letter-spacing: 0.07em;
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 500px) {
      .school-name  { font-size: 20px; }
      .values-grid  { grid-template-columns: 1fr; }
      .card-header  { padding: 1rem 1.1rem; }
      .card-body    { padding: 1rem 1.1rem 1.2rem; }
    }
    </style>
    
    <body >

        <!-- eto yung navbar -->
        <nav class="navbar">
            <a class="navbar-brand" style="color: white;">EUSEBIA PAZ ARROYO NATIONAL HIGH SCHOOL</a>
        </nav>

        <div class="container-fluid"  style="margin-top: 4em;">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Registration Form</h1>
                    <br>
                </div>
            </div>

            <div class="row margin mtop"> 
                <div class="col-sm"> </div>

                <div class="col-sm-8">   
                    <div class="card mbottom" style="margin-bottom: 3em;">
                        <div class="card-body" >
                            <form method="post" enctype='multipart/form-data' class="was-validated">

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label> Last Name: </label>
                                            <input type="text" class="form-control" name="lname"  placeholder="Enter Last Name" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="mtop" >First Name: </label>
                                            <input type="text" class="form-control" name="fname"  placeholder="Enter First Name" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col"> 
                                        <div class="form-group">
                                            <label class="mtop"> Middle Name: </label>
                                            <input type="text" class="form-control" name="mi" placeholder="Enter Middle Name" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row"> 
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="mtop">Contact Number:</label>
                                            <input type="tel" class="form-control" name="contact" maxlength="11" pattern="[0-9]{11}" placeholder="Enter Contact Number" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label>Email: </label>
                                            <input type="text" class="form-control" name="login_identity"  placeholder="Enter Email or Phone number" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" class="form-control" id="password-field" name="password" placeholder="Enter Password" required>
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label> House No: </label>
                                            <input type="text" class="form-control" name="houseno"  placeholder="Enter House No." required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label> Street: </label>
                                            <input type="text" class="form-control" name="street"  placeholder="Enter Street" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label> Barangay: </label>
                                            <input type="text" class="form-control" name="brgy"  placeholder="Enter Barangay" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label> Municipality: </label>
                                            <input type="text" class="form-control" name="municipal" placeholder="Enter Municipality" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="mtop">Birth Date: </label>
                                            <input type="date" class="form-control" name="bdate" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label class="mtop">Birth Place </label>
                                            <input type="text" class="form-control" name="bplace"  placeholder="Enter Birth Place" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label class="mtop">Nationality: </label>
                                            <input type="text" class="form-control" name="nationality"  placeholder="Enter Nationality" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col"> 
                                        <div class="form-group">
                                            <label>Status: </label>
                                            <select class="form-control" name="status" id="status" required>
                                                <option value="">Choose your Status</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Widowed">Widowed</option>
                                                <option value="Divorced">Divorced</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input type="number" class="form-control" name="age" placeholder="Enter Age" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col rb">
                                        <div class="form-group">
                                            <label class="mtop">Sex</label>
                                            <select class="form-control" name="sex" id="sex" required>
                                                <option value="">Choose your Sex</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>         
                                </div>
<br><br>
    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="termsCheck" required>
            <label class="form-check-label" for="termsCheck">
                I agree to the 
                <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal" style="text-decoration: none;">
                    Terms and Conditions
                </a>
            </label>
            <div class="invalid-feedback">You must agree before submitting.</div>
        </div>
    </div>
</div>
                                <br>
                                 <div class="d-flex justify-content-end align-items-center">   
                                <input type="hidden" class="form-control" name="role" value="resident">
                                <a style="width: 130px; margin-left:35%;" class="btn btn-danger" href="login.php"> Back to Login</a>
                                <button style="width: 130px;" class="btn btn-primary" type="submit" name="add_resident"> Submit </button>
                                
                            </form>
                        </div>
                    </div> 
                </div>
                <div class="col-sm"> </div>
            </div>
        </div>
       <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6><strong>1. Data Privacy Act of 2012</strong></h6>
                <p>By registering, you allow EUSEBIA PAZ ARROYO NATIONAL HIGH SCHOOL to collect and process your personal information in accordance with the Data Privacy Act. Your data will be used solely for Enrollment and emergency services.</p>
                
                <h6><strong>2. Accuracy of Information</strong></h6>
                <p>You certify that all information provided is true and correct. Providing false information may lead to the cancellation of your registration or legal action.</p>
                
                <h6><strong>3. Usage Policy</strong></h6>
                <p>This account is for the exclusive use of the registered Student. Any unauthorized use of this system may result in suspension of access.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="document.getElementById('termsCheck').checked = true;">I Understand</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
            input.attr("type", "text");
            } else {
            input.attr("type", "password");
            }
            });
        </script>

        <script src="../BarangaySystem/bootstrap/js/bootstrap.bundle.js" type="text/javascript"> </script>
    </body>
     <footer>
    <p>Eusebia Paz Arroyo National High School &middot; Department of Education</p>
  </footer>
</html>

