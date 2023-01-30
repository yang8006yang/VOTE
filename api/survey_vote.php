<?php
include_once "../db/base.php";

// if()

$id=$_GET['id'];
$opt=$Option->find($id);
$vote=$opt['vote']+1;
$subject_id=$opt['subject_id'];
$sub=$Subject->find($subject_id);
$voteSub=$sub['vote']+1;

$chk=$Log->find(['user'=>$_SESSION['login']['id'],'subject_id'=>$sub['id']]);
if(empty($chk)){
    $Option->save(['vote'=>$vote]);
    $Subject->save(['vote'=>$voteSub]);
    
    //偵測使用者端IP,並取得IP
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    $log=[
        'user'=>(isset($_SESSION['login']))?$_SESSION['login']['id']:0,
        'ip'=>$ip,
        'subject_id'=>$sub['id'],
    'option_id'=>$opt['id']
];
$Log->save($log);
to("../center.php?do=survey_result&id={$sub['id']}");
}else{
    to("../center.php?do=survey_result&id={$sub['id']}&error=voted");
}
?>