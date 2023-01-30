<?php
include_once "./db/base.php";

if (isset($_GET['error']) && $_GET['error'] == 'voted') {
    alert('你投過票啦!!!');
}

if (isset($_GET['id'])) {
    $subject = $Subject->all(['id' => $_GET['id']]);
    $opts = $Option->all(['subject_id' => $_GET['id']]);
    // echo "<pre>";
    // var_dump($opts);
    // echo "</pre>";
?>
    <div class="m-3 fs-4">
        <a href="#" id="goBack"><i class="fa-solid fa-less-than"></i></a> 
    </div>
    <div class="mx-auto text-center ">
        <h3 id="title"><?= $subject[0]['subject']; ?></h3>
        <div><?= $subject[0]['content']; ?></div>

        <canvas id="myChart" style="width:100%;max-width:1200px;margin:0 auto"></canvas>

        <table class="mx-auto mt-5 w-50 ">

        <?php
        $xValues = [];
        $yValues = [];
        $total = $subject[0]['vote'];
        foreach ($opts as $opt) {
            $percent = ($opt['vote'] / $total) * 100;
            echo "<tr class='p-5 t-bottom-white' >";
            echo "<td width='70%'>{$opt['opt']}</td>";
            echo "<td width='30%'>{$opt['vote']} 票 ( $percent %)</td>";
            echo "</tr>";
            array_push($xValues, $opt['opt']);
            array_push($yValues, $opt['vote']);
        }
    } else {
        include_once "./front/survey.php";
    }
        ?>
        </table>
    </div>
<?php
include_once "./js/chart.php";
?>
