<?php 

class EUSEBIAClass {

//------------------------------------------ DATABASE CONNECTION ----------------------------------------------------
    
    protected $server = "mysql:host=localhost;dbname=eusebia";
    protected $user = "root";
    protected $pass = "";
    protected $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    protected $con;


    public function show_404()
    {
        http_response_code(404);
        echo "Page is currently unavailable";
        die;
    }

    public function openConn() {
        try {
            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
            return $this->con;
        }

        catch(PDOException $e) {
            echo "Datbase Connection Error! ", $e->getMessage();
        }
    }

    //eto yung nag c close ng connection ng db
    public function closeConn() {
        $this->con = null;
    }


    //------------------------------------------ AUTHENTICATION & SESSION HANDLING --------------------------------------------
        //authentication function para sa sa tatlong type ng accounts
public function login() {
    if(isset($_POST['login'])) {
        $identity = $_POST['login_identity']; 
        $password_input = $_POST['password']; 
        $connection = $this->openConn();

        // 1. Check ADMIN - Only check EMAIL
        // 1. Check ADMIN - Now checking BOTH Email and Phone
$stmt = $connection->prepare("SELECT * FROM tbl_admin WHERE email = ? OR phone_number = ?");
$stmt->execute([$identity, $identity]); // We pass the same input to both '?' placeholders
$user = $stmt->fetch();

if($user && password_verify($password_input, $user['password'])) {
    $this->set_userdata($user);
    header('Location: admn_dashboard.php');
    exit(); 
}

        // 2. Check USER (Staff) - Only check EMAIL
        $stmt = $connection->prepare("SELECT * FROM tbl_user WHERE email = ?");
        $stmt->execute([$identity]);
        $user = $stmt->fetch();

        if($user && password_verify($password_input, $user['password'])) {
            $this->set_userdata($user);
            echo "<script>window.location.href='staff_dashboard.php';</script>";
            exit(); 
        }

        // 3. Check RESIDENT - Check EMAIL OR PHONE_NUMBER
        // We only use phone_number here because we are sure this table has it.
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE email = ? OR phone_number = ?");
        $stmt->execute([$identity, $identity]);
        $user = $stmt->fetch();

        if($user && password_verify($password_input, $user['password'])) {
            $this->set_userdata($user);
            header('Location: resident_homepage.php');
            exit();
        }

        // Only shows if NONE of the above found a match
        echo "<script type='text/javascript'>alert('Invalid Credentials.');</script>";
    }
}

