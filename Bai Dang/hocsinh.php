<?php
require 'feedbackstt.php';
$feedbackstt = get_all_feedbackstt();
disconnect_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="hocsinh.css">
    <link rel="icon"    type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
      <section class="s1">
      
        <!-----Menu---->
        <div class="container1" id="s1">
        <div class="menu menuL">
        <label style="padding-right: 25px;" for="opendL"><i class="fas fa-bars"></i></label>
        <h3>Projects</h3>   
        </div>
        <a href="Home.html" class="logo">Zack</a>
        <div class="menu menuR">
          <div class="search-box">
            <button class="btn-search"><i class="fas fa-search"></i></button>
            <input type="text" class="input-search" placeholder="Type to Search...">
          </div>
        
        <div style="width:100px;"><label class="Sin" for="opendR" >Sign in</label></div>
        </div>
    </div>

    <!-----radio open close---->         
    <input class="ip1" type="radio" name="slider" id="opendR">
    <input class="ip1" type="radio" name="slider" id="closeR">
    <input class="ip1" type="radio" name="slider" id="opendL">
    <input class="ip1" type="radio" name="slider" id="closeL">
            <!-----MenuBar Left---->
    <ul class="menuBar">
        <label for="closeL" class="closeBarL"><i class="fas fa-times"></i></label>
        <li id="li1"><a href="Home.html">Home</a></li>
        <li id="li"><a  href="">Projects</a></li>
        <li >
          <input class="ip1" type="checkbox" id="showDrop">
          <label id="li1" style="padding: 13px 118px 13px 35px;color:rgb(65, 64, 65);   list-style: none;" for="showDrop" class="mobile-item">Course</label>
          <ul class="drop-menu">
            <li><a href="ListCourse.html">Arts and Commerce</a></li>
            <li><a href="ListCourse.html">Manage</a></li>
            <li><a href="ListCourse.html">IT</a></li>
            <li><a href="ListCourse.html">Foreign Language</a></li>
          </ul>
        </li>
        <li id="li1"><a href="#s4">News</a></li>
    </ul>

    <!-----MenuBar Sign in---->
    <form class="login">
      <label for="closeR" class="closeBarR"><i class="fas fa-times"></i></label>
      <input type="text" placeholder="Username">
      <input type="password" placeholder="Password">
      <button>Login</button>
      <a class="SignUp" href="SignUp.html">Sign up</a>
    </form>

    <!-----Slide Image---->

    <div class="slider">
        <div class="list">
            <div class="item">
                <img src="https://img-c.udemycdn.com/notices/web_carousel_slide/image/09206fc2-d0f1-41f6-b714-36242be94ee7.jpg" alt="">
                <div class="text">
                    <h1>Build ready-for-anything teams</h1>
                    <p style="margin:10px 0px 20px 0px">See why leading organizations choose to learn with Udemy Business.</p>
                    <a href="#s3">Course</a>
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
            <button id="prev"><</button>
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


    <!--------section2-------->  
<section class="am s2">
    <div class="FatsL">
        <h1 class="showtotop delay-02">Flast Leanr</h1>
        <h2 class="showtotop delay-04">Online Courses</h2>
    </div>
    <div style="z-index:6;" class="container2 container2a">
        <div class="number">
            <h1 class="showtotop delay-06">1.</h1>
            <h2 class="showtotop delay-08">EXPANSION</h2>
            <p class="showtotop delay-1">Choose one of them amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum.</p>
        </div>
        <div class="number">
            <h1 class="showtotop delay-12">2.</h1>
            <h2 class="showtotop delay-14">DEVELOPMENT</h2>
            <p class="showtotop delay-16">Choose one of them amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum.</p>
        </div>
    </div>

    <div class="container2 container2b">
        <img class="showtotop delay-08"  id="img4" src="https://i.pinimg.com/564x/f4/92/fc/f492fca20f6bf050ad817c30180a31c4.jpg" >
        <img class="showtotop delay-08" id="img5"src="https://i.pinimg.com/564x/04/e2/58/04e258aae12a2abe4fcdf9234614d48b.jpg" >
        <img class="showtotop delay-08" id="img6"src="https://i.pinimg.com/736x/e8/ca/0b/e8ca0b0448f36f375deee47a4cf98ba5.jpg" >
    </div>

    <div class="container2 container2c">
        <div class="number">
            <h1 class="showtotop delay-06">3.</h1>
            <h2 class="showtotop delay-08">EXPANSION</h2>
            <p class="showtotop delay-1">Choose one of them amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum.</p>
        </div>
        <div class="number">
            <h1 class="showtotop delay-12">4.</h1>
            <h2 class="showtotop delay-14">DEVELOPMENT</h2>
            <p class="showtotop delay-16">Choose one of them amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum.</p>
        </div>
    </div>
