<?php 
require 'user.php';
// Thực hiện xóa
$ID_user = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($ID_user){
    delete_user($ID_user);
}

// Trở về trang danh sách
header("location: user_list.php");
?>
<?php echo $data ?>
