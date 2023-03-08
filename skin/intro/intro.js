$(function(){
  

  //////////스크롤 위치에 맞춰 텍스트 등장 이벤트//////////
  $(window).scroll(function(){
    let spos = $(this).scrollTop();
    let ceoms = $('.ceo_ms');
    let info = $('.info_txt');
    let esg = $('.esg_txt');
    console.log(spos);// 대표이사 인삿말 600px, info 1500px, esg 2100px
    if(spos >= 600){
      ceoms.fadeIn(2000);
    }if(spos >= 1000){
      info.fadeIn(2000);
    }if(spos >= 1500){
      esg.fadeIn(2000);
    }
  });


  //////////지도 탭메뉴//////////
  //1. 변수선언
  const tmnu = $('.tab_map li');
  const tmnua = $('.tab_map li a');
  $('.c01').show().parent().siblings().find('.root_daum_roughmap').siblings().hide();
  // $('.con:first-of-type').show().parent().siblings('.con').hide(); // 첫번째 con 요소 보이기

  //2. 클릭이벤트
  tmnu.click(function(){
    //1. 메뉴서식이 변경
    $(this).addClass('act').siblings().removeClass('act');

    //2. 콘텐츠 숨기거나 나타내기
    const con = $(this).find('.con');
    con.show().parent().siblings().find('.con').hide();
    con.show().parent().find('.root_daum_roughmap').siblings().show();


    return false;//함수(이벤트) 종료
  });
  
  tmnua.click(function(){
    $(this).addClass('act2').parent().siblings().find('a').removeClass('act2');
  });

});