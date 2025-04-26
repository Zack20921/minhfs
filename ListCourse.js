///Menu xuong khi cuon man hinh
let s1 = document.getElementById('s1');
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
    }else{
        s1.classList.remove('tofixed');
    }
})

document.addEventListener('scroll', (event) => {
    ams.forEach(am =>{
        if(am.offsetTop - window.scrollY < 450){
            am.classList.add('active');
        }
    })
})