<?php 
    
    error_reporting(E_ALL ^ E_WARNING);
    ini_set('display_errors',0);
    require('classes/resident.class.php');
    $userdetails = $eusebia->get_userdata();
    $eusebia->validate_admin();
    $eusebia->delete_twelve();
    $view = $eusebia->view_twelve();
    $id_resident = $_GET['id_resident'];
    $resident = $residenteusebia->get_single_twelve($id_resident);
    $stem_count = $residenteusebia->count_by_grade('tbl_twelve', 'course', 'STEM');
    $abm_count = $residenteusebia->count_by_grade('tbl_twelve', 'course', 'ABM');
    $gas_count  = $residenteusebia->count_by_grade('tbl_twelve', 'course', 'GAS');
    $ict_count  = $residenteusebia->count_by_grade('tbl_twelve', 'course', 'TVL-ICT');
    $he_count   = $residenteusebia->count_by_grade('tbl_twelve', 'course', 'TVL-HE');

   
?>
<?php 
    include('dashboard_sidebar_start.php');
?>

<style>
    .input-icons i {
        position: absolute;
    }
        
    .input-icons {
        width: 30%;
        margin-bottom: 10px;
        margin-left: 34%;
    }
        
    .icon {
        padding: 10px;
        min-width: 40px;
    }
    .form-control{
        text-align: center;
    }
</style>

<div class="container-fluid">

    <div class="row"> 
        <div class="col text-center"> 
            <h1> GRADE 12 ENROLLEES</h1>
        </div>
    </div>
<div class="col-12 mb-4">
    <div class="row">
        <?php 
        $course_cards = [
            ['label' => 'STEM',    'count' => $stem_count, 'color' => 'primary', 'icon' => 'microscope', 'link' => 'stemtwelve.php?strand=stem'],
            ['label' => 'ABM',     'count' => $abm_count,  'color' => 'success', 'icon' => 'calculator', 'link' => 'abmtwelve.php?strand=abm'],
            ['label' => 'GAS',     'count' => $gas_count,  'color' => 'warning', 'icon' => 'book',       'link' => 'gastwelve.php?strand=gas'],
            ['label' => 'TVL-ICT', 'count' => $ict_count,  'color' => 'info',    'icon' => 'laptop-code','link' => 'icttwelve.php?strand=ict'],
            ['label' => 'TVL-HE',  'count' => $he_count,   'color' => 'danger',  'icon' => 'utensils',   'link' => 'hetwelve.php?strand=he']
        ];

        foreach ($course_cards as $card): 
        ?>
        <div class="col-xl col-md-6 mb-4">
            <a href="<?= $card['link'] ?>" class="text-decoration-none">
                <div class="card border-left-<?= $card['color'] ?> shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-<?= $card['color'] ?> text-uppercase mb-1">
                                    <?= $card['label'] ?>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= number_format($card['count']) ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-<?= $card['icon'] ?> fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>
    
    <br>

    <div class="row">
        <div class="col">
            <form method="POST">
            <div class="input-icons" >
                <i class="fa fa-search icon"></i>
                <input type="search" class="form-control" name="keyword" value="" required="" style="border-radius: 30px;"/>
            </div>
                <button class="btn btn-success" name="search_twelve" style="width: 90px; font-size: 17px; border-radius:30px; margin-left:41.5%;">
                    Search
                </button>
                <a href="admn_twelve.php" class="btn btn-info" style="width: 90px; font-size: 17px; border-radius:30px;">Reload</a>
            </form>
            <br>
        </div>
    </div>

    <br>

    <div class="row"> 
        <div class="col-md-12"> 
            <?php 
                // Updated include to match the new naming convention
                include('admn_twelve_search.php');
            ?>
        </div>
    </div>
    
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js" integrity="sha512-/HL24m2nmyI2+ccX+dSHphAHqLw60Oj5sK8jf59VWtFWZi9vx7jzoxbZmcBeeTeCUc7z1mTs3LfyXGuBU32t+w==" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
<link href="../BarangaySystem/customcss/regiformstyle.css" rel="stylesheet" type="text/css">
<link href="../BarangaySystem/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"> 
