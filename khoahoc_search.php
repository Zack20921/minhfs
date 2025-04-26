<?php


require 'libra/ketnoidb.php';
connect_db();


 $a = $_POST['data'];
 $sl = $_POST['sl'];

 $sql = "SELECT * FROM khoahoc where Ten_kh like '%$a%'";


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
    <td><?php echo $row['Ten_kh']; ?></td>
    <td ><?php echo $row['Ngay_bat_dau']; ?></td>
    <td ><?php echo $row['Ngay_ket_thuc']; ?></td>
    <td ><?php echo $row['ID_gv']; ?></td> 
    <td ><?php echo $row['Hoc_phi']; ?></td>    
    <td><?php echo $row['Do_kho']; ?></td>    
    <td><?php echo $row['Chi_tiet']; ?></td>    
    <td><?php echo  $sl; ?></td>    
    <td><?php echo $row['Phan_loai']; ?></td>    
    <td class=" tr2" id="tr1">
        <form method="post" action="khoahoc_delete.php">
            <a style="margin-right:40px;margin-left:5px " onclick="window.location ='khoahoc_edit.php?id=<?php echo $row['ID_kh']; ?>'" 
            type="button" value="Sửa"><i class="fa-regular fa-pen-to-square"></i></a>
            <input type="hidden" name="id" value="<?php echo $row['ID_kh']; ?>" />
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
