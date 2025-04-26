<?php 
// Biến kết nối toàn cục
global $conn;
 
// Hàm kết nối database
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
 
// Hàm ngắt kết nối
function disconnect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Nếu đã kêt nối thì thực hiện ngắt kết nối
    if ($conn){
        $conn = null;
    }
}

// lay khoa hoc theo the loai

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

function getIn4C()
{
  global $conn;

  connect_db();

  $sql = "SELECT * from chitietkhoahoc where 1";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt ->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  // Trả kết quả về 
  return $result;
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

// lay bai hoc theo khoa hoc

function getBaihoc($idkh)
{
  global $conn;

  connect_db();

  $sql = "SELECT * FROM baihoc JOIN khoahoc ON baihoc.ID_kh = khoahoc.ID_kh 
  WHERE baihoc.ID_kh = '$idkh'";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt ->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  // Trả kết quả về 
  return $result; 

}

// lay khoa hoc voi id cu the
function getCourse_id($idkh)
{
  global $conn;

  connect_db();

  $sql = "SELECT *, giangvien.Ten_gv 
  FROM `khoahoc`,giangvien 
  WHERE khoahoc.ID_kh = '$idkh' and khoahoc.ID_gv = giangvien.ID_gv";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt ->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetch();
  // Trả kết quả về 
  return $result; 

}

// lay chi tiet khoa hoc theo khoa hoc

function getChitietkh($idkh){
  global $conn;

  connect_db();

  $sql = "SELECT * FROM `chitietkhoahoc` WHERE ID_kh = '$idkh'";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt ->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  // Trả kết quả về 
  return $result; 
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

// lay 1 khoa hoc cu the trong bang dang ki khoa hoc
function get1DKKH($ID_kh,$idsv){
  global $conn;

  connect_db();

  $sql = "SELECT COUNT(*) as bool, dangki_khoahoc.Ma_dki
          FROM dangki_khoahoc 
          WHERE dangki_khoahoc.ID_sv = '$idsv' AND dangki_khoahoc.ID_kh IN 
            (SELECT ID_kh FROM khoahoc WHERE khoahoc.ID_kh = '$ID_kh')";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt ->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetch();
  // Trả kết quả về 
  return $result; 
}

// ham chen du lieu vao bang dang ki khoa hoc

function addDKKH($idkh, $idsv, $ngaydki){
  global $conn;

  connect_db();

  $sql = " 
  INSERT INTO `dangki_khoahoc` (`Ma_dki`, `ID_kh`, `ID_sv`, `Ngay_dang_ki`, `Hoc_phi`) 
  VALUES (NULL, '$idkh', '$idsv', '$ngaydki', 0)
  ";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt ->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetch();
  // Trả kết quả về 
  return $result; 
}

// ham huy dang ki khoa hoc

function delDKKH($iddki){

  global $conn;

  connect_db();

  $sql = " 
    DELETE FROM dangki_khoahoc WHERE `dangki_khoahoc`.`Ma_dki` = '$iddki'
  ";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt ->setFetchMode(PDO::FETCH_ASSOC);
  
  // Trả kết quả về 
  return 0; 
}


//-------------------------------------bai cua be Minh---------------------------
function getFeedback3($idkh){
  global $conn;

  connect_db();

  $sql = "SELECT feedbacks.ID_fb, sinhvien.Ten_sv,  DATEDIFF (CURDATE(),feedbacks.Ngay_fb) as Ngay_fb, feedbacks.Noi_dung_fb, feedbacks.ID_kh
  FROM feedbacks 
  JOIN sinhvien
  ON feedbacks.ID_sv = sinhvien.ID_sv
  WHERE feedbacks.ID_kh = '$idkh'
  ORDER BY feedbacks.ID_fb DESC
  LIMIT 4
  ";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt ->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  // Trả kết quả về 
  return $result; 
}

function getFeedback2($idkh){
  global $conn;

  connect_db();

  $sql = "SELECT feedbacks.ID_fb, sinhvien.Ten_sv,  DATEDIFF (CURDATE(),feedbacks.Ngay_fb) as Ngay_fb, feedbacks.Noi_dung_fb, feedbacks.ID_kh
  FROM feedbacks 
  JOIN sinhvien
  ON feedbacks.ID_sv = sinhvien.ID_sv
  WHERE feedbacks.ID_kh = '$idkh'
  ORDER BY feedbacks.ID_fb DESC
  ";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt ->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  // Trả kết quả về 
  return $result; 
}

  function getiduser( $user){
    global $conn;
     
    connect_db();
  
  
    $sql =" SELECT ID_user
    FROM user
    WHERE Ten_tk = '$user' ";
  
    $stmt = $conn->prepare($sql);
  
    $stmt->execute();
  
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
  
    $result = $stmt->fetchAll();
    
    foreach ($result as $row) {
      $role_id = $row['ID_user'];
      
      }

    return $role_id;
    }
    
    function gettenuser($user){
      global $conn;
       
      connect_db();
    
    
      $sql =" SELECT sinhvien.Ten_sv
      FROM user
      JOIN sinhvien
      ON user.ID_user = sinhvien.ID_sv
      WHERE Ten_tk = '$user' ";
    
      $stmt = $conn->prepare($sql);
    
      $stmt->execute();
    
      $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    
      $result = $stmt->fetchAll();
      
      foreach ($result as $row) {
        $Tenuser = $row['Ten_sv'];
        
        }
  
      return $Tenuser;
    }


    function get_idkh($id){
    global $conn;
     
    connect_db();
     
    $sql = "SELECT khoahoc.ID_kh, khoahoc.ID_gv, giangvien.Ten_gv
    from khoahoc
    JOIN giangvien
    ON khoahoc.ID_gv = giangvien.ID_gv
    where ID_kh = $id
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
     
    $result = array();
     
    if ($stmt->rowCount() > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = $row;
    }
     
    return $result;
}


function getcmt_rep($id, $idgv){
  global $conn;

  connect_db();

  $sql = "SELECT cmt_rep.ID_bl, giangvien.Ten_gv, cmt_rep.Noi_dung_bl, cmt_rep.Rep, cmt_rep.Ngay_binh_luan
  FROM cmt_rep
  JOIN giangvien
  ON cmt_rep.ID_gv = giangvien.ID_gv
  WHERE cmt_rep.ID_sv = '$id' AND giangvien.ID_gv = '$idgv'
  ORDER BY cmt_rep.Ngay_binh_luan ASC
  ";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt ->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  // Trả kết quả về 
  return $result; 
}

// ---------------------------------------------phan cua duc---------------------------------

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