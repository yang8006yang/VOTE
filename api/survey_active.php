<?php
include_once "../db/base.php";

$id=$_GET['id'];
$subject=find('survey_subjects',$id);
$subject['active']=($subject['active']+1)%2;
update("survey_subjects",$subject,$id);
to('../center.php?do=survey');