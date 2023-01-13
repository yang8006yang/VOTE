<?php
include_once "./db/base.php";

// var_dump($keywords);

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

$key = $_GET['keyword'];
switch ( $_GET['type']) {
    case 'song':
        $song='selected';
        $vote='';
        break;
    case 'vote':
        $vote='selected';
        $song='';
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
?>
<form action="./center.php" method="get" id="type">
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
<table>
    <?php
    foreach ($res as $result) {
        // if(isset($result['subject'])){
        //     $type= 'subject';
        // }elseif(isset($result['song_name'])){
        //     $type= 'song';
        // }else{

        //     $type= 'user';
        // };
        $type = isset($result['subject']) ? 'subject.png' : (isset($result['song_name']) ? $result['cover'] : 'user.png');
        echo $type;
        echo "<tr>
            <td><img src='./upload/$type' clsaa='img-fluid' width=50%></td>
            <td>$result[1]</td>
            <td>$result[2]</td>
            <td>$result[3]</td>
        </tr>";
    };
    ?>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    function switchType() {
        var type = $('#type').serialize();
        console.log(type);
        $('#type').submit();
    }
    $('select').on("change", switchType);
</script>