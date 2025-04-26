<?php


// global $conn;
//     $servername = "localhost";
//     $username = "root";
//     $password = "";
     
//     try {
//         $conn = new PDO("mysql:host=$servername;dbname=testfl_emtydata", $username, $password);
//         // set the PDO error mode to exception
//         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         // echo "Connected successfully";
//       } catch(PDOException $e) {
//         echo "Connection failed: " . $e->getMessage();
//       }
require 'libra/ketnoidb.php';
connect_db();


 // Lấy dữ liệu từ yêu cầu POST
$chat = $_POST['chat'];
$user = $_POST['user'];
$kh = $_POST['kh'];
$gv = $_POST['gv'];


// Thêm dữ liệu vào bảng
  $sql =" INSERT INTO cmt_rep(ID_sv, ID_gv, Ngay_binh_luan, Noi_dung_bl, ID_kh) 
  VALUES('$user','$gv',CURDATE(),  '$chat ', '$kh')";

try {
  $stmt = $conn->prepare($sql);
  if ($stmt->execute()) {
      echo '<div class="d-flex flex-row p-2"><div class="bg-white ml-auto p-3"><span class="text-muted">' . $chat . '</div><img src="https://img.icons8.com/color/48/000000/circled-user-male-skin-type-7.png" width="30" height="30"></div>';
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}


// Đóng kết nối
disconnect_db();

?>
