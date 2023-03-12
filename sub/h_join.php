<?php
  include('./h_dbconn.php'); //데이터베이스에 접근 하기 위한 내용

  if(isset($_SESSION['ss_mb_id'])&&$_GET['mode']=='modify'){//세션이 있고 회원 수정 mode라면 회원정보 가져옴

  }else{
    $mb = [
      'data_email' => '',
      'data_pw' => '',
      'data_pw02' => '',
      'data_name' => '',
      'data_birth' => '',
      'data_phone' => '',
      'data_email_agree' => ''
    ];
    $mode ="insert";
    $title ="회원가입";
    $modify_mb_info ='';
  }
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>한미약품_회원가입</title>


  <!-- CSS -->
  <link rel="stylesheet" href="../skin/reset.css" type="text/css">
  <link rel="stylesheet" href="../skin/base.css" type="text/css">
  <link rel="stylesheet" href="../skin/common.css" type="text/css">
  <link rel="stylesheet" href="./css/join.css" type="text/css">

  <!-- 폰트어썸 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="./css/join.js" defer></script>

</head>
<body>
  <!-- 헤더 삽입 -->
  <?php include_once('header.php'); ?>

  <!-- 회원가입 main -->
  <main id="join">
    <div class="title_box">
      <h2>회원가입</h2>
    </div>
    <!-- 이용약관 동의 -->
    <form name="" method="post" action="./h_join_update.php" id="form" onsubmit="return fregisterform_submit(this);">
      <input type="hidden" name="mode" value="<?php echo $mode ?>">
      <fieldset>
        <legend>정보 입력</legend>    
        <div class="join_agree">
          <div class="join_agree_title">
            <p class="agree_title">이용약관 동의</p>
            <p class="agree_red">* 필수 입력 칸입니다</p>
          </div>

          <!-- 이용 약관 01-->
          <div class="join_agree01">
            <p class="agree_title02">홈페이지 회원 서비스 이용약관 <span class="red">*</span></p>
            <p class="agree_btn agree_tab01_btn">보기 <span >▼</span></p>
            <div class="agree_tab01 agree_tab">
              <textarea name="이용약관" id="agree" cols="45" rows="20" readonly="" title="이용약관">제1조 (목적) 

    이 약관은 한미약품이 운영하는 웹사이트와 웹사이트에서 제공하는 온라인 컨텐츠를 이용함에 있어 회사와 이용자, 회원간의 권리와 의무, 이용조건, 책임사항 등을 규정할 목적으로 합니다.

    제2조 (약관의 효력과 변경) 

    1. 이 약관은 웹사이트의 서비스 화면 하단 기재를 통해 이용자에게 공시함으로써 효력이 발생합니다. 
    2. 웹사이트를 이용하는 이용자 및 동의를 통해 회원 가입된 이용자는 약관에 동의한 것으로 간주합니다. 
    3. 회사는 약관의 규제에 따른 법률 등 관련 법을 위반하지 않는 범위에서 이 약관의 내용을 변경할 수 있으며, 변경된 약관은 제 1항과 동일한 방법으로 공시함으로써 효력이 발생됩니다. 
    4. 약관의 변경 공시 이후의 웹사이트 및 관련 컨텐츠 이용은 약관 변경사항에 동의한 것으로 간주합니다. 
                
    제3조 (약관 외 준칙) 

    이 약관에 명시되지 않은 사항에 대해서는 관계법에 따라 적용합니다. 

    제4조 (용어의 정의) 

    1. 사용자: 해당 웹페이지와 웹페이지에서 제공하는 컨텐츠를 회원가입과 로그인 절차 없이 제한적으로 이용하는 이용자를 의미합니다. 
    2. 회원: 해당 웹페이지와 웹페이지에서 제공하는 컨텐츠를 사용하기 위해 동의를 통해 이용계약을 체결한 자를 의미합니다. 
    3. 회원가입: 한미약품 홈페이지의 회원으로 가입하기를 동의하는 것을 의미합니다. 
    4. 아이디: 회원의 식별을 위해 회원이 기재하고 회사가 승인하는 조합을 의미합니다. 
    5. 비밀번호: 회원이 개인 정보 보호 및 서비스의 원활한 이용을 위해 회원 자신이 결정하는 문자(숫자 포함)의 조합을 의미합니다. 
    6. 해지: 회사 또는 회원이 회원가입 후 이용계약을 종료하는 것을 의미합니다. 

    제5조 (서비스의 가입 및 이용) 

    1. 사용자가 해당 웹페이지의 컨텐츠를 제한없이 이용하기 위해서는 회사가 지정한 가입 신청 양식에서 요청하는 개인 정보를 기록, 신청해야 합니다. 
    2. 실명이나 실제 정보를 입력하지 않은 사용자는 법적인 보호를 받을 수 없으며 통지 없이 서비스 이용에 제한을 받을 수 있습니다. 
    3. 본 웹사이트에서 제공하는 서비스 이용은 무료입니다. 다만 컨텐츠의 활용과 관련된 사항은 관련 기준에 따라 별도의 계약이 필요하므로, 한미약품 홈페이지 담당자(T.02.0000.0000)에게 문의하시기 바랍니다. 
    4. 해당 웹사이트의 이용은 사이트의 기술상 특별한 지장이 없는 한 연중무휴로 제공됩니다. 

    제6조 (서비스 가입 및 이용의 제한) 

    1. 본 웹사이트는 다음의 경우 사용자의 회원 가입을 거부하거나, 사용에 제한을 둘 수 있습니다. 
    가. 실명을 이용하지 않거나, 타인의 명의를 도용하여 회원 가입하는 경우 
    나. 필수 입력 정보를 누락하는 경우 
    다. 사회의 질서 혹은 미풍양속을 저해할 목적으로 신청, 사용하는 경우 
    라. 기타 회사가 요구하는 이용 신청조건에 맞지 않는 경우 
    마. 개인정보 수집 및 이용에 대한 동의를 거부 할 경우 
    2. 본 웹사이트는 정기점검, 고장, 교체, 통신문제 등의 사유가 발생한 경우에 서비스 제공이 일시적으로 제한될 수 있습니다. 
    3. 본 사이트가 제공하는 저작물에 대한 저작권과 기타의 지적 재산권은 본 사이트에 귀속합니다. 
    4. 사용자는 사이트를 이용함으로써 영리 목적으로 이용해서는 안됩니다. 
    5. 본 사이트는 이용과 관련하여 사용자에게 발생한 손해에 대해서 책임을 지지 않습니다. 

    제7조 (의무) 

    1. 회사의 의무 
    사이트는 회원의 개인 정보를 보안 유지하며, 서비스의 개선 및 운영, 새로운 정보의 제공 등 사이트 내에서의 목적으로만 활용하며, 이외의 어떤 목적으로도 제3자에게 양도하지 않습니다. (단, 관계 법령상 수사상의 목적으로 관계기관으로부터 요구받거나, 정보통신윤리위원회의 요청이 있는 경우 등 적법한 절차에 의한 경우는 예외로 합니다.) 
    2. 사용자 및 회원의 의무 
    가. 회원은 이 약관에서 규정하는 사항과 관계법령, 사이트 내의 공지사항을 준수하여야 합니다. 
    나. 회원은 회사의 사전 동의없이 서비스를 이용한 영리 행위를 할 수 없습니다. 
    다. 회원은 회사의 동의 없이 저작권을 포함한 지적재산권을 침해할 수 없으며, 사이트와 제3자의 명예를 손상시키거나 업무에 방해를 주는 행위를 할 수 없습니다. 
    라. 회원은 아이디와 비밀번호에 대한 모든 책임을 가지며, 이에 따른 모든 결과에 대한 책임은 회원 본인에게 있습니다. 

    제8조 (정보의 제공) 

    해당 웹사이트의 관리자는 웹사이트를 운영함에 있어 각종 정보를 웹사이트 이외의 경로를 통해 제공할 수 있습니다. 

    제9조 (면책사항) 

    1. 회사는 불가항력으로 인하여 서비스를 제공할 수 없는 경우에는 서비스 제공에 관한 책임이 면제됩니다. 
    2. 회사는 회원의 귀책사유로 인한 서비스 이용의 장애 및 제한에 대하여 책임을 지지 않습니다. 
    3. 회사는 회원이 게재한 정보에 대한 모든 책임으로부터 면제되며 그 책임은 회원 및 사용자 본인에게 있습니다. 
    4. 회사는 해당 웹페이지를 매개로 한 회원과 제3자간의 분쟁 혹은 문제에 대해 책임이 면제됩니다. 
    5. 회사는 웹사이트와 웹사이트의 컨텐츠로 인해 발생한 손해 가운데 사용자 및 회원의 고의, 과실에 의한 손해에 대해서는 그 책임이 면제됩니다. 

    제10조 (관할 법원 및 준거법) 

    웹페이지 및 서비스 이용과 관련하여 회사와 사용자간 발생하는 모든 분쟁과 관련된 소송은 회사의 본사 소재지를 관할하는 법원을 관할 법원으로, 준거법은 한국법으로 합니다. 

    부칙
    이 약관은 2012년 8월 13일부터 시행합니다.</textarea>
            </div>
            <p class="check">
              <label for="use_agree01" class="use_agree"><input type="radio" name="use_agree01" id="use_agree01" value="Y" required>동의합니다.</label>
            </p>
          </div>

          <!-- 개인정보수집  -->
          <div class="join_agree02">
            <p class="agree_title02">홈페이지 회원 개인정보 수집 이용 동의서 <span class="red">*</span></p>
            <p class="agree_btn agree_tab02_btn">보기 <span>▲</span></p>
            <div class="agree_tab02 agree_tab">
              <textarea name="개인정보수집" id="agree02" cols="45" rows="20" readonly="" title="개인정보수집">
    개인정보처리방침 

    주식회사 한미약품은 (이하 '회사'는) 고객님의 개인정보를 중요시하며, "정보통신망 이용촉진 및 정보보호"에 관한 법률을 준수하고 있습니다. 회사는 개인정보취급방침을 통하여 고객님께서 제공하시는 개인정보가 어떠한 용도와 방식으로 이용되고 있으며, 개인정보보호를 위해 어떠한 조치가 취해지고 있는지 알려드립니다. 회사는 개인정보취급방침을 개정하는 경우 웹사이트 공지사항(또는 개별공지)을 통하여 공지할 것입니다. 

    1. 처리하는 개인정보 항목 

    회사는 사이버신문고(제보하기, 칭찬하기, 고객문의, CI문의 및 도용사례신고) 운영을 위해 아래와 같은 개인정보를 수집하고 있습니다. 
    사이버신문고 
    -  필수정보: 이름, 이메일, 연락처 
    ‘필수 정보 수집’ 동의를 거부할 권리가 있으며, 필수 정보 외 선택 정보의 수집에 동의를 거부할 수 있습니다. 필수 정보 수집의 동의를 하지 않을 경우 서비스 이용이 제한 될 수 있습니다. 
    서비스 이용과정에서 아래와 같은 정보들이 자동으로 생성되어 수집될 수 있습니다. 
    - IP Address, 쿠키, 방문 일시, 서비스 이용 기록 

    2. 개인정보 처리 목적 

    회사는 수집한 개인정보를 다음의 목적을 위해 활용합니다. 
    사이버신문고 서비스 이용에 따른 본인확인, 개인 식별, 불만처리 등 민원처리, 고지사항 전달 

    3. 개인정보의 처리 및 보유기간 

    원칙적으로, 개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다. 단, 관계법령의 규정에 의하여 보존할 필요가 있는 경우 회사는 아래와 같이 관계법령에서 정한 일정한 기간 동안 회원정보를 보관합니다. 
    보존 항목 : 문의접수시 기재한 개인정보 및 상담내용 
    보존 근거 : 전자상거래등에서의 소비자보호에 관한 법률(소비자의 불만 또는 분쟁처리에 관한 기록) 
    보존 기간 : 3년 

    4. 개인정보의 파기에 관한 사항 

    회사는 원칙적으로 개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체없이 파기합니다. 파기절차 및 방법은 다음과 같습니다. 
    1) 파기절차 
    회원님이 회원가입 등을 위해 입력하신 정보는 목적이 달성된 후 별도의 DB로 옮겨져(종이의 경우 별도의 서류함) 내부 방침 및 기타 관련 법령에 의한 정보보호 사유에 따라(보유 및 이용기간 참조) 일정 기간 저장된 후 파기되어집니다. 
    별도 DB로 옮겨진 개인정보는 법률에 의한 경우가 아니고서는 보유되어지는 이외의 다른 목적으로 이용되지 않습니다. 

    2) 파기방법 
    전자적 파일형태로 저장된 개인정보는 기록을 재생할 수 없는 기술적 방법을 사용하여 삭제합니다. 종이에 출력된 개인정보는 분쇄기로 분쇄하거나 소각을 통하여 파기 

    5. 개인정보처리의 위탁에 관한 사항 

    회사는 서비스 이행을 위해 아래와 같이 외부 전문업체에 위탁하여 운영하고 있습니다. 
    위탁업무 수행목적 외 개인정보 처리금지, 기술적․관리적 보호조치, 재위탁 제한, 수탁자에 대한 관리․감독, 손해배상 등 책임에 관한 사항을 규정하고, 수탁자가 개인정보를 안전하게 처리하는지를 감독하고 있습니다. 
    위탁 대상자 : 차동현 
    위탁업무 내용 : 홈페이지 운영(유지/보수) 
    위탁 기간 : 수집 및 이용 목적 달성 후 지체 없이 파기
    위탁업무의 내용이나 수탁자가 변경될 경우에는 지체없이 본 개인정보 처리방침을 통하여 공개하도록 하겠습니다. 

    6. 이용자 및 법정대리인의 권리 및 그 행사방법에 관한 사항

    이용자 및 법정 대리인은 언제든지 등록되어 있는 자신 혹은 당해 만 14세 미만 아동의 개인정보를 조회하거나 수정할 수 있으며 삭제를 요청할 수도 있습니다. 
    개인정보보호 책임자에게 서면, 전화 또는 이메일로 연락하시면 본인 확인 절차를 거친 후 지체 없이 조치하겠습니다. 
    이용자가 개인정보의 오류에 대한 정정을 요청한 경우에는 정정을 완료하기 전까지 당해 개인정보를 이용 또는 제공하지 않습니다. 또한 잘못된 개인정보를 제 3자에게 이미 제공한 경우에는 정정 처리결과를 제 3자에게 지체 없이 통지하여 정정이 이루어지도록 하겠습니다. 
    회사는 이용자 혹은 법정 대리인의 요청에 의해 해지 또는 삭제된 개인정보는 ‘3. 개인정보의 처리 및 보유기간’에 명시된 바에 따라 처리하고 그 외의 용도로 열람 또는 이용할 수 없도록 처리하고 있습니다. 

    7. 개인정보 자동수집 장치의 설치, 운영 및 그 거부에 관한 사항

    회사는 이용자의 정보를 수시로 저장하고 찾아내는 '쿠키(cookie)' 등을 운용합니다. 쿠키란 회사의 웹사이트를 운영하는데 이용되는 서버가 귀하의 브라우저에 보내는 아주 작은 텍스트 파일로서 이용자의 컴퓨터 하드디스크에 저장됩니다. 회사는 다음과 같은 목적을 위해 쿠키를 사용합니다. 
    - 쿠키 등 사용 목적 회원과 비회원의 접속 빈도나 방문 시간 등을 분석, 이용자의 취향과 관심분야를 파악 및 자취 추적, 방문 회수 파악 등을 통한 타겟 마케팅 및 개인 맞춤 서비스 제공
    귀하는 쿠키 설치에 대한 선택권을 가지고 있습니다. 따라서, 귀하는 웹브라우저에서 옵션을 설정함으로써 모든 쿠키를 허용하거나, 쿠키가 저장될 때마다 확인을 거치거나, 아니면 모든 쿠키의 저장을 거부할 수도 있습니다. 

    - 쿠키 설정 거부 방법 
    예: 쿠키 설정을 거부하는 방법으로는 회원님이 사용하시는 웹 브라우저의 옵션을 선택함으로써 모든 쿠키를 허용하거나 쿠키를 저장할 때마다 확인을 거치거나, 모든 쿠키의 저장을 거부할 수 있습니다. 
    설정방법 예(인터넷 익스플로어의 경우): 웹 브라우저 상단의 도구 > 인터넷 옵션 > 개인정보 
    단, 이용자가 쿠키 설치를 거부하였을 경우 서비스 제공에 어려움이 있을 수 있습니다. 

    8. 개인정보보호 책임자 및 담당 부서 등 안내 

    회사는 고객의 개인정보를 보호하고 개인정보와 관련한 불만을 처리하기 위하여 아래와 같이 관련 부서 및 개인정보관리책임자를 지정하고 있습니다. 

    개인정보보호 책임자 
    성 명: 강병영 
    소속부서: 글로벌SCM혁신실 
    지위: 실장 
    전화번호: 02-000-0000 

    개인정보보호 담당자 
    성 명: 김슬기 
    소속부서: 홍보실 
    전화번호: 02-000-0000 
    귀하께서는 회사의 서비스를 이용하시며 발생하는 모든 개인정보보호 관련 민원을 개인정보책임자 혹은 담당부서로 신고하실 수 있습니다. 회사는 이용자들의 신고사항에 대해 신속하게 충분한 답변을 드릴 것입니다. 
    기타 개인정보침해에 대한 신고나 상담이 필요하신 경우에는 아래 기관에 문의하시기 바랍니다. 

    개인정보침해신고센터 (privacy.kisa.or.kr / 국번없이 118) 
    대검찰청 사이버수사과 (www.spo.go.kr / 국번없이 1301) 
    경찰청 사이버안전국 (http://cyberbureau.police.go.kr / 국번없이 182) 

    9. 고지의 의무 

    현 개인정보처리방침 내용 추가, 삭제 및 수정이 있을 시에는 홈페이지의 ‘공지사항’을 통해 사전 고지할 것입니다.</textarea>
            </div>
            <p class="check">
              <label for="use_agree02" class="use_agree"><input type="radio" name="use_agree02" id="use_agree02" value="Y" required>동의합니다.</label>
            </p>
          </div>
        </div>

        <!-- 정보입력 -->
        <div class="user_data">
          <div class="user_data_title">
            <p class="agree_title">정보 입력</p>
          </div>
          
              <div class="data_email">
                <label for="data_email">이메일 <span class="red">*</span></label>
                <input type="text" name="data_email" id="data_email" placeholder="이메일을 입력해 주세요" value="<?php echo $mb['data_email'] ?>" <?php echo $modify_mb_info ?> required> @
                <input type="text" name="data_email02" id="data_email02" placeholder="직접 입력" value="<?php echo $mb['data_email02'] ?>">
                <select name="mail_select" id="mail_select">
                  <option value="직접 입력">직접 입력</option>
                  <option value="naver.com">naver.com</option>
                  <option value="kakao.com">kakao.com</option>
                  <option value="gmail.com">gmail.com</option>
                  <option value="nate.com">nate.com</option>
                </select>
                <p class="small">&middot; 로그인에 사용되는 이메일</p>
              </div>

              <div class="data_pw">
                <label for="data_pw">비밀번호 <span class="red">*</span></label>
                <input type="password" name="data_pw" id="data_pw" placeholder="비밀번호를 입력해 주세요" required>
                <p class="small">&middot; 비밀번호는 8~20자의 영문 대/소문자, 숫자, 특수문자(!@#$%^&*) 를 혼합해서 사용하실 수 있습니다.</p>
                <p class="small">&middot; 아이디와 생일, 전화번호 등 개인정보와 관련된 숫자, 연속된 숫자, 반복된 문자 등 다른 사람이 쉽게 알아 낼 수 있는 비밀번호는 개인정보 유출의 위험이 높으므로 사용을 자제해 주시기 바랍니다.</p>
                </ul>
              </div>

              <div class="data_pw02">
                <label for="data_pw02">비밀번호 확인 <span class="red">*</span></label>
                <input type="password" name="data_pw02" id="data_pw02" placeholder="비밀번호를 한 번 더 입력해 주세요" required>
                <p class="small confirm_password">&nbsp;</p>
              </div>

              <div class="data_name">
                <label for="data_name">이름 <span class="red">*</span></label>
                <input type="text" name="data_name" id="data_name" placeholder="이름을 입력해 주세요" value="<?php echo $mb['data_name'] ?>" <?php echo $modify_mb_info ?> required>
              </div>

              <div class="data_birth">
                <label for="data_birth">생년월일 <span class="red">*</span></label>
                <input type="date" name="data_birth" id="data_birth" placeholder="YYMMDD" required maxlength="6" value="<?php echo $mb['data_birth'] ?>" <?php echo $modify_mb_info ?> >
              </div>

                <div class="data_phone">
                <label for="data_phone">휴대폰 번호 <span class="red">*</span></label>
                <input type="text" name="data_phone" id="data_phone" placeholder="010-0000-0000" required maxlength="11" value="<?php echo $mb['data_phone'] ?>">
              </div>

              <div class="data_email_agree">
                <label for="data_email_agree">이메일 수신여부</label>
                <p>한미약품 관련 정보에 대한 이메일 수신에 동의하십니까?</p>
                <p class="email_check">
                  <label for="data_email_agree" class="data_email_agree"><input type="radio" name="data_email_agree" id="data_email_agree" value="Y" <?php echo $mb['data_email_agree'] ?>>동의합니다.</label>
                </p>
              </div>

              <div class="box_commit">
                <input type="submit" class="btn_submit" value="회원가입">
                <button type="button" value="돌아가기" onclick="location.href='../index.html'">돌아가기</button>
              </div>
        </div>
      </fieldset>
    </form>
  </main>

  <!-- 푸터 삽입 -->
  <?php include_once('footer.php'); ?>


  <script>
      function fregisterform_submit(f) { // submit 최종 폼체크

        if (f.mb_id.value.length < 1) { // 회원아이디 검사
          alert("이메일을 입력하십시오.");
          f.mb_id.focus();
          return false;
        }

        if (f.mb_password.value.length < 3) {
          alert("비밀번호를 3글자 이상 입력하십시오.");
          f.mb_password.focus();
          return false;
        }

        if (f.mb_password.value != f.mb_password_re.value) {
          alert("비밀번호가 같지 않습니다.");
          f.mb_password_re.focus();
          return false;
        }

        if (f.mb_password.value.length > 0) {
          if (f.mb_password_re.value.length < 3) {
            alert("비밀번호를 3글자 이상 입력하십시오.");
            f.mb_password_re.focus();
            return false;
          }
        }

        if (f.mb_name.value.length < 1) { // 이름 검사
          alert("이름을 입력하십시오.");
          f.mb_name.focus();
          return false;
        }

        if (f.mb_birth.value.length < 1) { // 생년월일 검사
          alert("이름을 입력하십시오.");
          f.mb_birth.focus();
          return false;
        }

        if (f.mb_phone.value.length < 1) { // 전화번호 검사
          alert("전화번호를 입력하십시오.");
          f.mb_phone.focus();
          return false;
        }
        
        // location.replace('./join_suc.html');

        // return true;

      }
    </script>
  
</body>
</html>