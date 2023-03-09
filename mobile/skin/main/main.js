$(function(){
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
          <input type="search" name="p_search" placeholder="제품명을 입력하세요">
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

    $('#map_search').click(function(e){
      e.preventDefault();
      $('body').append(modal);
      $('.m_close').click(function(){
        $('.m_modal').fadeOut();
      });
    });

  
   
    // if(sPos>=900 && sPos<=1875){
    //   const counter = ($counter, max) => {
    //     let now = max;
      
    //     const handle = setInterval(() => {
    //       $counter.innerHTML = Math.ceil(max - now);
        
    //       // 목표수치에 도달하면 정지
    //       if (now < 1) {
    //         clearInterval(handle);
    //       }
          
    //       // 증가되는 값이 계속하여 작아짐
    //       const step = now / 10;
          
    //       // 값을 적용시키면서 다음 차례에 영향을 끼침
    //       now -= step;
    //     }, 50);
    //   }
      
    // if(sPos>=900 && sPos<=1875) {
    //     // 카운트를 적용시킬 요소
    //     const $counter1 = document.querySelector(".count1");
    //     const $counter2 = document.querySelector(".count2");
    //     const $counter3 = document.querySelector(".count3");
    //     const $counter4 = document.querySelector(".count4");
    //     const $counter5 = document.querySelector(".count5");
        
    //     // 목표 수치
    //     const max1 = 1971;
    //     const max2 = 22007;
    //     const max3 = 1112;
    //     const max4 = 502;
    //     const max5 = 71;
        
    //     setTimeout(() => counter($counter1, max1), 2000);
    //     setTimeout(() => counter($counter2, max2), 2000);
    //     setTimeout(() => counter($counter3, max3), 2000);
    //     setTimeout(() => counter($counter4, max4), 2000);
    //     setTimeout(() => counter($counter5, max5), 2000);
    //   }
    // }
});