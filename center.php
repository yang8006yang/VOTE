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
            <li><a href="#">搜尋</a></li>
            <li><button data-bs-toggle="collapse" data-bs-target="#demo">投票</button></li>
            <ul id="demo" class="collapse">
                <?php
                if ($_SESSION['login']['acc'] == 'admin' && $_SESSION['login']['pw'] == 'admin') {
                    echo "<li><a href='center.php?do=survey_add'>新增投票</a></li>
                    <li><a href='center.php?do=survey'>編輯投票</a></li>
                    <li><a href=''>查看投票結果</a></li>";
                    echo "</ul>";
                    echo "<li><a href='#'>新增歌曲</a></li>";
                    echo "<li><a href='#'>編輯歌曲</a></li>";
                    echo "<li><a href='#'>會員中心</a></li>";
                } else {
                    echo "<li><a href=''>前往投票</a></li>
                    <li><a href=''>查看我的投票</a></li>
                    <li><a href=''>查看投票結果</a></li>";
                    echo "</ul>";
                    echo "<li><a href='#'>建立播放清單</a></li>";
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
                $do = $_GET['do'] ?? 'main';
                // ?? => 有就是?前面的 沒有就後面的
                if ($_SESSION['login']['acc'] == 'admin' && $_SESSION['login']['pw'] == 'admin') {
                    $file = "./back/" . $do . ".php";
                }else{
                    $file = "./front/" . $do . ".php";
                    
                }

                if (file_exists($file)) {
                    include $file;
                } else {
                    include "./back/main.php";
                }
                ?>
        </main>
    </div>
</body>

</html>