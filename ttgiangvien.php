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
 
// Hàm lấy tất cả giảng viên
function get_all_ttgiangvien()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    // Câu truy vấn lấy tất cả giảng viên
    $sql = "SELECT giangvien.ID_gv, giangvien.Ten_gv, giangvien.Gioitinh, giangvien.SDT_gv, giangvien.Email_gv, giangvien.Birth_gv, khoahoc.Ten_kh
    FROM giangvien
    INNER JOIN khoahoc ON giangvien.ID_gv = khoahoc.ID_gv
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
function get_ttgiangvien($ID_gv)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
    // Câu truy vấn lấy tất cả giảng viên
    $sql = "SELECT giangvien.ID_gv, giangvien.Ten_gv, giangvien.Gioitinh, giangvien.SDT_gv, giangvien.Email_gv, giangvien.Birth_gv, khoahoc.Ten_kh
    FROM giangvien
    INNER JOIN khoahoc ON giangvien.ID_gv = khoahoc.ID_gv
    WHERE giangvien.ID_gv = '$ID_gv'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();

    // Trả kết quả về
    return $result;
}

// Hàm thêm sinh viên
function add_ttgiangvien($Ten_gv, $Gioitinh, $SDT_gv, $Email_gv, $Birth_gv)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    // Chống SQL Injection
    $Ten_gv = addslashes($Ten_gv);
    $Gioitinh = addslashes($Gioitinh);
    $SDT_gv = addslashes($SDT_gv);
    $Email_gv = addslashes($Email_gv);
    $Birth_gv = addslashes($Birth_gv);
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO giangvien(Ten_gv, Gioitinh, SDT_gv, Email_gv, Birth_gv) VALUES
            ('$Ten_gv','$Gioitinh','$SDT_gv','$Email_gv','$Birth_gv')
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Thực hiện câu truy vấn     
    return $result;
}

// Hàm sửa nhan vien 
function edit_ttgiangvien($ID_gv, $Ten_gv, $Gioitinh, $SDT_gv, $Email_gv, $Birth_gv)
{
    // Gọi tới biến toàn cục $conn
    global $conn;     
    // Hàm kết nối
    connect_db();     
    // Chống SQL Injection
    $Ten_gv = addslashes($Ten_gv);
    $Gioitinh = addslashes($Gioitinh);
    $SDT_gv = addslashes($SDT_gv);
    $Email_gv = addslashes($Email_gv);
    $Birth_gv = addslashes($Birth_gv);

    // Câu truy sửa
    $sql = "
    UPDATE giangvien SET
    Ten_gv = '$Ten_gv',
    Gioitinh = '$Gioitinh',
    SDT_gv = '$SDT_gv',
    Email_gv = '$Email_gv',
    Birth_gv = '$Birth_gv'
    WHERE ID_gv = $ID_gv
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Hàm xóa giang viên
function delete_ttgiangvien($ID_gv)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
    // Câu truy sửa
    $sql = "
        DELETE FROM giangvien
        WHERE ID_gv = $ID_gv
    ";
    // Thực hiện câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();    
    return $result;
}

// Hàm dem giang vien
function count_GV()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
    // Câu truy sửa
    $sql = "
    SELECT count(giangvien.ID_gv) as SL 
    FROM giangvien
    ";
    // Thực hiện câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();    
    return $result;
}