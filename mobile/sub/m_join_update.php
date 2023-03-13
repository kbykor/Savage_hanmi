<?php
  include("./m_dbconn.php"); //DB 연결을 위한 같은 경로의 h_dbconn.php를 인클루드한다

  $mode = $_POST['mode']; //post 방식으로 가져옴

  if($mode != 'insert' && $mode != 'modify'){ //아무런 모드가 없다면 중단
    echo "<script>alert('mode 값이 제대로 넘어오지 않았습니다.');</script>";
    echo "<script>location.replace('./m_join.php');</script>";
    exit;
  }

  switch ($mode){
    case 'insert':
      $mb_id = trim($_POST['email']);
      $title = '회원가입';
      break;

    case 'modify':
      $mb_id = trim($_SESSION['ss_mb_id']);
      $title = "회원수정";
      break;
  }

  //사용자가 입력한 양식에 해당하는 값을 변수에 담아서 값이 있는지의 여부를 판단

  $mb_id = trim($_POST['data_email']); //이메일
  $mb_id_sub = trim($_POST['data_email02']); //이메일 @ 뒤 문자열
  $mb_password = trim($_POST['data_pw']); //첫 번째 패스워드
  $mb_password_re = trim($_POST['data_pw02']); //비밀번호 확인
  $mb_name = trim($_POST['data_name']); //이름
  $mb_birth = $_POST['data_birth']; //생년월일
  $mb_phone = $_POST['data_phone']; //휴대전화 번호
  $mb_email_agree = $_POST['data_email_agree']; //이메일 동의
  $mb_datetime = date('Y-m-d H:i:s', time()); //가입일
  $mb_modify_datetime = date('Y-m-d H:i:s', time()); //수정일

  //사용자가 입력한 데이터에 대해 입력 여부를 판단하는 if문 작성
  if(!$mb_id){
    echo "<script>alert('아이디가 넘어오지 않았습니다');</script>";
    echo "<script>location.replace('./m_join.php');</script>";
    exit; //== 자바스크립트 return; 
  }

  if(!$mb_password){
    echo "<script>alert('패스워드가 넘어오지 않았습니다');</script>";
    echo "<script>location.replace('./m_join.php');</script>";
    exit;
  }

  if(!$mb_name){
    echo "<script>alert('이름이 넘어오지 않았습니다');</script>";
    echo "<script>location.replace('./m_join.php');</script>";
    exit;
  }

  if(!$mb_birth){
    echo "<script>alert('생년월일이 넘어오지 않았습니다');</script>";
    echo "<script>location.replace('./m_join.php');</script>";
    exit;
  }

  if(!$mb_phone){
    echo "<script>alert('전화번호가 넘어오지 않았습니다');</script>";
    echo "<script>location.replace('./m_join.php');</script>";
    exit;
  }

  $mb_id = $mb_id.'@'.$mb_id_sub; // 아이디 이메일 형식으로 변경

  //데이터베이스
  $sql = "SELECT CONCAT('*', UPPER(SHA1(UNHEX(SHA1('$mb_password'))))) AS pass";
  //$sql = "select password('$mb_password') AS pass"; //입력한 비밀번호를 mysql password() 함수를 이용하여 암호화해서 가져옴 

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $mb_password = $row['pass'];

  if($mode == "insert") { //신규 등록 상태

    //회원가입을 시도하는 아이디가 사용 중
    $sql = "SELECT * FROM member WHERE data_email = '$mb_id'";

    $result = mysqli_query($conn, $sql); //결과값 다시 저장

    if(mysqli_num_rows($result)){ //사용 중인 아이디값이 있는 행이 있다면
      echo("<script>alert('이미 사용 중인 아이디입니다');</script>");
      echo("<script>location.replace('./m_join.php');</script>");
      exit;
    }

    //최종 검사 결과가 끝났으니 데이터베이스에 자료를 하나씩 입력한다
    $sql = "insert into member
    set
    data_email = '$mb_id',
    data_pw = '$mb_password',
    data_name = '$mb_name',
    data_birth = '$mb_birth',
    data_phone = '$mb_phone',
    data_email_agree = '$mb_email_agree',
    mb_datetime = '$mb_datetime'"; // 신규 가입 날짜

    $result = mysqli_query($conn, $sql); //입력 실행

  }else if($mode=="modify"){ 
    $sql = "update member
    set
    data_email = '$mb_id',
    data_pw = '$mb_password',
    data_name = '$mb_name',
    data_birth = '$mb_birth',
    data_phone = '$mb_phone',
    data_email_agree = '$mb_email_agree',
    mb_modify_datetime = '$mb_modify_datetime' 
    where data_email = '$mb_id'";

    $result = mysqli_query($conn, $sql); //입력 실행
  }

  if($result){
    echo "<script>alert('".$title."이 완료되었습니다');</script>";
    echo "<script>location.replace('./m_join_suc.php?name=$mb_name&id=$mb_id');</script>";
    exit;
  }else{
    echo "가입 실패: " .mysqli_error($conn);
    mysqli_close($conn); //데이터베이스 접속 종료 
  }

?>
