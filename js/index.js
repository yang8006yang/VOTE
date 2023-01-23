
// 抓取頁面滾動位置，改變背景色
$(window).scroll(function () {
  let screenHeight = $(window).height();
  let scrollTop = $(window).scrollTop();
  console.log(scrollTop);
  console.log('H');
  console.log(screenHeight);

  if (scrollTop > (screenHeight / 6)) {
    $('#newArrival').css('backgroundColor', '#d7b700');
  }

  if (scrollTop < (screenHeight / 6)) {
    $('#newArrival').css('backgroundColor', 'rgb(27, 36, 37)');
  }


  if (scrollTop > (screenHeight / 3)) {
    $('#surveyText').css('opacity', '1');
    $('#surveyText').css('scale', '0.9');
  }
  if (scrollTop < (screenHeight / 3)) {
    $('#surveyText').css('opacity', '0');
    $('#surveyText').css('scale', '0');
  }

})


// album hover
$('.album').hover(function () {
  $(this).find('.cd').css('animationName', 'cd');
  $(this).find('.cd').css('left', '12vw');
  console.log($(this).find('.cd').html());
}
  , function () {
    $(this).find('.cd').css('animationName', '');
    $(this).find('.cd').css('left', '5vw');
  });

// owl-carousel
$('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  dots: false,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    1000: {
      items: 3
    }
  }
})

// popover
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})