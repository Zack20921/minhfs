<?php
 
 require 'connect2.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id){
    $data = get_id($id);
}

if(!empty($_POST['save'])){

    $data['rep']      = isset($_POST['Rep']) ? $_POST['Rep'] : '';
    $data['bl_id']      = isset($_POST['id']) ? $_POST['id'] : '';

    if(!empty($data['rep'])) {
    edit_cmt($data['bl_id'], $data['rep']);
    header("location: cmtseen.php");
    }else{
        echo '<script type="text/javascript">

            window.onload = function () { alert("Vui lòng nhập đầy đủ thông tin"); }

        </script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="editrep.css">
    <link rel="icon"    type="image/png" href="images/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<nav>
        <div class="wrapper">
          <div class="logo"><a href="#">ZACK</a></div>
          <input type="radio" name="slider" id="menu-btn">
          <input type="radio" name="slider" id="close-btn">
          <ul class="nav-links">
            <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
            <li><a href="../giangvien.php" ><strong>Home</strong></a></li>
            <li><a href="../tailieu.php"><strong>Tài liệu</strong></a></li>
            <li>
              <a href="#" class="desktop-item"><strong>Comments</strong></a>
              <input type="checkbox" id="showDrop">
              <label for="showDrop" class="mobile-item" style="font-family: 'Montserrat', sans-serif; font-weight: 900;">Comments</label>
              <ul class="drop-menu">
                <li><a href="cmtseen.php">Chưa rep</a></li>
                <li><a href="#">Đã rep</a></li>
              </ul>
            </li>
            <li><a href="../../hieu/logout.php"><strong>Sign out</strong></a></li>
          </ul>
          <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
      </nav>
            
        <!------------section2------->
        <section class="s2" id="s2">
        <div class="container">
            </div>
        <form method="post" action="editrep.php?id=<?php echo $data['ID_bl']; ?>">
            <table width="50%" >
                <tr>
                <td>
                <h1>Edit Employeee</h1></td>
                </tr>
                <tr>
                    <td>
                        <input placeholder="Rep" class="ip1" type="text" name="Rep" value="<?php echo $data['Rep'] ?>"/>

                    </td>

                </tr>
                
                <tr>
                    <td>
                    <input type="hidden" name="id" value="<?php echo $data['ID_bl']; ?>"/>
                        <input id="ip2" style="color: #fff;" type="submit" name="save" value="Save"/>
                    </td>
                </tr>
            </table>
        </form>
        </section>
    </body>
</html>