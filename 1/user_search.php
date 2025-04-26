<?php

require 'libra/ketnoidb.php';
connect_db();

// Kiểm tra kết nối

 $a = $_POST['data'];

 $sql = "SELECT ID_user, user.Ten_tk, user.Mk, user.Vai_tro
 FROM user
 WHERE Vai_tro != 'admin' And Ten_tk like '%$a%'";
 
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
    <td class="dt"><?php echo $item['Ten_tk']; ?></td>
    <td class="dt"><?php echo $item['Mk']; ?></td>
    <td class="dt"><?php echo $item['Vai_tro']; ?></td>
    <td id="tr1">
        <form method="post" action="user_delete.php">
            <a style="margin-right:40px;margin-left:5px " onclick="window.location ='user_edit.php?id=<?php echo $item['ID_user']; ?>'" 
            type="button" value="Sửa"><i class="fa-regular fa-pen-to-square"></i></a>
            <!-- <input type="hidden" name="id" value="<?php echo $item['ID_user']; ?>" />
            <button onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"><i class="fa-solid fa-trash"></i> </button> -->
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
