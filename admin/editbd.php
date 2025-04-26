<?php
 
require 'connect.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id){
    $data = get_id($id);
}

if(!empty($_POST['save'])){

    $data['tentl']      = isset($_POST['Tentl']) ? $_POST['Tentl'] : '';
    $data['linktl']      = isset($_POST['Linktl']) ? $_POST['Linktl'] : '';
    $data['tl_id']      = isset($_POST['id']) ? $_POST['id'] : '';

    if(!empty($data['tentl']) && !empty($data['linktl'])) {
        edit_bd($data['tl_id'], $data['tentl'], $data['linktl']);
    header("location: baidang.php");
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
    <link rel="stylesheet" href="../themsua2.css">
    <link rel="icon"    type="image/png" href="images/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
        <!------------section2------->
        <section class="s2" id="s2">
        <div class="container">
            </div>
        <form method="post" action="editbd.php?id=<?php echo $data['ID_post']; ?>">
            <table width="50%" >
                <tr>
                <td><h1 style="margin-bottom:0px;">Edit Post</h1></td>
                </tr>

                <tr>
                <td><a href="baidang.php">Back</a></td>
                </tr>
                
                <tr>
                    <td>
                        <input placeholder="Frist name" class="ip3" type="text" name="Tentl" value="<?php echo $data['Ten_post'] ?>"/>

                    </td>

                </tr>
                <tr>
                    <td>
                        <input placeholder="Last name" class="ip3" type="text" name="Linktl" value="<?php echo $data['Noi_dung_post']; ?>">
                    </td>
                </tr>

                <tr>
                    <td>
                    <input type="hidden" name="id" value="<?php echo $data['ID_post']; ?>"/>
                        <input id="ip2" style="color: #fff;" type="submit" name="save" value="Save"/>
                    </td>
                </tr>
            </table>
        </form>
        </section>
    </body>
</html>