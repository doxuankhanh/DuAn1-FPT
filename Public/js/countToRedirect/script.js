const second = document.querySelector('#para')  
const startBtn = document.querySelector('#btnStart');
 const linkYtb = document.querySelector('#linkYtb').getAttribute("href");
 console.log(linkYtb);
 var timeLeft = 5;
second.innerHTML = "Chuyển trang trong " + timeLeft + " seconds";

   window.setInterval(function timeCount() {
     timeLeft -= 1;
     second.innerHTML =  "Chuyển trang trong " + timeLeft + " seconds";

     if (timeLeft == 0) {
         clearInterval(timeCount);
         window.location= linkYtb;
     }
 }, 1000)