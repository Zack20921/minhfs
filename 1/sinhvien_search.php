<?php

require 'libra/ketnoidb.php';
connect_db();


 $a = $_POST['data'];

 $sql = "SELECT * FROM sinhvien where Ten_sv like '%$a%'";

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
    <td class="dt"><?php echo $item['Ten_sv']; ?></td>
    <td class="dt"><?php echo $item['Gioitinh']; ?></td>
    <td class="dt"><?php echo $item['SDT_sv']; ?></td>
    <td class="dt"><?php echo $item['Email_sv']; ?></td>
    <td class="dt"><?php echo $item['Birth_sv']; ?></td>
    <td id="tr1">
        <form method="post" action="sinhvien_delete.php">
        <a style="margin-right:40px;margin-left:5px " onclick="window.location ='sinhvien_edit.php?id=<?php echo $item['ID_sv']; ?>'" 
        type="button" value="Sửa"><i class="fa-regular fa-pen-to-square"></i></a>
        <input type="hidden" name="id" value="<?php echo $item['ID_sv']; ?>" />
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
