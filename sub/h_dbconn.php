<?php
//db_conn.php: 데이터베이스에 접근하기 위한 문서

//변수
$mysql_host = 'localhost';
$mysql_user = 'origin';
$mysql_password='kbkwgod0113!';
$mysql_db='origin';

//데이터베이스에 연결하는 변수
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

if(!$conn){ //연결 오류 발생 시 스크립트 종류
  die('연결 실패: '.mysqli_connect_error());
}

session_start(); //세션 시작

?>