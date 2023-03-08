// 이메일 이벤트 {
  function changeEmailSelect(){
    var emailSelect = document.getElementById('mail_select');
    var selectValue = emailSelect.options[emailSelect.selectedIndex].value;

    document.getElementById('data_email02').value = selectValue;
  }
  //}
  window.onload = function() {
    // 이메일 이벤트 {
    var emailSelect = document.getElementById('mail_select');

    emailSelect.addEventListener('change', changeEmailSelect);
    // }
  }


$(function(){
  const a_tab = $('div.agree_tab p.agree_btn');
  const a_tab_tri = $('div.agree_tab p.agree_btn span');

  a_tab.click(function(){
    $(this).find('span').removeClass().addClass('.agree_btn_act');
  })
});