    //eto yung function na mag e end ng session tas i l logout ka 
    public function logout(){
        if(!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['userdata'] = null;
        unset($_SESSION['userdata']); 
        
    }

    // etong method na get_userdata() kukuha ng session mo na 'userdata' mo na i identify sino yung naka login sa site 
public function get_userdata() {
    
    // 1. Start session if it hasn't been started yet
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // 2. Check if the key exists FIRST before returning it
    if (isset($_SESSION['userdata'])) {
        return $_SESSION['userdata'];
    } 

    // 3. Return null if no user data is found (e.g., not logged in)
    return null;
}

    //eto yung condition na mag s set userdata na gagamiting pagkakakilala sayo sa buong session kapag nag login in ka
    public function set_userdata($array) {

        //i ch check nito kung naka set naba yung session, kapag hindi pa naka set i r run niya yung session_start();
        if(!isset($_SESSION)) {
            session_start();
        }

        //eto si userdata yung mag s set ng name mo tsaka role/access habang ikaw ay nag b browse at gumagamit ng store management
        $_SESSION['userdata'] = array(
            "id_admin" => $array['id_admin'],
            "id_resident" => $array['id_resident'],
            "id_user" => $array['id_user'],
            "emailadd" => $array['email'],
            "password" => $array['password'],
            //"fullname" => $array['lname']. " ".$array['fname']. " ".$array['mi'],
            "surname" => $array['lname'],
            "firstname" => $array['fname'],
            "mname" => $array['mi'],
            "age" => $array['age'],
            "sex" => $array['sex'],
            "status" => $array['status'],
            "address" => $array['address'],
            "contact" => $array['contact'],
            "bdate" => $array['bdate'],
            "bplace" => $array['bplace'],
            "nationality" => $array['nationality'],
            "family_role" => $array['family_role'],
            "role" => $array['role'],
            "houseno" => $array['houseno'],
            "street" => $array['street'],
            "brgy" => $array['brgy'],
            "municipal" => $array['municipal']
        );
        return $_SESSION['userdata'];
    }



 //----------------------------------------------------- ADMIN CRUD ---------------------------------------------------------
  public function create_admin() {
    if(isset($_POST['add_admin'])) {
        // 1. Use ?? '' to prevent warnings if the field is missing from HTML
        $login_identity = $_POST['login_identity'] ?? ''; 
        $password_input = $_POST['password'] ?? '';
        
        // Hash the password for security
        $password = password_hash($password_input, PASSWORD_DEFAULT); 
        
        $lname = $_POST['lname'] ?? '';
        $fname = $_POST['fname'] ?? '';
        $mi = $_POST['mi'] ?? '';
        $role = $_POST['role'] ?? 'Admin';

        // 2. Logic to separate Email from Phone
        $email_to_save = NULL;
        $phone_to_save = NULL;

        if (filter_var($login_identity, FILTER_VALIDATE_EMAIL)) {
            $email_to_save = $login_identity;
        } else {
            $phone_to_save = $login_identity;
        }

        // 3. Validation: Make sure the identity isn't empty
        if (empty($login_identity)) {
            echo "<script>alert('Please provide an email or phone number.');</script>";
            return;
        }

        if ($this->check_admin($login_identity) == 0 ) {
            $connection = $this->openConn();
            // Ensure phone_number column exists in tbl_admin or remove it from the query
            $stmt = $connection->prepare("INSERT INTO tbl_admin (`email`, `phone_number`, `password`, `lname`, `fname`, `mi`, `role`) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$email_to_save, $phone_to_save, $password, $lname, $fname, $mi, $role]);
            
            echo "<script>alert('Administrator account added'); window.location.href='add_admin.php';</script>";
        } else {
            echo "<script>alert('Account already exists');</script>";
        }
    }
}

   public function admin_changepass() {
    if(isset($_POST['admin_changepass'])) {
        
        // 1. Capture the ID and password inputs
        $id_admin = $_POST['id_admin'] ?? null;
        $oldpassword = $_POST['oldpassword'] ?? '';
        $newpassword = $_POST['newpassword'] ?? '';
        $checkpassword = $_POST['checkpassword'] ?? '';

        if (empty($id_admin)) {
            echo "<script>alert('Error: Admin ID is missing. Please re-login.');</script>";
            return;
        }

        $connection = $this->openConn();
        
        // 2. Fetch the current hashed password from the database
        $stmt = $connection->prepare("SELECT `password` FROM tbl_admin WHERE id_admin = ?");
        $stmt->execute([$id_admin]);
        $result = $stmt->fetch();

        if (!$result) {
            echo "<script>alert('Admin user not found.');</script>";
            return;
        }

        // 3. Verify Old Password (checks input against the Bcrypt hash)
        if (!password_verify($oldpassword, $result['password'])) { 
            echo "<script>alert('Old Password is Incorrect');</script>";
        } 
        // 4. Ensure New Password and Confirm Password match
        elseif ($newpassword !== $checkpassword) {
            echo "<script>alert('New Passwords do not match');</script>";
        } 
        // 5. Ensure the new password isn't empty
        elseif (empty($newpassword)) {
            echo "<script>alert('New password cannot be empty');</script>";
        }
        else {
            // 6. Success: Hash the NEW password and update
            $hashed_new = password_hash($newpassword, PASSWORD_DEFAULT);
            $stmt = $connection->prepare("UPDATE tbl_admin SET password = ? WHERE id_admin = ?");
            $stmt->execute([$hashed_new, $id_admin]);
            
            echo "<script type='text/javascript'>
                alert('Password Updated Successfully'); 
                window.location.href='admn_dashboard.php';
            </script>";
        }
    }
}


    public function check_admin($email) {

        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_admin WHERE email = ?");
        $stmt->Execute([$email]);
        $total = $stmt->rowCount(); 

        return $total;
    }

    //eto yung function na mag bibigay restriction sa mga admin pages
    public function validate_admin(){
        $userdetails = $this->get_userdata();

        if (isset($userdetails)) {
            
            if($userdetails['role'] != "administrator") {
                $this->show_404();
            }

            else {
                return $userdetails;
            }
        }
    }

    public function validate_staff() {

        if(isset($userdetails)) {
            if($userdetails['role'] != "administrator" || $userdetails['role'] != "user") {
                $this->show_404();
            }

            else {
                return $userdetails;
            }
        }
    }















    //----------------------------------------- DOCUMENT PROCESSING FUNCTIONS -------------------------------------
    //-------------------------------------------------------------------------------------------------------------

 public function create_seven() {
    if(isset($_POST['create_seven'])) {
        $sy = $_POST['sy'] ?? '';
        $lrn = $_POST['lrn'] ?? '';
        $lname = $_POST['lname'] ?? '';
        $fname = $_POST['fname'] ?? '';
        $mi = $_POST['mi'] ?? '';
        $bdate = $_POST['bdate'] ?? '';
        $sex = $_POST['sex'] ?? '';
        $age = $_POST['age'] ?? '';
        $contact = $_POST['contact'] ?? '';
        $email = $_POST['email'] ?? '';
        $current_address = $_POST['current_address'] ?? '';
        $perm_address = $_POST['perm_address'] ?? '';
        $ffname = $_POST['ffname'] ?? '';
        $flname = $_POST['flname'] ?? '';
        $fmi = $_POST['fmi'] ?? '';
        $contact_f = $_POST['contact_f'] ?? ''; 
        $mlname = $_POST['mlname'] ?? '';
        $mfname = $_POST['mfname'] ?? '';
        $mmi = $_POST['mmi'] ?? '';
        $contact_m = $_POST['contact_m'] ?? '';
        $lglc = $_POST['lglc'] ?? '';
        $lsa = $_POST['lsa'] ?? '';
        $lysc = $_POST['lysc'] ?? '';
        $school_id = $_POST['school_id'] ?? '';
        // Add this to link the record to the logged-in user
        $id_resident = $_POST['id_resident'] ?? ''; 

        $connection = $this->openConn();
        
        // I have added `id_resident` here so you know which user owns the enrollment
        $query = "INSERT INTO tbl_seven (
            `sy`, `lrn`, `lname`, `fname`, `mi`, `bdate`, `sex`, `age`, `contact`, `email`, 
            `current_address`, `perm_address`, `ffname`, `flname`, `fmi`, 
            `contact_f`, `mlname`, `mfname`, `mmi`, `contact_m`, `lglc`, 
            `lsa`, `lysc`, `school_id`, `id_resident`
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        
        $stmt = $connection->prepare($query);
        
        // Ensure the count of elements in this array matches the number of '?' (23 total)
        $stmt->execute([
            $sy, $lrn, $lname, $fname, $mi, $bdate, $sex, $age, $contact, $email, 
            $current_address, $perm_address, $ffname, $flname, $fmi, 
            $contact_f, $mlname, $mfname, $mmi, $contact_m, $lglc, 
            $lsa, $lysc, $school_id, $id_resident
        ]);

        echo "<script type='text/javascript'>alert('Grade 7 Enrollment Submitted Successfully'); window.location.href='grade7.php';</script>";
        exit(); 
    }
}

public function get_single_seven($id_resident){

        $id_resident = $_GET['id_resident'];
        
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_seven where id_resident = ?");
        $stmt->execute([$id_resident]);
        $resident = $stmt->fetch();
        $total = $stmt->rowCount();

        if($total > 0 )  {
            return $resident;
        }
        else{
            return false;
        }
    }


public function view_seven(){ // Changed name to match the table
    $connection = $this->openConn();
    $stmt = $connection->prepare("SELECT * from tbl_seven");
    $stmt->execute();
    return $stmt->fetchAll();
}

public function delete_seven(){
    if(isset($_POST['delete_seven'])) {
        $id_seven = $_POST['id_seven']; // Fixed: ensure this matches your hidden input name
        $connection = $this->openConn();
        $stmt = $connection->prepare("DELETE FROM tbl_seven where id_seven = ?");
        $stmt->execute([$id_seven]); // FIXED: changed from $id_bspermit to $id_seven

        header("Refresh:0");
    }
}

public function update_seven() {
    if (isset($_POST['update_seven'])) {
        $id_seven = $_GET['id_seven']; // Getting ID from URL
        $sy = $_POST['sy'];
        $lrn = $_POST['lrn'];
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $mi = $_POST['mi'];
        $bdate = $_POST['bdate'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $current_address = $_POST['current_address'];
        $perm_address = $_POST['perm_address'];
        $ffname = $_POST['ffname'];
        $flname = $_POST['flname'];
        $fmi = $_POST['fmi'];
        $contact_f = $_POST['contact_f']; 
        $mlname = $_POST['mlname'];
        $mfname = $_POST['mfname'];
        $mmi = $_POST['mmi'];
        $contact_m = $_POST['contact_m'];
        $lglc = $_POST['lglc'];
        $lsa = $_POST['lsa'];
        $lysc = $_POST['lysc'];
        $school_id = $_POST['school_id'];

        $connection = $this->openConn();
        // FIXED: Removed trailing comma before WHERE and corrected column names
        $stmt = $connection->prepare("UPDATE tbl_seven SET 
            sy = ?, lrn = ?, lname = ?, fname = ?, mi = ?, bdate = ?, 
            sex = ?, age = ?, contact = ?, email = ?, current_address = ?, perm_address = ?, 
            ffname = ?, flname = ?, fmi = ?, contact_f = ?, mlname = ?, 
            mfname = ?, mmi = ?, contact_m = ?, lglc = ?, lsa = ?, 
            lysc = ?, school_id = ? 
            WHERE id_seven = ?");
            
        $stmt->execute([
            $sy, $lrn, $lname, $fname, $mi, $bdate, $sex, $age, $contact, $email, 
            $current_address, $perm_address, $ffname, $flname, $fmi, 
            $contact_f, $mlname, $mfname, $mmi, $contact_m, $lglc, 
            $lsa, $lysc, $school_id, $id_seven
        ]);
        
        echo "<script type='text/javascript'>alert('Grade 7 Data Updated');</script>";
        header("refresh: 0");
    }
}

public function create_eight() {
    if(isset($_POST['create_eight'])) {
        $sy = $_POST['sy'] ?? '';
        $lrn = $_POST['lrn'] ?? '';
        $lname = $_POST['lname'] ?? '';
        $fname = $_POST['fname'] ?? '';
        $mi = $_POST['mi'] ?? '';
        $bdate = $_POST['bdate'] ?? '';
        $sex = $_POST['sex'] ?? '';
        $age = $_POST['age'] ?? '';
        $contact = $_POST['contact'] ?? '';
        $email = $_POST['email'] ?? '';
        $current_address = $_POST['current_address'] ?? '';
        $perm_address = $_POST['perm_address'] ?? '';
        $ffname = $_POST['ffname'] ?? '';
        $flname = $_POST['flname'] ?? '';
        $fmi = $_POST['fmi'] ?? '';
        $contact_f = $_POST['contact_f'] ?? ''; 
        $mlname = $_POST['mlname'] ?? '';
        $mfname = $_POST['mfname'] ?? '';
        $mmi = $_POST['mmi'] ?? '';
        $contact_m = $_POST['contact_m'] ?? '';
        $lglc = $_POST['lglc'] ?? '';
        $lsa = $_POST['lsa'] ?? '';
        $lysc = $_POST['lysc'] ?? '';
        $school_id = $_POST['school_id'] ?? '';
        $id_resident = $_POST['id_resident'] ?? ''; 

        $connection = $this->openConn();
        
        $query = "INSERT INTO tbl_eight (
            `sy`, `lrn`, `lname`, `fname`, `mi`, `bdate`, `sex`, `age`, `contact`, `email`, 
            `current_address`, `perm_address`, `ffname`, `flname`, `fmi`, 
            `contact_f`, `mlname`, `mfname`, `mmi`, `contact_m`, `lglc`, 
            `lsa`, `lysc`, `school_id`, `id_resident`
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        
        $stmt = $connection->prepare($query);
        
        $stmt->execute([
            $sy, $lrn, $lname, $fname, $mi, $bdate, $sex, $age, $contact, $email, 
            $current_address, $perm_address, $ffname, $flname, $fmi, 
            $contact_f, $mlname, $mfname, $mmi, $contact_m, $lglc, 
            $lsa, $lysc, $school_id, $id_resident
        ]);

        echo "<script type='text/javascript'>alert('Grade 8 Enrollment Submitted Successfully'); window.location.href='grade8.php';</script>";
        exit(); 
    }
}

public function get_single_eight($id_resident){
    $id_resident = $_GET['id_resident'];
    
    $connection = $this->openConn();
    $stmt = $connection->prepare("SELECT * FROM tbl_eight WHERE id_resident = ?");
    $stmt->execute([$id_resident]);
    $resident = $stmt->fetch();
    $total = $stmt->rowCount();

    if($total > 0 )  {
        return $resident;
    }
    else {
        return false;
    }
}

public function view_eight(){ 
    $connection = $this->openConn();
    $stmt = $connection->prepare("SELECT * FROM tbl_eight");
    $stmt->execute();
    return $stmt->fetchAll();
}

public function delete_eight(){
    if(isset($_POST['delete_eight'])) {
        $id_eight = $_POST['id_eight']; 
        $connection = $this->openConn();
        $stmt = $connection->prepare("DELETE FROM tbl_eight WHERE id_eight = ?");
        $stmt->execute([$id_eight]); 

        header("Refresh:0");
    }
}

public function update_eight() {
    if (isset($_POST['update_eight'])) {
        $id_eight = $_GET['id_eight']; 
        $sy = $_POST['sy'];
        $lrn = $_POST['lrn'];
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $mi = $_POST['mi'];
        $bdate = $_POST['bdate'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $current_address = $_POST['current_address'];
        $perm_address = $_POST['perm_address'];
        $ffname = $_POST['ffname'];
        $flname = $_POST['flname'];
        $fmi = $_POST['fmi'];
        $contact_f = $_POST['contact_f']; 
        $mlname = $_POST['mlname'];
        $mfname = $_POST['mfname'];
        $mmi = $_POST['mmi'];
        $contact_m = $_POST['contact_m'];
        $lglc = $_POST['lglc'];
        $lsa = $_POST['lsa'];
        $lysc = $_POST['lysc'];
        $school_id = $_POST['school_id'];

        $connection = $this->openConn();
        $stmt = $connection->prepare("UPDATE tbl_eight SET 
            sy = ?, lrn = ?, lname = ?, fname = ?, mi = ?, bdate = ?, 
            sex = ?, age = ?, contact = ?, email = ?, current_address = ?, perm_address = ?, 
            ffname = ?, flname = ?, fmi = ?, contact_f = ?, mlname = ?, 
            mfname = ?, mmi = ?, contact_m = ?, lglc = ?, lsa = ?, 
            lysc = ?, school_id = ? 
            WHERE id_eight = ?");
            
        $stmt->execute([
            $sy, $lrn, $lname, $fname, $mi, $bdate, $sex, $age, $contact, $email, 
            $current_address, $perm_address, $ffname, $flname, $fmi, 
            $contact_f, $mlname, $mfname, $mmi, $contact_m, $lglc, 
            $lsa, $lysc, $school_id, $id_eight
        ]);
        
        echo "<script type='text/javascript'>alert('Grade 8 Data Updated');</script>";
        header("refresh: 0");
    }
}

public function create_nine() {
        if(isset($_POST['create_nine'])) {
            $sy = $_POST['sy'] ?? '';
            $lrn = $_POST['lrn'] ?? '';
            $course = $_POST['course'] ?? '';
            $lname = $_POST['lname'] ?? '';
            $fname = $_POST['fname'] ?? '';
            $mi = $_POST['mi'] ?? '';
            $bdate = $_POST['bdate'] ?? '';
            $sex = $_POST['sex'] ?? '';
            $age = $_POST['age'] ?? '';
            $contact = $_POST['contact'] ?? '';
            $email = $_POST['email'] ?? '';
            $current_address = $_POST['current_address'] ?? '';
            $perm_address = $_POST['perm_address'] ?? '';
            $ffname = $_POST['ffname'] ?? '';
            $flname = $_POST['flname'] ?? '';
            $fmi = $_POST['fmi'] ?? '';
            $contact_f = $_POST['contact_f'] ?? ''; 
            $mlname = $_POST['mlname'] ?? '';
            $mfname = $_POST['mfname'] ?? '';
            $mmi = $_POST['mmi'] ?? '';
            $contact_m = $_POST['contact_m'] ?? '';
            $lglc = $_POST['lglc'] ?? '';
            $lsa = $_POST['lsa'] ?? '';
            $lysc = $_POST['lysc'] ?? '';
            $school_id = $_POST['school_id'] ?? '';
            $id_resident = $_POST['id_resident'] ?? ''; 

            $connection = $this->openConn();
            
            $query = "INSERT INTO tbl_nine (
                `sy`, `lrn`, `course`, `lname`, `fname`, `mi`, `bdate`, `sex`, `age`, `contact`, `email`, 
                `current_address`, `perm_address`, `ffname`, `flname`, `fmi`, 
                `contact_f`, `mlname`, `mfname`, `mmi`, `contact_m`, `lglc`, 
                `lsa`, `lysc`, `school_id`, `id_resident`
            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            
            $stmt = $connection->prepare($query);
            
            $stmt->execute([
                $sy, $lrn, $course, $lname, $fname, $mi, $bdate, $sex, $age, $contact, $email, 
                $current_address, $perm_address, $ffname, $flname, $fmi, 
                $contact_f, $mlname, $mfname, $mmi, $contact_m, $lglc, 
                $lsa, $lysc, $school_id, $id_resident
            ]);

            echo "<script type='text/javascript'>alert('Grade 9 Enrollment Submitted Successfully'); window.location.href='grade9.php';</script>";
            exit(); 
        }
    }

    public function get_single_nine($id_resident){
        // Removed the $_GET overwrite so it uses the passed ID correctly
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_nine WHERE id_resident = ?");
        $stmt->execute([$id_resident]);
        $resident = $stmt->fetch();

        return $resident ?: false;
    }

    public function view_nine(){ 
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_nine");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete_nine(){
        if(isset($_POST['delete_nine'])) {
            $id_nine = $_POST['id_nine']; 
            $connection = $this->openConn();
            $stmt = $connection->prepare("DELETE FROM tbl_nine WHERE id_nine = ?");
            $stmt->execute([$id_nine]); 

            header("Refresh:0");
            exit();
        }
    }

    public function update_nine() {
        if (isset($_POST['update_nine'])) {
            // Get ID from the URL or hidden field
            $id_nine = $_GET['id_nine'] ?? $_POST['id_nine']; 
            
            $sy = $_POST['sy'];
            $lrn = $_POST['lrn'];
            $course = $_POST['course'];
            $lname = $_POST['lname'];
            $fname = $_POST['fname'];
            $mi = $_POST['mi'];
            $bdate = $_POST['bdate'];
            $sex = $_POST['sex'];
            $age = $_POST['age'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $current_address = $_POST['current_address'];
            $perm_address = $_POST['perm_address'];
            $ffname = $_POST['ffname'];
            $flname = $_POST['flname'];
            $fmi = $_POST['fmi'];
            $contact_f = $_POST['contact_f']; 
            $mlname = $_POST['mlname'];
            $mfname = $_POST['mfname'];
            $mmi = $_POST['mmi'];
            $contact_m = $_POST['contact_m'];
            $lglc = $_POST['lglc'];
            $lsa = $_POST['lsa'];
            $lysc = $_POST['lysc'];
            $school_id = $_POST['school_id'];

            $connection = $this->openConn();
            $stmt = $connection->prepare("UPDATE tbl_nine SET 
                sy = ?, lrn = ?, course = ?, lname = ?, fname = ?, mi = ?, bdate = ?, 
                sex = ?, age = ?, contact = ?, email = ?, current_address = ?, perm_address = ?, 
                ffname = ?, flname = ?, fmi = ?, contact_f = ?, mlname = ?, 
                mfname = ?, mmi = ?, contact_m = ?, lglc = ?, lsa = ?, 
                lysc = ?, school_id = ? 
                WHERE id_nine = ?");
                
            $stmt->execute([
                $sy, $lrn, $course, $lname, $fname, $mi, $bdate, $sex, $age, $contact, $email, 
                $current_address, $perm_address, $ffname, $flname, $fmi, 
                $contact_f, $mlname, $mfname, $mmi, $contact_m, $lglc, 
                $lsa, $lysc, $school_id, 
                $id_nine // Corrected: Used $id_nine instead of $id_eight
            ]);
            
            echo "<script type='text/javascript'>alert('Grade 9 Data Updated'); window.location.href='grade9.php';</script>";
            exit();
        }
    }

    public function create_ten() {
        if(isset($_POST['create_ten'])) {
            $sy = $_POST['sy'] ?? '';
            $lrn = $_POST['lrn'] ?? '';
            $course = $_POST['course'] ?? '';
            $lname = $_POST['lname'] ?? '';
            $fname = $_POST['fname'] ?? '';
            $mi = $_POST['mi'] ?? '';
            $bdate = $_POST['bdate'] ?? '';
            $sex = $_POST['sex'] ?? '';
            $age = $_POST['age'] ?? '';
            $contact = $_POST['contact'] ?? '';
            $email = $_POST['email'] ?? '';
            $current_address = $_POST['current_address'] ?? '';
            $perm_address = $_POST['perm_address'] ?? '';
            $ffname = $_POST['ffname'] ?? '';
            $flname = $_POST['flname'] ?? '';
            $fmi = $_POST['fmi'] ?? '';
            $contact_f = $_POST['contact_f'] ?? ''; 
            $mlname = $_POST['mlname'] ?? '';
            $mfname = $_POST['mfname'] ?? '';
            $mmi = $_POST['mmi'] ?? '';
            $contact_m = $_POST['contact_m'] ?? '';
            $lglc = $_POST['lglc'] ?? '';
            $lsa = $_POST['lsa'] ?? '';
            $lysc = $_POST['lysc'] ?? '';
            $school_id = $_POST['school_id'] ?? '';
            $id_resident = $_POST['id_resident'] ?? ''; 

            $connection = $this->openConn();
            
            $query = "INSERT INTO tbl_ten (
                `sy`, `lrn`, `course`, `lname`, `fname`, `mi`, `bdate`, `sex`, `age`, `contact`, `email`, 
                `current_address`, `perm_address`, `ffname`, `flname`, `fmi`, 
                `contact_f`, `mlname`, `mfname`, `mmi`, `contact_m`, `lglc`, 
                `lsa`, `lysc`, `school_id`, `id_resident`
            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            
            $stmt = $connection->prepare($query);
            
            $stmt->execute([
                $sy, $lrn, $course, $lname, $fname, $mi, $bdate, $sex, $age, $contact, $email, 
                $current_address, $perm_address, $ffname, $flname, $fmi, 
                $contact_f, $mlname, $mfname, $mmi, $contact_m, $lglc, 
                $lsa, $lysc, $school_id, $id_resident
            ]);

            echo "<script type='text/javascript'>alert('Grade 10 Enrollment Submitted Successfully'); window.location.href='grade10.php';</script>";
            exit(); 
        }
    }

    public function get_single_ten($id_resident){
        // Removed the $_GET overwrite so it uses the passed ID correctly
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_ten WHERE id_resident = ?");
        $stmt->execute([$id_resident]);
        $resident = $stmt->fetch();

        return $resident ?: false;
    }

    public function view_ten(){ 
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_ten");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete_ten(){
        if(isset($_POST['delete_ten'])) {
            $id_ten = $_POST['id_ten']; 
            $connection = $this->openConn();
            $stmt = $connection->prepare("DELETE FROM tbl_ten WHERE id_ten = ?");
            $stmt->execute([$id_ten]); 

            header("Refresh:0");
            exit();
        }
    }

    public function update_ten() {
        if (isset($_POST['update_ten'])) {
            // Get ID from the URL or hidden field
            $id_ten = $_GET['id_ten'] ?? $_POST['id_ten']; 
            
            $sy = $_POST['sy'];
            $lrn = $_POST['lrn'];
            $course = $_POST['course'];
            $lname = $_POST['lname'];
            $fname = $_POST['fname'];
            $mi = $_POST['mi'];
            $bdate = $_POST['bdate'];
            $sex = $_POST['sex'];
            $age = $_POST['age'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $current_address = $_POST['current_address'];
            $perm_address = $_POST['perm_address'];
            $ffname = $_POST['ffname'];
            $flname = $_POST['flname'];
            $fmi = $_POST['fmi'];
            $contact_f = $_POST['contact_f']; 
            $mlname = $_POST['mlname'];
            $mfname = $_POST['mfname'];
            $mmi = $_POST['mmi'];
            $contact_m = $_POST['contact_m'];
            $lglc = $_POST['lglc'];
            $lsa = $_POST['lsa'];
            $lysc = $_POST['lysc'];
            $school_id = $_POST['school_id'];

            $connection = $this->openConn();
            $stmt = $connection->prepare("UPDATE tbl_ten SET 
                sy = ?, lrn = ?, course = ?, lname = ?, fname = ?, mi = ?, bdate = ?, 
                sex = ?, age = ?, contact = ?, email = ?, current_address = ?, perm_address = ?, 
                ffname = ?, flname = ?, fmi = ?, contact_f = ?, mlname = ?, 
                mfname = ?, mmi = ?, contact_m = ?, lglc = ?, lsa = ?, 
                lysc = ?, school_id = ? 
                WHERE id_ten = ?");
                
            $stmt->execute([
                $sy, $lrn, $course, $lname, $fname, $mi, $bdate, $sex, $age, $contact, $email, 
                $current_address, $perm_address, $ffname, $flname, $fmi, 
                $contact_f, $mlname, $mfname, $mmi, $contact_m, $lglc, 
                $lsa, $lysc, $school_id, 
                $id_ten // Corrected: Used $id_nine instead of $id_eight
            ]);
            
            echo "<script type='text/javascript'>alert('Grade 10 Data Updated'); window.location.href='grade10.php';</script>";
            exit();
        }
    } 

    public function create_eleven() {
        if(isset($_POST['create_eleven'])) {
            $sy = $_POST['sy'] ?? '';
            $lrn = $_POST['lrn'] ?? '';
            $course = $_POST['course'] ?? '';
            $lname = $_POST['lname'] ?? '';
            $fname = $_POST['fname'] ?? '';
            $mi = $_POST['mi'] ?? '';
            $bdate = $_POST['bdate'] ?? '';
            $sex = $_POST['sex'] ?? '';
            $age = $_POST['age'] ?? '';
            $contact = $_POST['contact'] ?? '';
            $email = $_POST['email'] ?? '';
            $current_address = $_POST['current_address'] ?? '';
            $perm_address = $_POST['perm_address'] ?? '';
            $ffname = $_POST['ffname'] ?? '';
            $flname = $_POST['flname'] ?? '';
            $fmi = $_POST['fmi'] ?? '';
            $contact_f = $_POST['contact_f'] ?? ''; 
            $mlname = $_POST['mlname'] ?? '';
            $mfname = $_POST['mfname'] ?? '';
            $mmi = $_POST['mmi'] ?? '';
            $contact_m = $_POST['contact_m'] ?? '';
            $lglc = $_POST['lglc'] ?? '';
            $lsa = $_POST['lsa'] ?? '';
            $lysc = $_POST['lysc'] ?? '';
            $school_id = $_POST['school_id'] ?? '';
            $id_resident = $_POST['id_resident'] ?? ''; 

            $connection = $this->openConn();
            
            $query = "INSERT INTO tbl_eleven (
                `sy`, `lrn`, `course`, `lname`, `fname`, `mi`, `bdate`, `sex`, `age`, `contact`, `email`, 
                `current_address`, `perm_address`, `ffname`, `flname`, `fmi`, 
                `contact_f`, `mlname`, `mfname`, `mmi`, `contact_m`, `lglc`, 
                `lsa`, `lysc`, `school_id`, `id_resident`
            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            
            $stmt = $connection->prepare($query);
            
            $stmt->execute([
                $sy, $lrn, $course, $lname, $fname, $mi, $bdate, $sex, $age, $contact, $email, 
                $current_address, $perm_address, $ffname, $flname, $fmi, 
                $contact_f, $mlname, $mfname, $mmi, $contact_m, $lglc, 
                $lsa, $lysc, $school_id, $id_resident
            ]);

            echo "<script type='text/javascript'>alert('Grade 11 Enrollment Submitted Successfully'); window.location.href='grade11.php';</script>";
            exit(); 
        }
    }

    public function get_single_eleven($id_resident){
        // Removed the $_GET overwrite so it uses the passed ID correctly
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_eleven WHERE id_resident = ?");
        $stmt->execute([$id_resident]);
        $resident = $stmt->fetch();

        return $resident ?: false;
    }
    public function view_eleven(){ 
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_eleven");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete_eleven(){
        if(isset($_POST['delete_eleven'])) {
            $id_eleven = $_POST['id_eleven']; 
            $connection = $this->openConn();
            $stmt = $connection->prepare("DELETE FROM tbl_eleven WHERE id_eleven = ?");
            $stmt->execute([$id_eleven]); 

            header("Refresh:0");
            exit();
        }
    }

    public function update_eleven() {
        if (isset($_POST['update_eleven'])) {
            // Get ID from the URL or hidden field
            $id_eleven = $_GET['id_eleven'] ?? $_POST['id_eleven']; 
            
            $sy = $_POST['sy'];
            $lrn = $_POST['lrn'];
            $course = $_POST['course'];
            $lname = $_POST['lname'];
            $fname = $_POST['fname'];
            $mi = $_POST['mi'];
            $bdate = $_POST['bdate'];
            $sex = $_POST['sex'];
            $age = $_POST['age'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $current_address = $_POST['current_address'];
            $perm_address = $_POST['perm_address'];
            $ffname = $_POST['ffname'];
            $flname = $_POST['flname'];
            $fmi = $_POST['fmi'];
            $contact_f = $_POST['contact_f']; 
            $mlname = $_POST['mlname'];
            $mfname = $_POST['mfname'];
            $mmi = $_POST['mmi'];
            $contact_m = $_POST['contact_m'];
            $lglc = $_POST['lglc'];
            $lsa = $_POST['lsa'];
            $lysc = $_POST['lysc'];
            $school_id = $_POST['school_id'];

            $connection = $this->openConn();
            $stmt = $connection->prepare("UPDATE tbl_eleven SET 
                sy = ?, lrn = ?, course = ?, lname = ?, fname = ?, mi = ?, bdate = ?, 
                sex = ?, age = ?, contact = ?, email = ?, current_address = ?, perm_address = ?, 
                ffname = ?, flname = ?, fmi = ?, contact_f = ?, mlname = ?, 
                mfname = ?, mmi = ?, contact_m = ?, lglc = ?, lsa = ?, 
                lysc = ?, school_id = ? 
                WHERE id_eleven = ?");
                
            $stmt->execute([
                $sy, $lrn, $course, $lname, $fname, $mi, $bdate, $sex, $age, $contact, $email, 
                $current_address, $perm_address, $ffname, $flname, $fmi, 
                $contact_f, $mlname, $mfname, $mmi, $contact_m, $lglc, 
                $lsa, $lysc, $school_id, 
                $id_eleven // Corrected: Used $id_nine instead of $id_eight
            ]);
            
            echo "<script type='text/javascript'>alert('Grade 11 Data Updated'); window.location.href='grade11.php';</script>";
            exit();
        }
    }

     public function create_twelve() {
        if(isset($_POST['create_twelve'])) {
            $sy = $_POST['sy'] ?? '';
            $lrn = $_POST['lrn'] ?? '';
            $course = $_POST['course'] ?? '';
            $lname = $_POST['lname'] ?? '';
            $fname = $_POST['fname'] ?? '';
            $mi = $_POST['mi'] ?? '';
            $bdate = $_POST['bdate'] ?? '';
            $sex = $_POST['sex'] ?? '';
            $age = $_POST['age'] ?? '';
            $contact = $_POST['contact'] ?? '';
            $email = $_POST['email'] ?? '';
            $current_address = $_POST['current_address'] ?? '';
            $perm_address = $_POST['perm_address'] ?? '';
            $ffname = $_POST['ffname'] ?? '';
            $flname = $_POST['flname'] ?? '';
            $fmi = $_POST['fmi'] ?? '';
            $contact_f = $_POST['contact_f'] ?? ''; 
            $mlname = $_POST['mlname'] ?? '';
            $mfname = $_POST['mfname'] ?? '';
            $mmi = $_POST['mmi'] ?? '';
            $contact_m = $_POST['contact_m'] ?? '';
            $lglc = $_POST['lglc'] ?? '';
            $lsa = $_POST['lsa'] ?? '';
            $lysc = $_POST['lysc'] ?? '';
            $school_id = $_POST['school_id'] ?? '';
            $id_resident = $_POST['id_resident'] ?? ''; 

            $connection = $this->openConn();
            
            $query = "INSERT INTO tbl_twelve (
                `sy`, `lrn`, `course`, `lname`, `fname`, `mi`, `bdate`, `sex`, `age`, `contact`, `email`, 
                `current_address`, `perm_address`, `ffname`, `flname`, `fmi`, 
                `contact_f`, `mlname`, `mfname`, `mmi`, `contact_m`, `lglc`, 
                `lsa`, `lysc`, `school_id`, `id_resident`
            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            
            $stmt = $connection->prepare($query);
            
            $stmt->execute([
                $sy, $lrn, $course, $lname, $fname, $mi, $bdate, $sex, $age, $contact, $email, 
                $current_address, $perm_address, $ffname, $flname, $fmi, 
                $contact_f, $mlname, $mfname, $mmi, $contact_m, $lglc, 
                $lsa, $lysc, $school_id, $id_resident
            ]);

            echo "<script type='text/javascript'>alert('Grade 12 Enrollment Submitted Successfully'); window.location.href='grade12.php';</script>";
            exit(); 
        }
    }

    public function get_single_twelve($id_resident){
        // Removed the $_GET overwrite so it uses the passed ID correctly
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_twelve WHERE id_resident = ?");
        $stmt->execute([$id_resident]);
        $resident = $stmt->fetch();

        return $resident ?: false;
    }

    public function view_twelve(){ 
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_twelve");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete_twelve(){
        if(isset($_POST['delete_twelve'])) {
            $id_twelve = $_POST['id_twelve']; 
            $connection = $this->openConn();
            $stmt = $connection->prepare("DELETE FROM tbl_twelve WHERE id_twelve = ?");
            $stmt->execute([$id_twelve]); 

            header("Refresh:0");
            exit();
        }
    }

    public function update_twelve() {
        if (isset($_POST['update_twelve'])) {
            // Get ID from the URL or hidden field
            $id_twelve = $_GET['id_twelve'] ?? $_POST['id_twelve']; 
            
            $sy = $_POST['sy'];
            $lrn = $_POST['lrn'];
            $course = $_POST['course'];
            $lname = $_POST['lname'];
            $fname = $_POST['fname'];
            $mi = $_POST['mi'];
            $bdate = $_POST['bdate'];
            $sex = $_POST['sex'];
            $age = $_POST['age'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $current_address = $_POST['current_address'];
            $perm_address = $_POST['perm_address'];
            $ffname = $_POST['ffname'];
            $flname = $_POST['flname'];
            $fmi = $_POST['fmi'];
            $contact_f = $_POST['contact_f']; 
            $mlname = $_POST['mlname'];
            $mfname = $_POST['mfname'];
            $mmi = $_POST['mmi'];
            $contact_m = $_POST['contact_m'];
            $lglc = $_POST['lglc'];
            $lsa = $_POST['lsa'];
            $lysc = $_POST['lysc'];
            $school_id = $_POST['school_id'];

            $connection = $this->openConn();
            $stmt = $connection->prepare("UPDATE tbl_twelve SET 
                sy = ?, lrn = ?, course = ?, lname = ?, fname = ?, mi = ?, bdate = ?, 
                sex = ?, age = ?, contact = ?, email = ?, current_address = ?, perm_address = ?, 
                ffname = ?, flname = ?, fmi = ?, contact_f = ?, mlname = ?, 
                mfname = ?, mmi = ?, contact_m = ?, lglc = ?, lsa = ?, 
                lysc = ?, school_id = ? 
                WHERE id_twelve = ?");
                
            $stmt->execute([
                $sy, $lrn, $course, $lname, $fname, $mi, $bdate, $sex, $age, $contact, $email, 
                $current_address, $perm_address, $ffname, $flname, $fmi, 
                $contact_f, $mlname, $mfname, $mmi, $contact_m, $lglc, 
                $lsa, $lysc, $school_id, 
                $id_twelve // Corrected: Used $id_nine instead of $id_eight
            ]);
            
            echo "<script type='text/javascript'>alert('Grade 12 Data Updated'); window.location.href='grade12.php';</script>";
            exit();
        }
    }
    
    
}
$eusebia = new EUSEBIAClass(); //variable to call outside of its class

?>
