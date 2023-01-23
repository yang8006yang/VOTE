<?php
include_once "./db/base.php";
if(isset($_GET['id'])){
    $subject=find('survey_subjects',$_GET['id']);
    $opts=all('survey_options',['subject_id'=>$_GET['id']]);
}else{
    to("center.php?do=survey&error");
};

?>
    <div class="m-3 fs-4">
        <a href="#" id="goBack"><i class="fa-solid fa-less-than"></i></a> 
    </div>
<div class="m-5 card-form text-center">
    <div class=" mx-auto d-flex flex-column">
        <h1 class=" impact bold text-start">編輯投票</h1>
        <div class="line"></div>
<form action="./api/survey_edit.php" method="post" class="w-100">
<label for="subject">主題</label>
    <input type="text" name="subject" id="subject" required value="<?=$subject['subject'];?>">
    <div>
    <label for="type">類型</label>
    <select name="type" id="">
        <option value="1" <?php echo($subject['type']==1)?'selected':'';?>>歌曲</option>
        <option value="2" <?php echo($subject['type']==2)?'selected':'';?>>歌手</option>
        <option value="3" <?php echo($subject['type']==3)?'selected':'';?>>調查</option>
        <option value="4" <?php echo($subject['type']==4)?'selected':'';?>>其他</option>
    </select>
</div>
    <div>
                <label for="'chart">圖表</label>
                <select name="chart" id="" style="text-align: center;">
                    <option value="1" <?php echo($subject['chart']==1)?'selected':'';?>>柱狀圖</option>
                    <option value="2" <?php echo($subject['chart']==2)?'selected':'';?>>環狀圖</option>
                    <option value="3" <?php echo($subject['chart']==3)?'selected':'';?>>折線圖</option>
                    <option value="4" <?php echo($subject['chart']==4)?'selected':'';?>>複合圖(柱狀+折線圖)</option>
                </select>
            </div>
    <label for="content" style="vertical-align: top;">內文</label>
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
            <button class="delOpt p-1">-</button>
        </div>
<?php
}
?>    
</div>
<div id="addOpt">選項++</div>
<div class="text-center col-12 mt-3">
                <input type="submit" value="確定修改" class="submitBtn">
                <input type="reset" value="重置" class="btn">
            </div>
</form>
</div>
</div>

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