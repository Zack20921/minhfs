<?php
require 'tailieu.php';

session_start();

$userid = $_SESSION['user_id'];

// $tailieu = get_all_tailieu11();


$tailieu = get_all_tailieu();




disconnect_db();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài Liệu Học Tập</title>
    <link rel="stylesheet" href="tailieu4.css">
    <link rel="icon"    type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('#search').keyup(function(){
              var keyword = $(this).val();
              $.post('tailieu_search.php',{data: keyword},function(data){
                $('.danhsach').html(data);
              })
            });
        });
    </script>
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
              <h1 >Tài Liệu Học Tập</h1><br>
              <!-- <a href="Document Viewer.php">Trở về</a> <br/> <br/> -->
          </div>
          <div class="search">
              <input type="text" id="search" placeholder="Type to search..." />
         </div>
          <table width="100%" border="1" >
            <tr style="border-top: 0px solid #fff; border-bottom: 2px solid rgb(65, 64, 65)">
              <td><b>Tên tài liệu</b></td>
              <td><b>ID khóa học</b></td>
              <td><b>Nội Dung</b></td>
              <td><b>Thao tác</b></td>
            </tr>

            <tbody class="danhsach">
              <?php foreach ($tailieu as $item) { ?>
                <tr id="tr1">
                  <td class="dt"><?php echo $item['Ten_tl']; ?></td>
                  <td class="dt"><?php echo $item['Ten_kh']; ?></td>
                  <td class="dt"  ><?php echo $item['Noi_dung']; ?></td>
                  <td id="tr1">
                  <form method="post" action="tailieu_delete.php">
                          <a style="margin-right:40px;margin-left:5px " onclick="window.location ='tailieu_edit.php?id=<?php echo $item['ID_tl']; ?>'" 
                          type="button" value="Sửa"><i class="fa-regular fa-pen-to-square"></i></a>
                          <input type="hidden" name="id" value="<?php echo $item['ID_tl']; ?>" />
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

