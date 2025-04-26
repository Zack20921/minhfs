<?php 
require 'khoahoc.php';
// Thực hiện xóa
$ID_kh = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($ID_kh){
    delete_khoahoc($ID_kh);
}
// Trở về trang danh sách
header("location: khoahoc_list.php");
?>
<?php echo $data ?>
