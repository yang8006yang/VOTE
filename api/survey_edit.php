<?php
include_once "../db/base.php";

$Subject->save('survey_subjects',
[
    'id'=>$_POST['id'],
    'subject'=>$_POST['subject'],
    'type'=>$_POST['type'],
    'content'=>$_POST['content'],
    'chart'=>$_POST['chart']
]);
$sql="SELECT `id` FROM `survey_options` WHERE `subject_id`={$_POST['id']}";
$opt_id=$pdo->query($sql)->fetchALL(PDO::FETCH_COLUMN);

// echo "<pre>";
// print_r($opt_id);
// echo "</pre>";
// echo "<pre>";
// print_r($_POST['opt_id']);
// echo "</pre>";
foreach($opt_id as $idx=>$id){
    $Option->save(['id'=>$id,'opt'=>$_POST['opt'][$idx]]);
    if(!in_array($id,$_POST['opt_id'])){
        $Option->del($id);
    }
}

if(isset($_POST['optn'])){
    foreach ($_POST['optn'] as $opt) {
        if($opt != ''){
            $tmp=[
                'subject_id'=>$_POST['id'],
                'opt'=>$opt,
                'vote'=>0
            ];
            $Option->save($tmp);
        }
    }
};


to("../center.php?do=survey");