//Menu xuong khi cuon man hinh
let s1 = document.getElementById('s1');
let rs = document.getElementById('rs');
let rs2 = document.getElementById('result');
let ams = document.querySelectorAll('.am');

window.addEventListener('scroll',function(){
    let value = window.scrollY; 
    if(window.scrollY < 350){
        s1.style.top = value * 0.5 + 'px';
    }else{
        s1.style.top = value * 0 + 'px';
    }
    if(window.scrollY > 350){
        s1.classList.add('tofixed');
        rs.classList.add('tofixed2');
    }else{
        s1.classList.remove('tofixed');
        rs.classList.remove('tofixed2');
    }
})

// document.addEventListener('scroll', (event) => {
//     ams.forEach(am =>{
//         if(am.offsetTop - window.scrollY < 450){
//             am.classList.add('active');
//         }
//     })
// })


///Card Slider
document.getElementById('next2').onclick = function(){
    const widthItem = document.querySelector('.card').offsetWidth;
    document.getElementById('formList').scrollLeft += widthItem;
}
document.getElementById('prev2').onclick = function(){
    const widthItem = document.querySelector('.card').offsetWidth;
    document.getElementById('formList').scrollLeft -= widthItem;
}

 ///Card Slider2 
document.getElementById('next3').onclick = function(){
    const widthItem = document.querySelector('.box2').offsetWidth;
    document.getElementById('formList2').scrollLeft += widthItem;
}
document.getElementById('prev3').onclick = function(){
    const widthItem = document.querySelector('.box2').offsetWidth;
    document.getElementById('formList2').scrollLeft -= widthItem;
}
  
  /// Chuyển ảnh
  let slider = document.querySelector('.slider .list');
  let items = document.querySelectorAll('.slider .list .item');
  let next = document.getElementById('next');
  let prev = document.getElementById('prev');
  let dots = document.querySelectorAll('.slider .dots li');
  
  let lengthItems = items.length - 1;
  let active = 0;
  next.onclick = function(){
      active = active + 1 <= lengthItems ? active + 1 : 0;
      reloadSlider();
  }
  prev.onclick = function(){
      active = active - 1 >= 0 ? active - 1 : lengthItems;
      reloadSlider();
  }
  let refreshInterval = setInterval(()=> {next.click()}, 3000);
  function reloadSlider(){
      slider.style.left = -items[active].offsetLeft + 'px';
      // 
      let last_active_dot = document.querySelector('.slider .dots li.active');
      last_active_dot.classList.remove('active');
      dots[active].classList.add('active');
  
      clearInterval(refreshInterval);
      refreshInterval = setInterval(()=> {next.click()}, 3000);
  
      
  }
  
  dots.forEach((li, key) => {
      li.addEventListener('click', ()=>{
           active = key;
           reloadSlider();
      })
  })
  window.onresize = function(event) {
      reloadSlider();
  };