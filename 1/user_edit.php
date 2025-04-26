<?php

 require 'user.php';

// Lấy thông tin hiển thị lên để người dùng sửa
$ID_user = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($ID_user){
    $data = get_user($ID_user);

}
// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("location: user_list.php");
}
// Nếu người dùng submit form
if (!empty($_POST['edit_user']))
{
     // Lay data
     $data['Ten_tk']        = isset($_POST['Ttk']) ? $_POST['Ttk'] : '';
     $data['Mk']         = isset($_POST['MK']) ? $_POST['MK'] : '';
     $data['ID_user']          = isset($_POST['id']) ? $_POST['id'] : '';
     
    // Lay data
    $errors = array();
    if (empty($data['Ten_tk'])){
        $errors['Ten_tk'] = 'Chưa nhập tên giáo viên';
    }
     
    if (empty($data['Mk'])){
        $errors['Mk'] = 'Chưa nhập giới tính giáo viên ';
    }
     
    // Neu ko co loi thi insert
    if (!$errors){
        //Minh thêm 
        $hashed_password = password_hash($data['Mk'], PASSWORD_DEFAULT);
        edit_user($data['ID_user'], $data['Ten_tk'], $hashed_password);
        //-------------------------------
        // Trở về trang danh sách
        header("location: user_list.php");
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

        <form method="post" action="user_edit.php?id=<?php echo $data['ID_user']; ?>">
            <h1>Change password</h1>
            <a href="user_list.php">Back</a>

            <table width="50%">
                <tr>
                    <td>
                        <input placeholder="User" class="ip3" type="text" name="Ttk" value="<?php echo $data['Ten_tk']; ?>"/>
                        <?php if (!empty($errors['Ten_tk'])) echo $errors['Ten_tk']; ?>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <input placeholder="New password" class="ip3" type="text" name="MK"/>
                        <?php if (!empty($errors['Mk'])) echo $errors['Mk']; ?>
                    </td>
                </tr>
                <tr>

            </table>
            <input type="hidden" name="id" value="<?php echo $data['ID_user']; ?>"/>
            <input id="ip2" type="submit" name="edit_user" value="Save"/>
        </form>
    </section>
    </body>
</html>
