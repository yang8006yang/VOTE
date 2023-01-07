<?php
    include_once "./db/base.php";
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
    echo "<td><a href='./api/survey_vote.php?id={$opt['id']}'>投票</a></td>";
    echo "</tr>";
}
?>
</table>
