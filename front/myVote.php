<?php
    include_once "./db/base.php";

    $user=$_SESSION['login']['id'];
    $myVotes=all('survey_log',['user'=>$user]);

    
    foreach ($myVotes as $myVote) {
        $surveys[] = find('survey_subjects',['id'=>$myVote['subject_id']]);
    }
    
    foreach ($surveys as $key=>$survey) {
        // dd($survey);
        ?>
            <!-- <a href="./center.php?do=survey_vote&id=<?= $survey['id'] ?>" > -->
        <div class="card bg-dark text-white mt-5">
            <div class="card-body">
                <h4 class="card-title"><?= $survey['subject'] ?></h4>
                <p class="card-text"><?= $survey['content'] ?></p>
                <p class="card-text">參與次數 : <?= $survey['vote'] ?></p>
            </div>
        <!-- </a> -->
        </div>
        
        <?php
    };
    ?>
