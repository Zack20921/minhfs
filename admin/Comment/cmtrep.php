<?php
require 'connect2.php';
session_start();
// $a = $_SESSION['login']['user'];
// $user=getiduser($a);
$students = get_in4();


disconnect_db();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cmtrep3.css">
    <link rel="icon"    type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('#search').keyup(function(){
              var keyword = $(this).val();
              var iduser = $('#iduser').val();
              $.post('cmtrep_search.php',{data: keyword,iduser: iduser},function(data){
                $('.danhsach').html(data);
              })
            });
        });
    </script> -->
</head>
<body>
<nav>
      <section class="s1" id="s1">
          <a href="" class="logo">Zack</a>
          <input type="radio" name="slider" id="menu-btn">
          <input type="radio" name="slider" id="close-btn">
          
          <ul style="margin:0;">
              <li><a href="../admin.php" >Back</a></li>
          </ul>
          <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
      </section>

        <!------------section2------->
        <section class="s2" id="s2">
          <div class="container">
              <h1>DANH SÁCH CMT ĐÃ REP</h1>
          </div>
          <!-- <div class="search">
              <input type="text" id="search" placeholder="Type to search..." />
          </div> -->
        
        <table width="100%" border="1" >
            <tr style="    border-top: 0px solid #fff; border-bottom: 2px solid rgb(65, 64, 65)">
                <td><b>Sinh Viên</b></td>
                <td><b>Giảng Viên</b></td>
                <td><b>Ngày bình luận</b></td>
                <td><b>Nội dung</b></td>
                <td><b>Rep</b></td>
                <td><b>Ngày rep</b></td>
                <td><b>Course</b></td>
                <td><b>Chọn thao tác</b></td>

            </tr>
            <tbody class="danhsach">
                <?php foreach ($students as $item){ 
                    if (!empty($item['Rep'])){
                    ?>
                <tr id="tr1">
                    <td><?php echo $item['Ten_sv']; ?></td>
                    <td><?php echo $item['Ten_gv']; ?></td>
                    <td><?php echo $item['Ngay_binh_luan']; ?></td>
                    <td><?php echo $item['Noi_dung_bl']; ?></td>
                    <td><?php echo $item['Rep']; ?></td>
                    <td><?php echo $item['Ngay_rep']; ?></td>
                    <td><?php echo $item['Ten_kh']; ?></td>
                    <td id="td1">
                        <form method="post" action="del.php">
                            <a style="margin-right:40px;margin-left:5px " onclick="window.location = 'editrep2.php?id=<?php echo $item['ID_bl']; ?>'" type="button" value="Sửa"><i class="fa-regular fa-pen-to-square"></i></a>
                            <input type="hidden" name="id" value="<?php echo $item['ID_bl']; ?>"/>
                            <button onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"><i class="fa-solid fa-trash"></i> </button>
                        </form>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
        </section>

</body>
</html>