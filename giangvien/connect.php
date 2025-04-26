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
 
function disconnect_db()
{
    global $conn;
     
    if ($conn){
        $conn = null;
    }
}

function get_in4()
{
    global $conn;
     
    connect_db();
     
    $sql = "SELECT tailieu_khoahoc.ID_tl ,tailieu_khoahoc.Ten_tl, khoahoc.Ten_kh, tailieu_khoahoc.Noi_dung
    FROM tailieu_khoahoc
    JOIN khoahoc
    ON tailieu_khoahoc.ID_kh = khoahoc.ID_kh";
     
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
    from tailieu_khoahoc 
    where ID_tl = $id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
     
    $result = array();
     
    if ($stmt->rowCount() > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = $row;
    }
     
    return $result;
}

function add_tl($tentl, $linktl, $course){
    global $conn;
     
    connect_db();

    $tentl = trim($tentl);
    $tentl = preg_replace('/\s+/', ' ', $tentl);
    $linktl = trim($linktl);
    $linktl = preg_replace('/\s+/', ' ', $linktl);

    $sql =" INSERT INTO tailieu_khoahoc(Ten_tl, ID_kh, Noi_dung) 
    VALUES('$tentl', (SELECT ID_kh FROM khoahoc WHERE Ten_kh = '$course' ),  '$linktl')";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $stmt ->setFetchMode(PDO::FETCH_ASSOC);

    $result = $stmt->fetchAll();
        return $result;
    }

    function edit_tl($id, $tentl, $course, $linktl){
        global $conn;
        
        connect_db();

        $tentl = addslashes($tentl);
        $course = addslashes($course);
        $linktl = addslashes($linktl);

        //Loai bo khoang trang 
        $tentl = trim($tentl);
        $tentl = preg_replace('/\s+/', ' ', $tentl);
        $linktl = trim($linktl);
        $linktl = preg_replace('/\s+/', ' ', $linktl);

        $sql = " UPDATE tailieu_khoahoc 
        SET Ten_tl = '$tentl', ID_kh = (SELECT ID_kh FROM khoahoc WHERE ID_kh = '$course' ), 
        Noi_dung = '$linktl'
        WHERE ID_tl = $id;";


        $stmt = $conn->prepare($sql);

        $stmt->execute();

        $stmt ->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetchAll();

        return $result;
    }

    function del_employee($id){
        global $conn;

        connect_db();

        $sql ="DELETE FROM tailieu_khoahoc WHERE ID_tl = $id";

        $stmt = $conn->prepare($sql);

        $stmt->execute();

        $stmt ->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetchAll();

        return $result;
    }

    // update----------------------------------------------------update
    function get_tailieu_gv($idgv)
    {
        // Gọi tới biến toàn cục $conn
        global $conn;
        
        // Hàm kết nối
        connect_db();
        
        $sql = " SELECT *
        FROM tailieu_khoahoc
        JOIN khoahoc ON tailieu_khoahoc.ID_kh= khoahoc.ID_kh
        JOIN giangvien ON khoahoc.ID_gv = giangvien.ID_gv
        WHERE giangvien.ID_gv = '$idgv';
        ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt ->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        // Trả kết quả về
        return $result;
        // var_dump($result);
    }

  