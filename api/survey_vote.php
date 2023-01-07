<?php
include_once "../db/base.php";

// if()

$id=$_GET['id'];
$opt=find('survey_options',$id);
$vote=$opt['vote']+1;
$subject_id=$opt['subject_id'];
$sub=find('survey_subjects',$subject_id);
$vote=$sub['vote']+1;
$chk=find('survey_log',['user'=>$_SESSION['login']['id'],'subject_id'=>$sub['id']]);
if(empty($chk)){
    update('survey_options',['vote'=>$vote],$id);
    update('survey_subjects',['vote'=>$vote],$sub['id']);
    
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
insert("survey_log",$log);
to("../center.php?do=survey_result&id={$sub['id']}");
}else{
    to("../center.php?do=survey_result&id={$sub['id']}&error=voted");
}
?>