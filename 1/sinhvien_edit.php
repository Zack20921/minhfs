<?php

 require 'sinhvien.php';

// Lấy thông tin hiển thị lên để người dùng sửa
$ID_sv = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($ID_sv){
    $data = get_sinhvien($ID_sv);
    // $role = getRole_id();
    // $pd = getPB_id();
}
// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("location: sinhvien_list.php");
}
// Nếu người dùng submit form
if (!empty($_POST['edit_sinhvien']))
{
     // Lay data
     $data['Ten_sv']        = isset($_POST['Tensv']) ? $_POST['Tensv'] : '';
     $data['Gioitinh']         = isset($_POST['GT']) ? $_POST['GT'] : '';
     $data['SDT_sv']          = isset($_POST['SĐT']) ? $_POST['SĐT'] : '';
     $data['Email_sv']         = isset($_POST['Email']) ? $_POST['Email'] : '';
     $data['Birth_sv']          = isset($_POST['NS']) ? $_POST['NS'] : '';
     $data['ID_sv']          = isset($_POST['id']) ? $_POST['id'] : '';
     
    // Lay data
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
        edit_sinhvien($data['ID_sv'], $data['Ten_sv'], $data['Gioitinh'], $data['SDT_sv'], $data['Email_sv'], $data['Birth_sv']);
        // Trở về trang danh sách
        header("location: sinhvien_list.php");
    }
}
 
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Sửa thông tin sinh viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../themsua2.css">
    </head>
    <body>
    <section class="s2" id="s2">

        <form method="post" action="sinhvien_edit.php?id=<?php echo $data['ID_sv']; ?>">
            <h1>Update student info</h1>
            <a href="sinhvien_list.php">Back</a>
            
            <table  width="50%">
            <tr>
                    <td>
                        <input placeholder="Tên sinh viên" class="ip3" type="text" name="Tensv" value="<?php 
                            echo !empty($data['Ten_sv']) ? $data['Ten_sv'] : ''; ?>"
                        />
                        <?php if (!empty($errors['Ten_sv'])) echo $errors['Ten_sv']; ?>
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
                    <input placeholder="Số điện thoại" class="ip3" type="text" name="SĐT" value="<?php 
                            echo !empty($data['SDT_sv']) ? $data['SDT_sv'] : ''; ?>"
                            />
                        <?php if (!empty($errors['SDT_sv'])) echo $errors['SDT_sv']; ?>
                        </td>
                </tr>

                <tr>
                   <td> 
                    <input placeholder="Email" class="ip3" type="text" name="Email" value="<?php 
                            echo !empty($data['Email_sv']) ? $data['Email_sv'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Email_sv'])) echo $errors['Email_sv']; ?>
                        </td>
                </tr>

                <tr>
                   <td> 
                    <input placeholder="Ngày sinh" class="ip3" type="text" name="NS" value="<?php 
                            echo !empty($data['Birth_sv']) ? $data['Birth_sv'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Birth_sv'])) echo $errors['Birth_sv']; ?>
                        </td>
                </tr>


            </table>
            <input  type="hidden" name="id" value="<?php echo $data['ID_sv']; ?>"/>
            <input id="ip2"  type="submit" name="edit_sinhvien" value="Save"/>
        </form>
    </section>
    </body>
</html>
