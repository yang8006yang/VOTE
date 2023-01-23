<?php
include_once "./db/base.php";

// var_dump($keywords);

// 生成送到資料庫SQL語法的FUN case
function search($table)
{
    $key = $_GET['keyword'];
    $keywords = explode(" ", $key);
    $sql = "SELECT * FROM `$table` WHERE ";
    foreach ($keywords as $keyword) {
        switch ($table) {
            case 'songs':
                $array[] = "CONCAT(song_name,description,singer) LIKE '%$keyword%'";
                break;
            case 'survey_subjects':
                $array[] = "CONCAT(subject,type,content) LIKE '%$keyword%'";
                break;
            case 'users':
                $array[] = "CONCAT(acc,name,email) LIKE '%$keyword%'";
                break;
            default:
                # code...
                break;
        }
    }
    $sql = $sql . join(" OR ", $array);
    return q($sql);
};

// 依分類 使用上面的search FUN 產生結果
$type = $_GET['type'];
switch ($type) {
    case 'all':
        $song = search('songs');
        $vote = search('survey_subjects');
        $user = search('users');
        if ($_SESSION['login']['level'] == 0) {
            $res = array_merge($song, $vote, $user);
        } else {
            $res = array_merge($song, $vote);
        }
        break;
    case 'song':
        $res = search('songs');
        break;
    case 'vote':
        $res = search('survey_subjects');
        break;
    case 'user':
        $res = search('users');
        break;
}
// dd($res);
// $sqlS=$sqlS.'%'.join("%' OR '%", $keywords)."%'";
// $sqlV=$sqlV.'%'.join("%' OR '%", $keywords)."%'";

// 存關鍵字放到input，換分類的時候才不會不見
$key = $_GET['keyword'];

// 控制下拉選單狀態
switch ( $_GET['type']) {
    case 'all':
        $song='';
        $vote='';
        $user='';
        break;
    case 'song':
        $song='selected';
        $vote='';
        $user='';
        break;
    case 'vote':
        $vote='selected';
        $song='';
        $user='';
        break;
    case 'user':
        $user='selected';
        $song='';
        $vote='';
        break;
    
    default:
        # code...
        break;
}

// 為投票主題分類轉譯 設的陣列
$voteType=[
    '1'=>'類型: 歌曲',
    '2'=>'類型: 歌手',
    '3'=>'類型: 調查',
    '4'=>'類型: 其他',
]
?>
<form action="./center.php" method="get" id="type" class="">
    <input type="hidden" name="do" value="search">
    <select name="type">
        <option value="all">全部</option>
        <option value="song" <?=$song;?>>歌曲/歌手</option>
        <option value="vote" <?=$vote;?>>投票主題/類型</option>
        <?php
        if ($_SESSION['login']['level'] == 0) {
            echo "<option value='user' $user>使用者名稱/帳號/email</option>";
        }
        ?>
    </select>
    <input type="hidden" value="<?= $key; ?>" name="keyword">
</form>
<table class="w-75 ms-5" >
    <?php
    foreach ($res as $result) {
        $type = isset($result['subject']) ? 'subject.png' : (isset($result['song_name']) ? $result['cover'] : 'user.png');
        $atype = isset($result['subject']) ? 'survey_vote' : (isset($result['song_name']) ? 'song' : 'user_list');

        echo "<tr class='t-bottom-white'>
            <td>
                <a href='./center.php?do=$atype&id={$result[0]}'>
                 <img src='./upload/$type' clsaa='img-fluid' width=25%>
                </a>
            </td>
            <td width=25%>$result[1]</td>";
        if($type=='subject.png'){
          echo  "<td width=25%>".$voteType[$result[2]]."</td>";
        }else{
            echo  "<td width=25%>$result[2]</td>";
        }
        echo    "<td width=25%>$result[3]</td>
        </tr>";
    };
    ?>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- 選下拉選單時直接送出表單 -->
<script>
    function switchType() {
        var type = $('#type').serialize();
        console.log(type);
        $('#type').submit();
    }
    $('select').on("change", switchType);
</script>