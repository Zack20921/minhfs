<?php
require 'svmk.php';
session_start();

$id = $_SESSION['user_id'];

$dmk = get1_userSV($id);

$svmk = get_all_svmk();
disconnect_db();

if (time() - (int)$_SESSION['time'] >= 1800)
{
    unset($_SESSION['login']);
    header('Location: hieu/index1.php');
}
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
    <a href="hocsinh.php" class="logo">back</a>   
 </div>
 <h1>Change password</h1>
 <div class="menu menuR">
  <?php echo $_SESSION['login']['user']; ?>
 </div>
</div>
        <!--------section5--------> 
    <section class="am s5">
        <div class="title3">
            <h1>Thông tin tài khoản mật khẩu học sinh</h1><br>
            
        </div>
    <div id="formList2">
        <div id="list2">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Tên tài khoản</th>
                    <th scope="col">Mật khẩu</th>
                    <th scope="col">Vai trò</th>
                    <th scope="col">Đổi mật khẩu </th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($dmk as $item) { ?>
                  <tr>    
                    <td class="dt"><?php echo $item['Ten_tk']; ?></td>
                    <td class="dt"><?php echo $item['Mk']; ?></td>
                    <td class="dt"><?php echo $item['Vai_tro']; ?></td>
                    <td id="td1">
                        <form method="post" action="svmk_delete.php">
                            <a style="margin-right:40px;margin-left:5px " onclick="window.location ='svmk_edit.php?id=<?php echo $item['ID_user']; ?>'" 
                            type="button" value="Sửa"><i class="fa-regular fa-pen-to-square"></i></a>
                            <!-- <input type="hidden" name="id" value="<?php echo $item['ID_user']; ?>" />
                            <button onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"><i class="fa-solid fa-trash"></i> </button> -->
                        </form>
                    </td>
                  </tr>    
                  <?php } ?>          
                </tbody>
              </table>                  
</section>
</body>
</html>

