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

// function get_dkikh_idsv($idkh, $idsv)
// {
//   global $conn;

//   connect_db();

//   $sql = "SELECT * FROM `dangki_khoahoc` 
//   JOIN khoahoc on khoahoc.ID_kh = dangki_khoahoc.ID_kh 
//   JOIN sinhvien on dangki_khoahoc.ID_sv = sinhvien.ID_sv
//   WHERE dangki_khoahoc.ID_kh = '$idkh' and dangki_khoahoc.ID_sv = '$idsv'";

//   $stmt = $conn->prepare($sql);
//   $stmt->execute();
//   $stmt ->setFetchMode(PDO::FETCH_ASSOC);
//   $result = $stmt->fetch();
//   // Trả kết quả về 
//   return $result; 

// }

// lay khoa hoc voi id cu the va ten giang vien
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

function getSV_id($idsv)
{
  global $conn;

  connect_db();

  $sql = "SELECT * FROM `sinhvien` WHERE ID_sv = '$idsv'";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt ->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetch();
  // Trả kết quả về 
  return $result; 

}

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


?>