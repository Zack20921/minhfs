<?php

require 'libra/ketnoidb.php';

connect_db();
 // Lấy dữ liệu từ yêu cầu POST

$fb = $_POST['fb'];
$khfb = $_POST['khfb'];
$userfb = $_POST['userfb'];
$tenuser = $_POST['tenuser'];

$sql =" INSERT INTO feedbacks(ID_sv, Ngay_fb, Noi_dung_fb, ID_kh) 
VALUES('$userfb',CURDATE(),  '$fb', '$khfb')";

try {
  $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {    
  echo '<div id="boxfb" class="card p-3 mt-2">
            
  <div class="d-flex justify-content-between align-items-center">

<div class="user d-flex flex-row align-items-center">

  <img src="https://mir-s3-cdn-cf.behance.net/project_modules/fs/122db085587757.5ed7d338b0e72.jpg" width="30" class="user-img rounded-circle mr-2">
  <span><small class="font-weight-bold text-primary">
  '.$tenuser.'
  </small> <small class="font-weight-bold">'.$fb.'</small></span>
    
</div>


<small>0 days ago</small>

</div>


<div class="action d-flex justify-content-between mt-2 align-items-center">

  <div class="reply px-4">
      <small>Remove</small>
      <span class="dots"></span>
      <small>Reply</small>
      <span class="dots"></span>
      <small>Translate</small>
     
  </div>

  <div class="icons align-items-center">

      <i class="fa fa-star text-warning"></i>
      <i class="fa fa-check-circle-o check-icon"></i>
      
  </div>
    
</div>
</div>';
}
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
// Đóng kết nối
disconnect_db();
?>