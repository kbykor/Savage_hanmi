$(function(){

  // 약국찾기 모달 (제이쿼리)
  let modal = `
    <div class="m_modal">
      <div class="m_map">
        <a href="#" title="닫기" class="m_close">
          <span></span>
          <span></span>
        </a>
        <h3>판매 약국 검색</h3>
        <hr>
        <form name="m_search" method="post" action="">
        <div class="modal_search">
          <label for="p_search">제품명 검색</label>
          <input type="search" name="p_search" id="p_search" placeholder="제품명을 입력하세요">
          <i class="fas fa-magnifying-glass"></i>
        </div>
        <div class="modal_area">
          <label for="map_name">지역명 검색</label>
          <select name="map_name" id="map_name">
            <option>시,도 검색</option>
            <option>강원도</option>
          </select>
          <select>
            <option>시,군,구 검색</option>  
          </select>
          <input type="submit" value="약국검색">
          <i class="fas fa-magnifying-glass"></i>
          <div id="daumRoughmapContainer1678675643784" 
          class="root_daum_roughmap root_daum_roughmap_landing"></div>
 
          <p>※ 판매 약국 검색은 일반의약품, 건강기능식품, 의약외품만 가능합니다.</p>
        </form>
      </div>
    </div>
    <script charset="UTF-8">
    new daum.roughmap.Lander({
      "timestamp" : "1678675643784",
      "key" : "2e2gi",
      "mapWidth" : "600",
      "mapHeight" : "300"
    }).render();
  </script>`;

    $('.ms_search > li:last-child').click(function(e){
      e.preventDefault();
      $('body').append(modal);
      $('.m_close').click(function(){
        $('.m_modal').fadeOut();
      });
    });

    // 2sec 제품소개페이지
    
    var m_product_slider = new Swiper(".m_product_slider", {
      grabCursor: true,
      effect: "creative",
      speed : 500,
      pagination: {
        el: ".p_page",
        type: "fraction",
        formatFractionCurrent: function (number) {
            return ('0' + number).slice(-2);
        },
        formatFractionTotal: function (number) {
            return ('0' + number).slice(-2);
        },
        renderFraction: function (currentClass, totalClass) {
            return '<span class="' + currentClass + '"></span>' + '/' + '<span class="' + totalClass + '"></span>';
        }
      },
      creativeEffect: {
        prev: {
          translate: ["-10%", 0, -1],
          opacity: 0
        },
        next: {
          translate: ["100%", 0, 0],
          opacity: 1
        },
      },
      navigation: {
        prevEl: ".p_lbtn",
        nextEl: ".p_rbtn",
      },
    });

    // 1sec 메인슬라이드
    let n =  0;
    console.log(n);

    // 기본값
  $('.ms_box > li > span').css('opacity','1');
  $('.ms_box > li:first-of-type > span').addClass('ms_fadein');
    move_a();

  $('.ms_btn > span').click(function(){
    n = $(this).index();
    console.log(n);

    // 슬라이드 이미지 너비 구함
    let img_w = $('.ms_box > li img').width()*n;
    console.log(img_w);

    // 슬라이드 이미지 이동
    $('.ms_box > li').animate({'left':-img_w},500);

    // 슬라이드 버튼 이동
    $('.ms_btn > span').removeClass('ms_on');
    $(this).addClass('ms_on');

    // 슬라이드 버튼 클릭시 글자 나타남
    if(n==0){
      $('.ms_box > li > span').css('opacity','0');
      $('.ms_box > li:first-of-type > span').addClass('ms_fadein').parent().siblings().find('span').removeClass('ms_fadein');
    }else if(n==1){
      $('.ms_box > li > span').css('opacity','0');
      $('.ms_box > li:nth-of-type(2) > span').addClass('ms_fadein').parent().siblings().find('span').removeClass('ms_fadein');
  
    }else{
      $('.ms_box > li > span').css('opacity','0');
      $('.ms_box > li:last-of-type > span').addClass('ms_fadein').parent().siblings().find('span').removeClass('ms_fadein');
    }
  });

  function move_a(){
    $('.ms_arrow').animate({'left':$('.ms_box > li').width() - 207 + 'px'},4800);
  }
  function return_a(){
    $('.ms_arrow').css('left','0px');
  }

  // 3초마다 반복호출하여 슬라이드가 자동으로 움직이게 한다.
  function autoslide(n){
    w = -(n*$('.ms_box > li img').width());
    $('.ms_box > li').animate({'left':w},500);

    // li.length에 따라 글자와 버튼 이동
    if(n==0){
      $('.ms_box > li > span').css('opacity','0');
      $('.ms_box > li:first-of-type > span').addClass('ms_fadein').parent().siblings().find('span').removeClass('ms_fadein');
      $('.ms_btn > span').siblings().removeClass('ms_on');
      $('.ms_btn > span:first-of-type').addClass('ms_on');
      return_a();
      move_a();
      
    }else if(n==1){
      $('.ms_box > li > span').css('opacity','0');
      $('.ms_box > li:nth-of-type(2) > span').addClass('ms_fadein').parent().siblings().find('span').removeClass('ms_fadein');
      $('.ms_btn > span').siblings().removeClass('ms_on');
      $('.ms_btn > span:nth-of-type(2)').addClass('ms_on');
      return_a();
      move_a();
      
    }else{
      $('.ms_box > li > span').css('opacity','0');
      $('.ms_box > li:last-of-type > span').addClass('ms_fadein').parent().siblings().find('span').removeClass('ms_fadein');
      $('.ms_btn > span').siblings().removeClass('ms_on');
      $('.ms_btn > span:last-of-type').addClass('ms_on');
      return_a();
      move_a();
    }
  }

  let Timer = setInterval(function(){
    if(n==2){
      n=0;
    }else{
      n++;
    }
    autoslide(n);
  },5000);

  $('.ms_btn > span').hover(function(){
    clearInterval(Timer);
  },function(){
    Timer = setInterval(function(){
      if(n==2){
        n=0;
      }else{
        n++;
      }
      autoslide(n);
    },5000);
    });


  });





