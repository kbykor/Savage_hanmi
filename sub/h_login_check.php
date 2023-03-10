<?php
  //db연결
  include("./h_dbconn.php"); //DB 연결을 위한 같은 경로의 db_conn.php를 인클루드한다

  header("Content-Type: text/html; charset=UTF-8"); //한글 깨짐 방지

  //사용자가 입력한 아이디와 패스워드를 변수에 담는다
  $mb_id = trim($_POST['data_email']);
  $mb_password = trim($_POST['data_pw']);

  //만약 사용자가 아이디, 패스워드를 입력하지 않은 경우
  //메시지 보내기
  if(!$mb_id||!$mb_password){ //둘 중 하나라도 만족하지 않는다면
    echo "<script>alert('회원 아이디나 비밀번호가 공백이면 안 됩니다');</script>";
    echo "<script>location.replace('./h_login.php');</script>";
    exit;
  }

  //사용자가 입력한 아이디와 데이터베이스의 아이디 중 같은 것을 찾아 저장
  $sql = "select * from h_member where data_email='$mb_id'";
  $result = mysqli_query($conn, $sql);
  $mb = mysqli_fetch_assoc($result);


  //입력한 비밀번호를 MySQL password() 함수를 이용해 암호화해서 가져옴
  $sql = "SELECT CONCAT('*', UPPER(SHA1(UNHEX(SHA1('$mb_password'))))) AS pass";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $password = $row['pass'];

  if(!$mb['data_email'] || !($password === $mb['data_pw'])) {
    echo "<script>alert('가입된 회원 아이디가 아니거나 비밀번호가 틀립니다. \\n비밀번호는 대소문자를 구분합니다.');</script>";
    echo "<script>location.replace('./h_login.php');</script>";
    exit;
  }

  $_SESSION['ss_mb_id'] = $mb_id; //아이디, 비밀번호 확인 후 세션 생성
  mysqli_close($conn); //데이터베이스 접속 종료

  if(isset($_SESSION['ss_mb_id'])){
    echo "<script>alert('로그인 되었습니다');</script>";
    echo "<script>location.replace('../index.html');</script>";
  }

?>