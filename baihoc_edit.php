<?php

 require 'baihoc.php';

// Lấy thông tin hiển thị lên để người dùng sửa
$ID_bh = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($ID_bh){
    $data = get_baihoc($ID_bh);
    // $role = getRole_id();
    // $pd = getPB_id();
}
// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("location: baihoc_list.php");
}
// Nếu người dùng submit form
if (!empty($_POST['edit_baihoc']))
{
     // Lay data
     $data['ID_kh']        = isset($_POST['Tkh']) ? $_POST['Tkh'] : '';
     $data['Ten_bh']         = isset($_POST['Tbh']) ? $_POST['Tbh'] : '';
     $data['Noi_dung_bh']          = isset($_POST['ND']) ? $_POST['ND'] : '';
     $data['So_luong_cmt']    = isset($_POST['SL']) ? $_POST['SL'] : '';
     $data['motaBH']    = isset($_POST['BH']) ? $_POST['BH'] : '';
    $data['ID_bh']          = isset($_POST['id']) ? $_POST['id'] : '';
     
    // Lay data
    $errors = array();
    if (empty($data['ID_kh'])){
        $errors['ID_kh'] = 'Chưa nhập tên giáo viên';
    }
     
    if (empty($data['Ten_bh'])){
        $errors['Ten_bh'] = 'Chưa nhập giới tính giáo viên ';
    }
     
    if (empty($data['Noi_dung_bh'])){
        $errors['Noi_dung_bh'] = 'Chưa nhập số điện thoại giáo viên ';
    }

    if (empty($data['So_luong_cmt'])){
        $errors['So_luong_cmt'] = 'Chưa nhập email giáo viên ';
    }
 
    if (empty($data['motaBH'])){
        $errors['motaBH'] = 'Chưa nhập email giáo viên ';
    }
    // Neu ko co loi thi insert

    if (!$errors){
        add_baihoc($data['ID_kh'], $data['Ten_bh'], $data['Noi_dung_bh'], $data['So_luong_cmt'], $data['motaBH']);
        // Trở về trang danh sách
        header("location: baihoc_list.php");
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
        <link rel="stylesheet" href="themsua.css">
    </head>
    <body>
        <h1>Sửa thông tin giảng viên</h1>
        <a href="baihoc_list.php">Trở về</a> <br/> <br/>
        <form method="post" action="baihoc_edit.php?id=<?php echo $data['ID_bh']; ?>">
            <table width="70%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                    <td>ID khóa học</td>
                    <td>
                        <input type="text" name="Tkh" value="<?php 
                            echo !empty($data['ID_kh']) ? $data['ID_kh'] : ''; ?>"
                        />
                        <?php if (!empty($errors['ID_kh'])) echo $errors['ID_kh']; ?>
                    </td>
                </tr>
               
                <tr>
                    <td>Tên bài học</td>
                   <td> 
                    <input type="text" name="Tbh" value="<?php 
                            echo !empty($data['Ten_bh']) ? $data['Ten_bh'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Ten_bh'])) echo $errors['Ten_bh']; ?>
                        </td>
                </tr>
                
                <tr>
                    <td>Nội dung bài học</td>
                   <td> 
                    <input type="text" name="ND" value="<?php 
                            echo !empty($data['Noi_dung_bh']) ? $data['Noi_dung_bh'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Noi_dung_bh'])) echo $errors['Noi_dung_bh']; ?>
                        </td>
                </tr>

                <tr>
                    <td>Số lượng cmt</td>
                   <td> 
                    <input type="text" name="SL" value="<?php 
                            echo !empty($data['So_luong_cmt']) ? $data['So_luong_cmt'] : ''; ?>"
                            />
                        <?php if (!empty($errors['So_luong_cmt'])) echo $errors['So_luong_cmt']; ?>
                        </td>
                </tr>
  
                <tr>
                    <td>Mô tả bài học</td>
                   <td> 
                    <input type="text" name="BH" value="<?php 
                            echo !empty($data['motaBH']) ? $data['motaBH'] : ''; ?>"
                            />
                        <?php if (!empty($errors['motaBH'])) echo $errors['motaBH']; ?>
                        </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $data['ID_bh']; ?>"/>
                        <input type="submit" name="edit_baihoc" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
