<div class="mx-auto w-50 mt-3">
    <?php
    if($_GET['do']=='survey_result'){
        echo "<h1>投票結果列表</h1>";
    }else{
        echo "<h1>投票列表</h1>";
    }
    ?>
    <?php
    include_once "./db/base.php";

    $surveys = all("survey_subjects");
    foreach ($surveys as $survey) {
        $str = "<div class='card bg-dark text-white mt-5'>
        <div class='card-body'>
            <h4 class='card-title'> {$survey['subject']} </h4>
            <p class='card-text'> {$survey['content']} </p>
            <p class='card-text'>參與次數 :  {$survey['vote']} </p>
        </div>
        </a>
    </div>";
        if ($_GET['do'] == 'survey') {
            if ($survey['active'] == 1) {
                echo "<a href='./center.php?do=survey_vote&id={$survey['id']}' >";
                echo $str;
            }
        } else {
            if ($survey['active'] == 0 && $survey['vote'] != 0) {
                echo "<a href='./center.php?do=survey_result&id={$survey['id']}' >";
                echo $str;
            }
        }
    };
    ?>
</div>