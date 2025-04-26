<?php
 require 'ttgiangvien.php';

// Nếu người dùng submit form
// $role = getRole_id();
//     $pb = getPB_id();
if (!empty($_POST['add_ttgiangvien']))
{
    // Lay data
    $data['Ten_gv']        = isset($_POST['Tgv']) ? $_POST['Tgv'] : '';
    $data['Gioitinh']         = isset($_POST['GT']) ? $_POST['GT'] : '';
    $data['SDT_gv']          = isset($_POST['SDT']) ? $_POST['SDT'] : '';
    $data['Email_gv']    = isset($_POST['Email']) ? $_POST['Email'] : '';
    $data['Birth_gv']          = isset($_POST['Birth']) ? $_POST['Birth'] : '';
    // Validate thong tin
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
        add_ttgiangvien($data['Ten_gv'], $data['Gioitinh'], $data['SDT_gv'], $data['Email_gv'], $data['Birth_gv']);
        // Trở về trang danh sách
        header("location: ttgiangvien_list.php");
    }
}

disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm giảng viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="themsua2.css">
    </head>
    <body>
    <section class="s2" id="s2">
        <form method="post" action="ttgiangvien_add.php">
            <h1>Thêm thông tin giảng viên </h1>
            <a href="ttgiangvien_list.php">Back</a>

            <table width="50%" >
                <tr>
                    <td>
                        <input placeholder="Tên giảng viên" class="ip3" type="text" name="Tgv" value="<?php 
                            echo !empty($data['Ten_gv']) ? $data['Ten_gv'] : ''; ?>"
                        />
                        <?php if (!empty($errors['Ten_gv'])) echo $errors['Ten_gv']; ?>
                    </td>
                </tr>
               
                <tr>
                   <td> 
                        <input placeholder="Giới tính" class="ip3" type="text" name="GT" value="<?php 
                            echo !empty($data['Gioitinh']) ? $data['Gioitinh'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Gioitinh'])) echo $errors['Gioitinh']; ?>
                    </td>
                </tr>
                
                <tr>
                   <td> 
                        <input placeholder="SĐT" class="ip3" type="text" name="SDT" value="<?php 
                            echo !empty($data['SDT_gv']) ? $data['SDT_gv'] : ''; ?>"
                            />
                        <?php if (!empty($errors['SDT_gv'])) echo $errors['SDT_gv']; ?>
                    </td>
                </tr>

                <tr>
                   <td> 
                    <input placeholder="Email" class="ip3" type="text" name="Email" value="<?php 
                            echo !empty($data['Email_gv']) ? $data['Email_gv'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Email_gv'])) echo $errors['Email_gv']; ?>
                        </td>
                </tr>

                <tr>
                   <td> 
                    <input placeholder="Ngày sinh" class="ip3" type="text" name="Birth" value="<?php 
                            echo !empty($data['Birth_gv']) ? $data['Birth_gv'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Birth_gv'])) echo $errors['Birth_gv']; ?>
                        </td>
                </tr>
            </table>
            <input id="ip2" type="submit" name="add_ttgiangvien" value="Lưu"/>
        </form>
    </section>
    </body>
</html>