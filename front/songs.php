<h1>音樂倉庫</h1>
<?php
include_once "./db/base.php";
if (isset($_GET['success']) && $_GET['success'] == '1') {
    alert('添加成功');
}

$songs=all('songs','ORDER BY `update_at` DESC LIMIT 5');
echo "<p>最新歌曲</p>";
foreach ($songs as $song) {
?>
        <div class="card bg-dark text-white d-inline-block" style="width: 24%;">
            <div class="card-body d-flex flex-column " style="min-height: 350px;">
                <img class="card-img-top" src="./upload/<?= $song['cover'] ?>" alt="Card image">
                <h4 class="card-title flex-grow-1"><?= $song['song_name'] ?></h4>
                <p class="card-text mt-3"><?= $song['singer'] ?></p>
                <a href="./api/addSong2List.php?id=<?= $song['id'] ?>&list_id=<?= $_GET['list_id'] ?>" class="card-link">
                <i class="fa-solid fa-circle-plus"></i></i>
            </a>
            </div>
        </div>

        <?php
}
?>

<p>全部歌曲</p>
<?php
$sql_total = "SELECT count(`id`) FROM `songs`;";
$total = $pdo->query($sql_total)->fetchColumn();
$div=5;
$pages=ceil($total / $div); 
$now = $_GET['page'] ?? 1;
$start = ($now - 1) * $div;
$songs=all('songs',"LIMIT $start,$div");

foreach ($songs as $song) {
    echo "<table width='90%' class='mx-auto mt-1 mb-1'>
        <tr>
            <td width='10%'><img src='./upload/{$song['cover']}' alt='∮' width='50px'></td>
            <td>
                <div>{$song['song_name']}</div>
                <div>{$song['singer']}<div>
            </td>
            <td width='10%'>
            <a href='./api/addSong2List.php?id=<?= {$song['id']} ?>&list_id=<?= {$_GET['list_id']} ?>'>
            <i class='fa-solid fa-circle-plus'></i></i>
        </a>
        </td>
        </tr>
    </table>";
}

echo "<div class='text-center'>";
// 上一頁
if(($now-1)>0){
    $prev=$now-1;
        echo "<a href='?do=songs&list_id={$_GET['list_id']}&page=$prev'>PREV</a>";
}


//頁碼區

    if($now>=3 && $now<=($pages-2)){  //判斷頁碼在>=3 及小於最後兩頁的狀況
        $startPage=$now-2;
    }else if($now-2<3){ //判斷頁碼在1,2頁的狀況
        $startPage=1;
    }else{  //判斷頁碼在最後兩頁的狀況
        $startPage=$pages-4;
    }

    $endpages=($pages<5)?$pages:$startPage+4;
    for($i=$startPage;$i<=$endpages;$i++){
        $nowPage=($i==$now)?'now':'';
        if(isset($_GET['code'])){
            echo "<a href='?do=songs&list_id={$_GET['list_id']}&page=$i&code={$_GET['code']}' class='$nowPage'> ";
            echo $i;
            echo " </a>";
            
        }else{
            echo "<a href='?do=songs&list_id={$_GET['list_id']}&page=$i' class='$nowPage'> ";
            echo $i;
            echo " </a>";
        }
    }


    // 下一頁
if(($now+1)<=$pages){
    $next=$now+1;
    echo "<a href='?do=songs&list_id={$_GET['list_id']}&page={$next}'>NEXT</a>";
}
echo "</div>";
?>

