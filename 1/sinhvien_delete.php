<?php 
require 'sinhvien.php';
// Thực hiện xóa
$ID_sv = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($ID_sv){
    delete_sinhvien($ID_sv);
}

// Trở về trang danh sách
header("location: sinhvien_list.php");
?>
<?php echo $data ?>
