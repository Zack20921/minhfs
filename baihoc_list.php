<?php
require 'baihoc.php';
$baihoc = get_all_baihoc();
disconnect_db();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thong tin giang vien</title>
    <link rel="stylesheet" href="tailieu.css">
    <link rel="icon"type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
</head>
<style>
</style>
<body>
    <section class="s1">
        <!-----Menu---->
 <div class="container1" id="s1">
 <div class="menu menuL">
    <a href="giangvien.html" class="logo">back</a>   
 </div>
 <h1>LECTURERS</h1>
 <div class="menu menuR">
 </div>
</div>
        <!--------section5--------> 
    <section class="am s5">
        <div class="title3">
            <h1 >thông tin giảng viên</h1><br>
            <p><button><a href="baihoc_add.php">Thêm giảng viên mới</a></button></p>
        </div>
    <div id="formList2">
        <div id="list2">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">ID khóa học</th>
                    <th scope="col">Tên bài học</th>
                    <th scope="col">Nội dunh bài học</th>
                    <th scope="col">Số lượng cmt</th>
                    <th scope="col">Mô tả bài học</th>
                    <th scope="col">Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($baihoc as $item) { ?>
                  <tr>    
                    <td class="dt"><?php echo $item['ID_kh']; ?></td>
                    <td class="dt"><?php echo $item['Ten_bh']; ?></td>
                    <td class="dt"><?php echo $item['Noi_dung_bh']; ?></td>
                    <td class="dt"><?php echo $item['So_luong_cmt']; ?></td> 
                    <td class="dt"><?php echo $item['motaBH']; ?></td> 
                    <td id="td1">
                        <form method="post" action="baihoc_delete.php">
                            <a style="margin-right:40px;margin-left:5px " onclick="window.location ='baihoc_edit.php?id=<?php echo $item['ID_bh']; ?>'" 
                            type="button" value="Sửa"><i class="fa-regular fa-pen-to-square"></i></a>
                            <input type="hidden" name="id" value="<?php echo $item['ID_bh']; ?>" />
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

