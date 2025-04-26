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
function get_all_user()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    // Câu truy vấn lấy tất cả giảng viên
    $sql = "SELECT ID_user, user.Ten_tk, user.Mk, user.Vai_tro
    FROM user
    WHERE user.Vai_tro = 'sinh_vien' OR user.Vai_tro = 'giang_vien' ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Trả kết quả về
    return $result;
    // var_dump($result);
}

//Hàm lấy giảng viên theo ID
function get_user($ID_user)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
    // Câu truy vấn lấy tất cả giảng viên
    $sql = "SELECT ID_user, user.Ten_tk, user.Mk, user.Vai_tro
    FROM user
    WHERE ID_user= $ID_user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();

    // Trả kết quả về
    return $result;
}

// Hàm sửa nhan vien 
function edit_user($ID_user, $Ten_tk, $Mk)
{
    // Gọi tới biến toàn cục $conn
    global $conn;     
    // Hàm kết nối
    connect_db();     
    // Chống SQL Injection
    $Ten_tk = addslashes($Ten_tk);
    $Mk = addslashes($Mk);
  
    // Câu truy sửa
    $sql = "
    UPDATE user SET
    Ten_tk = '$Ten_tk',
    Mk = '$Mk'
    WHERE ID_user = $ID_user
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}
// Hàm xóa sinh viên
function delete_user($ID_user)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
    // Câu truy sửa
    $sql = "
        DELETE FROM user
        WHERE ID_user = $ID_user
    ";
    // Thực hiện câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();    
    return $result;
}

// Hàm thêm sinh viên
function add_user($Ten_tk, $Mk, $Vai_tro)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    // Chống SQL Injection
    $Ten_tk = addslashes($Ten_tk);
    $Mk = addslashes($Mk);
    $Vai_tro = addslashes($Vai_tro);
    
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO user(Ten_tk, Mk, Vai_tro) VALUES
            ('$Ten_tk', '$Mk', '$Vai_tro')
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Thực hiện câu truy vấn     
    return $result;
}