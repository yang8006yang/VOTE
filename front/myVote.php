<div class="mx-auto w-50 mt-3">
    <h1>我的投票</h1>
    <?php
    include_once "./db/base.php";

    $user = $_SESSION['login']['id'];
    $myVotes = $Log->all(['user' => $user]);

    foreach ($myVotes as $myVote) {
        $surveys[] = $Subjec->find(['id' => $myVote['subject_id']]);
        $opts[] = $Option->find(['id' => $myVote['option_id']]);
    }
    
    foreach ($surveys as $key => $survey) {
        if(is_array($survey)){
    ?>
        <a href="./center.php?do=survey_result&id=<?= $survey['id'] ?>">
            <div class="card bg-dark text-white mt-5">
                <div class="card-body">
                    <h4 class="card-title"><?=$survey['subject'] ?></h4>
                    <p class="card-text"><?= $survey['content'] ?></p>
                    <p class="card-text">參與次數 : <?= $survey['vote'] ?></p>
                    <?php
                    foreach ($opts as $opt) {
                        if (is_array($opt) && $opt['subject_id'] == $survey['id'])
                            echo "<p class='card-text'>你的選擇 : {$opt['opt']}</p>";
                    }
                    ?>
                </div>
            </div>
        </a>

    <?php
        }
    };
    ?>
</div>