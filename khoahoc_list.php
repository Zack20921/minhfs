<?php
require 'khoahoc.php';
$khoahoc = get_all_khoahoc();


$sl = count_SVDKI();
$sc = count_Course();

disconnect_db();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thong tin giang vien</title>
    <link rel="stylesheet" href="tailieu4.css">
    <link rel="icon"type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('#search').keyup(function(){
              var keyword = $(this).val();
              var sl = $('#sl').val();
              $.post('khoahoc_search.php',{data: keyword, sl:sl},function(data){
                $('.danhsach').html(data);
              })
            });
        });
    </script> -->
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
            <li><a href="admin/admin.php" >Back</a></li>
        </ul>
        <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </section>
        <!--------section5--------> 
        <section class="s2" id="s2">
            <div class="container">
            <h1>DANH SÁCH KHÓA HỌC</h1>
            <p>Number of students enrolled in the courses: <?php echo $sl['SL'] ?></p>
            <p>Number of courses: <?php echo $sc['SL'] ?></p>
            <a href="khoahoc_add.php">Add course </a>
            </div>
            <div class="search">
              <input type="text" id="search" placeholder="Enter course name to search..." />
            </div>
            <table width="100%" border="1" >
                  <tr style="border-top: 0px solid #fff; border-bottom: 2px solid rgb(65, 64, 65)">
                    <td><b>Tên khóa học</b></td>
                    <td><b>Ngày bắt đầu</b></td>
                    <td><b>Ngày kết thúc</b></td>
                    <td><b>ID giảng viên</b></td>
                    <td><b>Học phí</b></td>
                    <td><b>Độ khó</b></td>
                    <td><b>Chi tiết</b></td>
                    <td><b>SV</b></td>
                    <td><b>Phân loại</b></td>
                    <td><b>Thao tác</b></td>
                  </tr>
                  <tbody class="danhsach">
                    <?php foreach ($khoahoc as $item) { 
                        $idkh = $item['ID_kh'];
                        $sl1 =  count_SVper_Course($idkh);  
                      ?>
                      <!-- <input type="hidden" id="sl" value="<?php echo $sl1['SL']; ?>" /> -->
                      <tr id="tr1">    
                        <td><?php echo $item['Ten_kh']; ?></td>
                        <td ><?php echo $item['Ngay_bat_dau']; ?></td>
                        <td ><?php echo $item['Ngay_ket_thuc']; ?></td>
                        <td ><?php echo $item['ID_gv']; ?></td> 
                        <td ><?php echo $item['Hoc_phi']; ?></td>    
                        <td><?php echo $item['Do_kho']; ?></td>    
                        <td><?php echo $item['Chi_tiet']; ?></td>    
                        <td><?php echo $sl1['SL']; ?></td>    
                        <td><?php echo $item['Phan_loai']; ?></td>    
                        <td class=" tr2" id="tr1">
                            <form method="post" action="khoahoc_delete.php">
                                <a style="margin-right:40px;margin-left:5px " onclick="window.location ='khoahoc_edit.php?id=<?php echo $item['ID_kh']; ?>'" 
                                type="button" value="Sửa"><i class="fa-regular fa-pen-to-square"></i></a>
                                <input type="hidden" name="id" value="<?php echo $item['ID_kh']; ?>" />
                                <button onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"><i class="fa-solid fa-trash"></i> </button>
                            </form>
                        </td>
                      </tr>    
                    <?php } ?>
                  </tbody>          
            </table>                  
</section>
</body>
</html>

