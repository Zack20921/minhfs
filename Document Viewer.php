<?php
require 'tailieu.php';
session_start();

$userid = $_SESSION['user_id'];

$tailieu = get_all_tailieu();
// $tailieu = get_tailieu_gv($userid);
disconnect_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Viewer</title>
    <link rel="stylesheet" href="dcm.css">
    <link rel="icon"    type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    <section class="s1">
   
        <!-----Menu---->
 <div class="container1" id="s1">
 <div class="menu menuL">
    <a href="admin/admin.php" class="logo">HOME</a>
 </div>
 <h1>LECTURERS</h1>
 <div class="menu menuR">
    <a href="tailieu_list.php"> List tài liệu </a>
    <a href="tailieu_add.php">
    
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
        <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
      </svg>
    </a>
 </div>
</div>

    <!--------section4-------->  
    <section class=" am s4">
        <h1 class="showtotop " id="news">Document Viewer</h1>
        <div class=" showtotop delay-06 containerText">
            <div class=" showtotop delay-08 h1"><h1 >strength</h1></div>
            <div class="showtotop delay-09 h1"><h1 >Weakness</h1></div>
            <div class="showtotop delay-1 h1"><h1 >Opportunity</h1></div>
            <div  style="margin-right:80px;" class="showtotop delay-12 h1"><h1 >Threat</h1></div>
        </div>
        <div class="  containerImg">
            <?php foreach ($tailieu as $item) { ?>
            <a href="tailieu_list.php" class="showtotop  box">
                <div class="img"><img src="https://i.pinimg.com/736x/d6/ba/80/d6ba80e717e07f49de7eb2446c45d6ee.jpg" ></div>
                <thead>
                  <tr>
                    <h3><th scope="col"><?php echo $item['Ten_tl']; ?></th></h3><br>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                   <p><td class="dt"></td><br></p>

                   <!-- <p><th scope="col">Nội Dung</th> <br></p> -->

                   <!-- <p><td class="dt"><?php echo $item['Noi_dung']; ?></td><br></p> -->
                  </tr>
                  <?php } ?>         
                </tbody>
            </a>
        </div>
    </section>

<script src="hocsinh.js"></script>
</body>
</html>