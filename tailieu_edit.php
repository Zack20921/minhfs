<?php

 require 'tailieu.php';

// Lấy thông tin hiển thị lên để người dùng sửa
$ID_tl = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($ID_tl){
    $data = get_tailieu($ID_tl);
    // $role = getRole_id();
    // $pd = getPB_id();
}
// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("location: tailieu_list.php");
}
// Nếu người dùng submit form
if (!empty($_POST['edit_tailieu']))
{
     // Lay data
     $data['Ten_tl']        = isset($_POST['Ttl']) ? $_POST['Ttl'] : '';
     $data['ID_kh']         = isset($_POST['KH']) ? $_POST['KH'] : '';
     $data['Noi_dung']          = isset($_POST['ND']) ? $_POST['ND'] : '';
     $data['ID_tl']          = isset($_POST['id']) ? $_POST['id'] : '';
     
    // Lay data
    $errors = array();
    if (empty($data['Ten_tl'])){
        $errors['Ten_tl'] = 'Chưa nhập tên giáo viên';
    }
     
    if (empty($data['ID_kh'])){
        $errors['ID_kh'] = 'Chưa nhập giới tính giáo viên ';
    }
     
    if (empty($data['Noi_dung'])){
        $errors['Noi_dung'] = 'Chưa nhập số điện thoại giáo viên ';
    }


    // Neu ko co loi thi insert
    if (!$errors){
        edit_tailieu($data['ID_tl'], $data['Ten_tl'], $data['ID_kh'], $data['Noi_dung']);
        // Trở về trang danh sách
        header("location: tailieu_list.php");
    }
}
 
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Sửa thông tin tài liệu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="themsua2.css">
    </head>
    <body>
    <section class="s2" id="s2">

        <form method="post" action="tailieu_edit.php?id=<?php echo $data['ID_tl']; ?>">
            <h1>Sửa thông tin tài liệu</h1>
            <a href="tailieu_list.php">Trở về</a>

            <table width="50%">
                <tr>
                    <td>
                        <input placeholder="Tên tài liệu" class="ip3" type="text" name="Ttl" value="<?php echo $data['Ten_tl']; ?>"/>
                        <?php if (!empty($errors['Ten_tl'])) echo $errors['Ten_tl']; ?>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <input placeholder="ID khóa học" class="ip3" type="text" name="KH" value="<?php echo $data['ID_kh']; ?>"/>
                        <?php if (!empty($errors['ID_kh'])) echo $errors['ID_kh']; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input placeholder="Nội dung" class="ip3" type="text" name="ND" value="<?php echo $data['Noi_dung']; ?>"/>
                        <?php if (!empty($errors['Noi_dung'])) echo $errors['Noi_dung']; ?>
                    </td>
                </tr>

            </table>
            <input type="hidden" name="id" value="<?php echo $data['ID_tl']; ?>"/>
            <input id="ip2" type="submit" name="edit_tailieu" value="Lưu"/>
        </form>
    </section>
    </body>
</html>
