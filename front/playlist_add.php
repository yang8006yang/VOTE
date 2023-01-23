<div class="card m-5 card-form text-center">
    <div class="card-body mx-auto d-flex flex-column align-items-center">
    <h1 class="card-title impact bold">建立歌曲清單</h1>
    <div class="line"></div>
<form action="./api/playlist_add.php" method="post">
    <div>
        <label for="name">名稱<span class="text-danger" title="必填">*</span></label>
        <input type="text" name="name" id="name" placeholder="未命名的歌曲清單" required>
    </div>
    <div>

        <label for="description" style="vertical-align: top;">描述<span style="color: #242424;">*</span></label>
        <textarea name="description" id="description" cols="30" rows="10" placeholder="歌曲清單的說明"></textarea>
    </div>
    <div class="text-center col-12 mt-3">
                <input type="submit" value="確定新增" class="submitBtn">
                <input type="reset" value="重置" class="btn">
            </div>
<!-- <input type="hidden" name="user_id" value=""> -->
</form> 
    </div>
</div>