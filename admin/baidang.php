<?php
require 'connect.php';
$students = get_in4();
$sl = count_bd();

if(!empty($_POST['save'])) {
    $data['ten'] = isset($_POST['TL']) ? $_POST['TL'] : '';
    $data['linktl'] = isset($_POST['LinkTL']) ? $_POST['LinkTL'] : '';

    if(!empty($data['ten']) && !empty($data['linktl'])) {
      add_bd($data['ten'], $data['linktl']);
    header("location: baidang.php");
    }
    
    if(empty($data['tentl']) || empty($data['linktl'])) {
        echo '<script type="text/javascript">

        window.onload = function () { alert("Vui lòng nhập đầy đủ thông tin"); }

        </script>';
    }

}


    disconnect_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="baidang4.css">
    <link rel="icon"    type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('#search').keyup(function(){
              var keyword = $(this).val();
              $.post('baidang_search.php',{data: keyword},function(data){
                $('.danhsach').html(data);
              })
            });
        });
    </script>
</head>
<body>
<nav>
        <section class="s1" id="s1">
          <a href="" class="logo">Zack</a>
          <input type="radio" name="slider" id="menu-btn">
          <input type="radio" name="slider" id="close-btn">
          
          <ul style="margin:0;">
              <li><a href="../admin/admin.php" >Back</a></li>
          </ul>
          <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </section>

            <!------------section2------->
            <section class="s2" id="s2">
              <div class="container">
                    <h1>DANH SÁCH BÀI ĐĂNG</h1>
                    <p>Number of posts: <?php echo $sl['SL']; ?></p>
                    <a onclick="document.getElementById('open-btn').checked = true;" >New post</a>
                </div>

                <div class="search">
                    <input type="text" id="search" placeholder="Type to search..." />
                </div>
              <table width="100%" border="1" >
                  <tr style="    border-top: 0px solid #fff; border-bottom: 2px solid rgb(65, 64, 65)">
                      <td><b>Tên Báo</b></td>
                      <td><b>Ngày đăng</b></td>
                      <td><b>Nội dung</b></td>
                      <td><b>Chọn thao tác</b></td>
                  </tr>
                  <tbody class="danhsach">
                        <?php foreach ($students as $item){ ?>
                        <tr id="tr1">
                            <td><?php echo $item['Ten_post']; ?></td>
                            <td><?php echo $item['Ngay_post']; ?></td>
                            <td><?php echo $item['Noi_dung_post']; ?></td>
                            <td id="td1">
                                <form method="post" action="del.php">
                                    <a style="margin-right:40px;margin-left:5px " onclick="window.location = 'editbd.php?id=<?php echo $item['ID_post']; ?>'" type="button" value="Sửa"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <input type="hidden" name="id" value="<?php echo $item['ID_post']; ?>"/>
                                    <button onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"><i class="fa-solid fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                  </tbody>
              </table>
          </section>

            <!------------section3------->
       <input class="oc" type="radio" name="slider" id="open-btn">
        <input class="oc" type="radio" name="slider" id="close">
     <div class="s3" id="s3" >
        <form method="post" action="baidang.php">
            <table width="50%" >
                <tr>
                <td style = "height: 90px;">
                <h1>Add Tài Liệu</h1></td>
                <label style="text-align:right;" for="close" class="bt close"><i class="fas fa-times"></i></label>
                </tr>
                <tr>
                    <td style="padding-top: 50px ;">
                        <input class="ip1" type="text" name="TL" placeholder="Tên báo" value= "<?php echo !empty($data['ten']) ? $data['ten'] : ''?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="ip1" type="text" placeholder="Nội dung" name="LinkTL" value= "<?php echo !empty($data['linktl']) ? $data['linktl'] : ''?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input id="ip2"  type="submit" name="save" value="SAVE"/>
                    </td>
                </tr>
            </table>
        </form>
        </div>

</body>
</html>