<?php 

include_once('config.php');

class Login{
  private $db;

  public function __construct() {
    $this->db = new Connection();
    $this->db = $this->db->dbConnect();
    // Bắt đầu một session mới
    session_start();
  }
  public function Login($username, $password){
    if(!empty($username) && !empty($password)){
      // Lấy mật khẩu đã mã hóa từ cơ sở dữ liệu 
      $stmt = $this->db->prepare("SELECT ID_user, Mk, Ten_tk, Vai_tro FROM user WHERE Ten_tk = :username"); 
      $stmt->execute([':username' => $username]);
      $result = $stmt->fetch();

      if($result){
        // Lấy giá trị của cột Mk, Vai_tro và Ten_tk 
        $hashed_password = $result['Mk']; 
        $vai_tro = $result['Vai_tro']; 
        $ten = $result['Ten_tk'];
        $ID = $result['ID_user'];

        if (password_verify($password, $hashed_password)) {
        // Lưu trữ vai trò và tên vào biến session
        $_SESSION['login']['user'] = $ten;
        $_SESSION['role']['vt'] = $vai_tro;
        $_SESSION['user_id'] = $ID;
        $_SESSION['time'] = time();

        if ($vai_tro == 'giang_vien') {
          header("Location: ../giangvien/giangvien.php");
        } elseif ($vai_tro == 'sinh_vien') {
          header("Location: ../hocsinh.php");
        }elseif ($vai_tro == 'admin') {
          header("Location: ../admin/admin.php");
        }
      } else{
        $message = "Nhập tài khoản sai hoặc sai mật khẩu";
        echo "<script type='text/javascript'>alert('$message');</script>";;;
      }
    }else{
      $message = "vui lòng nhập tài khoản hoặc mật khẩu";
      echo "<script type='text/javascript'>alert('$message');</script>";;
    }
  }
}

}?>
