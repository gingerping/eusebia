<?php
    error_reporting(E_ALL ^ E_WARNING);
    include('classes/staff.class.php');
    include('classes/resident.class.php');

    $residenteusebia = new ResidentClass();

    
    // Fetching all 6 grades
   $g7  = $residenteusebia->count_by_grade('tbl_seven');
    $g8  = $residenteusebia->count_by_grade('tbl_eight');
    $g9  = $residenteusebia->count_by_grade('tbl_nine');
    $g10 = $residenteusebia->count_by_grade('tbl_ten');
    
    // Fetch SHS Counts
    $g11 = $residenteusebia->count_by_grade('tbl_eleven');
    $g12 = $residenteusebia->count_by_grade('tbl_twelve');

    $stem = $residenteusebia->count_by_grade('tbl_eleven', 'course', 'STEM') + 
            $residenteusebia->count_by_grade('tbl_twelve', 'course', 'STEM');

    // ABM
    $abm  = $residenteusebia->count_by_grade('tbl_eleven', 'course', 'ABM') + 
            $residenteusebia->count_by_grade('tbl_twelve', 'course', 'ABM');

    // GAS
    $gas  = $residenteusebia->count_by_grade('tbl_eleven', 'course', 'GAS') + 
            $residenteusebia->count_by_grade('tbl_twelve', 'course', 'GAS');

    // TVL-ICT
    $ict  = $residenteusebia->count_by_grade('tbl_eleven', 'course', 'TVL-ICT') + 
            $residenteusebia->count_by_grade('tbl_twelve', 'course', 'TVL-ICT');

    // TVL-HE
    $he   = $residenteusebia->count_by_grade('tbl_eleven', 'course', 'TVL-HE') + 
            $residenteusebia->count_by_grade('tbl_twelve', 'course', 'TVL-HE');

    $stem_count = $residenteusebia->count_by_grade('tbl_eleven', 'course', 'STEM') + 
                  $residenteusebia->count_by_grade('tbl_twelve', 'course', 'STEM');
    $abm_count = $residenteusebia->count_by_grade('tbl_eleven', 'course', 'ABM') + 
                  $residenteusebia->count_by_grade('tbl_twelve', 'course', 'ABM');

    $gas_count  = $residenteusebia->count_by_grade('tbl_eleven', 'course', 'GAS') + 
                  $residenteusebia->count_by_grade('tbl_twelve', 'course', 'GAS');

    $ict_count  = $residenteusebia->count_by_grade('tbl_eleven', 'course', 'TVL-ICT') + 
                  $residenteusebia->count_by_grade('tbl_twelve', 'course', 'TVL-ICT');

    $he_count   = $residenteusebia->count_by_grade('tbl_eleven', 'course', 'TVL-HE') + 
                  $residenteusebia->count_by_grade('tbl_twelve', 'course', 'TVL-HE');

    // Calculate Totals for the Cards
    $total_jhs = $g7 + $g8 + $g9 + $g10;
    $total_shs = $g11 + $g12;
    $grand_total = $total_jhs + $total_shs;

    $total_enrollees_junior = $g7 + $g8 + $g9 + $g10;
    $total_enrollees_senior = $g11 + $g12;

?>

<style> 
.card-upper-space {
    margin-top: 35px;
}

.card-row-gap {
    margin-top: 3em;
}
.card:hover {
    transform: translateY(-3px);
    transition: all 0.2s ease-in-out;
    cursor: pointer;
}
</style>


