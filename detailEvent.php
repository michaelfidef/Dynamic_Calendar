<?php

include "koneksi.php";

session_start();
if(strlen($_SESSION['email']) == 0){
    header("location: login.php");
 }
 
 if($_GET){
    $id = $_GET['id'];
    $sql = "SELECT * FROM isi WHERE id='".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        $oldid = $row["id"];
        $oldket = $row["keterangan"];
        $oldtgl_mulai = $row["tgl_mulai"];
        $oldtgl_selesai = $row["tgl_selesai"];
        $oldwkt_mulai = $row["wkt_mulai"];
        $oldwkt_selesai = $row["wkt_selesai"];
        $oldlevel_Kepentingan = $row["level_Kepentingan"];
        $olddurasi = $row["durasi"];
        $oldlokasi = $row["lokasi"];
        $oldgambar_kegiatan = $row["gambar_kegiatan"];
    }
    else {
        echo "Data yang hendak diedit tidak ada.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="./DESIGN/isi.css">
    <script src="script.js"></script>

</head>
    <div>
        <header class="head"><h1>CALENDER</h1></header>      
        <h1 class="button"><a href="februari.php"><img src="https://cdn-icons-png.flaticon.com/512/60/60817.png" alt="home" width="50"></a></h1>  
    </div>
<body>
    <form action="add.php" method= post>
        <div>
            <h3>Rincian Kegiatan :</h3>
            <table id = "detail">
                <tr>
                    <td>Nama Kegiatan :</td>
                    <td><?php  echo $oldket?></td>
                    <td rowspan=7; colspan="2"> <img src="<?php  echo $oldgambar_kegiatan?>" width=300px height=500px></td>
                </tr>
                <tr>
                    <td>Tanggal Mulai :</td>
                    <td><?php  echo $oldtgl_mulai?></td>
                </tr>
                <tr>
                    <td>Tanggal Selesai :</td>
                    <td><?php  echo $oldtgl_selesai?></td>
                </tr>
                <tr>
                    <td>Level Kepentingan :</td>
                    <td><?php  echo $oldlevel_Kepentingan?></td>
                </tr>
                <tr>
                    <td>Waktu Mulai :</td>
                    <td><?php  echo $oldwkt_mulai?></td>
                </tr>
                <tr>
                    <td>Waktu selesai :</td>
                    <td><?php  echo $oldwkt_selesai?></td>
                </tr>
                <tr>
                    <td>Durasi :</td>
                    <td><?php  echo $olddurasi?></td>
                </tr>
                <tr>
                    <td>Lokasi :</td>
                    <td><?php  echo $oldlokasi?></td>
                    <?php 
                    $tgl_selesai = strtotime($row["tgl_selesai"]);
                    $current_date = strtotime(date("Y-m-d"));
                    
                    if ($tgl_selesai >= $current_date) {
                        echo '<td> <a href="./add.php?id='.$oldid.'" onclick="return confirm(\'Yakin anda akan mengubah data?\') || (href=\'./event.php\')">edit</a></td>';
                    } else {
                        echo '<td> <a href="event.php" onclick="return confirm(\'Anda tidak dapat mengubah event yang sudah lewat!\')">edit</a></td>';
                    }

                    if ($tgl_selesai >= $current_date) {
                        echo '<td> <a href="./delete.php?id='.$oldid.'" onclick="return confirm(\'Yakin anda akan menghapus data?\')|| (href=\'./event.php\')">delete</a> </td>';
                    } else {
                        echo '<td> <a href="event.php" onclick="return confirm(\'Anda tidak dapat menghapus event yang sudah lewat!\')">delete</a></td>';
                    }
                    ?>
                </tr>
            </table>
        </div>
    </form>
</body>
<footer>
    <p><b>By: Kezia Trifena - Michael Fidef - Michael Goland</b></p>
</footer>
</html>