</section>

    <!--------section3-------->  
    <section id="s3" class="am s3">
      <div class="title2">
          <h1 class="showtotop delay-02">Specialization</h1>
          <p class="showtotop delay-06">Choose one of them amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum.</p>

      </div>


  <div id="formList">
      <div id="list">

          <!-- Images 1 -->

          <div class = "showtotop delay-08 card">
              <img src="https://images.unsplash.com/photo-1656618020911-1c7a937175fd?crop=entropy&cs=tinysrgb&fm=jpg&ixid=MnwzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2NTc1MzQyNTE&ixlib=rb-1.2.1&q=80" alt="">
              <div class="card-content">
                <h2>
                  Arts and Commerce
                </h2>
                <p>
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum, quia explicabo laboriosam rem adipisci voluptates cumque, veritatis atque nostrum corrupti ipsa asperiores harum? Dicta odio aut hic.
                </p>
                <a href="ListCourse.html" class="button">
                  VIEW MORE 
                </a>
              </div>
            </div>

            <!-- Images 2 -->
          <div class = "showtotop delay-1 card">
              <img src="https://images.unsplash.com/photo-1656618020911-1c7a937175fd?crop=entropy&cs=tinysrgb&fm=jpg&ixid=MnwzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2NTc1MzQyNTE&ixlib=rb-1.2.1&q=80" alt="">
              <div class="card-content">
                <h2>
                  Manage
                </h2>
                <p>
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum, quia explicabo laboriosam rem adipisci voluptates cumque, veritatis atque nostrum corrupti ipsa asperiores harum? Dicta odio aut hic.
                </p>
                <a href="ListCourse.html" class="button">
                  VIEW MORE 
                </a>
              </div>
            </div>
            
              <!-- Images 3 -->
          <div class = "showtotop delay-12 card">
              <img src="https://images.unsplash.com/photo-1656618020911-1c7a937175fd?crop=entropy&cs=tinysrgb&fm=jpg&ixid=MnwzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2NTc1MzQyNTE&ixlib=rb-1.2.1&q=80" alt="">
              <div class="card-content">
                <h2>
                  IT
                </h2>
                <p>
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum, quia explicabo laboriosam rem adipisci voluptates cumque, veritatis atque nostrum corrupti ipsa asperiores harum? Dicta odio aut hic.
                </p>
                <a href="ListCourse.html" class="button">
                  VIEW MORE 
                </a>
              </div>
            </div>

              <!-- Images 4 -->
          <div class = "card">
              <img src="https://images.unsplash.com/photo-1656618020911-1c7a937175fd?crop=entropy&cs=tinysrgb&fm=jpg&ixid=MnwzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2NTc1MzQyNTE&ixlib=rb-1.2.1&q=80" alt="">
              <div class="card-content">
                <h2>
                  Foreign Language
                </h2>
                <p>
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt exercitationem iste, voluptatum, quia explicabo laboriosam rem adipisci voluptates cumque, veritatis atque nostrum corrupti ipsa asperiores harum? Dicta odio aut hic.
                </p>
                <a href="ListCourse.html" class="button">
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

    <!--------section4-------->  
        <section class="am s5">
          <div class="title3">
              <p class="showtotop delay-02" id="p1">(Popular Courses)</p>
              <h1 class="showtotop delay-06">Get a head start on a degree today</h1>
              <p class="showtotop delay-08">Make progress towards a degree by starting with a course.</p>

          </div>
      <div id="formList2">
          <div id="list2">

              <!-- Images 1 -->

              <a href="In4Course.html" class=" showtotop delay-1 box2">
                <div class="img"><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://s3.amazonaws.com/coursera_assets/ddp/branding/illinois/iMBA+square.jpg?auto=format%2Ccompress%2C%20enhance&dpr=1&w=265&h=204&fit=crop&q=50" ></div>
                <h3>Master of Business Administration (iMBA)</h3>
                <p>Degree</p>
            </a>

                <!-- Images 2 -->
                <a href="In4Course.html" class="showtotop delay-12 box2">
                  <div class="img"><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://s3.amazonaws.com/coursera_assets/ddp/branding/mas-engineering-berkeley/1203ebfb-99c9-4919-b943-18add117e361.jpg?auto=format%2Ccompress%2C%20enhance&dpr=1&w=265&h=204&q=50&fit=crop" ></div>
                  <h3>MSc Data Science (Statistics)</h3>
                  <p>Degree</p>
              </a>

                
                  <!-- Images 3 -->
                  <a href="In4Course.html" class="showtotop delay-14 box2">
                    <div class="img"><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://s3.amazonaws.com/coursera_assets/ddp/branding/mads-umich/thumbnail.jpg?auto=format%2Ccompress%2C%20enhance&dpr=1&w=265&h=204&fit=crop&q=50" ></div>
                    <h3>Master of Science in Data Science</h3>
                    <p>Degree</p>
                </a>
      

                  <!-- Images 4 -->
                  <a href="In4Course.html" class="showtotop delay-16 box2">
                    <div class="img"><img src="https://i.pinimg.com/736x/d6/ba/80/d6ba80e717e07f49de7eb2446c45d6ee.jpg" ></div>
                    <h3>Master of Applied Data Science</h3>
                    <p>Degree</p>

                </a>
                  <!-- Images 5 -->
                  <a href="In4Course.html" class="showtotop delay-18 box2">
                    <div class="img"><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://s3.amazonaws.com/coursera_assets/ddp/branding/imsa/imsa-thumbnail.jpg?auto=format%2Ccompress%2C%20enhance&dpr=1&w=265&h=204&fit=crop&q=50" ></div>
                    <h3>Master's of Accounting (iMSA)</h3>
                    <p>Degree</p>
                </a>
                
                  <!-- Images 6 -->
                  <a href="In4Course.html" class="showtotop delay-2 box2">
                    <div class="img"><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://d15cw65ipctsrr.cloudfront.net/68/1d6c6fa0d14b78967ce4c477eaf0ef/061022_Alberto0218_RGB-1.png?auto=format%2Ccompress%2C%20enhance&dpr=1&w=265&h=204&fit=crop&q=50" ></div>
                    <h3>Master of Business Administration (iMBA)</h3>
                    <p>Degree</p>
                </a>    

          </div>
      </div>
      <div class="divSee" ><a href="">See More <i class="fa-solid fa-arrow-right"></i></a></div>
      <div class="direction2">
          <button id="prev3"> < </button>
          <button id="next3"> > </button>
      </div>
    </section>

    <!--------section5-------->  
    <section id="s4" class=" am s4">
      <h1 class="showtotop delay-02" id="news">NEWS</h1>
      <div class=" showtotop delay-06 containerText">
          <div class=" showtotop delay-08 h1"><h1 >strength</h1></div>
          <div class="showtotop delay-09 h1"><h1 >Weakness</h1></div>
          <div class="showtotop delay-1 h1"><h1 >Opportunity</h1></div>
          <div  style="margin-right:80px;" class="showtotop delay-12 h1"><h1 >Threat</h1></div>
      </div>
      <div class="  containerImg">
        <?php foreach ($feedbackstt as $item) { ?>
          <a href="" class="showtotop delay-14 box">
              <div class="img"><img src="https://i.pinimg.com/736x/d6/ba/80/d6ba80e717e07f49de7eb2446c45d6ee.jpg" ></div>
              <h3>Our Strength</h3>
               <tr>
                    <th scope="col">Tên bài đăng</th><br>
                    <td class="dt"><?php echo $item['Ten_post']; ?></td><br>

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
    <section class="am s6">
        <div class="container6">
            <div class="img6">
                <img class="showtotop delay-06" id="img1" src="https://i.pinimg.com/564x/49/b9/a8/49b9a8979af250df5ccbe1449ff1f509.jpg" >
                <img class="showtotop delay-08" id="img2"src="https://i.pinimg.com/564x/04/e2/58/04e258aae12a2abe4fcdf9234614d48b.jpg" >
                <img class="showtotop delay-02" id="img3"src="https://i.pinimg.com/736x/e8/ca/0b/e8ca0b0448f36f375deee47a4cf98ba5.jpg" >
            </div>

            <div class="text6">
                <div class="text6b" >
                <h1 class="showtotop delay-1 ">Student results on Coursera</h1>
                <p class="showtotop delay-12">87  % of people who learn for professional development say it has career benefits , such as getting a promotion, a raise, or starting a new career</p>
                <a class="showtotop delay-16" href="">Register for free</a>
              </div>
            </div>
        </div>
    </section>

        <!--------section7-------->  
    <section class=" am s7">
        <h2 class="showtotop delay-02">Testimonials</h2>
    <figure class="zoomshow box5">
        <figcaption>
            <img src="https://flxt.tmsimg.com/assets/733885_v9_bb.jpg" alt="" class="">
          <blockquote>
            <p>You'll get the best of what you put in. He is trying his best to give us the best. Had the best experience working with him.</p>
          </blockquote>
          <h3>Tom Holland</h3>
          <h4>Google Inc.</h4>
        </figcaption>
      </figure>
      <figure class="zoomshow box5">
        <figcaption>
            <img src="images/ng3.jpg" alt="" class="">
          <blockquote>
            <p>I choose Zack when I need a UI/UX project done right. He removes the stress from design projects with great visual detail.</p>
          </blockquote>
          <h3>Tobey Maguire</h3>
          <h4>Facebook</h4>
        </figcaption>
      </figure>
      <figure class="zoomshow box5">
        <figcaption>
            <img src="https://m.media-amazon.com/images/M/MV5BNzk0MDQ5OTUxMV5BMl5BanBnXkFtZTcwMDM5ODk5Mg@@._V1_UY1200_CR136,0,630,1200_AL_.jpg" alt="" class="">
          <blockquote>
            <p>I am floored, impressed, very happy, and jumping up and down whenever we work with Zack on UI or web design. </p>
          </blockquote>
          <h3>Robert Pattinson</h3>
          <h4>Twitter</h4>
        </figcaption>
      </figure>
    </section>

        <!--------section8-------->  
        <section class="s8">
            <div class="container8">
                <div class="icon2">
                    <p>LET'S TALK :) </p>
                    <div style="    display: flex; justify-content: space-between;">
                    <a href="https://www.facebook.com/profile.php?id=100011408286166"  target="_blank"><i class="  fa-brands fa-facebook-f"></i><br></a>
                    <a href="https://www.instagram.com/pminh_0208/" target="_blank"><i class="  fa-brands fa-instagram"></i></a>
                </div>
                </div>
                <div class="text8">
                    <p>© 2023 Coursera Inc. All rights reserved.</p>
                </div>
            </div>
        </section>

<script src="hocsinh.js"></script>
</body>
</html>