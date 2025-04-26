<?php

require 'libra/ketnoidb.php';
connect_db();

// Kiểm tra kết nối


 $a = $_POST['data'];

 $sql = "SELECT ID_post ,Ten_post, Ngay_post, Noi_dung_post 
 FROM posts
 where Ten_post like '%$a%'";
 
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
    <td><?php echo $item['Ten_post']; ?></td>
    <td><?php echo $item['Ngay_post']; ?></td>
    <td><?php echo $item['Noi_dung_post']; ?></td>
    <td id="td1">
        <form method="post" action="del.php">
            <a style="margin-right:40px;margin-left:5px " onclick="window.location = 'editbd.php?id=<?php echo $item['ID_post']; ?>'" type="button" value="Sửa"><i class="fa-regular fa-pen-to-square"></i></a>
            <input type="hidden" name="id" value="<?php echo $item['ID_post']; ?>"/>
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
