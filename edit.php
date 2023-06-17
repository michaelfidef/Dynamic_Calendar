<?php 
    include "koneksi.php";
    if(strlen($_SESSION['email']) == 0){
        header("location: login.php");
     }
     
    if (isset($_GET)){
        echo $_GET['id'];
        $sqlgetdata = "SELECT *  from isi where id = ".$_GET['id'];
        $stmt = $conn->prepare($sqlgetdata);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            echo $row["id"];
            echo $row['tgl_mulai'];
            // Tampilkan data lainnya sesuai dengan kolom yang diinginkan
        } 
    }
?>










