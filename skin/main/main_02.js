$(function(){

  //////////스크롤 위치에 맞춰 등장이벤트//////////
  $(window).scroll(function(){
    let spos = $(this).scrollTop();
    console.log(spos); //3번섹션 1450px, 4번섹션 2350px
    if(spos >= 1250){
      $('.m_color01').addClass('active');
    }
    if(spos >= 2350){
      $('.m_color02').addClass('active');
    }
  });
});