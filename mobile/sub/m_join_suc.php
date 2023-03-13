<?php
  $mb_name = $_GET['name'];
  $mb_id = $_GET['id'];

  include_once($_SERVER['DOCUMENT_ROOT'].'/header.php');
?>

  <main>
    <article>
      <h2 class="hidden">한미약품_회원가입완료</h2>
      <i class="fa-solid fa-circle-check"></i>
      <p><?=$mb_name?>님<br/>( <?=$mb_id?> )의<br>회원가입이 완료 되었습니다.
      </p>
      <p>회원가입 내역 확인 및 수정은 마이페이지 <i class="fa-solid fa-angle-right"></i> 회원정보수정에서 가능합니다.</p>
      <button type="button" value="로그인" onclick="location.href='./m_login.php'">로그인</button>
      <button type="button" value="메인으로" onclick="location.href='../index.php'">메인으로</button>

    </article>
  </main>
  
  <?php include_once($_SERVER['DOCUMENT_ROOT'].'/footer_m.php'); ?>
