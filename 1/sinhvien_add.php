<?php
 require 'sinhvien.php';

// Nếu người dùng submit form

if (!empty($_POST['add_sinhvien']))
{
    // Lay data
    $data['Ten_sv']        = isset($_POST['Tensv']) ? $_POST['Tensv'] : '';
    $data['Gioitinh']         = isset($_POST['GT']) ? $_POST['GT'] : '';
    $data['SDT_sv']          = isset($_POST['SĐT']) ? $_POST['SĐT'] : '';
    $data['Email_sv']         = isset($_POST['Email']) ? $_POST['Email'] : '';
    $data['Birth_sv']          = isset($_POST['NS']) ? $_POST['NS'] : '';

    // Validate thong tin
    $errors = array();
    if (empty($data['Ten_sv'])){
        $errors['Ten_sv'] = 'Chưa nhập tên giáo viên';
    }
     
    if (empty($data['Gioitinh'])){
        $errors['Gioitinh'] = 'Chưa nhập giới tính giáo viên ';
    }
     
    if (empty($data['SDT_sv'])){
        $errors['SDT_sv'] = 'Chưa nhập số điện thoại giáo viên ';
    }
    
    if (empty($data['Email_sv'])){
        $errors['Email_sv'] = 'Chưa nhập giới tính giáo viên ';
    }
     
    if (empty($data['Birth_sv'])){
        $errors['Birth_sv'] = 'Chưa nhập số điện thoại giáo viên ';
    }


    // Neu ko co loi thi insert
    if (!$errors){
        add_sinhvien($data['Ten_sv'], $data['Gioitinh'], $data['SDT_sv'], $data['Email_sv'], $data['Birth_sv']);
        // Trở về trang danh sách
        header("location: sinhvien_list.php");
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
        <link rel="stylesheet" href="../themsua2.css">
    </head>
    <body>
    <section class="s2" id="s2">
        <form method="post" action="sinhvien_add.php">
            <h1>Thêm thông tin sinh viên</h1>
            <a href="sinhvien_list.php">Trở về</a>
            <table width="50%" >
                <tr>
                    <td>
                        <input placeholder="Tên sinh viên" class="ip1" type="text" name="Tensv" value="<?php 
                            echo !empty($data['Ten_sv']) ? $data['Ten_sv'] : ''; ?>"
                        />
                        <?php if (!empty($errors['Ten_sv'])) echo $errors['Ten_sv']; ?>
                    </td>
                </tr>
               
                <tr>
                   <td> 
                        <input placeholder="Giới tính" class="ip1" type="text" name="GT" value="<?php 
                            echo !empty($data['Gioitinh']) ? $data['Gioitinh'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Gioitinh'])) echo $errors['Gioitinh']; ?>
                    </td>

                    <td> 
                        <input placeholder="Số điện thoại" class="ip1" type="text" name="SĐT" value="<?php 
                            echo !empty($data['SDT_sv']) ? $data['SDT_sv'] : ''; ?>"
                            />
                        <?php if (!empty($errors['SDT_sv'])) echo $errors['SDT_sv']; ?>
                    </td>
                </tr>
                
                <tr>
                   <td> 
                        <input placeholder="Email" class="ip1" type="text" name="Email" value="<?php 
                            echo !empty($data['Email_sv']) ? $data['Email_sv'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Email_sv'])) echo $errors['Email_sv']; ?>
                    </td>

                    <td> 
                        <input placeholder="Ngày sinh" class="ip1" type="text" name="NS" value="<?php 
                            echo !empty($data['Birth_sv']) ? $data['Birth_sv'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Birth_sv'])) echo $errors['Birth_sv']; ?>
                    </td>
                </tr>
            </table>
            <input id="ip2" type="submit" name="add_sinhvien" value="Lưu"/>

        </form>
    </section>
    </body>
</html>