<?php

session_start(); //세션 시작
session_unset(); //모든 세션 변수를 언레지스터 시켜 줌
session_destroy(); //세션 해제

header("Content-Type:text/html; charset=UTF-8"); //한글 깨짐 방지

if(!isset($_SESSION['ss_mb_id'])){ //세션 정보가 삭제됐다면
  echo "<script>alert('로그아웃 되었습니다');</script>";
  echo "<script>location.replace('../index.html');</script>";
  exit;
}

?>