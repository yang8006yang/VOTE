<?php
include "../db/base.php";
// ==============主題資料準備並送入SQL==============
$subject=['subject'=>$_POST['subject'],
'type'=>$_POST['type'],
'content'=>$_POST['content'],
'vote'=>0,
'active'=>0
];
insert('survey_subjects',$subject);

// ==============取得主題ID給選項用==============
$subject_id=find('survey_subjects',['subject'=>$_POST['subject']])['id'];

// ==============準備選項資料並送入SQL==============
if(isset($_POST['opt'])){
    foreach ($_POST['opt'] as $opt) {
        if($opt!=''){
            $tmp=[
                'opt'=>$opt,
                'subject_id'=>$subject_id,
                'vote'=>0];
                insert('survey_options',$tmp);
        }
    }
}
// to("../center.php?do=survey");
header("location:../center.php?do=survey");
?>
