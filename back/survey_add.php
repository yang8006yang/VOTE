<h1>新增投票項目</h1>
<form action="./api//survey_add.php" method="post">

    <label for="subject">主題</label>
    <input type="text" name="subject" id="subject" required>
    <select name="type" id="">
        <option value="1">歌曲</option>
        <option value="2">歌手</option>
        <option value="3">調查</option>
        <option value="4">其他</option>
    </select>
    <label for="content">內文</label>
    <textarea name="content" id="content" cols="30" rows="10"></textarea>

    <div id="options">
        <div class="option">
            <label for="">選項1</label>
            <input type="text" name="opt[]">
        </div>
    </div>
    
    <div class="text-center col-12 mt-3">
        <input type="submit" value="確定新增">
        <input type="reset" value="重置">
    </div>
</form>
<button id="addOpt">+</button>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script>
    $(function(){
        
    $( "#addOpt" ).click(function() {
        let num=$('.option').length+1;
            $( "#options" ).append( "<div class='option'><label>選項"+num+"</label><input type='text' name='opt[]'></div>" );
        });
})
</script>
