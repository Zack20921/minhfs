<?php 
require 'tailieu.php';
// Thực hiện xóa
$ID_tl = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($ID_tl){
    delete_tailieu($ID_tl);
}

// Trở về trang danh sách
header("location: tailieu_list.php");
?>
<?php echo $data ?>
