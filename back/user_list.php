<?php
if(isset($_GET['success']) && $_GET['success']=='1'){
    alert('刪除成功!');
}
?>
<div class="mx-auto w-50 mt-3">
    <div class="card-form text-center">
        <form action="./api/admin_add.php" method="post">
            <label for="id">ID : </label>
            <input type="text" name="id" id="id" required width="100px">
            <input type="submit" value="設為管理員" class="submitBtn text-center">
        </form>
        <div class="line"></div>
        <a href="?do=user_list&level=1"><input type="button" value="會員列表" class="btn"></a>
        <a href="?do=user_list&level=0"><input type="button" value="管理者列表" class="btn"></button></a>
    </div>
    <table>
        <thead class="t-bottom-white">
            <td width=10%>id</td>
            <td width=40%>用戶名</td>
            <td width=40%>帳號</td>
            <td></td>
        </thead>
        <?php
        if (isset($_GET['level'])) {
            if ($_GET['level'] == 0) {
                $users = all("users", ['level' => '0']);
            } else {
                $users = all("users", ['level' => '1']);
            }
        } else {
            $users = all("users");
        }
        foreach ($users as $user) {
        ?>
            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['acc']; ?></td>
            <?php
            if($user['name']!='admin'){
                echo "<td><a href='./api/del.php?id=<?= {$user['id']} ?>&table=user' class='btn btn-sm btn-danger mt-1'>刪除</a></td>";
            }else{
                echo "<td><a href='#' class='btn btn-sm btn-secondary mt-1'>刪除</a></td>";
            }?>
            </tr>
        <?php
        }
        ?>
</div>