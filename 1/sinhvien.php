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
 
// Hàm lấy tất cả sinh viên
function get_all_sinhvien()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    
    $sql = " SELECT sinhvien.ID_sv, sinhvien.Ten_sv, sinhvien.Gioitinh, sinhvien.SDT_sv, sinhvien.Email_sv, sinhvien.Birth_sv
    FROM sinhvien
    WHERE 1";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Trả kết quả về
    return $result;
    // var_dump($result);
}

//Hàm lấy giảng viên theo ID
function get_sinhvien($ID_sv)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
   
    $sql = " SELECT sinhvien.ID_sv, sinhvien.Ten_sv, sinhvien.Gioitinh, sinhvien.SDT_sv, sinhvien.Email_sv, sinhvien.Birth_sv
    FROM sinhvien
    WHERE  ID_sv= $ID_sv
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();

    // Trả kết quả về
    return $result;
}

// Hàm thêm sinh viên
function add_sinhvien($Ten_sv, $Gioitinh, $SDT_sv, $Email_sv, $Birth_sv)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    // Chống SQL Injection
    $Ten_sv = addslashes($Ten_sv);
    $Gioitinh = addslashes($Gioitinh);
    $SDT_sv = addslashes($SDT_sv);
    $Email_sv = addslashes($Email_sv);
    $Birth_sv = addslashes($Birth_sv);

    // Câu truy vấn thêm
    $sql = "
            INSERT INTO sinhvien(Ten_sv, Gioitinh, SDT_sv, Email_sv, Birth_sv) VALUES
            ('$Ten_sv', '$Gioitinh', '$SDT_sv', '$Email_sv', '$Birth_sv')
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Thực hiện câu truy vấn     
    return $result;
}

// Hàm sửa nhan vien 
function edit_sinhvien($ID_sv, $Ten_sv, $Gioitinh, $SDT_sv, $Email_sv, $Birth_sv)
{
    // Gọi tới biến toàn cục $conn
    global $conn;     
    // Hàm kết nối
    connect_db();     
    // Chống SQL Injection
    $Ten_sv = addslashes($Ten_sv);
    $Gioitinh = addslashes($Gioitinh);
    $SDT_sv = addslashes($SDT_sv);
    $Email_sv = addslashes($Email_sv);
    $Birth_sv = addslashes($Birth_sv);

   
    // Câu truy sửa
    $sql = "
    UPDATE sinhvien SET
    Ten_sv = '$Ten_sv',
    Gioitinh = '$Gioitinh',
    SDT_sv = '$SDT_sv',
    Email_sv = '$Email_sv',
    Birth_sv = '$Birth_sv'
    WHERE ID_sv = $ID_sv
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Hàm xóa sinh viên
function delete_sinhvien($ID_sv)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
    // Câu truy sửa
    $sql = "
        DELETE FROM sinhvien
        WHERE ID_sv = $ID_sv
    ";
    // Thực hiện câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();    
    return $result;
}

// Hàm dem sinh vien
function count_SV()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
    // Câu truy sửa
    $sql = "
    SELECT COUNT(sinhvien.ID_sv) as SL
    FROM sinhvien
    ";
    // Thực hiện câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();    
    return $result;
}