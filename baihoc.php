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
        $conn = new PDO("mysql:host=$servername;dbname=testfl", $username, $password);
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
function get_all_baihoc()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    // Câu truy vấn lấy tất cả giảng viên
    $sql = "SELECT baihoc.ID_bh, baihoc.ID_kh, baihoc.Ten_bh, baihoc.Noi_dung_bh, baihoc.So_luong_cmt, baihoc.motaBH  
    FROM baihoc 
    WHERE 1";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Trả kết quả về
    return $result;
    // var_dump($result);
}

// //Hàm lấy giảng viên theo ID
function get_baihoc($ID_bh)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
    // Câu truy vấn lấy tất cả giảng viên
    $sql = "SELECT baihoc.ID_bh, baihoc.ID_kh, baihoc.Ten_bh, baihoc.Noi_dung_bh, baihoc.So_luong_cmt, baihoc.motaBH  
    FROM baihoc 
    WHERE ID_bh= $ID_bh
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();

    // Trả kết quả về
    return $result;
}

// Hàm thêm sinh viên
function add_baihoc($ID_kh, $Ten_bh, $Noi_dung_bh, $So_luong_cmt, $motaBH)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    // Chống SQL Injection
    $ID_kh = addslashes($ID_kh);
    $Ten_bh = addslashes($Ten_bh);
    $Noi_dung_bh = addslashes($Noi_dung_bh);
    $luong_cmt = addslashes($luong_cmt);
    $motaBH = addslashes($motaBH);
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO baihoc(ID_kh, Ten_bh, Noi_dung_bh, So_luong_cmt, motaBH) VALUES
            ('$ID_kh','$Ten_bh','$Noi_dung_bh','$So_luong_cmt','$motaBH')
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Thực hiện câu truy vấn     
    return $result;
}

// Hàm sửa nhan vien 
function edit_khoahoc($ID_bh, $ID_kh, $Ten_bh, $Noi_dung_bh, $So_luong_cmt, $motaBH)
{
    // Gọi tới biến toàn cục $conn
    global $conn;     
    // Hàm kết nối
    connect_db();     
    // Chống SQL Injection
    $ID_kh = addslashes($ID_kh);
    $Ten_bh = addslashes($Ten_bh);
    $Noi_dung_bh = addslashes($Noi_dung_bh);
    $luong_cmt = addslashes($luong_cmt);
    $motaBH = addslashes($motaBH);

    // Câu truy sửa
    $sql = "
    UPDATE baihoc SET
    ID_kh = '$ID_kh',
    Ten_bh = '$Ten_bh',
    Noi_dung_bh = '$Noi_dung_bh',
    luong_cmt = '$luong_cmt',
    motaBH = '$motaBH'
    WHERE ID_bh = $ID_bh
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Hàm xóa sinh viên
function delete_baihoc($ID_bh)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
    // Câu truy sửa
    $sql = "
        DELETE FROM baihoc
        WHERE ID_bh = $ID_bh
    ";
    // Thực hiện câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();    
    return $result;
}