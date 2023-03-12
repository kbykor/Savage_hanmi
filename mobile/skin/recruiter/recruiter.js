let list_recruiter = document.querySelectorAll('.recruiter_list_content > ul > li'); // 채용공고들
let recruiterModal = document.querySelector('#recruiterModal'); // dialog 모달
let recruiter_top, recruiterWrite, recruiter_write, recruiter_close; // 모달 헤더, 모달 헤더 작성하기 버튼, 모달 작성하기 폼, 모달 닫기
const request = new XMLHttpRequest(); // 리퀘스트 가져오는 객체

for(recruiter of list_recruiter){
  recruiter.addEventListener('click', () => {
    request.open('GET', './recruiter_modal.html');
    request.send();
    request.onload = () => {
      recruiterModal.innerHTML = request.responseText;
      recruiterModal.showModal();
      recruiter_close = document.querySelector('#recruiterModal .recruiter_close'); // dialog 모달 닫기
      recruiter_close.addEventListener('click', function(){
        recruiterModal.close();
      })
      recruiter_top = document.querySelector('.recruiter_top'); // 모달 헤더
      recruiterWrite = document.querySelector('#recruiterWrite'); // 모달 헤더 작성하기 버튼
      recruiterWrite.addEventListener('click', () => {
        request.open('GET', './recruiter_modal_write.html');
        request.send();
        request.onload = () => {
          recruiterModal.innerHTML = request.responseText;
          recruiter_write = document.querySelector('.recruiter_write');
          recruiter_write.querySelector('#fileDoc').addEventListener('change', function() {
            recruiter_write.querySelector('.file_doc_label > div').innerHTML = this.files[0].name;
          });

          document.querySelector('.recruiter_submit').addEventListener('click', function(){
            recruiter_write.querySelector('.recruiter_submit').click();
          });
        };
        recruiterModal.scrollTop = 0;
      });
    };
  });

  if(recruiter.querySelector('.active_view') != undefined){
    console.log(recruiter.querySelector('.active_view'));
    recruiter.querySelector('.active_view').addEventListener('click', (e) => {
      e.stopPropagation();
      request.open('GET', './recruiter_modal_view.html');
      request.send();
      request.onload = () => {
        recruiterModal.innerHTML = request.responseText;
        recruiterModal.showModal();
        recruiter_close = document.querySelector('#recruiterModal .recruiter_close'); // dialog 모달 닫기
        recruiter_close.addEventListener('click', function(){
          recruiterModal.close();
        })
      }
    });
  }
}


recruiterModal.addEventListener('click', (event) => {
  if (event.target.nodeName === 'DIALOG') {
    recruiterModal.close();
  }
});

recruiterModal.addEventListener('scroll', () => {
  if(recruiterModal.scrollTop > 0) {
    recruiter_top.style.height = '100px';
    recruiter_top.style.borderBottom = '3px solid #000';
  } else {
    recruiter_top.style.height = '0';
    recruiter_top.style.borderBottom = '3px solid transparent';
  }
});