<?php

require 'libra/ketnoidb.php';
connect_db();


// Kiểm tra kết nối


 $a = $_POST['data'];

 $sql = "SELECT giangvien.ID_gv, giangvien.Ten_gv, giangvien.Gioitinh, giangvien.SDT_gv, giangvien.Email_gv, giangvien.Birth_gv, khoahoc.Ten_kh
 FROM giangvien
 INNER JOIN khoahoc ON giangvien.ID_gv = khoahoc.ID_gv
 where Ten_gv like '%$a%'";
 
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
<tr id="tr1" >    
    <td class="dt"><?php echo $item['Ten_gv']; ?></td>
    <td class="dt"><?php echo $item['Gioitinh']; ?></td>
    <td class="dt"><?php echo $item['SDT_gv']; ?></td> 
    <td class="dt"><?php echo $item['Email_gv']; ?></td>    
    <td class="dt"><?php echo $item['Birth_gv']; ?></td>    
    <td class="dt"><?php echo $item['Ten_kh']; ?></td>    
    <td id="tr1">
        <form method="post" action="ttgiangvien_delete.php">
            <a style="margin-right:40px;margin-left:5px " onclick="window.location ='ttgiangvien_edit.php?id=<?php echo $item['ID_gv']; ?>'" 
            type="button" value="Sửa"><i class="fa-regular fa-pen-to-square"></i></a>
            <input type="hidden" name="id" value="<?php echo $item['ID_gv']; ?>" />
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
