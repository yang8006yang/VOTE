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
</head>

<body>
    <aside id="scroll">
        <ul class="asideNav" id="scroll">
            <li><a href="./center.php?do=main">首頁</a></li>
            <li>
            <form method="get" action="./center.php">
                <input type="hidden" name="do" value="search">
                <input type="hidden" name="type" value="all">
                <input type="search" id="keyword" name="keyword" placeholder="  search"></input>
                <input type="submit" value="S"></form>
        </li>
        <li><button data-bs-toggle="collapse" data-bs-target="#vote">投票</button></li>
        <ul id="vote" class="collapse">
            <?php
                if ($_SESSION['login']['acc'] == 'admin' && $_SESSION['login']['pw'] == 'admin') {
                    echo "<li><a href='center.php?do=survey_add'>新增投票</a></li>
                    <li><a href='center.php?do=survey'>編輯投票</a></li>
                    <li><a href=''>查看投票結果</a></li>";
                    echo "</ul>";
                    echo "<li><a href='center.php?do=song_add'>新增歌曲</a></li>";
                    echo "<li><a href='center.php?do=song_list'>編輯歌曲</a></li>";
                    echo "<li><a href='center.php?do=user_list&level=1'>使用者中心</a></li>";
                } else {
                    echo "<li><a href='center.php?do=survey'>前往投票</a></li>
                    <li><a href='center.php?do=myVote'>查看我的投票</a></li>
                    <li><a href='center.php?do=survey_result'>查看投票結果</a></li>";
                    echo "</ul>";
                    echo "<li><a href='center.php?do=playlist_add'>建立播放清單</a></li>";
                    $playlists=all('playlists',["user_id"=>$_SESSION['login']['id']]);
                    foreach($playlists as $list){
                        echo "<li><a href='center.php?do=playlist&id={$list['id']}&name={$list['list_name']}'>".$list['list_name']."</a></li>";
                    }
                }
                ?>

</ul>
<div>
    
    </div>
</aside>

<div class="container-fuild">
    <nav>
        <a class='btn btn-light' href='logout.php'>登出</a>
    </nav>
    
    <main>
        <?php
            $frontPath = './front/';
            $backPath = './back/';
            
            $do = $_GET['do'] ?? 'main';
            // ?? => 有就是?前面的 沒有就後面的
            
            if ($_SESSION['login']['acc'] == 'admin' && $_SESSION['login']['pw'] == 'admin') {
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
                    }
                    
                    $file = $path . $do . '.php';
                    
                    
                    if (file_exists($file)) {
                        include $file;
                    } else {
                        include "./back/main.php";
                    }
                    ?>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./js/center.js"></script>
</body>

</html>