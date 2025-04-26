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
function get_all_khoahoc()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    // Câu truy vấn lấy tất cả giảng viên
    $sql = "SELECT khoahoc.ID_kh, khoahoc.Ten_kh, khoahoc.Ngay_bat_dau, khoahoc.Ngay_ket_thuc, khoahoc.ID_gv, khoahoc.Hoc_phi, khoahoc.Do_kho, khoahoc.Chi_tiet, khoahoc.Phan_loai
    FROM khoahoc 
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
function get_khoahoc($ID_kh)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
    // Câu truy vấn lấy tất cả giảng viên
    $sql = "SELECT khoahoc.ID_kh, khoahoc.Ten_kh, khoahoc.Ngay_bat_dau, khoahoc.Ngay_ket_thuc, khoahoc.ID_gv, khoahoc.Hoc_phi, khoahoc.Do_kho, khoahoc.Chi_tiet, khoahoc.Phan_loai
    FROM khoahoc 
    WHERE ID_kh= $ID_kh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();

    // Trả kết quả về
    return $result;
}

// Hàm thêm sinh viên
function add_khoahoc($Ten_kh, $Ngay_bat_dau, $Ngay_ket_thuc, $ID_gv, $Hoc_phi, $Do_kho, $Chi_tiet, $Phan_loai)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    // Chống SQL Injection
    $Ten_kh = addslashes($Ten_kh);
    $Ngay_bat_dau = addslashes($Ngay_bat_dau);
    $Ngay_ket_thuc = addslashes($Ngay_ket_thuc);
    $ID_gv = addslashes($ID_gv);
    $Hoc_phi = addslashes($Hoc_phi);
    $Do_kho = addslashes($Do_kho);
    $Chi_tiet = addslashes($Chi_tiet);
    $Phan_loai = addslashes($Phan_loai);
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO khoahoc(Ten_kh, Ngay_bat_dau, Ngay_ket_thuc, ID_gv, Hoc_phi, Do_kho, Chi_tiet, Phan_loai) VALUES
            ('$Ten_kh','$Ngay_bat_dau','$Ngay_ket_thuc','$ID_gv','$Hoc_phi','$Do_kho','$Chi_tiet','$Phan_loai')
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Thực hiện câu truy vấn     
    return $result;
}

// Hàm sửa nhan vien 
function edit_khoahoc($ID_kh, $Ten_kh, $Ngay_bat_dau, $Ngay_ket_thuc, $ID_gv, $Hoc_phi, $Do_kho, $Chi_tiet, $Phan_loai)
{
    // Gọi tới biến toàn cục $conn
    global $conn;     
    // Hàm kết nối
    connect_db();     
    // Chống SQL Injection
    $Ten_kh = addslashes($Ten_kh);
    $Ngay_bat_dau = addslashes($Ngay_bat_dau);
    $Ngay_ket_thuc = addslashes($Ngay_ket_thuc);
    $ID_gv = addslashes($ID_gv);
    $Hoc_phi = addslashes($Hoc_phi);
    $Do_kho = addslashes($Do_kho);
    $Chi_tiet = addslashes($Chi_tiet);
    $Phan_loai = addslashes($Phan_loai);

    // Câu truy sửa
    $sql = "
    UPDATE khoahoc SET
    Ten_kh = '$Ten_kh',
    Ngay_bat_dau = '$Ngay_bat_dau',
    Ngay_ket_thuc = '$Ngay_ket_thuc',
    ID_gv = '$ID_gv',
    Hoc_phi = '$Hoc_phi',
    Do_kho = '$Do_kho',
    Chi_tiet = '$Chi_tiet',
    Phan_loai = '$Phan_loai'
    WHERE ID_kh = $ID_kh
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Hàm xóa sinh viên
function delete_khoahoc($ID_kh)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
    // Câu truy sửa
    $sql = "
        DELETE FROM khoahoc
        WHERE ID_kh = $ID_kh
    ";
    // Thực hiện câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();    
    return $result;
}

// dem so luong sinh vien dang ki khoa hoc
function count_SVDKI(){
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
    // Câu truy sửa
    $sql = "
    SELECT COUNT(dangki_khoahoc.ID_sv) as SL 
    FROM dangki_khoahoc
    ";
    // Thực hiện câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();    
    return $result;
}

// dem so luong khoa hoc
function count_Course(){
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
    // Câu truy sửa
    $sql = "
    SELECT COUNT(khoahoc.ID_kh) as SL 
    FROM khoahoc
    ";
    // Thực hiện câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();    
    return $result;
}

// dem so luong sinh vien 1 khoa hoc
function count_SVper_Course($idkh){
    // Gọi tới biến toàn cục $conn
    global $conn;
    // Hàm kết nối
    connect_db();
    // Câu truy sửa
    $sql = "
    SELECT COUNT(*) AS 'SL'
    FROM dangki_khoahoc
    WHERE dangki_khoahoc.ID_kh = '$idkh';
    ";
    // Thực hiện câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();    
    return $result;
}