

<?php 

session_start();
// Kiểm tra nếu người dùng đã đăng nhập, nếu chưa thì chuyển hướng về trang đăng nhập
if((!isset($_SESSION["login"])) && ($_SESSION["role"] != 'admin')){
    header("location: ../hieu/index1.php");
    exit;
}

if ($_SESSION["role"]["vt"] != "admin"){
  echo "<script type='text/javascript'>alert('Hay dang nhap bang tai khoan user');</script>";
  header("location: ../hieu/index1.php");
  exit;
}

if (time() - (int)$_SESSION['time'] >= 1800){
    unset($_SESSION['login']);
    header('Location: ../hieu/index1.php');
}

$id = $_SESSION['user_id'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
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
            <li><strong><?php echo $_SESSION['login']['user']; ?></strong></li>

            <li><a href="#" ><strong>Home</strong></a></li>
            <li>
              <a href="#" class="desktop-item"><strong>Quản lý</strong></a>
              <input type="checkbox" id="showDrop">
              <label for="showDrop" class="mobile-item" style="font-family: 'Montserrat', sans-serif; font-weight: 900;">Comments</label>
              <ul class="drop-menu">
                <li><a href="../tailieu_list.php"><strong>Tài liệu</strong></a></li>
                <li><a href="../khoahoc_list.php">Khóa học</a></li>
                <li><a href="../1/sinhvien_list.php">Sinh viên</a></li>
                <li><a href="../ttgiangvien_list.php">Giảng viên</a></li>
                <li><a href="baidang.php">Bài đăng</a></li>
                <li><a href="../admin/Comment/cmtseen.php">CMT chưa rep</a></li>
                <li><a href="../admin/Comment/cmtrep.php">CMT đã rep</a></li>
                <li><a href="../1/user_list.php"><strong>Change password user</strong></a></li>
                <li><a href="../gvmk_edit.php?id=<?php echo $id; ?>"><strong>Change password</strong></a></li>

                <!-- <li><a href="../1/sinhvien_list.php">DS sinh viên</a></li> -->
              </ul>
            </li>
            <!-- <li><strong><?php echo $_SESSION['role']['vt']; ?></strong></li> -->
            <li><a href="../hieu/logout.php"><strong>Sign out</strong></a></li>

          </ul>
          <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
      </nav>

        <!------------section2------->

        <section class="s2">
        <div class="search8">
        <form action="" id="search-form">
        <input type="text" placeholder="Your Email" name="search">
        <button type="submit">SUBSCRIBE
        </button>
        </form>
        </div>
        </section>
</body>
</html>