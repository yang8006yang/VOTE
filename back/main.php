<h1>為你推薦</h1>
<?php
$UpSurvey=q("SELECT * FROM `survey_subjects` WHERE `id` IN('1','5','10')");
foreach ($UpSurvey as $survey) {
?>
<div class="card bg-dark text-white mt-5">
        <div class="card-body">
            <h4 class="card-title"><?= $survey['subject'] ?></h4>
            <p class="card-text"><?= $survey['content'] ?></p>
            <p class="card-text">參與次數 : <?= $survey['vote'] ?></p>
        </div>
    </div>
    <?php
}
?>
<h1>進行中的投票</h1>

<?php
$surveys=all('survey_subjects',['active'=>1]);
foreach ($surveys as $survey) {
    ?>
    <div class="card bg-dark text-white mt-5">
        <div class="card-body">
            <h4 class="card-title"><?= $survey['subject'] ?></h4>
            <p class="card-text"><?= $survey['content'] ?></p>
            <p class="card-text">參與次數 : <?= $survey['vote'] ?></p>
        </div>
    </div>
    
    <?php
}
?>
<h1>來看看結果吧</h1>
<?php
$closeSurveys=q("SELECT * FROM `survey_subjects` WHERE `vote`>'1' LIMIT 5");
$surveys=all('survey_subjects',['active'=>0]);
foreach ($closeSurveys as $survey) {
    ?>
    <div class="card bg-dark text-white mt-5">
        <div class="card-body">
            <h4 class="card-title"><?= $survey['subject'] ?></h4>
            <p class="card-text"><?= $survey['content'] ?></p>
            <p class="card-text">參與次數 : <?= $survey['vote'] ?></p>
        </div>
    </div>
    
    <?php
}
?>
</div>