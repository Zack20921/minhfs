<?php
// Bắt đầu session
session_start();
require 'config.php';



if(!empty($_POST['save'])) {
    $data['fname'] = isset($_POST['Fname']) ? $_POST['Fname'] : '';
    $data['sex'] = isset($_POST['sex']) ? $_POST['sex'] : '';
    $data['sdt'] = isset($_POST['sdt']) ? $_POST['sdt'] : '';
    $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
    $data['birth'] = isset($_POST['birth']) ? $_POST['birth'] : '';
    $data['user'] = isset($_POST['User']) ? $_POST['User'] : '';
    $data['password'] = isset($_POST['Password']) ? $_POST['Password'] : '';

    // doi sang dang nam/thang/ngay
    $birth = date_create($data['birth']);
      if ($birth) {
        $date = date_format($birth, 'Y/m/d');
      } else {
        echo "Không thể tạo đối tượng DateTime từ chuỗi '{$data['birth']}'";
      }


    if(!empty($data['fname']) && !empty($data['user'])&& !empty($data['password'])) {

      // ma hoa mat khau
      $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
      //them nguoi dung
      add_user($data['user'], $hashed_password);

      // lay id tai khoan moi duoc them
      $idUser = getID_user();

      // them sinh vien
      if($idUser['Vai_tro'] == 'giang_vien'){
        addGV($idUser['ID_user'], $data['fname'], $data['sex'], $data['sdt'], $data['email'], $date);
      }


    // kiem tra loi
    if (empty($username)or empty($password)){
      $error = 'Không được để trống tài khoản, mật khẩu!';
     } else {
      if (strlen($username) < 3 or strlen($username) >50){
        $error = 'Tài khoản phải từ 4-50 ký tự!';
      }
      if (strlen($password) < 3 or strlen($password) >50){
        $error = 'Mật khẩu phải từ 4-50 ký tự!';
      }
      // Nếu không có lỗi, lưu trữ các biến session
      
      // $_SESSION['fname'] = $data['fname'];
      // $_SESSION['user'] = $data['user'];
      // $_SESSION['password'] = $hashed_password;
     }
    
    header("location: index1.php");
    }else{
        echo '<script type="text/javascript">

            window.onload = function () { alert("Vui lòng nhập đầy đủ thông tin"); }

        </script>';
    }

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="SignUp2.css">
  <link rel="icon" type="image/png" href="images/logo.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

</head>

<body>
  <section class="s1">

    <!-----Menu---->
    <div class="container1" id="s1">
      <div class="menu menuL">
        <label style="padding-right: 25px;" for="opendL"><i class="fas fa-bars"></i></label>
      </div>
      <a href="Home.html" class="logo">Zack</a>
      <div class="menu menuR">
        <div class="search-box">
          <button class="btn-search"><i class="fas fa-search"></i></button>
          <input type="text" class="input-search" placeholder="Type to Search...">
        </div>
        <div style="width:100px;"><label class="Sin" for="opendR">Sign up</label></div>
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
      <li id="li1"><a href="hocsinh.html">Projects</a></li>
      <li>
        <input class="ip1" type="checkbox" id="showDrop">
        <label id="li1" style="padding: 0px 118px 0px 35px;color:rgb(65, 64, 65);   list-style: none;" for="showDrop"
          class="mobile-item">Course</label>
        <ul class="drop-menu">
          <li><a href="ListCourse.html">Arts and Commerce</a></li>
          <li><a href="ListCourse.html">Manage</a></li>
          <li><a href="ListCourse.html">IT</a></li>
          <li><a href="ListCourse.html">Foreign Language</a></li>
        </ul>
      </li>
      <li id="li1"><a href="hocsinh.html">News</a></li>
    </ul>
  </section>

  <!--------section2-------->
  <section class="s2" id="s2">
        <div class="container">
        </div>
        <form method="post" action="SignUp.php">
            <table width="50%" >
                <tr>
                <td>
                <h1>Sign Up</h1></td>
                </tr>
                <tr>
                    <td style="padding-top: 50px ;">
                        <input class="ip1" type="text" name="Fname" placeholder="Full Name" value= "<?php echo !empty($data['fname']) ? $data['fname'] : ''?>"> 
                        Gender: <select style="border-radius: 5px;" class="lj" name="sex">
                            <option value="nam" >Nam</option>
                            <option value="nu" >Nu</option>
                        </select>
                        <input class="ip1" type="tel" name="sdt" placeholder="Phone" value= "<?php echo !empty($data['sdt']) ? $data['sdt'] : ''?>"> 
                        <input class="ip1" type="email" name="email" placeholder="Email" value= "<?php echo !empty($data['email']) ? $data['email'] : ''?>"> 
                        <input class="ip1" type="date" name="birth" placeholder="Birth" value= "<?php echo !empty($data['email']) ? $data['email'] : ''?>"> 

                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="ip1" type="text" placeholder="User" name="User" value= "<?php echo !empty($data['user']) ? $data['user'] : ''?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input class="ip1" type="text" placeholder="Password" name="Password" value= "<?php echo !empty($data['password']) ? $data['password'] : ''?>">
                    </td>
                </tr>
                    
                <tr>
                    <td>
                        <input style="color:#fff;" type="submit" name="save" value="Save"/>
                    </td>
                </tr>
            </table>
            
        </form>
        </section>
</body>
</html>