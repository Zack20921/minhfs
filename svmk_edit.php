<?php

 require 'svmk.php';

// Lấy thông tin hiển thị lên để người dùng sửa
$ID_user = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($ID_user){
    $data = get_user($ID_user);

}
// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("location: svmk_list.php");
}
// Nếu người dùng submit form
if (!empty($_POST['edit_svmk']))
{
     // Lay data
     $data['Mk']         = isset($_POST['MK']) ? $_POST['MK'] : '';
     $data['ID_user']          = isset($_POST['id']) ? $_POST['id'] : '';
     
    // Lay data
    $errors = array();
    if (empty($data['Mk'])){
        $errors['Mk'] = 'Chưa nhập mat khau ';
    }
     
    // Neu ko co loi thi insert
    if (!$errors){
        $hashed_password = password_hash($data['mk'], PASSWORD_DEFAULT);
        edit_user($data['ID_user'], $hashed_password);
        // Trở về trang danh sách
        header("location: svmk_list.php");
    }
}
 
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Change password</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="themsua.css">
    </head>
    <body>
        <h1>Change password</h1>
        <a href="svmk_list.php">Trở về</a> <br/> <br/>
        <form method="post" action="svmk_edit.php?id=<?php echo $data['ID_user']; ?>">
            <table width="70%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Mật khẩu</td>
                    <td>
                        <input type="text" name="MK" value="<?php echo $data['Mk']; ?>"/>
                        <?php if (!empty($errors['Mk'])) echo $errors['Mk']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $data['ID_user']; ?>"/>
                        <input type="submit" name="edit_svmk" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
