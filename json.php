<?php
include "koneksi.php";
session_start();
if(strlen($_SESSION['email']) == 0){
    header("location: login.php");
 }  

    $sqlgetdata = "SELECT tgl_mulai,lokasi,id, keterangan  from isi ";
    $stmt = $conn->prepare($sqlgetdata);
    $stmt->execute();
    $result = $stmt->get_result();

    
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
    }

    header('Content-Type: application/json');
    echo json_encode($data);
    
    $conn->close();
?>
