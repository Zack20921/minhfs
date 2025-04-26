<?php

require 'connect.php';

$id = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($id){
    del_employee($id);
}

header("location: tailieu.php");

?>