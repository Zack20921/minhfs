<?php
require 'libra/ketnoidb.php';
session_start();
$id = isset($_GET['dd']) ? (String)$_GET['dd'] : '';
if($id){
    if(isset($_SESSION["login"])){
        $idsv = $_SESSION['user_id'];
        $a = $_SESSION['login']['user'];
        $user=getiduser($a);
        $tenuser= gettenuser($a);
        $yp = get1DKKH($id,$idsv);
        $data = get_idkh($id);
        $ycmt = getcmt_rep($user, $data['ID_gv']);
        $iddki = $yp['Ma_dki'];
    }
    
    $date = date('Y-m-d');

    $change = $_SESSION['user_id'];
    // $yj = getKhoahoc();
    $yi = getBaihoc($id);
    $yu = getIn4C();
    $yo = getChitietkh($id);
    $yt = getCourse_id($id);

    if($yt['Ngay_ket_thuc']< $date){
        echo '<script type="text/javascript">';
        echo 'if (confirm("Khóa học này đã đóng")) {';
        echo 'window.history.back();'; // Quay lại trang trước
        echo '} else {';
        echo 'window.history.back();}';
        echo '</script>'; 
    }
    


    $ya = getFeedback3($id);
    $yb = getFeedback2($id);
    $data = get_idkh($id);
   


date_default_timezone_set("Asia/Ho_Chi_Minh");
$time = date('Y-m-d');


// dang ki khoa hoc

if(isset($_POST['join'])){
    if($yp['bool'] == 0){
        $yl = addDKKH($id, $idsv, $time);
        header("Refresh:0");
    }
}

// huy khoa hoc
if(isset($_POST['unjoin'])){
    if($yp['bool'] == 1){
        delDKKH($iddki);
        header("Refresh:0");
    }
}

}

// echo $yp['bool'];

// xac thuc nguoi dung

// if(!isset($_SESSION["login"])){
//   header("location: ../baicualinh/hieu/index1.php");
//   exit;
// }

if(isset($_SESSION["login"])){
  //ktra vai tro cua nguoi dang nhap
  if ($_SESSION["role"]["vt"] != "sinh_vien"){
    echo "<script type='text/javascript'>alert('Hay dang nhap bang tai khoan user');</script>";
    header("location: hieu/index1.php");
    exit;
  }
}

// sau 30p se logout

// if (time() - (int)$_SESSION['time'] >= 1800)
// {
//     unset($_SESSION['login']);
//     header('Location: hieu/index1.php');
// }

