<?php
include "koneksi.php";
session_start();
if(strlen($_SESSION['email']) == 0){
    header("location: login.php");
}

$id = 0;
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


</head>
    <div>
        <header class="head"><h1>CALENDER</h1></header>      
        <h1 class="button"><a href="februari.php"><img src="https://cdn-icons-png.flaticon.com/512/60/60817.png" alt="home" width="50"></a></h1>  
    </div>
<body>
    <form action="proses.php" method= "post" enctype="multipart/form-data">
        <div>
            <h3>To do List: </h3>
            <table>
                <tr>
                    <td><label for="keterangan">Nama Agenda </label></td>
                    <td>: <input type="text" name="keterangan" id="keterangan" value="<?php if($id != 0){echo $oldket;}?>"></td>
                </tr>
                <tr>
                    <td><label for="tglMulaiID">Tanggal Mulai </label></td>
                    <td>: <input type="date" name="tgl_mulai" id="tglMulaiID" value="<?php if($id != 0){echo $oldtgl_mulai;}?>"></td>
                    <td><input type="time" name="wkt_mulai" id="wktMulaiID" value="<?php if($id != 0){echo $oldwkt_mulai;}?>"></td>
                </tr>
                <tr>
                    <td><label for="tglSlsID">Tanggal Selesai </label></td>
                    <td>: <input type="date" name="tgl_selesai" id="tglSlsID" value="<?php if($id != 0){echo $oldtgl_selesai;}?>"></td>
                    <td><input type="time" name="wkt_selesai" id="wktSlsID" value="<?php if($id != 0){echo $oldwkt_selesai;}?>"></td>
                </tr>
                <tr>
                    <td><label for="levelID">Level Kepentingan </label> </td>
                    <td>: <select name="level_Kepentingan" id="levelID">
                        <option value="Biasa" <?php if($id != 0 &&  $oldlevel_Kepentingan == "Biasa"){echo "selected" ;}?>>Biasa </option>
                        <option value="Penting" <?php if($id != 0 &&  $oldlevel_Kepentingan == "Penting"){echo "selected" ;}?>>Penting</option>
                        <option value="Sangat Penting" <?php if($id != 0 &&  $oldlevel_Kepentingan == "Sangat Penting"){echo "selected" ;}?>>Sangat Penting</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="lokasiID">Lokasi </label></td>
                    <td colspan="2"><textarea name="lokasi" id="lokasiID" cols="25" rows="5"> <?php if($id != 0){echo $oldlokasi ;}?></textarea></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for="gambarID">Gambar Kegiatan </label></td>
                    <td colspan="2">: <input type="file" name="gambar_kegiatan" id="gambarID" <?php if($id != 0){echo $oldgambar_kegiatan ;}?>></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Simpan">
                        <input type="reset" value="Reset"></td>
                </tr>
                <input type="hidden" name="id" value="<?php if($id != 0){echo $id;}?>" />
            </table>
        </div>
    </form>
</body>
<footer>
    <p><b>By: Kezia Trifena - Michael Fidef - Michael Goland</b></p>
</footer>
</html>