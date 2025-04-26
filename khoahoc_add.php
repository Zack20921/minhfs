<?php
 require 'khoahoc.php';

if (!empty($_POST['add_khoahoc']))
{
    // Lay data
    $data['Ten_kh']        = isset($_POST['Tkh']) ? $_POST['Tkh'] : '';
    $data['Ngay_bat_dau']         = isset($_POST['NBĐ']) ? $_POST['NBĐ'] : '';
    $data['Ngay_ket_thuc']          = isset($_POST['NKT']) ? $_POST['NKT'] : '';
    $data['ID_gv']    = isset($_POST['IDGV']) ? $_POST['IDGV'] : '';
    $data['Hoc_phi']          = isset($_POST['HP']) ? $_POST['HP'] : '';
    $data['Do_kho']          = isset($_POST['DK']) ? $_POST['DK'] : '';
    $data['Chi_tiet']    = isset($_POST['CT']) ? $_POST['CT'] : '';
    $data['Phan_loai']          = isset($_POST['PL']) ? $_POST['PL'] : '';
    
    // Validate thong tin
    $errors = array();
    if (empty($data['Ten_kh'])){
        $errors['Ten_kh'] = 'Chưa nhập tên giáo viên';
    }
     
    if (empty($data['Ngay_bat_dau'])){
        $errors['Ngay_bat_dau'] = 'Chưa nhập giới tính giáo viên ';
    }
     
    if (empty($data['Ngay_ket_thuc'])){
        $errors['Ngay_ket_thuc'] = 'Chưa nhập số điện thoại giáo viên ';
    }

    if (empty($data['ID_gv'])){
        $errors['ID_gv'] = 'Chưa nhập email giáo viên ';
    }

    if (empty($data['Hoc_phi'])){
        $errors['Hoc_phi'] = 'Chưa nhập ngày sinh giáo viên ';
    }

    if (empty($data['Do_kho'])){
        $errors['Do_kho'] = 'Chưa nhập số điện thoại giáo viên ';
    }

    if (empty($data['Chi_tiet'])){
        $errors['Chi_tiet'] = 'Chưa nhập email giáo viên ';
    }

    if (empty($data['Phan_loai'])){
        $errors['Phan_loai'] = 'Chưa nhập ngày sinh giáo viên ';
    }
    // Neu ko co loi thi insert
    if (!$errors){
        add_khoahoc($data['Ten_kh'], $data['Ngay_bat_dau'], $data['Ngay_ket_thuc'], $data['ID_gv'], $data['Hoc_phi'], $data['Do_kho'], $data['Chi_tiet'], $data['Phan_loai']);
        // Trở về trang danh sách
        header("location: khoahoc_list.php");
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
        <form method="post" action="khoahoc_add.php">
            <h1>Add Sinh vien</h1>
            <a href="khoahoc_list.php">Trở về</a>
            <table width="50%" >
                <tr>
                    <td>
                        <input placeholder="Tên khóa học" class="ip1" type="text" name="Tkh" value="<?php 
                            echo !empty($data['Ten_kh']) ? $data['Ten_kh'] : ''; ?>"/>
                        <?php if (!empty($errors['Ten_kh'])) echo $errors['Ten_kh']; ?>
                    </td>
                    <td> 
                        <input placeholder="Ngày bắt đầu" class="ip1" type="text" name="NBĐ" value="<?php 
                            echo !empty($data['Ngay_bat_dau']) ? $data['Ngay_bat_dau'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Ngay_bat_dau'])) echo $errors['Ngay_bat_dau']; ?>
                    </td>
                </tr>
               
                <tr>
                   <td> 
                    <input placeholder="Ngày kết thúc" class="ip1" type="text" name="NKT" value="<?php 
                            echo !empty($data['Ngay_ket_thuc']) ? $data['Ngay_ket_thuc'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Ngay_ket_thuc'])) echo $errors['Ngay_ket_thuc']; ?>
                        </td>

                    <td> 
                        <input placeholder="ID giáo viên" class="ip1" type="text" name="IDGV" value="<?php 
                            echo !empty($data['ID_gv']) ? $data['ID_gv'] : ''; ?>"
                            />
                        <?php if (!empty($errors['ID_gv'])) echo $errors['ID_gv']; ?>
                    </td>
                </tr>

                <tr>
                    <td> 
                        <input placeholder="Học phí" class="ip1" type="text" name="HP" value="<?php 
                                echo !empty($data['Hoc_phi']) ? $data['Hoc_phi'] : ''; ?>"
                                />
                        <?php if (!empty($errors['Hoc_phi'])) echo $errors['Hoc_phi']; ?>
                    </td>

                    <td> 
                        <input placeholder="Độ khó" class="ip1" type="text" name="DK" value="<?php 
                            echo !empty($data['Do_kho']) ? $data['Do_kho'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Do_kho'])) echo $errors['Do_kho']; ?>
                    </td>
                </tr>

                <tr>
                   <td> 
                        <input placeholder="Chi tiết" class="ip1" type="text" name="CT" value="<?php 
                            echo !empty($data['Chi_tiet']) ? $data['Chi_tiet'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Chi_tiet'])) echo $errors['Chi_tiet']; ?>
                    </td>
                    <td> 
                        <input placeholder="Phân loại" class="ip1" type="text" name="PL" value="<?php 
                            echo !empty($data['Phan_loai']) ? $data['Phan_loai'] : ''; ?>"
                            />
                        <?php if (!empty($errors['Phan_loai'])) echo $errors['Phan_loai']; ?>
                    </td>
                </tr>
            </table>
            <input id="ip2" type="submit" name="add_khoahoc" value="Lưu"/>
        </form>
    </section>
    </body>
</html>