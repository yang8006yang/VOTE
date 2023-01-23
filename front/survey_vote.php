<?php
    include_once "./db/base.php";
$subject=all('survey_subjects',['id'=>$_GET['id']]);
$opts=all('survey_options',['subject_id'=>$_GET['id']]);
// echo "<pre>";
// var_dump($opts);
// echo "</pre>";
?>
    <div class="m-3 fs-4">
        <a href="#" id="goBack"><i class="fa-solid fa-less-than"></i></a> 
    </div>

<div class="text-center mt-3">

    <h3><?=$subject[0]['subject'];?></h3>
    <div><?=$subject[0]['content'];?></div>
    <table class="w-75 mx-auto mt-5">
        
        <?php
foreach($opts as $opt){
    echo "<tr class='p-5 t-bottom-white'>";
    echo "<td width='20%' ></td>";
    echo "<td width='50%'>{$opt['opt']}</td>";
    echo "<td width='10%'><a href='./api/survey_vote.php?id={$opt['id']}'>投票<i class='fa-solid fa-circle-check'></i></a></td>";
    echo "<td width='20%'></td>";
    echo "</tr>";
}
?>
</table>
</div>