<?php 
    include('dashboard_sidebar_start.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Junior Enrollees</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($total_jhs) ?></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-users fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Senior Enrollees</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($total_shs) ?></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-user-graduate fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">JHS Monitoring (G7-G10)</h6>
                </div>
                <div class="card-body"><canvas id="jhsChart" style="height:250px;"></canvas></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-success">SHS Monitoring (G11-G12)</h6>
                </div>
                <div class="card-body"><canvas id="shsChart" style="height:250px;"></canvas></div>
            </div>
        </div>
    </div>
    <br>

    <h1>Senior High Course Monitoring</h1>
    <BR></BR>
    <div class="row">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Enrollment Distribution by Strand</h6>
            </div>
            <div class="card-body">
                <div class="chart-area" style="height: 420px;">
                    <canvas id="strandChart"></canvas>
                </div>
            </div>
        </div>
    </div>

   <div class="col-xl-4 col-lg-5">

        <div class="row">

            <?php

            // Define your data in an array for a cleaner loop

            $course_cards = [

                ['label' => 'STEM',    'count' => $stem_count, 'color' => 'primary', 'icon' => 'microscope'],

                ['label' => 'ABM',     'count' => $abm_count,  'color' => 'success', 'icon' => 'calculator'],

                ['label' => 'GAS',     'count' => $gas_count,  'color' => 'warning', 'icon' => 'book'],

                ['label' => 'TVL-ICT', 'count' => $ict_count,  'color' => 'info',    'icon' => 'laptop-code'],

                ['label' => 'TVL-HE',  'count' => $he_count,   'color' => 'danger',  'icon' => 'utensils']

            ];



            foreach ($course_cards as $card):

            ?>

            <div class="col-12 mb-4">

                <div class="card border-left-<?= $card['color'] ?> shadow py-2">

                    <div class="card-body py-2">

                        <div class="row no-gutters align-items-center">

                            <div class="col mr-2">

                                <div class="text-xs font-weight-bold text-<?= $card['color'] ?> text-uppercase mb-1">

                                    <?= $card['label'] ?> Students

                                </div>

                                <div class="h6 mb-0 font-weight-bold text-gray-800">

                                    <?= number_format($card['count']) ?>

                                </div>

                            </div>

                            <div class="col-auto">

                                <i class="fas fa-<?= $card['icon'] ?> fa-lg text-gray-300"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <?php endforeach; ?>

        </div>

    </div>


</div>
</div
<br>

<br>
<br>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// --- JHS CHART ---
const ctxJHS = document.getElementById('jhsChart').getContext('2d');
new Chart(ctxJHS, {
    type: 'bar',
    data: {
        labels: ['Grade 7', 'Grade 8', 'Grade 9', 'Grade 10'],
        datasets: [{
            label: 'Students',
            data: [<?= $g7 ?>, <?= $g8 ?>, <?= $g9 ?>, <?= $g10 ?>],
            backgroundColor: [
                '#4e73df', // STEM - Blue
                '#1cc88a', // ABM - Green
                '#f6c23e', // GAS - Yellow
                '#36b9cc', // ICT - Cyan
                '#e74a3b'  // HE - Red
            ],
            borderRadius: 5
        }]
    },
    options: {
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
    }
});

// --- SHS CHART ---
const ctxSHS = document.getElementById('shsChart').getContext('2d');
new Chart(ctxSHS, {
    type: 'bar',
    data: {
        labels: ['Grade 11', 'Grade 12'],
        datasets: [{
            label: 'Students',
            data: [<?= $g11 ?>, <?= $g12 ?>],
            backgroundColor: [
                '#36b9cc', // ICT - Cyan
                '#e74a3b'  // HE - Red
            ],
            borderRadius: 5
        }]
    },
    options: {
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
    }
});
</script>
<script>
const ctxStrand = document.getElementById('strandChart').getContext('2d');
new Chart(ctxStrand, {
    type: 'bar',
    data: {
        labels: ['STEM', 'ABM', 'GAS', 'TVL-ICT', 'TVL-HE'], 
        datasets: [{
            label: 'Total Students',
            data: [
                <?= (int)$stem ?>, 
                <?= (int)$abm ?>, 
                <?= (int)$gas ?>, 
                <?= (int)$ict ?>, 
                <?= (int)$he ?>
            ], 
            backgroundColor: [
                '#4e73df', // STEM - Blue
                '#1cc88a', // ABM - Green
                '#f6c23e', // GAS - Yellow
                '#36b9cc', // ICT - Cyan
                '#e74a3b'  // HE - Red
            ],
            borderRadius: 5
        }]
    },
    options: {
        indexAxis: 'y', 
        plugins: {
            legend: { display: false }
        },
        scales: {
            x: { 
                beginAtZero: true, 
                ticks: { stepSize: 1 } 
            }
        },
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js" integrity="sha512-/HL24m2nmyI2+ccX+dSHphAHqLw60Oj5sK8jf59VWtFWZi9vx7jzoxbZmcBeeTeCUc7z1mTs3LfyXGuBU32t+w==" crossorigin="anonymous"></script>
<!-- responsive tags for screen compatibility -->
<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
<!-- custom css --> 
<link href="../BarangaySystem/customcss/regiformstyle.css" rel="stylesheet" type="text/css">
<!-- bootstrap css --> 
<link href="../BarangaySystem/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"> 
<!-- fontawesome icons -->
<script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
<script src="../BarangaySystem/bootstrap/js/bootstrap.bundle.js" type="text/javascript"> </script>
                
<?php 
    include('dashboard_sidebar_end.php');
?>