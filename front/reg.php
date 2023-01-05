

<div class="d-flex justify-content-center align-items-center text-center" style="height: 100vh;">

    <div class="col-5">IMG</div>
    <div class="col-4">
        <form action="./api/reg.php" method="POST" class="loginForm shadow p-5 rounded">
            <div>MUSIC SPOT</div>
            <input class="form-control" type="text" name="name" placeholder="用戶名稱"  required>
            <input class="form-control" type="text" name="acc" placeholder="帳號"  required>
            <input class="form-control" type="password" name="pw" placeholder="密碼" required>
            <input class="form-control" type="text" name="email" placeholder="電子郵件地址"  required>
            <input type="submit" value="註冊" class="btn btn-warning w-100">
            <?php
            if(isset($_GET['error'])){
                echo "<div style='color:red;'>帳號、使用者名稱或電子郵件已註冊</div>";
            }
            ?>
        </form>
    </div>
</div>