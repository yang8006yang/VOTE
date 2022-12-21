<header>
    <?php
    echo $_SERVER['PHP_SELF'];

    $file_str = explode("/", $_SERVER['PHP_SELF']);
    print_r($file_str);
    $local = str_replace('.php', '', array_pop($file_str));
    switch ($local) {
        case "center":
            echo "<div><a href='center.php'><img scr=''>logo</a></div>";
            if (isset($_SESSION['login'])) {
                echo "<a href='logout.php'>登出</a>";
            } else {
                echo "<a href='index.php?do=reg'>註冊</a>";
                echo "<a href='index.php?do=login'>登入</a>";
            }
            break;
        case "admin":
            echo "<div><a href='admin.php'><img scr=''>logo</a></div>";
            break;
    }
    ?>

</header>