<?php
include "koneksi.php";
session_start();
if(strlen($_SESSION['email']) == 0){
    header("location: login.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Selama Sebulan</title>
    <link rel="stylesheet" href="./DESIGN/ini.css">
</head>
<body>
    <div class="sidebar">
        <header>Kalender</header>
            <ul>
              <li><a href="februari.php"><i class="fas"></i>Home</a></li>
              <li><a href="add.php"><i class="far"></i>Service</a></li>
              <li><a href="login.php"><i class="fas"></i>Log Out</a></li>
            </ul>
    </div>   
    <div class="bulan">Event</div>
       
    <main>
        <table class="halo">
            <thead>
                <th>No</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Waktu Mulai</th>
                <th>Waktu Akhir</th>
                <th>Level Kepentingan</th>
                <th>Durasi</th>
                <th>Lokasi</th>
                <th>Gambar</th>
                <th>Edit</th>
                <th>Detail</th>
                <th>Delete</th> 
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM isi";
                $result = mysqli_query($conn, $sql);
                $counter = 1;
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>';
                        echo '<td>'.$counter++.'</td>';
                        echo '<td>'.$row["keterangan"].'</td>';
                        echo '<td>'.$row["tgl_mulai"].'</td>';
                        echo '<td>'.$row["tgl_selesai"].'</td>';
                        echo '<td>'.$row["wkt_mulai"].'</td>';
                        echo '<td>'.$row["wkt_selesai"].'</td>';
                        if ($row["level_Kepentingan"] == "Biasa"){
                            echo '<td> Biasa</td>';
                        } else if ($row["level_Kepentingan"] == "Peting"){
                            echo '<td> Penting</td>';
                        } else {
                            echo '<td> Sangat Penting</td>';
                        }
                        
                        
                        echo '<td>'.$row["durasi"].'</td>';
                        echo '<td>'.$row["lokasi"].'</td>';
                        echo '<td> <img src="'.$row["gambar_kegiatan"].'" width = "50px" height="auto"><img></td>';
                        $tgl_selesai = strtotime($row["tgl_selesai"]);
                        $current_date = strtotime(date("Y-m-d"));
                        
                        if ($tgl_selesai >= $current_date) {
                            echo '<td> <a href="./add.php?id='.$row["id"].'" onclick="return confirm(\'Yakin anda akan menngubah data?\') || (href=\'./event.php\')">edit</a></td>';
                        } else {
                            echo '<td> <a href="event.php" onclick="return confirm(\'Anda tidak dapat mengubah event yang sudah lewat!\')">edit</a></td>';
                        }
                        echo '<td> <a href="./detailEvent.php?id='.$row["id"].'">detail</a> </td>';
                        
                        if ($tgl_selesai >= $current_date) {
                            echo '<td> <a href="./delete.php?id='.$row["id"].'" onclick="return confirm(\'Yakin anda akan menghapus data?\') || (href=\'./event.php\')">delete</a> </td>';
                        } else {
                            echo '<td> <a href="event.php" onclick="return confirm(\'Anda tidak dapat menghapus event yang sudah lewat!\')">delete</a></td>';
                        }
                        echo '</tr>';
    }
}
                ?>
            </tbody>
        </table>
    </main>
    <footer class="footer"><p><b>FTI UKDW 2023 &#169;Copyright</b></p></footer>
    
</body>
</html>