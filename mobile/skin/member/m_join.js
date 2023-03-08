//이용약관 보기
$(function(){
  let btn = $('.agree_btn');
  let act = $('.agree_btn span');

  btn.click(function(){
    $(this).next('.agree_tab').slideToggle();  
    $(this).find('span').toggleClass('agree_btn_act');

    return false;
    
  });
});



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

//비밀번호 확인
let password = document.getElementById("data_pw")
let confirm_password = document.getElementById("data_pw02");
let form = document.getElementById('form');

function validatePassword(event){
  if(password.value != confirm_password.value) { // 만일 두 인풋 필드값이 같지 않을 경우
    // setCustomValidity의 값을 지정해 무조건 경고 표시가 나게 하고
    confirm_password.setCustomValidity(alert("비밀번호가 같지 않습니다")); 
    event.preventDefault();
    // input.reportValidity() 
  } 
  else { // 만일 두 인풋 필드값이 같을 경우
    // 오류가 없으면 메시지를 빈 문자열로 설정해야한다. 오류 메시지가 비어 있지 않은 한 양식은 유효성 검사를 통과하지 않고 제출되지 않는다.
    // 따라서 빈값을 주어 submit 처리되게 한다
    confirm_password.setCustomValidity(''); 
  }
}

// password.keypress.validatePassword();
// confirm_password.keypress.validatePassword();
form.addEventListener('submit', function(event){
  validatePassword(event);
});