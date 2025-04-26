<?php

global $conn;

function connect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    $servername = "localhost";
    $username = "root";
    $password = "";
     
    try {
        $conn = new PDO("mysql:host=$servername;dbname=testfl_emtydata", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
   
}
 
function disconnect_db(){
    global $conn;
     
    if ($conn){
        $conn = null;
    }
}

function get_in4()
{
    global $conn;
     
    connect_db();
     
    $sql = "SELECT ID_post ,Ten_post, Ngay_post, Noi_dung_post 
    FROM posts";
     
    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $stmt ->setFetchMode(PDO::FETCH_ASSOC);

    $result = $stmt->fetchAll();
     
    return $result;
}


function get_id($id)
{
    global $conn;
     
    connect_db();
     
    $sql = "select * 
    from posts 
    where ID_post = $id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
     
    $result = array();
     
    if ($stmt->rowCount() > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = $row;
    }
     
    return $result;
}

function add_bd($tentl, $linktl){
    global $conn;
     
    connect_db();

    $tentl = trim($tentl);
    $tentl = preg_replace('/\s+/', ' ', $tentl);
    $linktl = trim($linktl);
    $linktl = preg_replace('/\s+/', ' ', $linktl);

    $sql =" INSERT INTO posts(Ten_post, Ngay_post, Noi_dung_post) 
    VALUES('$tentl',CURDATE(),  '$linktl')";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $stmt ->setFetchMode(PDO::FETCH_ASSOC);

    $result = $stmt->fetchAll();
        return $result;
    }

    function edit_bd($id, $tent, $nd){
        global $conn;
        
        connect_db();

        $tent = addslashes($tent);
        $nd = addslashes($nd);

        //Loai bo khoang trang 
        $tent = trim($tent);
        $tent = preg_replace('/\s+/', ' ', $tent);
        $nd = trim($nd);
        $nd = preg_replace('/\s+/', ' ', $nd);

        $sql = " UPDATE posts 
        SET Ten_post = '$tent', Noi_dung_post = '$nd'
        WHERE ID_post = $id;";


        $stmt = $conn->prepare($sql);

        $stmt->execute();

        $stmt ->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetchAll();

        return $result;
    }

    function del_bl($id){
        global $conn;

        connect_db();

        $sql ="DELETE FROM posts WHERE ID_post = $id";

        $stmt = $conn->prepare($sql);

        $stmt->execute();

        $stmt ->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetchAll();

        return $result;
    }

    // dem bai dang
    function count_bd(){
        global $conn;

        connect_db();

        $sql ="SELECT COUNT(posts.ID_post) as SL FROM posts";

        $stmt = $conn->prepare($sql);

        $stmt->execute();

        $stmt ->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetch();

        return $result;
    }

    

  