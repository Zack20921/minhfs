
<?php 
    session_start();
            
            unset($_SESSION['login']);
            unset($_SESSION['role']);
            unset($_SESSION['time']);
            header('Location: index1.php');
        
?>