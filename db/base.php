<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=music_spot";
$pdo = new PDO($dsn, 'root', '');

date_default_timezone_set("Asia/Taipei");
session_start();

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
// 取得/搜尋資料
function all($table, ...$args)
{
    global $pdo;
    $sql = "SELECT * FROM `$table`";
    if (isset($args[0])) {
        if(is_array($args[0])){
        foreach ($args[0] as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        $sql = $sql . "WHERE" . join("&&", $tmp);
    } else {
        $sql = $sql . $args[0];
    }}
    if (isset($args[1])) {
        $sql = $sql . $args[1];
    }
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

// 回傳指定ID資料
function find($table, $id)
{
    global $pdo;
    $sql = "SELECT * FROM `$table`";

    if (is_array($id)) {
        foreach ($id as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        $sql = $sql . "WHERE" . join("&&", $tmp);
    } else {
        $sql = $sql . "WHERE `id`=$id";
    }
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

// 更新
function update($table, $col, ...$args)
{
    global $pdo;
    $sql = "UPDATE `$table` SET ";

    if (is_array($col)) {
        foreach ($col as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        $sql = $sql . join("&&", $tmp);
    } else {
        echo "錯誤,請提供以陣列型式的更新資料";
    }

    if (isset($args[0])) {
        if (is_array($args[0])) {
            $tmp = [];
            foreach ($args[0] as $key => $value) {
                $tmp[] = "`$key`='$value'";
            }

            $sql = $sql . " where " . join(" && ", $tmp);
        } else {

            $sql = $sql . " where `id`='{$args[0]}'";
        }
        return $pdo->exec($sql);
    }
}

// 新增
function insert($table,$cols){
    global $pdo;

    $keys=array_keys($cols);
    $sql="insert into $table (`" . join("`,`",$keys) . "`) values('" . join("','",$cols) . "')";
    return $pdo->exec($sql);
}


// 刪除
function del($table,$id){
    global $pdo;
    $sql="delete from `$table` ";

    if(is_array($id)){
        foreach($id as $key => $value){
            $tmp[]="`$key`='$value'";
        }

        $sql = $sql . " where " . join(" && ",$tmp);

    }else{

        $sql=$sql . " where `id`='$id'";
    }

    //echo $sql;
    return $pdo->exec($sql);
}

//萬用sql函式
function q($sql){
    global $pdo;
    //echo $sql;
    return $pdo->query($sql)->fetchAll();
}


// header
function to($location){
    header("location:$location");
}