<?php
include "../db/base.php";

$subject=['subject'=>$_POST['subject'],
            'type'=>$_POST['type'],
            'vote'=>0,
            'active'=>0
];

$subject_id=find('survey_subjects',['subject'=>$_POST['subject']])['id'];
echo $subject_id;
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
insert('survey_subjects',$subject);
?>