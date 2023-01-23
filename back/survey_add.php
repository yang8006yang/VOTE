<div class="m-5 card-form text-center">
    <div class=" mx-auto d-flex flex-column">
        <h1 class=" impact bold text-start">新增投票主題</h1>
        <div class="line"></div>
        <form action="./api//survey_add.php" method="post" class="w-100">
            <label for="subject">主題 <span style="color: #242424;">*</span></label>
            <input type="text" name="subject" id="subject" required placeholder="未命名的主題">
            <div>
                <label for="type">類型 <span style="color: #242424;">*</span></label>
                <select name="type" id="">
                    <option value="1">歌曲</option>
                    <option value="2">歌手</option>
                    <option value="3">調查</option>
                    <option value="4">其他</option>
                </select>
            </div>
            <div>
                <label for="'chart">圖表 <span style="color: #242424;">*</span></label>
                <select name="chart" id="">
                    <option value="1">柱狀圖</option>
                    <option value="2">環狀圖</option>
                    <option value="3">折線圖</option>
                </select>
            </div>
            <div>
                <label for="content" style="vertical-align: top;">內文 <span class="text-warning" title="選填">*</span></label>
                <textarea name="content" id="content" cols="30" rows="10" placeholder="在這裡輸入投票項目的說明 / 細節 ~~"></textarea>
            </div>

            <div id="options">
                <div class='option'>
                    <label>選項1<span style="color: #242424;">*</span></label>
                    <input type='text' name='opt[]'>
                </div>
            </div>
            <div id="addOpt">選項++</div>

            <div class="text-center col-12 mt-3">
                <input type="submit" value="確定新增" class="submitBtn">
                <input type="reset" value="重置" class="btn">
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script>
    $(function() {
        $("#addOpt").click(function() {
            let num = $('.option').length + 1;
            $("#options").append("<div class='option'><label>選項" + num + "</label><input type='text' name='opt[]'></div>");
        });
    })
</script>