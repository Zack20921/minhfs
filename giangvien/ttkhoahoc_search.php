<?php

require 'libra/ketnoidb.php';
connect_db();


$a = $_POST['data'];
$idgv= $_POST['idgv'];

 $sql = "SELECT khoahoc.Ten_kh, khoahoc.Ngay_bat_dau, khoahoc.Ngay_ket_thuc, 
 khoahoc.Hoc_phi, khoahoc.Do_kho, khoahoc.Chi_tiet, khoahoc.Phan_loai, khoahoc.poster , 
 giangvien.Ten_gv, giangvien.Gioitinh, giangvien.SDT_gv, giangvien.Email_gv, giangvien.Birth_gv
 FROM khoahoc
 INNER JOIN giangvien ON giangvien.ID_gv = khoahoc.ID_gv
 WHERE giangvien.ID_gv= '$idgv' AND Ten_kh like '%$a%'";

try{

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
  
    // Execute the SQL statement
    $stmt->execute();
  
    // Get the number of rows
    $num = $stmt->rowCount();
  
    if($num > 0) {
        // Fetch all rows into an array
        while($item = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <tr id="tr1">    
        <td><?php echo $item['Ten_kh']; ?></td>
        <td><?php echo $item['Ngay_bat_dau']; ?></td>
        <td><?php echo $item['Ngay_ket_thuc']; ?></td>
        <td><?php echo $item['Hoc_phi']; ?></td>
        <td><?php echo $item['Do_kho']; ?></td>
        <td><?php echo $item['Chi_tiet']; ?></td>
        <td><?php echo $item['Phan_loai']; ?></td>
        <td ><?php echo $item['poster']; ?></td>
        <td><?php echo $item['Ten_gv']; ?></td>
        <td><?php echo $item['Gioitinh']; ?></td>
        <td><?php echo $item['SDT_gv']; ?></td>
        <td><?php echo $item['Email_gv']; ?></td>
        <td><?php echo $item['Birth_gv']; ?></td>
        </tr>     

        <?php
    }
};

}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();}
    disconnect_db();
?>
