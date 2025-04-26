<?php
 require 'user.php';

// Nếu người dùng submit form
if (!empty($_POST['add_user']))
{
     // Lay data
     $data['Ten_tk']        = isset($_POST['Ttk']) ? $_POST['Ttk'] : '';
     $data['Mk']         = isset($_POST['MK']) ? $_POST['MK'] : '';
     $data['Vai_tro']          = isset($_POST['VT']) ? $_POST['VT'] : '';
     
    // Lay data
    $errors = array();
    if (empty($data['Ten_tk'])){
        $errors['Ten_tk'] = 'Chưa nhập tên giáo viên';
    }
     
    if (empty($data['Mk'])){
        $errors['Mk'] = 'Chưa nhập giới tính giáo viên ';
    }

    if (empty($data['Vai_tro'])){
        $errors['Vai_tro'] = 'Chưa nhập giới tính giáo viên ';
    }
     
    // Neu ko co loi thi insert
    if (!$errors){
        add_user($data['Ten_tk'], $data['Mk'], $data['Vai_tro']);
        // Trở về trang danh sách
        header("location: user_list.php");
    }
}

disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm tài khoản</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../themsua.css">
    </head>
    <body>
        <h1>Thêm thông tin tài khoản </h1>
        <a href="user_list.php">Trở về</a> <br/> <br/>
        <form method="post" action="user_add.php">
            <table width="70%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Tên tài khoản</td>
                   <td> 
                    <input type="text" name="Ttk" value="<?php 
                            echo !empty($data['Ten_tk']) ? $data['Ten_tk'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Ten_tk'])) echo $errors['Ten_tk']; ?>
                        </td>
                </tr>
                
                <tr>
                    <td>mật khẩu</td>
                      <td> 
                    <input type="text" name="MK" value="<?php 
                            echo !empty($data['Mk']) ? $data['Mk'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Mk'])) echo $errors['Mk']; ?>
                        </td>
                </tr>
                
                <tr>
                    <td>Vai trò</td>
                   <td> 
                    <input type="text" name="VT" value="<?php 
                            echo !empty($data['Vai_tro']) ? $data['Vai_tro'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Vai_tro'])) echo $errors['Vai_tro']; ?>
                        </td>
                </tr>
                    <td>
                        <input type="submit" name="add_user" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>