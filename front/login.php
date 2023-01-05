<div class="d-flex justify-content-center align-items-center text-center" style="height: 100vh;">

    <div class="col-5">IMG</div>
    <div class="col-4">
        <form action="./api/login.php" method="POST" class="loginForm shadow p-5 rounded">
            <div>MUSIC SPOT</div>
            <input class="form-control" type="text" name="acc" placeholder="用戶名稱或電子郵件地址"  required>
            <input class="form-control" type="password" name="pw" placeholder="密碼" required>
            <input type="submit" value="登入" class="btn btn-warning w-100">
            <?php
            if(isset($_GET['error'])){
                echo "<div style='color:red;'>帳號或密碼錯誤，請再次檢查</div>";
            }
            ?>
            <div>沒有帳號嗎? <a href='index.php?do=reg'>註冊</a></div>
        </form>
    </div>
</div>