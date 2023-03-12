<?php
  $mb_name = $_GET['name'];
  $mb_id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>한미약품_회원가입완료</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../skin/reset.css" type="text/css">
    <link rel="stylesheet" href="../skin/base.css" type="text/css">
    <link rel="stylesheet" href="../skin/common.css" type="text/css">
    <link rel="stylesheet" href="./css/join_suc.css" type="text/css">
  
    <!-- 폰트어썸 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
</head>
<body>
  <main>
    <article>
      <h2 class="hidden">한미약품_회원가입완료</h2>
      <i class="fa-solid fa-circle-check"></i>
      <p><?=$mb_name?>님<br/>( <?=$mb_id?> )의<br>회원가입이 완료 되었습니다.
      </p>
      <p>회원가입 내역 확인 및 수정은 마이페이지 <i class="fa-solid fa-angle-right"></i> 회원정보수정에서 가능합니다.</p>
      <button type="button" value="로그인" onclick="location.href='./h_login.php'">로그인</button>
      <button type="button" value="메인으로" onclick="location.href='../index.html'">메인으로</button>

    </article>
  </main>
  
</body>
</html>
