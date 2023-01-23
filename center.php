<?php
include "./db/base.php";

if (!isset($_SESSION['login'])) {
    to('./index.php?error=nolog');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Spot</title>
    <link rel="stylesheet" href="./css/centerStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <nav>
        <div class="float-end" style="width: 1rem;">&nbsp;</div>
        <a class='btn btn-light float-end me-3' href='logout.php'>登出</a>
        <a class="float-end me-3" href="./index.php">首頁</a>
    </nav>
    <div class="d-flex">
        <div class="col-3"></div>
        <aside id="scroll" class="col-3 align-self-stretch">
            <ul class="asideNav" style="list-style-type: none;">
                <a class="d-flex justify-content-center mb-4 flex-wrap" href="./center.php?do=main">
                    <img src="./img/mscd-01.jpg" alt="Music Spot" width="50px" style="border-radius: 10px;">
                    <div class="impact fs-2 ps-3">Music Spot</div>
                </a>
                <li>
                    <form method="get" action="./center.php">
                        <input type="hidden" name="do" value="search">
                        <input type="hidden" name="type" value="all">
                        <div class="d-flex align-item-center justify-content-center texr-center">
                            <input type="search" id="keyword" name="keyword" placeholder="  search" style="margin-right: -2.2rem;"></input>
                            <button type="submit" id="search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </li>
                <li><a href="" data-bs-toggle="collapse" data-bs-target="#vote">投票 ▼</a></li>
                <ul id="vote" class="collapse">
                    <?php
                     $adminChk = find('users',['acc'=>$_SESSION['login']['acc'],'level'=>0]);
                     if (!empty($adminChk)) {
                        echo "<li><a href='center.php?do=survey_add'>新增投票</a></li>
                    <li><a href='center.php?do=survey'>編輯投票</a></li>
                    <li><a href='center.php?do=survey_result'>查看投票結果</a></li>";
                        echo "</ul>";
                        echo "<li><a href='center.php?do=song_add'>新增歌曲</a></li>";
                        echo "<li><a href='center.php?do=song_list'>編輯歌曲</a></li>";
                        echo "<li><a href='center.php?do=user_list'>使用者中心</a></li>";
                    } else {
                        echo "<li><a href='center.php?do=survey'>前往投票</a></li>
                    <li><a href='center.php?do=myVote'>查看我的投票</a></li>
                    <li><a href='center.php?do=survey_result'>查看投票結果</a></li>";
                        echo "</ul>";
                        echo "<li><a href='center.php?do=playlist_add'>建立播放清單</a></li>";
                        $playlists = all('playlists', ["user_id" => $_SESSION['login']['id']]);
                        foreach ($playlists as $list) {
                            echo "<li><a href='center.php?do=playlist&id={$list['id']}&name={$list['list_name']}'>" . $list['list_name'] . "</a></li>";
                        }
                    }
                    ?>

                </ul>
        </aside>

        <main class="col-9" id="scroll">
            <div style="height: 5rem;"></div>
            <div>
                <?php
                $frontPath = './front/';
                $backPath = './back/';

                $do = $_GET['do'] ?? 'main';
                // ?? => 有就是?前面的 沒有就後面的
                if (!empty($adminChk)) {
                    $path = $backPath;
                    // $file = "./back/" . $do . ".php";
                } else {
                    $path = $frontPath;
                    // $file = "./front/" . $do . ".php";
                }

                switch ($do) {
                    case 'survey_result':
                        $path = $frontPath;
                        break;
                    case 'search':
                        $path = $backPath;
                        break;
                    case 'main':
                        $path = $backPath;
                        break;
                    case 'survey_vote':
                        $path = $frontPath;
                        break;
                }

                $file = $path . $do . '.php';


                if (file_exists($file)) {
                    include $file;
                } else {
                    include "./back/main.php";
                }
                ?>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./js/center.js"></script>
</body>

</html>