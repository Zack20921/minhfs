<?php

require 'doimkad.php';

// Lấy thông tin hiển thị lên để người dùng sửa
$ID_user = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($ID_user){
    $data = get_user($ID_user);

}
// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("location: admin_list.php");
}
// Nếu người dùng submit form
if (!empty($_POST['edit_admin']))
{
     // Lay data
     $data['Mk']         = isset($_POST['MK']) ? $_POST['MK'] : '';
     $data['ID_user']          = isset($_POST['id']) ? $_POST['id'] : '';
     
    // Lay data
    $errors = array();
    if (empty($data['Mk'])){
        $errors['Mk'] = 'Chưa nhập giới tính giáo viên ';
    }
     
    // Neu ko co loi thi insert
    if (!$errors){
        $hashed_password = password_hash($data['mk'], PASSWORD_DEFAULT);
        edit_user($data['ID_user'], $hashed_password);
        // Trở về trang danh sách
        header("location: admin_list.php");
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
        <link rel="stylesheet" href="../themsua2.css">
    </head>
    <body>
    <section class="s2" id="s2">

        <form method="post" action="admin_edit.php?id=<?php echo $data['ID_user']; ?>">
            <h1>Change password</h1>
            <a href="javascript:history.back()">Back</a>

            <table width="50%">
                <tr>
                    <td>
                        <input placeholder="New password" class="ip3" type="text" name="MK" />
                        <?php if (!empty($errors['Mk'])) echo $errors['Mk']; ?>
                    </td>
                </tr>
            </table>
                <input type="hidden" name="id" value="<?php echo $data['ID_user']; ?>"/>
                <input id="ip2" type="submit" name="edit_admin" value="Save"/>
        </form>
    </section>
    </body>
</html>
