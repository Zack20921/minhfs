<?php
require 'connect.php';

session_start();

// kiem tra dang nhap
if(!isset($_SESSION["login"])){
    header("location: ../hieu/index1.php");
    exit;
  }

  // kiem tra vai tro
if ($_SESSION["role"]["vt"] != "giang_vien"){
    echo "<script type='text/javascript'>alert('Hay dang nhap bang tai khoan user');</script>";
    header("location: hieu/index1.php");
    exit;
  }

$userid = $_SESSION['user_id'];

$students = get_tailieu_gv($userid);

// $students = get_in4();

// Add Employee 
if(!empty($_POST['save'])) {
    $data['ten'] = isset($_POST['TL']) ? $_POST['TL'] : '';
    $data['linktl'] = isset($_POST['LinkTL']) ? $_POST['LinkTL'] : '';
    $data['course'] = isset($_POST['Course']) ? $_POST['Course'] : '';

    if(!empty($data['ten']) && !empty($data['linktl'])) {
    add_tl($data['ten'], $data['linktl'], $data['course']);
    header("location: tailieu.php");
    }
    
    if(empty($data['tentl']) || empty($data['linktl'])) {
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


    disconnect_db();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Courses List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="tailieu2.css">
        <link rel="icon"    type="image/png" href="images/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    </head>
    <body>
    <input class="oc" type="radio" name="slider" id="open-btn">
    <input class="oc" type="radio" name="slider" id="close">
    
    <section class="s1" id="s1">
        <a href="" class="logo">Zack</a>
        <input type="radio" name="slider" id="menu-btn">
        <input type="radio" name="slider" id="close-btn">
        
        <ul>
            <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
            <li><a href="giangvien.php" >Back</a></li>
            <li><a href = "#" onclick="document.getElementById('open-btn').checked = true;" >Thêm TL</a></li>
        </ul>
        <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </section>


        <!------------section2------->
        <section class="s2" id="s2">
            <div class="container">
            <h1>DANH SÁCH TÀI LIỆU</h1>
            </div>
            <table width="100%" border="1" >
                <tr style="    border-top: 0px solid #fff; border-bottom: 2px solid rgb(65, 64, 65)">
                    <td><b>Tên tài liệu</b></td>
                    <td><b>Link Tài Liệu</b></td>
                    <td><b>Khóa học</b></td>
                    <td><b>Chọn thao tác</b></td>
                </tr>
                <?php foreach ($students as $item){ ?>
                <tr id="tr1">
                    <td><?php echo $item['Ten_tl']; ?></td>
                    <td><?php echo $item['Noi_dung']; ?></td>
                    <td><?php echo $item['Ten_kh']; ?></td>
                    <td id="td1">
                        <form method="post" action="del.php">
                            <a style="margin-right:40px;margin-left:5px " onclick="window.location = 'edit.php?id=<?php echo $item['ID_tl']; ?>'" type="button" value="Sửa"><i class="fa-regular fa-pen-to-square"></i></a>
                            <input type="hidden" name="id" value="<?php echo $item['ID_tl']; ?>"/>
                            <button onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"><i class="fa-solid fa-trash"></i> </button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </section>
 
                <!------------section3------->

     <div class="s3" id="s3" >
        <form method="post" action="tailieu.php">
            <table width="50%" >
                <tr>
                <td style = "height: 90px;">
                <h1>Add Tài Liệu</h1></td>
                <label style="text-align:right;" for="close" class="bt close"><i class="fas fa-times"></i></label>
                </tr>
                <tr>
                    <td style="padding-top: 50px ;">
                        <input class="ip1" type="text" name="TL" placeholder="Tên tài liệu" value= "<?php echo !empty($data['ten']) ? $data['ten'] : ''?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="ip1" type="text" placeholder="Link tài liệu" name="LinkTL" value= "<?php echo !empty($data['linktl']) ? $data['linktl'] : ''?>">
                    </td>
                </tr>

                <tr>
                    <td style="height: 85px">
                        <div class ="container2">
                        <p >Khóa học</p>
                    <select name="Course">
                    <?php
                        connect_db();

                        $query = "SELECT * FROM khoahoc";
                        $result = $conn->query($query);

                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['Ten_kh'] . '">' . $row['Ten_kh'] . '</option>';
                        }
                    ?>  
                    </div>
                    </td>
                <tr>
                <tr>
                    <td>
                        <input id="ip2"  type="submit" name="save" value="SAVE"/>
                    </td>
                </tr>
            </table>
        </form>
        </div>

        <script src="list.js"></script>
    </body>
</html>
