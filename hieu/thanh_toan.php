<?php
// Bắt đầu session
session_start();
require 'payLibrary.php';


$id = isset($_GET['id']) ? (String)$_GET['id'] : '';
$idsv = isset($_GET['idsv']) ? (String)$_GET['idsv'] : '';


if($id){
  if(isset($_SESSION["login"])){
    $yp = get1DKKH($id,$idsv);

  }}

echo $id;
echo $idsv;
echo $yp['bool'];

$time= date('Y-m-d');


if(!empty($_POST['save'])){

  // header("location: hieu/thanh_toan.php");
  if($yp['bool'] == 0){
      $yl = addDKKH($id, $idsv, $time);
      
  }
}

$py = getCourse_id($id);
$pn = getSV_id($idsv);


if(isset($_POST['save'])) {
    
  echo $_POST['tkh'];

}else {
  echo "nothing to save";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="thanhtoan.css">
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
      <li id="li1"><a href="../hocsinh.php">News</a></li>
    </ul>
  </section>

  <!--------section2-------->
  <section class="s2" id="s2">
        <div class="container">
        </div>
        <!-- <form method="post" action="thanh_toan.php">
            <table width="50%" > -->
        <!-- <form class="" method="POST" target="_blank"  enctype="application/x-www-form-urlencoded"
            action="xulithanhtoanQR.php"> -->
        <form class="" method="POST" target="_blank"  enctype="application/x-www-form-urlencoded"
            action="xulithanhtoanQR.php">
            <table width="50%" class="table1" >
                <tr>
                  <td>
                    <h1>Thanh toán</h1>
                  </td>
                </tr>
                <tr>
                  <td>Ten khoa hoc: <input class="ip1" type="text" name="Tkh" 
                  value="<?php echo $py['Ten_kh'] ?>"> </td>
                  
                </tr>
                <tr>
                  
                  <td>Ten sinh vien: <input class="ip1" type="text" name="Tsv" 
                  value="<?php echo $pn['Ten_sv'] ?>"></td>
                </tr>
                <tr>
                  <td>Ngay dang ki: <input class="ip1" type="text" name="Tg" 
                  value="<?php echo $time ?>"></td>
                </tr>
                <tr>
                  <td>Hoc phi: <input class="ip1"  type="text" name="Hp" 
                  value="<?php echo $py['Hoc_phi'] ?>"></td>
                </tr>                   
                <tr id="tr-an">
                  <td><input class="ip1" type="hidden" name="idkh" 
                  value="<?php echo $id?>"></td>
                </tr>                   
                <tr id="tr-an">
                  <td><input class="ip1" type="hidden" name="idsv" 
                  value="<?php echo $idsv ?>"></td>
                </tr>                   
                <tr>
                    <td>
                        <input id="submit" type="submit" name="save" value="Thanh toan QR Momo"/>
                    </td>
                </tr>
            </table>
            
        </form>

        <form class="form2" method="POST" target="_blank"  enctype="application/x-www-form-urlencoded"
            action="xulithanhtoanATM.php">
            <table class="table2" width="50%" >
            
                <tr>
                  <input class="ip1" type="hidden"  name="Tkh" 
                  value="<?php echo $py['Ten_kh'] ?>">
                  
                </tr>
                <tr>
                  
                  <input class="ip1" type="hidden" name="Tsv" 
                  value="<?php echo $pn['Ten_sv'] ?>">
                </tr>
                <tr>
                 <input class="ip1"  type="hidden" name="Tg" 
                  value="<?php echo $time ?>">
                </tr>
                <tr>
                 <input class="ip1" type="hidden" name="Hp" 
                  value="<?php echo $py['Hoc_phi'] ?>">
                </tr>                   
                <tr>
                  <input class="ip1"  type="hidden" name="idkh" 
                  value="<?php echo $id?>">
                </tr>                   
                <tr>
                  <input class="ip1"  type="hidden" name="idsv" 
                  value="<?php echo $idsv ?>">
                </tr>                   
                <tr>
                    <td>
                        <input  id="submit" type="submit" name="save" value="Thanh toan ATM Momo"/>
                    </td>
                </tr>
            </table>
            
        </form>
        </section>
</body>
</html>