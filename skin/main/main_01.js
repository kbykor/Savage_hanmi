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
          <label for="p_search">제품명 검색</label>
          <input type="search" name="p_search" id="p_search" placeholder="제품명을 입력하세요">
          <i class="fas fa-magnifying-glass"></i>
          <label for="map_name">지역명 검색</label>
          <select name="map_name">
            <option>강원도</option>
          </select>
          <select>
            <option>-</option>  
          </select>
          <input type="submit" value="약국검색">
          <div id="daumRoughmapContainer1678272972210" class="root_daum_roughmap root_daum_roughmap_landing"></div>
          <p>※ 판매 약국 검색은 일반의약품, 건강기능식품, 의약외품만 가능합니다.</p>
        </form>
      </div>
    </div>`;

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
  
  let n = $('.ms_btn').index();


  $('.ms_btn span').click(function(){
    n = $(this).index();
    console.log(n);

    let img_w = $('.ms_box > li img').width()*n;
    console.log(img_w);

    $('.ms_box > li').animate({'left':-img_w},500);

    $('.ms_btn > span').removeClass('ms_on');
    $(this).addClass('ms_on');

    $('.ms_box > li ')
  });

});