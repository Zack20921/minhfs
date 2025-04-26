<?php 
require 'ttgiangvien.php';
// Thực hiện xóa
$ID_gv = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($ID_gv){
    delete_ttgiangvien($ID_gv);
}

// Trở về trang danh sách
header("location: ttgiangvien_list.php");
?>
<?php echo $data ?>
