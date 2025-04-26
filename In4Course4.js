// var container = document.querySelector('.boxchat');
// container.scrollTop = container.scrollHeight;

///send feedback
$(document).ready(function() {
    $('#sendfeed').click(function(e) {
        e.preventDefault();
        var fb = $('#fback').val();
        var khfb = $('#fbkH').val();
        var userfb = $('#fbuser').val();
        var tenuser = $('#tenuser').val();
  
        if (fb != ''){
        $.ajax({
        type: 'POST',
        url: 'In4Course_fb.php',
        data: {fb: fb, khfb: khfb, userfb: userfb, tenuser: tenuser},
        success: function(response) {
            $('#boxfb').append(response);
            $('#fback').val('');
        }
        });};
    });       
  });
  ///send chat
  $(document).ready(function() {
    $('#submitBtn').click(function(e) {
        e.preventDefault();
        var chat = $('#tinnhan').val();
        var user = $('#iduser').val();
        var kh = $('#idkh').val();
        var gv = $('#idgv').val();
  
        if (chat != ''){
        $.ajax({
        type: 'POST',
        url: 'In4Course_chat.php',
        data: {chat: chat, user: user, kh: kh, gv: gv},
        success: function(response) {
            $('#boxchat').append(response);
            $('#tinnhan').val('');
        }
        });};
    });       
  });
  ///Hiện show chat
  document.getElementById('chat').style.display = 'none';
  var checkbox2 = document.getElementById('Showmore2');
  var myDiv2 = document.getElementById('chat');
  checkbox2.addEventListener('click', function() {
    if (myDiv2.style.display === 'none') {
      myDiv2.style.display = 'block';
    } else {
      myDiv2.style.display = 'none';
    }
  });
  ///Hiện show feedback
  document.getElementById('s7').style.display = 'none';
  var checkbox = document.getElementById('Showmore');
  var myDiv = document.getElementById('s7');
  var body = document.getElementsByTagName('body')[0];
  checkbox.addEventListener('click', function() {
    if (myDiv.style.display === 'none') {
      myDiv.style.display = 'block';
      body.classList.add('hidden-overflow');
    } else {
      myDiv.style.display = 'none';
      body.classList.remove('hidden-overflow');
    }
  });
  
  ///Menu xuong khi cuon man hinh
  let s1 = document.getElementById('s1');
  let text = document.getElementById('text2b');
  let ams = document.querySelectorAll('.am');
  window.addEventListener('scroll',function(){
      let value = window.scrollY; 
      if(window.scrollY < 350){
          s1.style.top = value * 0.5 + 'px';
          text.style.top = value * 0.5 + 'px';
      }else{
          s1.style.top = value * 0 + 'px';
      }
      if(window.scrollY > 350){
          s1.classList.add('tofixed');
          text.classList.add('tofixed2');
      }else{
          s1.classList.remove('tofixed');
          text.classList.remove('tofixed2');
      }
  })
  
  document.addEventListener('scroll', (event) => {
      ams.forEach(am =>{
          if(am.offsetTop - window.scrollY < 450){
              am.classList.add('active');
          }
      })
  })