disconnect_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="In4Course8.css">
    <link rel="icon"   type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>
      <section class="s1">
          
            <!-----Menu---->
            <div class="container1" id="s1">
            <div class="menu menuL">
            <label style="padding-right: 25px;" for="opendL"><i class="fas fa-bars"></i></label>
            <h3 style="margin:0;">Specialization</h3>
            
            </div>
            <a href="Home.html" class="logo">Fastlearn</a>
            <div class="menu menuR">
                <?php if (isset($_SESSION["login"])){ ?>
            <!--  neu dang nhap roi thi hien dang xuat --> 
                    <div id="nameSV" style="width:150px;"><label ><?php echo $_SESSION['login']['user']; ?></label></div>
                    <div style="width:100px;"><label class="Sin" for="opendR" >Signout</label></div>
                <?php } else { ?>
                    <div style="width:100px;"><label  class="Sin" for="opendR">Sign in</label></div>
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
            <label id="li" style="padding: 0 35px 0 35px;color:rgb(65, 64, 65); list-style: none;" for="showDrop" class="mobile-item">Specialization</label>
            <ul class="drop-menu">
            <li><a href="ListCourse.php?id=skill">Skill</a></li>
            <li><a href="ListCourse.php?id=ngoai_ngu">Ngoai ngu</a></li>
            <li><a href="ListCourse.php?id=IT">IT</a></li>
            <li><a href="ListCourse.php?id=nghethuat_thuongmai">Foreign Language</a></li>
            </ul>
        </li>
        <li id="li1"><a href="hocsinh.php#s4">News</a></li>
        <li id="li1"> <a href="gvmk_edit.php?id=<?php echo $change; ?>">Change pass</a></li>
            <form method="post" action="">
                <button id="drc" name="unjoin" >Drop course!</button>
            </form>  
        </ul>

        <!-----MenuBar Sign in---->
        <!-- <form class="login">
        <label for="closeR" class="closeBarR"><i class="fas fa-times"></i></label>
        <input type="text" placeholder="Username">
        <input type="password" placeholder="Password">
        <button>Login</button>
        <a class="SignUp" href="SignUp.html">Sign up</a>
        </form> -->

        <?php if (!isset($_SESSION["login"])){ ?>
        <form class="login" method="POST" action="hieu/index1.php">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
            <strong>Lỗi: </strong> <?php echo $error ?>
            </div>
        <?php endif ?>
        <label for="closeR" class="closeBarR"><i class="fas fa-times"></i></label>
        <input type="text" name="user" placeholder="Username">
        <input type="password" name="pass" placeholder="Password">
        
        <button name="login2" >Login</button>
        <a class="SignUp" href="hieu/SignUp.php">Sign up</a>
        </form>
        <?php } else { ?>

        <!-- neu dang nhap roi thi hien dang xuat -->
        <form class="login" method="POST" action="hieu/logout.php">
        <button onclick="confirmLogout()">Sign Out</button>
        <label class="SignUp" for="closeR">Cancel</label>
        </form>
        <?php } ?>

    
    </section>


    <!--------section2-------->  

    <section class="s2">
        <div class="text2">
            <h1><?php 
                echo $yt['Ten_kh'];
             ?>
           </h1>
            <p><?php  echo $yt['Chi_tiet']; ?></p> 




        </div>
        <div id="text2b"  class="text2b">
            <div class="text2c">
                <h3>Get started today!</h3>
                
                <?php  if (isset($_SESSION['login'])){
                if($yp['bool'] == 0 ){
                        $bool = 0;
                } else {
                    $bool = 1;
                }} ?>

                <?php if (isset($_SESSION["login"]) && ($bool == 1) ){ ?>
                    <p>Xin chao <?php echo $_SESSION['login']['user']; ?></p>
                    
                <?php } elseif(isset($_SESSION["login"]) && ($bool == 0) ){?> 
                    <p>Click here to join this course</p>
                    <form method="post" action="">
                    <a id="btnJoin" style="text-align: center" 
                    onclick="window.location='hieu/thanh_toan.php?id=<?php echo $id ?>&idsv=<?php echo $idsv ?>'"
                    type="button" value="Join now!">Join now!</a>
                    </form>  

                <?php } else { ?>
                    <p>Click here to join this course</p>
                    <label style="text-align:center" id="btnJoin" for="opendR" >Join </label>
                <?php } ?>

                <p id="dt"  style="color:#5c4d30" class="font-weight-bold">Course Details</p>
                <p id="dt"><i class="fa-solid fa-user" style="color:#5c4d30"></i> Lecturer: <?php  echo $yt['Ten_gv']; ?></p> 
                <p id="dt"><i class="fa-solid fa-money-check-dollar" style="color:#5c4d30"></i> Cost: <?php  echo $yt['Hoc_phi']; ?>vnd</p> 
                <p id="dt"><i class="fa-solid fa-hourglass-end" style="color:#5c4d30"></i> Start: <?php  echo $yt['Ngay_bat_dau']; ?></p> 
                <p id="dt"><i class="fa-solid fa-hourglass-start" style="color:#5c4d30"></i> End: <?php  echo $yt['Ngay_ket_thuc']; ?></p> 
            </div>
        </div>
    </section>

    <!--------section3-------->  
<section class="s0">
    <section class="s3">
        <div class="text3">
            <h1>What you'll learn</h1>
            <div class="box3">
                <?php foreach($yo as $i){ ?>
                <div class="text3b">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="fit-content"viewBox="0 0 50 50">
                        <path d="M 42.875 8.625 C 42.84375 8.632813 42.8125 8.644531 42.78125 8.65625 C 42.519531 8.722656 42.292969 8.890625 42.15625 9.125 L 21.71875 40.8125 L 7.65625 28.125 C 7.410156 27.8125 7 27.675781 6.613281 27.777344 C 6.226563 27.878906 5.941406 28.203125 5.882813 28.597656 C 5.824219 28.992188 6.003906 29.382813 6.34375 29.59375 L 21.25 43.09375 C 21.46875 43.285156 21.761719 43.371094 22.050781 43.328125 C 22.339844 43.285156 22.59375 43.121094 22.75 42.875 L 43.84375 10.1875 C 44.074219 9.859375 44.085938 9.425781 43.875 9.085938 C 43.664063 8.746094 43.269531 8.566406 42.875 8.625 Z"></path>
                        </svg>
                    <p><?php echo $i['target'] ?></p>
                </div>
                <?php }?>
                
            </div>

            <div class="box3">
            <?php foreach($yo as $i){ ?>
                <div class="text3b">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="fit-content" viewBox="0 0 50 50">
                        <path d="M 42.875 8.625 C 42.84375 8.632813 42.8125 8.644531 42.78125 8.65625 C 42.519531 8.722656 42.292969 8.890625 42.15625 9.125 L 21.71875 40.8125 L 7.65625 28.125 C 7.410156 27.8125 7 27.675781 6.613281 27.777344 C 6.226563 27.878906 5.941406 28.203125 5.882813 28.597656 C 5.824219 28.992188 6.003906 29.382813 6.34375 29.59375 L 21.25 43.09375 C 21.46875 43.285156 21.761719 43.371094 22.050781 43.328125 C 22.339844 43.285156 22.59375 43.121094 22.75 42.875 L 43.84375 10.1875 C 44.074219 9.859375 44.085938 9.425781 43.875 9.085938 C 43.664063 8.746094 43.269531 8.566406 42.875 8.625 Z"></path>
                        </svg>
                        <p><?php echo $i['target'] ?></p>

                </div>
                <?php }?>

            </div>
        </div>
    </section>

            <!--------section4-------->  
        <section class="s4">
            <h1>Course content</h1>
            <div class="box4">
            <li >
                <input class="ip1" type="checkbox" id="Dropbox">
                <div class="label">
                <label  for="Dropbox" class="mobile-item"><i class="fa-solid fa-angle-down"></i></label>
                <label  for="Dropbox">Course</label>
                </div>
                <ul class="drop-menu2">
                    <?php foreach($yi as $i){?>
                        <li><a href="#"><?php echo $i["Ten_bh"]  ?></a></li>
                   <?php } ?>
                  
                </ul>
              </li>
            </div>
        </section>

        <section class="s4">
            <h1>Course content</h1>
            <div class="box4">
            <li >
                <input class="ip1" type="checkbox" id="Dropbox1">
                <div class="label">
                <label  for="Dropbox1" class="mobile-item"><i class="fa-solid fa-angle-down"></i></label>
                <label  for="Dropbox1">Course</label>
                </div>
                <ul class="drop-menu2 drop-menu3">
                    <?php foreach($yi as $i){?>
                        <li><a href="#"><?php echo $i["Ten_bh"]  ?></a></li>
                   <?php } ?>
                  
                </ul>
              </li>
            </div>
        </section>



        <!--------section5-------->  

        <section class="s5">
            <div class="text5">
                <h1>Requirements</h1>
                <?php foreach($yo as $i){?>

                <li><?php echo $i['require'];?></li>
                <?php }?>
                <!-- <li>Downloading and installing Python is covered at the start of the course.</li>
                <li>Basic computer skills: surfing websites, running programs, saving and opening documents, etc.</li> -->
            </div>

            <div class="text5b">
                <h1>Description</h1>
                <?php foreach($yi as $i){
                    echo $i['motaBH'];
                } ?>
            </div>
        </section>

        
        <!--------section6-------->  

 <section class="s6">
            <div class="container mt-5">

                <div class="row">

                    <div class="col-md-8 p-0">
                
                        <div class="headings d-flex justify-content-between align-items-center mb-3">
                            <h5>Unread feedback(6)</h5>
            
                            <div class="buttons">
            
                                <span class="badge bg-white d-flex flex-row align-items-center">
                                    <span class="text-primary">Comments "ON"</span>
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                      
                                    </div>
                                </span>
                                
                            </div>
                            
                        </div>




                        <!--------feedback-------->  
                        <div id="boxfb">
                            <?php foreach($ya as $i){?>
                            <div  class="card p-3 mt-2">
                
                                <div class="d-flex justify-content-between align-items-center">
                
                            <div class="user d-flex flex-row align-items-center">
                
                                <img src="https://mir-s3-cdn-cf.behance.net/project_modules/fs/122db085587757.5ed7d338b0e72.jpg" width="30" class="user-img rounded-circle mr-2">
                                <span><small class="font-weight-bold text-primary">
                                <?php echo $i['Ten_sv'];?>
                                </small> <small class="font-weight-bold"><?php echo $i['Noi_dung_fb']?></small></span>
                                
                            </div>
                
                
                            <small><?php
                                if($i['Ngay_fb'] >= 7 && $i['Ngay_fb'] < 30) {
                                $tuan =  intdiv($i['Ngay_fb'], 7);
                                echo  $tuan. " weeks ago";
                            }
                            if ($i['Ngay_fb'] >= 30 && $i['Ngay_fb'] < 365){
                                $thang = intdiv($i['Ngay_fb'], 30);
                                echo  $thang. " months ago";
                            }
                            if($i['Ngay_fb'] >= 365){
                                $nam = intdiv($i['Ngay_fb'], 365);
                                echo $nam. " years ago";
                            }
                            if($i['Ngay_fb'] <7 ) {
                                echo $i['Ngay_fb']. " days ago";
                            }
                            ?></small>
                
                            </div>
                
                
                            <div class="action d-flex justify-content-between mt-2 align-items-center">
                
                                <div class="reply px-4">
                                    <small>Remove</small>
                                    <span class="dots"></span>
                                    <small>Reply</small>
                                    <span class="dots"></span>
                                    <small>Translate</small>
                                
                                </div>
                
                                <div class="icons align-items-center">
                
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-check-circle-o check-icon"></i>
                                    
                                </div>
                                
                            </div>
                            </div>
                            <?php } ?>  
                        </div>
                        
                         <!--------Gửi feedback-------->  
                        <div class="Show mt-3">
                        <input class="ip2 d-none" type="checkbox" id="Showmore">
                        <label   for="Showmore" class="mobile2">Show all reviews</i></label>
                        </div>
                        <?php if(isset($_SESSION["login"]) && ($bool == 1)) { ?>
                            <form class="send mt-3" method="post">
                            <input id="fback" type="text"  name="Feedback" placeholder="Enter your feedback here..."> 
                            <input id="fbkH" type="hidden"  value="<?php echo $data['ID_kh']; ?>"/> 
                            <input id="tenuser" type="hidden" value="<?php echo $tenuser; ?>"/> 
                            <input  id="fbuser" type="hidden" value="<?php echo $user; ?>"/> 
                            <button id="sendfeed"  type="submit" name="save" value="SAVE"><i class="fa-solid fa-share"></i></button>
                            </form>
                        <?php } ?>
                    </div>
                    

                </div>
            </div>

        </section>
</section>

                <!--------section7 show all fb -------->  

        <div class="s7" id="s7">
            <div class="container7">
            <div class="d-flex justify-content-end align-items-center "><label  for="Showmore" class="closefb text-white pt-3 pr-3 "><i class="fa-solid fa-x"></i></i></label></div>
            <div class="all col-md-8">
                <?php foreach($yb as $i){?>
                        <div class="card card3 p-3 mt-2" >
            
                            <div class="d-flex justify-content-between align-items-center">
            
                          <div class="user d-flex flex-row align-items-center">
            
                            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/fs/122db085587757.5ed7d338b0e72.jpg" width="30" class="user-img rounded-circle mr-2">
                            <span><small class="font-weight-bold text-primary">
                            <?php echo $i['Ten_sv'];?>
                            </small> <small class="font-weight-bold"><?php echo $i['Noi_dung_fb']?></small></span>
                              
                          </div>
            
            
                          <small><?php
                            if($i['Ngay_fb'] > 7 && $i['Ngay_fb'] < 30) {
                            $tuan =  intdiv($i['Ngay_fb'], 7);
                            echo  $tuan. " weeks ago";
                          }
                           if ($i['Ngay_fb'] > 30 && $i['Ngay_fb'] < 365){
                            $thang = intdiv($i['Ngay_fb'], 30);
                            echo  $thang. " months ago";
                          }
                           if($i['Ngay_fb'] > 365){
                            $nam = intdiv($i['Ngay_fb'], 365);
                            echo $nam. " years ago";
                          }
                           if($i['Ngay_fb'] <7 ) {
                            echo $i['Ngay_fb']. " days ago";
                          }
                          ?></small>


                          </div>
            
            
                          <div class="action d-flex justify-content-between mt-2 align-items-center">
            
                            <div class="reply px-4">
                                <small>Remove</small>
                                <span class="dots"></span>
                                <small>Reply</small>
                                <span class="dots"></span>
                                <small>Translate</small>
                               
                            </div>
            
                            <div class="icons align-items-center">
            
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-check-circle-o check-icon"></i>
                                
                            </div>
                              
                          </div>
                        </div>
                <?php } ?>  
                </div>    
            </div>              
        </div>

                <!--------section9 box chat-------->  
            <div class="Show2 mt-2">
                <input class="ip2 d-none" type="checkbox" id="Showmore2">
                <label  for="Showmore2" class="chat3"><i class="fa-solid fa-message"></i></i></label>
            </div>              
                <div  class=" d-flex">
                    <div id="chat" class="card2 mt-5">
                        <div class="d-flex flex-row justify-content-between p-3 adiv text-white">
                        <i class="fas fa-chevron-left"></i>
                        <span class="pb-3"><?php echo $data['Ten_gv']; ?></span>
                        <label  for="Showmore2" class="mobile2"><i class="fa-solid fa-x"></i></i></label>
                        </div>
                        <div class="boxchat" id="boxchat">
                            <?php if (isset($_SESSION['login'])) { 
                            foreach($ycmt as $i){
                                if(!empty($i['Noi_dung_bl'])){ ?>
                                <div id="noidung" class="d-flex flex-row p-2">
                                    <div class="bg-white ml-auto p-3"><span class="text-muted"><?php echo $i['Noi_dung_bl'];?></span></div>
                                    <img src="https://img.icons8.com/color/48/000000/circled-user-male-skin-type-7.png" width="30" height="30">
                                </div>
                                <?php } 

                                if(!empty($i['Rep'])){ ?>
                                <div id="noidung" class="d-flex flex-row p-2">
                                    <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" width="30" height="30">
                                    <div class="chat ml-2 p-3"><?php echo $i['Rep'];?></div>
                                </div>
                            <?php }}} ?>  
                        </div>
                        
                        <form  class="form-group"  method="post">
                            <?php if(isset($_SESSION["login"]) && ($bool == 1)) { ?>
                                <input class="form-control" type="text" id="tinnhan" name="Chat" placeholder="Enter your text here..."> 
                            <?php } elseif(isset($_SESSION["login"]) && ($bool == 0))    { ?>
                                  <button id="btnJoin2" name='join'>Join this course to chat with lecturer</button>
                            <?php } else { ?>
                                    <label style="text-align:center" id="btnJoin2"  for="opendR" >Join this course !</label>
                            <?php } ?>
                            <input type="hidden" id="idkh" value="<?php echo $data['ID_kh']; ?>"/> 
                            <input type="hidden" id="iduser" value="<?php if(isset($_SESSION['login'])){ echo $user;} ?>"/> 
                            <input type="hidden" id="idgv" value="<?php echo $data['ID_gv']; ?>"/> 
                            <button class="d-none" id="submitBtn"  type="submit" name="savechat" value="SAVE"></button>
                        </form>
                        
                        </div>
                    </div>
                </div>                       
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

        <script src="In4Course4.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </head>
</body>
</html>