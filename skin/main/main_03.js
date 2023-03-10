$(function(){
  // 카운트를 표시할 요소
  const $counter = document.querySelector(".count1");

  // 목표수치
  const max = 50;

  counter($counter, max);

  function counter($counter, max) {
    let now = max;

    const handle = setInterval(() => {
      $counter.innerHTML = Math.ceil(max - now);
    
      // 목표에 도달하면 정지
      if (now < 1) {
        clearInterval(handle);
      }
    
      // 적용될 수치, 점점 줄어듬
      const step = now / 10;

      now -= step;
    }, 50);
  }

  //카운트를 적용시킬 요소
        // const $counter1 = document.querySelector(".count1");
        // const $counter2 = document.querySelector(".count2");
        // const $counter3 = document.querySelector(".count3");
        // const $counter4 = document.querySelector(".count4");
        
        // 목표 수치
        // const max1 = 50;
        // const max2 = 1;
        // const max3 = 1000;
        // const max4 = 251;
        
        // setTimeout(() => counter($counter1, max1), 50);
        // setTimeout(() => counter($counter2, max2), 3000);
        // setTimeout(() => counter($counter3, max3), 30);
        // setTimeout(() => counter($counter4, max4), 50);

        const maxArr = [50, 1, 1000, 251];

        for(let i = 0; i < maxArr.length; i++) {
          if(i == 1){
            setTimeout(() => counter(document.querySelector('.count'+(i+1)), maxArr[i]), 3000);
          } else {
            counter(document.querySelector('.count'+(i+1)), maxArr[i]);
          }
        }
        
});
