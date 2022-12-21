<?php
include_once "./db/base.php";

$surveys=all("survey_subjects");
foreach ($surveys as $survey) {
?>
<h1>列表</h1>
<div class="container">

    <div class="card bg-dark text-white">
        <div class="card-body">
            <h4 class="card-title"><?=$survey['subject']?></h4>
            <p class="card-text">Some example text. Some example text.</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
        
        <?php
}
?>
</div>