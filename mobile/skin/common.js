let gnbMnus = document.querySelectorAll('#gnb > li');

//gnb 사이드바
for(mnu in gnbMnus){ // gnb list
  if(mnu < gnbMnus.length-1){ // gnb list중 '채용' 제외
    gnbMnus[mnu].addEventListener('click', function(){ // 이벤트리스너 부착
      for(mnu_sub in gnbMnus) { // gnb list
        if(gnbMnus[mnu_sub] !== this && mnu_sub < gnbMnus.length-1) { // gnb list중 클릭한 요소와 '채용' 제외
          gnbMnus[mnu_sub].classList.remove('active'); // active 클래스 전부 제거
          gnbMnus[mnu_sub].querySelector('.lnb').style.height = '0'; // height값을 0으로
        }
      }
      this.classList.toggle('active'); // 클릭한 요소의 class toggle

      let childrenLength = this.querySelectorAll('.lnb > li').length;
      let childLnb = this.querySelector('.lnb');

      if(this.classList.contains('active')) {
        childLnb.style.height = (childrenLength*childLnb.querySelectorAll('li')[1].clientHeight) + 'px';
      } else {
        childLnb.style.height = '0';
      }
    });
  }
}


$(function(){
  $('.fam_select').hide();
  $('#FS').click(function(){
    // $(this).hide();
    $('.fam_select').slideToggle();
  });

});