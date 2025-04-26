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
function get_all_tailieu()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    
    $sql = " SELECT *
    FROM `tailieu_khoahoc`,khoahoc 
    WHERE tailieu_khoahoc.ID_kh = khoahoc.ID_kh ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Trả kết quả về
    return $result;
    // var_dump($result);
}
// update----------------------------------------------------update
function get_tailieu_gv($idgv)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    
    $sql = " SELECT *
    FROM tailieu_khoahoc
    JOIN khoahoc ON tailieu_khoahoc.ID_kh= khoahoc.ID_kh
    JOIN giangvien ON khoahoc.ID_gv = giangvien.ID_gv
    WHERE giangvien.ID_gv = '$idgv';
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Trả kết quả về
    return $result;
    // var_dump($result);
}

//Hàm lấy giảng viên theo ID
function get_tailieu($ID_tl)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
   
    $sql = " SELECT tailieu_khoahoc.ID_tl, tailieu_khoahoc.Ten_tl, tailieu_khoahoc.ID_kh, tailieu_khoahoc.Noi_dung
    FROM tailieu_khoahoc
    WHERE  ID_tl= $ID_tl
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();

    // Trả kết quả về
    return $result;
}

// Hàm thêm sinh viên
function add_tailieu($Ten_tl, $ID_kh, $Noi_dung)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    // Chống SQL Injection
    $Ten_tl = addslashes($Ten_tl);
    $ID_kh = addslashes($ID_kh);
    $Noi_dung = addslashes($Noi_dung);
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO tailieu_khoahoc(Ten_tl, ID_kh, Noi_dung) VALUES
            ('$Ten_tl', '$ID_kh', '$Noi_dung')
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Thực hiện câu truy vấn     
    return $result;
}

function get_all_tailieu11()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    
    $sql = " SELECT tailieu_khoahoc.ID_tl, tailieu_khoahoc.Ten_tl, tailieu_khoahoc.ID_kh, tailieu_khoahoc.Noi_dung
    FROM tailieu_khoahoc
    WHERE 1";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Trả kết quả về
    return $result;
    // var_dump($result);
}

// Hàm sửa nhan vien 
function edit_tailieu($ID_tl, $Ten_tl, $ID_kh, $Noi_dung)
{
    // Gọi tới biến toàn cục $conn
    global $conn;     
    // Hàm kết nối
    connect_db();     
    // Chống SQL Injection
    $Ten_tl = addslashes($Ten_tl);
    $ID_kh = addslashes($ID_kh);
    $Noi_dung = addslashes($Noi_dung);
   
    // Câu truy sửa
    $sql = "
    UPDATE tailieu_khoahoc SET
    Ten_tl = '$Ten_tl',
    ID_kh = '$ID_kh',
    Noi_dung = '$Noi_dung'
    WHERE ID_tl = $ID_tl
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Hàm xóa sinh viên
function delete_tailieu($ID_tl)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
    // Câu truy sửa
    $sql = "
        DELETE FROM tailieu_khoahoc
        WHERE ID_tl = $ID_tl
    ";
    // Thực hiện câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();    
    return $result;
}