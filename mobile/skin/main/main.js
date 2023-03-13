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
      "mapWidth" : "100%",
      "mapHeight" : "300"
    }).render();
  </script>`;

  $('body').append(modal);

    $('.ms_search > li:last-child').click(function(e){
      e.preventDefault();
      $('.m_modal').css({'opacity':'1', 'visibility':'visible','z-index':'1000'});
      $('.m_close').click(function(){
        $('.m_modal').removeAttr('style');
      });
    });

      
    $('.ms_side > ul > li:nth-of-type(2)').click(function(e){
      e.preventDefault();
      $('.m_modal').css({'opacity':'1', 'visibility':'visible','z-index':'1000'});
      $('.m_close').click(function(){
        $('.m_modal').removeAttr('style');
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
    let img_w = $('.ms_box > li').width()*n;
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
      return_a();
      move_a();
    }else if(n==1){
      $('.ms_box > li > span').css('opacity','0');
      $('.ms_box > li:nth-of-type(2) > span').addClass('ms_fadein').parent().siblings().find('span').removeClass('ms_fadein');
      return_a();
      move_a();
  
    }else{
      $('.ms_box > li > span').css('opacity','0');
      $('.ms_box > li:last-of-type > span').addClass('ms_fadein').parent().siblings().find('span').removeClass('ms_fadein');
      return_a();
      move_a();
    }
  });

  function move_a(){
    $('.ms_arrow').animate({'left':$('.ms_box > li').width() - $('.ms_arrow').width() + 'px'},5000);
  }
  function return_a(){
    $('.ms_arrow').stop().css('left','0px');
  }

  // 3초마다 반복호출하여 슬라이드가 자동으로 움직이게 한다.
  function autoslide(n){
    w = -(n*$('.ms_box > li').width());
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
    return_a();
  },function(){
    Timer = setInterval(function(){
      if(n==2){
        n=0;
      }else{
        n++;
      }
      autoslide(n);
    },5000);
    move_a();
    });

    let ms_i = $('i.fa-pause');
    $('i.fa-pause').click(function(){
  
      if(ms_i!==0){
        clearInterval(Timer);
        return_a();
        $(this).removeClass('fa-pause');
        $(this).addClass('fa-play');
        ms_i = 0; 
      }else{      
        $(this).removeClass('fa-play');
        $(this).addClass('fa-pause');
        Timer = setInterval(function(){
          if(n==2){
            n=0;
          }else{
            n++;
          }
          autoslide(n);
        },5000);
        move_a();
        ms_i=1;
      }
      console.log(ms_i);
    });

          //////////스크롤 위치에 맞춰 등장이벤트//////////
  $(window).scroll(function(){
    let spos01 = $(this).scrollTop();
    console.log(spos01);
    if(spos01 >= 1250){
      $('.m_color01').addClass('active');
    }
    if(spos01 >= 2350){
      $('.m_color02').addClass('active');
    }
  });



  // 3sec 한미소개 카운트

  let onoff = false; // 실행 여부 확인 변수

  $(window).scroll(function(){

    let spos02 = $(this).scrollTop();

    if(spos02>=900&&spos02<=2000&&onoff==false){
      onoff = true;
      // 카운트를 표시할 요소
      const $counter = document.querySelector(".count1");

      // 목표수치
      const max = 50;

      counter($counter, max);

      function counter($counter, max) {
        let now = max;

        const handle = setInterval(() => {
          $counter.innerHTML = Math.ceil(max - now);
        
          // 목표에 도달하면 정지
          if (now < 1) {
            clearInterval(handle);
          }
        
          // 적용될 수치, 점점 줄어듬
          const step = now / 10;

          now -= step;
        }, 50);
      }

      const maxArr = [50, 1, 1000, 251];

      for(let i = 0; i < maxArr.length; i++) {
        if(i == 1){
          setTimeout(() => counter(document.querySelector('.count'+(i+1)), maxArr[i]), 3000);
        } else {
          counter(document.querySelector('.count'+(i+1)), maxArr[i]);
        }
      }

    }
  });





  });

