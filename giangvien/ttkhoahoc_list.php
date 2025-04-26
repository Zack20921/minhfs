<?php
require 'ttkhoahoc.php';
session_start();

// kiem tra dang nhap
if(!isset($_SESSION["login"])){
  header("location: ../hieu/index1.php");
  exit;
}

// kiem tra vai tro
if ($_SESSION["role"]["vt"] != "giang_vien"){
  echo "<script type='text/javascript'>alert('Hay dang nhap bang tai khoan user');</script>";
  header("location: hieu/index1.php");
  exit;
}

$id = $_SESSION['user_id'];

$ttkhoahoc = get_all_ttkhoahoc($id);
disconnect_db();



// kiem tra thoi gian session ton tai
if (time() - (int)$_SESSION['time'] >= 1800)
        {
            unset($_SESSION['login']);
            header('Location: ../hieu/index1.php');
        }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thong tin giang vien</title>
    <link rel="stylesheet" href="../tailieu4.css">
    <link rel="icon"type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('#search').keyup(function(){
              var keyword = $(this).val();
              var idgv = $('#idgv').val();
              $.post('ttkhoahoc_search.php',{data: keyword,idgv:idgv},function(data){
                $('.danhsach').html(data);
              })
            });
        });
    </script>
    <style>
        #pt{
          width: 300px;
          word-wrap: break-word;
        }
    </style>
</head>
<style>
</style>
<body>
        <!-----Menu---->
       <section class="s1" id="s1">
          <a href="" class="logo">Zack</a>
          <input type="radio" name="slider" id="menu-btn">
          <input type="radio" name="slider" id="close-btn">
          
          <ul style="margin:0;">
              <li><a href="giangvien.php" >Back</a></li>
          </ul>
          <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
      </section>
        <!--------section5--------> 
        <section class="s2" id="s2">
          <div class="container">
              <h1>Thông tin khóa học </h1><br>
              <input type="hidden" id="idgv" value="<?php echo $id; ?>"/>
          </div>
          <div class="search">
              <input type="text" id="search" placeholder="Type to search..." />
         </div>
            <table width="100%" border="1">
              <tr style="border-top: 0px solid #fff; border-bottom: 2px solid rgb(65, 64, 65)">
                <td><b>Tên khóa học</b></td>
                <td><b>Ngày bắt đầu</b></td>
                <td><b>Ngày kết thúc</b></td>
                <td><b>Học phí</b></td>
                <td><b>Độ khó</b></td>
                <td><b>Chi tiết khóa học</b></td>
                <td><b>Phân loại</b></td>
                <td><b>Poster</b></td>
                <td><b>Tên giảng viên</b></td>
                <td><b>Giới tính</b></td>
                <td><b>SĐT</b></td>
                <td><b>Email</b></td>
                <td><b>Ngày sinh</b></td>

              </tr>
              <tbody class="danhsach">
                <?php foreach ($ttkhoahoc as $item) { ?>
                  <tr id="tr1">    
                    <td><?php echo $item['Ten_kh']; ?></td>
                    <td><?php echo $item['Ngay_bat_dau']; ?></td>
                    <td><?php echo $item['Ngay_ket_thuc']; ?></td>
                    <td><?php echo $item['Hoc_phi']; ?></td>
                    <td><?php echo $item['Do_kho']; ?></td>
                    <td><?php echo $item['Chi_tiet']; ?></td>
                    <td><?php echo $item['Phan_loai']; ?></td>
                    <td id="pt"><?php echo $item['poster']; ?></td>
                    <td><?php echo $item['Ten_gv']; ?></td>
                    <td><?php echo $item['Gioitinh']; ?></td>
                    <td><?php echo $item['SDT_gv']; ?></td>
                    <td><?php echo $item['Email_gv']; ?></td>
                    <td><?php echo $item['Birth_gv']; ?></td>
                  </tr>    
                  <?php } ?>          
              </tbody>
            </table>                  
</section>
</body>
</html>

