<?php

global $conn;

function connect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    $servername = "localhost";
    $username = "root";
    $password = "";
     
    try {
        $conn = new PDO("mysql:host=$servername;dbname=testfl_emtydata", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
   
}
 
function disconnect_db()
{
    global $conn;
     
    if ($conn){
        $conn = null;
    }
}

function add_user($user, $password){
  
  global $conn;
   
  connect_db();

  // $vaitro = addslashes($role);
  $user = addslashes($user);
  $password = addslashes($password);

  $sql =" INSERT INTO user(`ID_user`, `Ten_tk`, `Mk`, `Vai_tro`) 
  VALUES( NULL,'$user', '$password', 'sinh_vien' )";
  // $hash = password_hash($password, PASSWORD_DEFAULT);
  $stmt = $conn->prepare($sql);

  $stmt->execute();

  $stmt ->setFetchMode(PDO::FETCH_ASSOC);

  // $result = $stmt->fetchAll();
  //     return $result;
  return 0;
  }

// select id tu bang user
function getID_user(){
  global $conn;
   
  connect_db();

  $sql ="
    SELECT * FROM user ORDER BY user.ID_user DESC LIMIT 1;)
  ";
  // $hash = password_hash($password, PASSWORD_DEFAULT);
  $stmt = $conn->prepare($sql);

  $stmt->execute();

  $stmt ->setFetchMode(PDO::FETCH_ASSOC);

  $result = $stmt->fetch();
      return $result;
  // return 0;
}

// them sinh vien

function addSV($id, $ten, $gender, $sdt, $email, $birth){
  global $conn;
   
  connect_db();

  $sql ="
  INSERT INTO `sinhvien` (`ID_sv`, `Ten_sv`, `Gioitinh`, `SDT_sv`, `Email_sv`, `Birth_sv`) 
    VALUES ('$id', '$ten', '$gender', '$sdt', '$email', '$birth')
  ";
  // $hash = password_hash($password, PASSWORD_DEFAULT);
  $stmt = $conn->prepare($sql);

  $stmt->execute();

  $stmt ->setFetchMode(PDO::FETCH_ASSOC);

  // $result = $stmt->fetchAll();
  //     return $result;
  return 0;
}

function addGV($id, $ten, $gender, $sdt, $email, $birth){
  global $conn;
   
  connect_db();

  $sql ="
  INSERT INTO `giangvien` (`ID_gv`, `Ten_gv`, `Gioitinh`, `SDT_gv`, `Email_gv`, `Birth_gv`) VALUES ('', '', '', '', '', '')
  ";
  // $hash = password_hash($password, PASSWORD_DEFAULT);
  $stmt = $conn->prepare($sql);

  $stmt->execute();

  $stmt ->setFetchMode(PDO::FETCH_ASSOC);

  // $result = $stmt->fetchAll();
  //     return $result;
  return 0;
}


function getFeedback(){
    global $conn;
  
    connect_db();
  
    $sql = "SELECT * FROM feedbacks WHERE 1";
  
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Trả kết quả về 
    return $result; 
  }

  function getKhoahoc($phanloai)
{
  global $conn;

  connect_db();

  $sql = "SELECT * from khoahoc where Phan_loai = '$phanloai' ";

  
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt ->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  // Trả kết quả về 
  return $result;
 var_dump($result);
}

?>
<?php

class Connection {

  public function dbConnect(){
    return new PDO("mysql:host=localhost;dbname=testfl_emtydata","root", "");
  }
}



function getAllBaihoc()
{
  global $conn;

  connect_db();

  $sql = "SELECT * FROM khoahoc WHERE 1";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt ->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  // Trả kết quả về 
  return $result; 

}

function get_all_feedbackstt()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    
    $sql = " SELECT posts.Ten_post, posts.Ngay_post, posts.Noi_dung_post
    FROM posts
    WHERE 1";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Trả kết quả về
    return $result;
    // var_dump($result);
}
?>