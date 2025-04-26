<?php

include_once('hieu/login.php');
session_start();

  $getKH = getAllBaihoc();
  $getfb = getFeedback();

    if(isset ($_POST['login2'])){
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $object = new login();
    $object-> Login($username,$password);

}

$id = isset($_GET['id']) ? (String)$_GET['id'] : '';


$ttkhoahoc = getKhoahoc($id);
$change = $_SESSION['user_id'];
disconnect_db();


?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="ListCourse3.css">
  <link rel="icon" type="image/png" href="images/logo.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#search').keyup(function(){
                var keyword = $(this).val();
                if (!$.trim(keyword)) {
                  // input text chỉ có khoảng trắng hoặc rỗng
                  $('#result').html(''); // xóa nội dung của result
              } else {
                $.ajax({
                    url: 'search.php',
                    type: 'POST',
                    data: {keyword: keyword},
                    success:function(data){
                        $('#result').html(data);
                    }
                });}
            });
        });
    </script>
</head>

<body>
  <section class="s1">

    <!-----Menu---->
    <div class="container1" id="s1">
      <div class="menu menuL">
        <label style="padding-right: 25px;" for="opendL"><i class="fas fa-bars"></i></label>
        <h3>Specialization</h3>
      </div>
      <a href="Home.html" class="logo">Fastlearn</a>

      <div class="menu menuR">
        <?php if (isset($_SESSION["login"])){ ?>
          <div id="nameSV" style="width:150px;"><label ><?php echo $_SESSION['login']['user']; ?></label></div>
          <!--  neu dang nhap roi thi hien dang xuat --> 
            <div style="width:100px;"><label class="Sin" for="opendR">Signout</label></div>
        <?php } else { ?>
            <div style="width:100px;"><label class="Sin" for="opendR">Sign in</label></div>
        <?php } ?>
      </div>

    </div>

    <!-----radio open close---->
    <input class="ip1" type="radio" name="slider" id="opendR">
    <input class="ip1" type="radio" name="slider" id="closeR">
    <input class="ip1" type="radio" name="slider" id="opendL">
    <input class="ip1" type="radio" name="slider" id="closeL">
    <!-----MenuBar Left---->
    <ul class="menuBar">
      <div  id="name"><label><?php echo $_SESSION['login']['user']; ?></label></div>
      <label for="closeL" class="closeBarL"><i class="fas fa-times"></i></label>
      <li id="li1"><a href="hocsinh.php">Home</a></li>
      <li>
        <input class="ip1" type="checkbox" id="showDrop">
        <label id="li" style="padding: 13px 35px 13px 35px;color:rgb(65, 64, 65);   list-style: none;" for="showDrop" class="mobile-item">Specialization</label>
        <ul class="drop-menu">
          <li><a href="ListCourse.php?id=skill">Skill</a></li>
          <li><a href="ListCourse.php?id=ngoai_ngu">Ngoai ngu</a></li>
          <li><a href="ListCourse.php?id=IT">IT</a></li>
          <li><a href="ListCourse.php?id=nghethuat_thuongmai">Foreign Language</a></li>
        </ul>
      </li>
      <li id="li1"><a href="hocsinh.php#s4">News</a></li>
      <li id="li1"> <a href="gvmk_edit.php?id=<?php echo $change; ?>">Change pass</a></li>
    </ul>

        <!-----MenuBar Sign in---->
      <?php if (!isset($_SESSION["login"])){ ?>
        <form class="login" method="POST" action="#">
        <?php if (isset($error)): ?>
          <div class="alert alert-danger" role="alert">
            <strong>Lỗi: </strong> <?php echo $error ?>
          </div>
        <?php endif ?>
        <label for="closeR" class="closeBarR"><i class="fas fa-times"></i></label>
        <input type="text" name="user" placeholder="Username">
        <input type="password" name="pass" placeholder="Password">
        
        <button name="login2">Login</button>
        <a class="SignUp" href="hieu/SignUp.php">Sign up</a>
      </form>
        <?php } else { ?>

      <!-- neu dang nhap roi thi hien dang xuat -->
      <form class="login" method="POST" action="../baicualinh/hieu/logout.php">
        <button onclick="confirmLogout()">Sign OUT</button>
        <label class="SignUp" for="closeR">Cancel</label>
      </form>
    <?php } ?>


    <!-----Images---->
    <div class="img">
      <img style="border-radius:0%" class="img1" src="https://mir-s3-cdn-cf.behance.net/project_modules/fs/87407b85587757.5ed7adb0a7896.jpg">
      <h1>Arts and Commerce course</h1>
    </div>
    <!-- page animation -->
    <div class="bartender">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>

  </section>

  <!--------section2-------->
  <section class=" s2">

    <div style="width:100%; text-align:center;">
      <h1 class="h1">ARTS AND COMMERCE<br>Courses</h1>
    </div>
    <div class="search2">
      <form action="" id="search-form">
        <input type="text" id="search" placeholder="Nhập tên khóa học..." />
        <button id="btnSearch" type="submit">SEARCH</button>
        <div id="result"></div>
      </form>
    </div>

    <div class="card-group">

      <div class="box1">
      
        <?php foreach ($ttkhoahoc as $item) {  ?>
          
          <div class="card-container"> <!--card 1-->
            <a onclick="window.location='In4Course.php?dd=<?php echo $item['ID_kh'] ?>'" class="hero-image-container">
              <img class="hero-image" src="<?php echo $item['poster'] ?>" />
            </a>
            <main class="main-content">
              <h1><a onclick="window.location='In4Course.php?dd=<?php echo $item['ID_kh'] ?>'">
                  <?php echo $item['Ten_kh'] ?></a></h1>
              <p><?php echo $item['Chi_tiet']  ?></p>
            </main>
            <div class="card-attribute">
              <img src="https://i.postimg.cc/SQBzNQf1/image-avatar.png" alt="avatar" class="small-avatar" />
              <p>Creation of <span><a href="#"><?php echo $item['ID_gv'] ?></a></span></p>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>
  </section>
  <!--------section3-------->
  <section class=" s3">
    <ul class="next">
      <li><a href="">
          <
      </li>
      <li id="li1"><a id="a1" href="">01</a></li>
      <!-- <li><a href="">02</a></li> -->
      <li><a href="">></a></li>
    </ul>
  </section>
  <!--------section8-------->
  <section class="s8">
    <div class="container8">
      <div class="icon2">
        <p>LET'S TALK :) </p>
        <div style="    display: flex; justify-content: space-between;">
          <a href="https://www.facebook.com/profile.php?id=100011408286166" target="_blank"><i class="  fa-brands fa-facebook-f"></i><br></a>
          <a href="https://www.instagram.com/pminh_0208/" target="_blank"><i class="  fa-brands fa-instagram"></i></a>
        </div>
      </div>
      <div class="text8">
        <p>© 2023 Coursera Inc. All rights reserved.</p>
      </div>
    </div>
  </section>
  <script src="ListCourse.js"></script>
</body>

</html>