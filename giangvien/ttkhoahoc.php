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
function get_all_ttkhoahoc($ID_gv)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    // Câu truy vấn lấy tất cả giảng viên
    $sql = "SELECT khoahoc.Ten_kh, khoahoc.Ngay_bat_dau, khoahoc.Ngay_ket_thuc, 
    khoahoc.Hoc_phi, khoahoc.Do_kho, khoahoc.Chi_tiet, khoahoc.Phan_loai, khoahoc.poster , 
    giangvien.Ten_gv, giangvien.Gioitinh, giangvien.SDT_gv, giangvien.Email_gv, giangvien.Birth_gv
    FROM khoahoc
    INNER JOIN giangvien ON giangvien.ID_gv = khoahoc.ID_gv
    WHERE giangvien.ID_gv= '$ID_gv'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Trả kết quả về
    return $result;
    // var_dump($result);
}