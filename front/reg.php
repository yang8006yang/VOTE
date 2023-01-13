<div class="d-flex justify-content-center align-items-center text-center" style="height: 100vh;">

    <div class="col">
        <form action="./api/reg.php" method="POST" class="loginForm shadow p-5 rounded mx-auto">
            <div class="bold fs-1 mt-5 mb-1">MUSIC SPOT</div>
            <hr>
            <div class="text-start w-50 mx-auto mt-3">
                <div class="bold fs-5 text-center mx-auto mb-5">註冊 | 加入我們</div>
                <input class="form-control" type="text" name="name" placeholder="用戶名稱" required>
                <input class="form-control" type="text" name="acc" placeholder="帳號" required>
                <input class="form-control" type="password" name="pw" placeholder="密碼" required>
                <input class="form-control" type="text" name="email" placeholder="電子郵件地址" required>
                <input type="submit" value="註冊" class="btn btn-warning">
                <?php
                if (isset($_GET['error'])) {
                    echo "<div style='color:red;'>帳號、使用者名稱或電子郵件已註冊</div>";
                }
                ?>
            </div>
        </form>
    </div>