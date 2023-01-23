$(window).scroll(function () {
    console.log('OK');
    let scrollTop = $(window).scrollTop();
    if(scrollTop == 0){
        $('nav').css('backgroundColor','rgb(23, 23, 23, 1)') 
    }else{
        $('nav').css('backgroundColor','rgb(23, 23, 23, 0.5)') 
    }
})

$('#goBack').on('click',function () {
    window.history.back(-1);
})