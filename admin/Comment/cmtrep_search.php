<?php

require 'libra/ketnoidb.php';
connect_db();


 $a = $_POST['data'];
 $iduser = $_POST['iduser'];
 
 $sql = "SELECT cmt_rep.ID_bl,cmt_rep.ID_gv,sinhvien.Ten_sv ,giangvien.Ten_gv, cmt_rep.Ngay_binh_luan, cmt_rep.Noi_dung_bl, cmt_rep.Rep, cmt_rep.Ngay_rep, khoahoc.Ten_kh
 FROM cmt_rep
 JOIN sinhvien 
 ON cmt_rep.ID_sv = sinhvien.ID_sv
 JOIN giangvien
 On cmt_rep.ID_gv = giangvien.ID_gv
 JOIN khoahoc
 ON cmt_rep.ID_kh = khoahoc.ID_kh
 where cmt_rep.ID_gv like '$iduser' And Ten_sv like '%$a%'";
 
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
    <td><?php echo $item['Ten_sv']; ?></td>
    <td><?php echo $item['Ten_gv']; ?></td>
    <td><?php echo $item['Ngay_binh_luan']; ?></td>
    <td><?php echo $item['Noi_dung_bl']; ?></td>
    <td><?php echo $item['Rep']; ?></td>
    <td><?php echo $item['Ngay_rep']; ?></td>
    <td><?php echo $item['Ten_kh']; ?></td>
    <td id="td1">
        <form method="post" action="del.php">
            <a style="margin-right:40px;margin-left:5px " onclick="window.location = 'editrep2.php?id=<?php echo $item['ID_bl']; ?>'" type="button" value="Sửa"><i class="fa-regular fa-pen-to-square"></i></a>
            <input type="hidden" name="id" value="<?php echo $item['ID_bl']; ?>"/>
            <button onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"><i class="fa-solid fa-trash"></i> </button>
        </form>
    </td>
</tr>

<?php
    }
};
}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();}
    disconnect_db();

?>
