<?php
require 'libra/ketnoidb.php';

session_start();
$feedbackstt = get_all_feedbackstt();

// Kiểm tra nếu người dùng đã đăng nhập, nếu chưa thì chuyển hướng về trang đăng nhập
if(!isset($_SESSION["login"]) ){          
    header("location: hieu/index1.php");
    exit;  
}

//ktra vai tro cua nguoi dang nhap
if ($_SESSION["role"]["vt"] != "sinh_vien"){
  echo "<script type='text/javascript'>alert('Hay dang nhap bang tai khoan user');</script>";
  header("location: hieu/index1.php");
  exit;
}

// sau 30p tu dong logout
if (time() - (int)$_SESSION['time'] >= 1800)
  {
      unset($_SESSION['login']);
      header('Location: hieu/index1.php');
  }

// echo $_SESSION["role"]["vt"];
$getKH = getAllBaihoc();
$getfb = getFeedback();
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
  <link rel="stylesheet" href="hocsinh5.css">
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
        <h3>Home</h3>
      </div>
      <a href="Home.html" class="logo">Fastlearn</a>
      <div class="menu menuR">
          <div class="search-box">
              <button class=" btn-search"><i class="fas fa-search"></i></button>
              <input type="text" id="search" class="input-search" placeholder="Type to Search...">
          </div>
        <!-- <label for="" ><i class="fa-solid fa-magnifying-glass"></i></label> -->
        <label style="margin-left:10px" id="nameSV" ><?php echo $_SESSION['login']['user']; ?></label>
        <label class="Sin" for="opendR">Signout</label>
      </div>

    </div>
    <div class="result" id="rs">
    <div id="result"></div>
    </div>
    <!-----radio open close---->
    <input class="ip1" type="radio" name="slider" id="opendR">
    <input class="ip1" type="radio" name="slider" id="closeR">
    <input class="ip1" type="radio" name="slider" id="opendL">
    <input class="ip1" type="radio" name="slider" id="closeL">
    <!-----MenuBar Left---->
    <ul class="menuBar menuBarL">
      <div  id="name"><label><?php echo $_SESSION['login']['user']; ?></label></div>
      <label for="closeL" class="closeBarL"><i class="fas fa-times"></i></label>
      <li id="li1"><a href="#">Home</a></li>
      <li id="li1"><a href="#s3">Specialization</a></li>
      <li id="li1"><a href="#s4">News</a></li>
      <li id="li1"> <a href="gvmk_edit.php?id=<?php echo $change; ?>">Change pass</a></li>
    </ul>

    <form class="login" method="POST" action="hieu/logout.php">
      <button onclick="confirmLogout()">Sign OUT</button>
      <label class="SignUp" for="closeR">Cancel</label>
    </form>

    <!-----Slide Image---->

    <div class="slider">
      <div class="list">
        <div class="item">
          <img src="https://img-c.udemycdn.com/notices/web_carousel_slide/image/09206fc2-d0f1-41f6-b714-36242be94ee7.jpg" alt="">
          <div class="text">
            <h1>Build ready-for-anything teams</h1>
            <p style="margin:10px 0px 20px 0px">See why leading organizations choose to learn with Udemy Business.</p>
            <a href="">Course</a>
          </div>
        </div>
        <div class="item">
          <img src="images/ng2.jpg" alt="">
          <div class=" text text2">
            <h1>Learning that gets you</h1>
            <p style="margin:10px 0px 20px 0px">Skills for your present (and your future). Get started with us.</p>
          </div>
        </div>
        <div class="item">
          <img src="images/ng.jpg" alt="">
        </div>
        <div class="item">
          <img src="images/ng2.jpg" alt="">
        </div>
        <div class="item">
          <img src="images/ng2.jpg" alt="">
        </div>
      </div>
      <div class="buttons">
        <button id="prev"> < </button>
        <button id="next">></button>
      </div>
      <ul class="dots">
        <li class="active"></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
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


  <!-- ------section2-------->
  <section class="s2">
    <div class="FatsL">
      <h1>Flast Leanr</h1>
      <h2>Online Courses</h2>
    </div>
    <div style="z-index:6;" class="container2 container2a">
      <div class="number">
        <h1 >1.</h1>
        <h2 >EXPANSION</h2>
        <p>Choose one of them amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum.</p>
      </div>
      <div class="number">
        <h1>2.</h1>
        <h2>DEVELOPMENT</h2>
        <p>Choose one of them amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum.</p>
      </div>
    </div>

    <div class="container2 container2b">
      <img id="img4" src="https://i.pinimg.com/564x/f4/92/fc/f492fca20f6bf050ad817c30180a31c4.jpg">
      <img id="img5" src="https://i.pinimg.com/564x/04/e2/58/04e258aae12a2abe4fcdf9234614d48b.jpg">
      <img id="img6" src="https://i.pinimg.com/736x/e8/ca/0b/e8ca0b0448f36f375deee47a4cf98ba5.jpg">
    </div>

    <div class="container2 container2c">
      <div class="number">
        <h1 >3.</h1>
        <h2 >EXPANSION</h2>
        <p >Choose one of them amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum.</p>
      </div>
      <div class="number">
        <h1>4.</h1>
        <h2>DEVELOPMENT</h2>
        <p>Choose one of them amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum.</p>
      </div>
    </div>
  </section>

  

  <!--------section3-------->
  <section id="s3" class="s3">
    <div class="title2">
      <h1>Khoa hoc</h1>
      <p>Choose one of them amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum.</p>
    </div>
    
    <div id="formList">
      <div id="list">
        <!-- Images 1 -->
        <div class=" card">
          <?php $pl = "skill";
          $item = getKhoahoc($pl); 
          ?>
          <img src="https://images.unsplash.com/photo-1656618020911-1c7a937175fd?crop=entropy&cs=tinysrgb&fm=jpg&ixid=MnwzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2NTc1MzQyNTE&ixlib=rb-1.2.1&q=80" alt="">
          <div class="card-content">
            <h2>
              SKILL
            </h2>
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum, quia explicabo laboriosam rem adipisci voluptates cumque, veritatis atque nostrum corrupti ipsa asperiores harum? Dicta odio aut hic.
            </p>
            <a onclick="window.location ='ListCourse.php?id=<?php foreach($item as $i) echo $i['Phan_loai'] ?>'" class="button">
              VIEW MORE 
            </a>
          </div>
        </div>

        <!-- Images 2 -->
        <div class=" card">
          <?php $pl = "ngoai_ngu";
          $item = getKhoahoc($pl); ?>

          <img src="https://images.unsplash.com/photo-1656618020911-1c7a937175fd?crop=entropy&cs=tinysrgb&fm=jpg&ixid=MnwzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2NTc1MzQyNTE&ixlib=rb-1.2.1&q=80" alt="">
          <div class="card-content">
            <h2>
              NGOAI NGU
            </h2>
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum, quia explicabo laboriosam rem adipisci voluptates cumque, veritatis atque nostrum corrupti ipsa asperiores harum? Dicta odio aut hic.
            </p>
            <a onclick="window.location ='ListCourse.php?id=<?php foreach($item as $i) {echo $i['Phan_loai']; break;} ?>'" class="button">
              VIEW MORE
            </a>
          </div>
        </div>

        <!-- Images 3 -->
        <div class="card">
          <?php $pl = "IT";
          $item = getKhoahoc($pl); ?>
          <img src="https://images.unsplash.com/photo-1656618020911-1c7a937175fd?crop=entropy&cs=tinysrgb&fm=jpg&ixid=MnwzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2NTc1MzQyNTE&ixlib=rb-1.2.1&q=80" alt="">
          <div class="card-content">
            <h2>
              IT
            </h2>
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum, quia explicabo laboriosam rem adipisci voluptates cumque, veritatis atque nostrum corrupti ipsa asperiores harum? Dicta odio aut hic.
            </p>
            <a onclick="window.location ='ListCourse.php?id=<?php foreach($item as $i) {echo $i['Phan_loai']; break;} ?>'" class="button">
              VIEW MORE
            </a>
          </div>
        </div>

        <!-- Images 4 -->
        <div class="card">
          <?php $pl = "nghethuat_thuongmai";
          $item = getKhoahoc($pl); ?>
          <img src="https://images.unsplash.com/photo-1656618020911-1c7a937175fd?crop=entropy&cs=tinysrgb&fm=jpg&ixid=MnwzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2NTc1MzQyNTE&ixlib=rb-1.2.1&q=80" alt="">
          <div class="card-content">
            <h2>
              ART AND COMMERCE
            </h2>
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum, quia explicabo laboriosam rem adipisci voluptates cumque, veritatis atque nostrum corrupti ipsa asperiores harum? Dicta odio aut hic.
            </p>
            <a onclick="window.location ='ListCourse.php?id=<?php foreach($item as $i) {echo $i['Phan_loai']; break;} ?>'" class="button">
              VIEW MORE
            </a>
          </div>
        </div>

      </div>
    </div>

    <div class="direction">
      <button id="prev2"> < </button>
      <button id="next2"> > </button>
    </div>
  </section>

  <!--------section5-------->
  <section class=" s5">
    <div class="title3">
      <p id="p1">(Popular Courses)</p>
      <h1 >Get a head start on a degree today</h1>
      <p>Make progress towards a degree by starting with a course.</p>

    </div>
    <div id="formList2">
      <div id="list2">

        <!-- Images 1 -->

        <?php foreach($getKH as $g) { ?>
        <a class=" box2" onclick=" window.location='In4Course.php?dd=<?php echo $g['ID_kh'] ?>'">
          <div class="img">
            <img src="<?php echo $g['poster']; ?>">
          </div>
          <h3 ><?php echo $g['Ten_kh']; ?></h3>
          <p>Degree</p>
          
        </a>
          <?php } ?>

      </div>
    </div>
    <div class="divSee"><a href="">See More <i class="fa-solid fa-arrow-right"></i></a></div>
    <div class="direction2">
      <button id="prev3">
        < </button>
          <button id="next3"> > </button>
    </div>
  </section>


  <!--------section4-------->
  <section id="s4" class=" s4">
  <h1 id="news">NEWS</h1>
  <div class="containerText">
      <div class=" h1"><h1 >strength</h1></div>
      <div class="h1"><h1 >Weakness</h1></div>
      <div class="h1"><h1 >Opportunity</h1></div>
      <div  style="margin-right:80px;" class="h1"><h1 >Threat</h1></div>
  </div>
  <div class="containerImg">
    <?php foreach ($feedbackstt as $item) { ?>
      <a href="" class="box">
          <div class="img"><img src="https://i.pinimg.com/736x/d6/ba/80/d6ba80e717e07f49de7eb2446c45d6ee.jpg" ></div>
          <h3><?php echo $item['Ten_post']; ?></h3>
          <tr>
                <th scope="col"></th><br>
                <td class="dt"></td><br>

                <th scope="col">Ngày đăng bài</th><br>
                <td class="dt"><?php echo $item['Ngay_post']; ?></td><br>
                
                <th scope="col">Nội dung bài đăng</th><br>
                <td class="dt"><?php echo $item['Noi_dung_post']; ?></td><br>
              </tr>
      </a>
            <tbody>
              <?php } ?>         
            </tbody>
  </div>
  </section>
  <!--------section6-------->
  <section class=" s6">
    <div class="container6">
      <div class="img6">
        <img id="img1" src="https://i.pinimg.com/564x/49/b9/a8/49b9a8979af250df5ccbe1449ff1f509.jpg">
        <img id="img2" src="https://i.pinimg.com/564x/04/e2/58/04e258aae12a2abe4fcdf9234614d48b.jpg">
        <img id="img3" src="https://i.pinimg.com/736x/e8/ca/0b/e8ca0b0448f36f375deee47a4cf98ba5.jpg">
      </div>

      <div class="text6">
        <div class="text6b" >
          <h1>Student results on Coursera</h1>
          <p>87 % of people who learn for professional development say it has career benefits , such as getting a promotion, a raise, or starting a new career</p>
          <label class="Sin" for="opendR">Register for free</label>
        </div>
      </div>
    </div>
  </section>

  <!--------section7-------->
  <section class=" s7">
    <h2>Testimonials</h2>
    <?php foreach($getfb as $f){ ?>
    <figure class="box5">
      <figcaption>
        <img src="https://flxt.tmsimg.com/assets/733885_v9_bb.jpg" alt="" class="">
        <blockquote>
          <p><?php echo $f['Noi_dung_fb']; ?></p>
        </blockquote>
        <h3>Tom Holland</h3>
        <h4>Google Inc.</h4>
      </figcaption>
    </figure>
    <?php } ?>
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

  <script src="hocsinh2.js"></script>
</body>

</html>