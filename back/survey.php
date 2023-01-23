<?php
if(isset($_GET['success']) && $_GET['success']=='1'){
    alert('刪除成功!');
}
?>
<div class="mx-auto w-50 mt-3">
    <h1>投票列表</h1>
    <?php
    include_once "./db/base.php";

    $surveys = all("survey_subjects");
    
    foreach ($surveys as $survey) {
        $activeText = ($survey['active'] == 1) ? "關閉" : "啟用";
    ?>
        <div class="card bg-dark text-white mt-5">
            <div class="card-body">
                <h4 class="card-title"><?= $survey['subject'] ?></h4>
                <p class="card-text"><?= $survey['content'] ?></p>
                <p class="card-text">參與次數 : <?= $survey['vote'] ?></p>
                <a href="./api/active.php?id=<?= $survey['id'] ?>&table=survey" class="card-link"><?= $activeText ?></a>
                <a href="./center.php?do=survey_edit&id=<?= $survey['id'] ?>" class="card-link">編輯</a>
                <a href="./api/del.php?id=<?= $survey['id'] ?>&table=survey" class="card-link">刪除</a>
            </div>
        </div>

    <?php
    }
    ?>
</div>