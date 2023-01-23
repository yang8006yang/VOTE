<div class="d-flex justify-content-center align-items-center text-center" style="height: 100vh;">

    <div class="col">
        <form action="./api/login.php" method="POST" class="loginForm shadow p-5 rounded mx-auto">
            <div class="bold fs-1 mt-5 mb-1">MUSIC SPOT</div>
            <hr>
            <div class="text-start w-50 mx-auto mt-5">
                <label for="acc">帳號</label>
                <input class="form-control" type="text" name="acc" placeholder="帳號、用戶名稱或電子郵件地址"  required>
                <label for="pw">密碼</label>
                <input class="form-control" type="password" name="pw" placeholder="密碼" required>
                <input type="submit" value="登入" class="btn btn-warning ">
                <?php
            if(isset($_GET['error'])){
                echo "<div style='color:red;'>帳號或密碼錯誤，請再次檢查</div>";
            }
            ?>
            <div class="pt-5 text-end">沒有帳號嗎? <a href='index.php?do=reg' class="text-dark">註冊</a></div>
            </div>
        </form>
    </div>
</div>