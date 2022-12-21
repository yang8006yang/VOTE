<?php
include_once "../db/base.php";

del("survey_options",['subject_id'=>$_GET['id']]);
del('survey_subjects',$_GET['id']);

to("../center.php?do=survey");
