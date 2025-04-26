<?php

 require 'ttgiangvien.php';

// Lấy thông tin hiển thị lên để người dùng sửa
$ID_gv = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($ID_gv){
    $data = get_ttgiangvien($ID_gv);
    // $role = getRole_id();
    // $pd = getPB_id();
}
// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("location: ttgiangvien_list.php");
}
// Nếu người dùng submit form
if (!empty($_POST['edit_ttgiangvien']))
{
     // Lay data
     $data['Ten_gv']        = isset($_POST['Tgv']) ? $_POST['Tgv'] : '';
     $data['Gioitinh']         = isset($_POST['GT']) ? $_POST['GT'] : '';
     $data['SDT_gv']          = isset($_POST['SDT']) ? $_POST['SDT'] : '';
     $data['Email_gv']    = isset($_POST['Email']) ? $_POST['Email'] : '';
     $data['Birth_gv']          = isset($_POST['Birth']) ? $_POST['Birth'] : '';
     $data['ID_gv']          = isset($_POST['id']) ? $_POST['id'] : '';
     
    // Lay data
    $errors = array();
    if (empty($data['Ten_gv'])){
        $errors['Ten_gv'] = 'Chưa nhập tên giáo viên';
    }
     
    if (empty($data['Gioitinh'])){
        $errors['Gioitinh'] = 'Chưa nhập giới tính giáo viên ';
    }
     
    if (empty($data['SDT_gv'])){
        $errors['SDT_gv'] = 'Chưa nhập số điện thoại giáo viên ';
    }

    if (empty($data['Email_gv'])){
        $errors['Email_gv'] = 'Chưa nhập email giáo viên ';
    }

    if (empty($data['Birth_gv'])){
        $errors['Birth_gv'] = 'Chưa nhập ngày sinh giáo viên ';
    }

    // Neu ko co loi thi insert
    if (!$errors){
        edit_ttgiangvien($data['ID_gv'], $data['Ten_gv'], $data['Gioitinh'], $data['SDT_gv'], $data['Email_gv'], $data['Birth_gv']);
        // Trở về trang danh sách
        header("location: ttgiangvien_list.php");
    }
}
 
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Sửa thông tin giảng  viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="themsua2.css">
    </head>
    <body>
    <section class="s2" id="s2">
        <form method="post" action="ttgiangvien_edit.php?id=<?php echo $data['ID_gv']; ?>">
            <h1>Update lecturer info</h1>
            <a href="ttgiangvien_list.php">Back</a>

            <table width="50%">
                <tr>
                    <td>
                        <input placeholder="Tên giảng viên" class="ip3" type="text" name="Tgv" value="<?php echo $data['Ten_gv']; ?>"/>
                        <?php if (!empty($errors['Ten_gv'])) echo $errors['Ten_gv']; ?>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <input placeholder="Giới tính" class="ip3" type="text" name="GT" value="<?php echo $data['Gioitinh']; ?>"/>
                        <?php if (!empty($errors['Gioitinh'])) echo $errors['Gioitinh']; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input placeholder="SĐT" class="ip3" type="text" name="SDT" value="<?php echo $data['SDT_gv']; ?>"/>
                        <?php if (!empty($errors['SDT_gv'])) echo $errors['SDT_gv']; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input placeholder="Email" class="ip3"  type="text" name="Email" value="<?php echo $data['Email_gv']; ?>"/>
                        <?php if (!empty($errors['Email_gv'])) echo $errors['Email_gv']; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input placeholder="Ngày sinh" class="ip3" type="text" name="Birth" value="<?php echo $data['Birth_gv']; ?>"/>
                        <?php if (!empty($errors['Birth_gv'])) echo $errors['Birth_gv']; ?>
                    </td>
                </tr>
                <tr>

            </table>

            <input type="hidden" name="id" value="<?php echo $data['ID_gv']; ?>"/>
            <input id="ip2" type="submit" name="edit_ttgiangvien" value="Save"/>
        </form>
    </section>
    </body>
</html>
