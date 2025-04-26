<?php
 require 'tailieu.php';

// Nếu người dùng submit form

if (!empty($_POST['add_tailieu']))
{
    // Lay data
    $data['Ten_tl']        = isset($_POST['Tentl']) ? $_POST['Tentl'] : '';
    $data['ID_kh']         = isset($_POST['Tenkh']) ? $_POST['Tenkh'] : '';
    $data['Noi_dung']          = isset($_POST['ND']) ? $_POST['ND'] : '';

    // Validate thong tin
    $errors = array();
    if (empty($data['Ten_tl'])){
        $errors['Ten_tl'] = 'Chưa nhập tên giáo viên';
    }
     
    if (empty($data['ID_kh'])){
        $errors['Ten_kh'] = 'Chưa nhập giới tính giáo viên ';
    }
     
    if (empty($data['Noi_dung'])){
        $errors['Noi_dung'] = 'Chưa nhập số điện thoại giáo viên ';
    }

    // Neu ko co loi thi insert
    if (!$errors){
        add_tailieu($data['Ten_tl'], $data['ID_kh'], $data['Noi_dung']);
        // Trở về trang danh sách
        header("location: Document Viewer.php");
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
        <link rel="stylesheet" href="themsua.css">
    </head>
    <body>
        <h1>Thêm thông tin giảng viên </h1>
        <a href="tailieu_list.php">Trở về</a> <br/> <br/>
        <form method="post" action="tailieu_add.php">
            <table width="70%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Tên tài liệu </td>
                    <td>
                        <input type="text" name="Tentl" value="<?php 
                            echo !empty($data['Ten_tl']) ? $data['Ten_tl'] : ''; ?>"
                        />
                        <?php if (!empty($errors['Ten_tl'])) echo $errors['Ten_tl']; ?>
                    </td>
                </tr>
               
                <tr>
                    <td>ID khóa học</td>
                   <td> 
                    <input type="text" name="Tenkh" value="<?php 
                            echo !empty($data['ID_kh']) ? $data['ID_kh'] : ''; ?>"
                            />
                        <?php if (!empty($errors['ID_kh'])) echo $errors['ID_kh']; ?>
                        </td>
                </tr>
                
                <tr>
                    <td>Nội dung</td>
                   <td> 
                    <input type="text" name="ND" value="<?php 
                            echo !empty($data['Noi_dung']) ? $data['Noi_dung'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Noi_dung'])) echo $errors['Noi_dung']; ?>
                        </td>
                </tr>

                    <td>
                        <input type="submit" name="add_tailieu" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>