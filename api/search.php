<?php
include_once "../db/base.php";

$keyword=$_POST['keyword'];
$keywords=explode(" ",$keywords);

$sqlS = '';
$sqlV = '';
for($i=0;$i<count($keywords);$i++){
    $keyword = $keywords[$i];
    $sql = "(SELECT * FROM `songs` WHERE CONCAT(song_name,description,singer) LIKE '%$keyword%') UNION";
}
for($i=0;$i<count($keywords);$i++){
    $keyword = $keywords[$i];
    $sqlV = "(SELECT * FROM `survey_subjects` WHERE CONCAT(subject,type,content) LIKE '%$keyword%') UNION";
}
$song=q($sqlS);
$vote=q($sqlV);



