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
     
    $sql = "SELECT cmt_rep.ID_bl,cmt_rep.ID_gv,sinhvien.Ten_sv ,giangvien.Ten_gv, cmt_rep.Ngay_binh_luan, cmt_rep.Noi_dung_bl, cmt_rep.Rep, cmt_rep.Ngay_rep, khoahoc.Ten_kh
    FROM cmt_rep
    JOIN sinhvien 
    ON cmt_rep.ID_sv = sinhvien.ID_sv
    JOIN giangvien
    On cmt_rep.ID_gv = giangvien.ID_gv
    JOIN khoahoc
    ON cmt_rep.ID_kh = khoahoc.ID_kh";
     
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
    from cmt_rep 
    where ID_bl = $id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
     
    $result = array();
     
    if ($stmt->rowCount() > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = $row;
    }
     
    return $result;
}

    function edit_cmt($id, $rep){
        global $conn;
        
        connect_db();

        $rep = addslashes($rep);

        //Loai bo khoang trang 
        $rep = trim($rep);
        $rep = preg_replace('/\s+/', ' ', $rep);

        $sql = " UPDATE cmt_rep 
        SET Rep = '$rep', Ngay_rep = CURDATE()
        WHERE ID_bl = '$id'";

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

  function getiduser( $user){
    global $conn;
     
    connect_db();
  
  
    $sql =" SELECT ID_user
    FROM user
    WHERE Ten_tk = '$user' ";
  
    $stmt = $conn->prepare($sql);
  
    $stmt->execute();
  
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
  
    $result = $stmt->fetchAll();
    
    foreach ($result as $row) {
      $role_id = $row['ID_user'];
      
      }

    return $role_id;
    }