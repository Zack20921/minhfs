<?php 
session_start();
// Kiểm tra nếu người dùng đã đăng nhập, nếu chưa thì chuyển hướng về trang đăng nhập
if(!isset($_SESSION["login"])){
    header("location: ../hieu/index1.php");
    exit;
}

if ($_SESSION["role"]["vt"] != "giang_vien"){
  echo "<script type='text/javascript'>alert('Hay dang nhap bang tai khoan user');</script>";
  header("location: hieu/index1.php");
  exit;
}

if (time() - (int)$_SESSION['time'] >= 1800){
  unset($_SESSION['login']);
  header('Location: ../hieu/index1.php');
}
$change = $_SESSION['user_id'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="giangvien.css">
    <link rel="icon"    type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
<nav>
        <div class="wrapper">
          <div class="logo"><a href="#">ZACK</a></div>
          <input type="radio" name="slider" id="menu-btn">
          <input type="radio" name="slider" id="close-btn">
          <ul class="nav-links">
            <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
            <li><a href="#" target="_blank"><strong>Home</strong></a></li>

            <li>
              <a href="#" class="desktop-item"><strong>Quản lý</strong></a>
              <input type="checkbox" id="showDrop">
              <label for="showDrop" class="mobile-item" style="font-family: 'Montserrat', sans-serif; font-weight: 900;">Quan ly</label>
              <ul class="drop-menu">
                <li><a href="tailieu.php"><strong>Tài liệu</strong></a></li>
                <li><a href="ttkhoahoc_list.php"><strong>Khóa học</strong></a></li>
                <li><a href="Comment/cmtseen.php">CMT chưa rep</a></li>
                <li><a href="Comment/cmtrep.php">CMT đã rep</a></li>
                <li><a href="../gvmk_edit.php?id=<?php echo $change; ?>"><strong>Change password</strong></a></li>
              </ul>
            </li>
            <li><a href="../hieu/logout.php"><strong>Sign out</strong></a></li>
          </ul>
          <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
      </nav>

        <!------------section2------->

        <section class="s2">
            <h1>Xin chao <?php echo $_SESSION['login']['user']; ?> </h1>
        </section>
</body>
</html>