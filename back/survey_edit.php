<?php
include_once "./db/base.php";

if(isset($_GET['id'])){
    $subject=find('survey_subjects',$_GET['id']);
    $opts=all('survey_options',['subject_id'=>$_GET['id']]);
}else{
    to("center.php?do=survey&error");
};
?>

<h1>編輯投票</h1>
<form action="./api/survey_edit.php" method="post">
<label for="subject">主題</label>
    <input type="text" name="subject" id="subject" required value="<?=$subject['subject'];?>">
    <select name="type" id="">
        <option value="1" <?php echo($subject['type']=1)?'selected':'';?>>歌曲</option>
        <option value="2" <?php echo($subject['type']=2)?'selected':'';?>>歌手</option>
        <option value="3" <?php echo($subject['type']=3)?'selected':'';?>>調查</option>
        <option value="4" <?php echo($subject['type']=4)?'selected':'';?>>其他</option>
    </select>
    <label for="content">內文</label>
    <textarea name="content" id="content" cols="30" rows="10"><?=$subject['content'];?></textarea>
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <div id="options">
<?php
foreach ($opts as $idx => $option){
    ?>
        <div class="option">
            <label for="">選項<?= $idx+1; ?></label>
            <input type="hidden" name="opt_id[]" value="<?= $option['id']; ?>">
            <input type="text" name="opt[]" value="<?=$option['opt'];?>">
            <button class="delOpt">-</button>
        </div>
<?php
}
?>    
</div>
    <div class="text-center col-12 mt-3">
        <input type="submit" value="確定修改">
        <input type="reset" value="重置">
    </div>
</form>
<button id="addOpt">+</button>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script>
    $(function(){
        
    $( "#addOpt" ).click(function() {
        let num=$('.option').length+1;
            $( "#options" ).append( "<div class='option'><label>選項"+num+" </label><input type='text' name='optn[]'> <button class='delOpt'>-</button></div>" );
        });

    $(".delOpt").click(function(){
        let num=$('.option').length;
        if(num>1){
            $(this).parent().remove();
        }
    })
})
</script>