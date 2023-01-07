<div class="mx-auto w-50 mt-3">
    <h1><a href="?do=user_list&level=1">會員列表</a></h1>
    <h1><a href="?do=user_list&level=0">管理者列表</a></h1>
    <table>
        <thead>
            <td>id</td>
            <td>name</td>
            <td>acc</td>
            <td></td>
        </thead>
        <?php
        if ($_GET['level'] == 0) {

            $users = all("users", ['level' => '0']);

            foreach ($users as $user) {
        ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['acc']; ?></td>
                    <td><a href="./api/del.php?id=<?= $user['id'] ?>&table=user" class="card-link">刪除</a></td>
                </tr>
            <?php
            }
        } else {
            $users = all("users", ['level' => '1']);
            foreach ($users as $user) {
            ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['acc']; ?></td>
                    <td><a href="./api/del.php?id=<?= $user['id'] ?>&table=user" class="card-link">刪除</a></td>
                </tr>
        <?php
            }
        }
        ?>
</div>