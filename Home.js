  //cuộn chuột kích hoạt a
  window.addEventListener('scroll', function() {
    // Kiểm tra xem vị trí cuộn hiện tại có bằng độ dài từ đỉnh tới cuối trang hay không
    if ('scrool') {
      // Kích hoạt thẻ <a> khi cuộn đã max màn hình
      document.getElementById("myLink").click();
    }
  });
  
  //page animation
function handleClick(event) {
    event.preventDefault();
    const bars = document.querySelectorAll('.bar');
    bars.forEach((bar,i) => {
        bar.style.animationPlayState="running";
    });

    const lastBar = bars[bars.length - 1];
    lastBar.addEventListener("animationend", () => {
        setTimeout(() => {
            window.location = event.target.href;
        }, 500);
    });
}
  
  //Thay đôi background đầu tiên
window.onload = function() {
    setTimeout(function() {
      document.getElementById("myBG").style.backgroundImage = "url(https://mir-s3-cdn-cf.behance.net/project_modules/fs/32abd785587757.5ed7adb0a87ee.jpg)";
    }, 7000);
  };


  //Thay đổi animation
  setTimeout(function() {
    var element = document.querySelector('.background .img:nth-child(1)');
    element.style.animationName = 'zoom-1';
  }, 24800);
  setTimeout2(function() {
    var element = document.querySelector('.background .img:nth-child(2)');
    element.style.animationName = 'zoom-2';
  }, 24800);

  window.onload = function() {

  };
  