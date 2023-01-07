<?php
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if(isset($_GET['error']) && $_GET['error']=='voted'){
    alert('你投過票啦!!!');
}
    include_once "./db/base.php";

if(isset($_GET['id'])){
    $subject=all('survey_subjects',['id'=>$_GET['id']]);
    $opts=all('survey_options',['subject_id'=>$_GET['id']]);
    // echo "<pre>";
    // var_dump($opts);
    // echo "</pre>";
    ?>
    
    <h3><?=$subject[0]['subject'];?></h3>
    <div><?=$subject[0]['content'];?></div>
    <table>
        
        <?php
    foreach($opts as $opt){
        echo "<tr>";
        echo "<td>{$opt['opt']}</td>";
        echo "<td>結果</td>";
        echo "</tr>";
    }
}else{
    include_once "./front/survey.php";
}
    ?>
    </table>
    
