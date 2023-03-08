let list_recruiter = document.querySelectorAll('.recruiter_list_content > ul > li');
let recruiterModal = document.querySelector('#recruiterModal');
const request = new XMLHttpRequest();
const url = './recruiter_modal.html'; // 소스 가져올 페이지



for(recruiter of list_recruiter){
  recruiter.addEventListener('click', () => {
    request.open('GET', url);
    request.send();
    request.onload = () => {
      recruiterModal.innerHTML = request.responseText;
      recruiterModal.showModal();
    };
  });
}