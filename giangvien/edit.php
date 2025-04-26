<?php
 
require 'connect.php';
session_start();

$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id){
    $data = get_id($id);
}

if(!empty($_POST['save'])){

    $data['tentl']      = isset($_POST['Tentl']) ? $_POST['Tentl'] : '';
    $data['linktl']      = isset($_POST['Linktl']) ? $_POST['Linktl'] : '';
    $data['course']       = isset($_POST['Course']) ? $_POST['Course'] : '';
    $data['tl_id']      = isset($_POST['id']) ? $_POST['id'] : '';

    if(!empty($data['tentl']) && !empty($data['linktl'])) {
    edit_tl($data['tl_id'], $data['tentl'], $data['course'], $data['linktl']);
    header("location: tailieu.php");
    }else{
        echo '<script type="text/javascript">

            window.onload = function () { alert("Vui lòng nhập đầy đủ thông tin"); }

        </script>';
    }
}

if (time() - (int)$_SESSION['time'] >= 1800)
        {
            unset($_SESSION['login']);
            header('Location: ../hieu/index1.php');
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="edit2.css">
    <link rel="icon"    type="image/png" href="images/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
        <section class="s1" id="s1">
                <a href="" class="logo">Zack</a>
                <input type="radio" name="slider" id="menu-btn">
                <input type="radio" name="slider" id="close-btn">
                <ul>
                    <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                    <li><a href="giangvien.php" >Home</a></li>
                    <li><a href="tailieu.php" id="b1">Tài liệu</a></li>
                    <li><a href="Comment/comment.php" >Comment</a></li>
                    <li><a href="#" >Sign out</a></li>
                </ul>
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
            </section>
            
        <!------------section2------->
        <section class="s2" id="s2">
        <form method="post" action="edit.php?id=<?php echo $data['ID_tl']; ?>">
            <table width="50%" >
                <tr>
                <td>
                <h1>Edit Employeee</h1></td>
                </tr>
                <tr>
                    <td>
                        <input placeholder="Frist name" class="ip1" type="text" name="Tentl" value="<?php echo $data['Ten_tl'] ?>"/>

                    </td>

                </tr>
                <tr>
                    <td>
                        <input placeholder="Last name" class="ip1" type="text" name="Linktl" value="<?php echo $data['Noi_dung']; ?>">
                    </td>
                </tr>
                <tr>
                    
                    <td>
                    <div class ="container2">
                        <p>Course </p>
                    <select name="Course">
                    <?php
                        connect_db();

                        $query = "SELECT * FROM khoahoc";
                        $result = $conn->query($query);

                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['ID_kh'] . '"';
                            if ($row['ID_kh'] == $data['ID_kh']) {
                                echo ' selected';
                            }
                            echo '>' . $row['Ten_kh'] . '</option>';
                        }
                        
                    ?>
                    </select>
                    </div>
                    </td>
                <tr>

                <tr>
                    <td>
                    <input type="hidden" name="id" value="<?php echo $data['ID_tl']; ?>"/>
                        <input id="ip2" style="color: #fff;" type="submit" name="save" value="Save"/>
                    </td>
                </tr>
            </table>
        </form>
        </section>
    </body>
</html>