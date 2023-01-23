<?php
if (isset($_GET['error'])) {
    alert('圖片格式錯誤');
}
?>
<div class="card m-5 card-form text-center">
    <div class="card-body mx-auto d-flex flex-column ">
        <h1 class="card-title impact bold text-start">新增歌曲</h1>
        <div class="line"></div>
        <form action="./api/song_add.php" method="post" enctype="multipart/form-data" class="w-100">
            <div>
                <label for="name">歌名 <span class="text-danger" title="必填">*</span></label>
                <input type="text" name="name" id="name" placeholder="未命名的歌曲">
            </div>
            <div>
                <label for="singer">歌手 <span class="text-danger" title="必填">*</span></label>
                <input type="text" name="singer" id="singer" placeholder="未知的歌手">
            </div>
            <div>
                <label for="link">連結 <span class="text-danger" title="必填">*</span></label>
                <input type="text" name="link" id="link" placeholder="spotify link">
            </div>
            <div>
                <label for="type">分類 <span style="color: #242424;">*</span></label>
                <input type="text" name="type" id="type" placeholder="ex. 華語 / K-POP">
            </div>
            <div>
                <label for="description" style="vertical-align: top;">描述  <span style="color: #242424;">*</span></label>
                <textarea name="description" id="description" cols="30" rows="10" placeholder="輸入歌曲的說明 / 細節 "></textarea>
            </div>
            <div>
                <label for="cover" style="cursor: pointer;">封面  <span style="color: #242424;">*</span>
                <input type="file" name="cover" id="cover" style="display:none;">
                <i class="fa-solid fa-image" >上傳圖片</i>
                </label>
            </div>
            <div class="text-center col-12 mt-3">
                <input type="submit" value="確定新增" class="submitBtn">
                <input type="reset" value="重置" class="btn">
            </div>
        </form>
    </div>
</div>