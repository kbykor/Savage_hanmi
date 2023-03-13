<?php
  include_once($_SERVER['DOCUMENT_ROOT'].'/header.php');
?>
  <!-- 로그인 main -->
  <?php if(!isset($_SESSION['ss_mb_id'])){ //로그인 세션이 없을 경우 로그인 화면 ?>
  <!-- 로그인 html -->
  <main id="login">
    <div class="title_box">
      <h2>로그인</h2>
      <p class="title">한미의 꿈을 함께 할 당신을 기다립니다.</p>
    </div>
    <form name="hanmi_login" method="post" action="./h_login_check.php">
      <fieldset>
        <p>
          <label for="data_email">이메일</label><br>
          <input type="email" name="data_email" placeholder="이메일 주소를 입력해 주세요">
        </p>
        <p>
          <label for="data_pw">비밀번호</label><br>
          <input type="password" name="data_pw" placeholder="비밀번호를 입력해 주세요">
        </p>

        <ul class="ul_login">
          <li><a href="./h_join.php" title="회원가입">회원가입</a></li>
          <li><a href="#" title="아이디찾기">아이디찾기</a></li>
          <li><a href="#" title="비밀번호찾기">비밀번호찾기</a></li>
        </ul>

        <input type="submit" value="로그인">
      
      
        <div class="sns_box">
          <p>SNS로 가입하기</p>
          <ul>
            <li><a href="#" title="네이버로 가입하기"><img src="../images/logo_naver.png" alt="네이버"></a></li>
            <li><a href="#" title="카카오톡으로 가입하기"><img src="../images/logo_kakao.png" alt="카카오톡"></a></li>
            <li><a href="#" title="구글로 가입하기 "><img src="../images/logo_google.png" alt="구글"></a></li>
          </ul>
        </div>
      </fieldset>
    </form>

  <?php } else { //로그인 세션이 있을 경우 로그인 완료 화면 ?>
    <?php
      $mb_id = $_SESSION['ss_mb_id'];

      $sql = "select * from member where data_email = TRIM('$mb_id')"; //데이터 조회
      $result = mysqli_query($conn, $sql); //조회한 결과 변수에 담기
      $mb = mysqli_fetch_assoc($result); //회원 정보를 반복문을 통해 변수에 담기

      mysqli_close($conn); //데이터 접속 종료

      echo "<script>location.replace('../index.html');</script>";
    ?>
  <?php } ?>
  </main>
  <?php include_once($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>