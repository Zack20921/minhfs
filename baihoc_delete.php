<?php 
require 'baihoc.php';
// Thực hiện xóa
$ID_bh = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($ID_bh){
    delete_baihoc($ID_bh);
}
// Trở về trang danh sách
header("location: baihoc_list.php");
?>
<?php echo $data ?>
