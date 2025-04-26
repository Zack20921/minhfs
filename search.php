
<?php
require 'libra/ketnoidb.php';

connect_db();
// Lấy từ khóa từ request POST
$keyword = $_POST['keyword'];

// Tạo truy vấn SQL
$sql = "SELECT * FROM khoahoc WHERE Ten_kh LIKE '%$keyword%'";
$stmt = $conn->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<a href="In4Course.php?dd=' . $row['ID_kh'] . '"><p>' . $row['Ten_kh'] . '</p></a>';
    }
} else {
    echo "<p>Không tìm thấy kết quả.</p>";
}


// Đóng kết nối
disconnect_db();
?>

