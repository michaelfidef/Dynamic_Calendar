<?php
include "koneksi.php";
session_start();  
if(strlen($_SESSION['email']) == 0){
    header("location: login.php");
}
if ($_POST){
    $id_event = $_POST["id"];
    if($id_event == null){
        if(isset($_POST["keterangan"])){
            $keterangan = $_POST['keterangan'];
            $tglMulai = $_POST['tgl_mulai'];
            $wktMulai = $_POST['wkt_mulai'];
            $tglSelesai = $_POST['tgl_selesai'];
            $wktSelesai = $_POST['wkt_selesai'];
            $levelKepentingan = $_POST['level_Kepentingan'];
            $lokasi = $_POST['lokasi'];
    
            $uploadGambar = "images/" .$_FILES['gambar_kegiatan']['name'];
            move_uploaded_file($_FILES['gambar_kegiatan']['tmp_name'], $uploadGambar);
    
            $waktu_1 = strtotime($wktMulai);
            $waktu_2 = strtotime($wktSelesai);
    
            $durasi = ($waktu_2-$waktu_1)-1;
            $real_durasi = date("H", $durasi);
    
            $sql = "INSERT INTO isi (keterangan, tgl_mulai, wkt_mulai, tgl_selesai, wkt_selesai, level_Kepentingan, durasi, lokasi, gambar_kegiatan) 
                    VALUES ('$keterangan','$tglMulai', '$wktMulai', '$tglSelesai', '$wktSelesai', '$levelKepentingan', '$real_durasi', '$lokasi', '$uploadGambar')";
    
            $uhuy = mysqli_query($conn, $sql);
            if($uhuy){
                echo "berhasil";
                header("location: februari.php");
            } else {
                echo "error message: " . mysqli_error($conn);
            }
        }

    }else if($id_event != 0){
            $keterangan = $_POST['keterangan'];
            $tglMulai = $_POST['tgl_mulai'];
            $wktMulai = $_POST['wkt_mulai'];
            $tglSelesai = $_POST['tgl_selesai'];
            $wktSelesai = $_POST['wkt_selesai'];
            $levelKepentingan = $_POST['level_Kepentingan'];
            $lokasi = $_POST['lokasi'];
            if(isset($_FILES)){

                $uploadGambar = "images/" .$_FILES['gambar_kegiatan']['name'];
                move_uploaded_file($_FILES['gambar_kegiatan']['tmp_name'], $uploadGambar);
        
                $waktu_1 = strtotime($wktMulai);
                $waktu_2 = strtotime($wktSelesai);
        
                $durasi = ($waktu_2-$waktu_1)-1;
                $real_durasi = date("H", $durasi);
        
                $sql = "UPDATE isi set keterangan = \"$keterangan\" , tgl_mulai = \"$tglMulai\" , tgl_selesai = \"$tglSelesai\", wkt_mulai = \"$wktMulai\" , wkt_selesai = \"$wktSelesai\", level_Kepentingan = \"$levelKepentingan\" , lokasi = \"$lokasi\" where id = \"$id_event\"";
            
                $uhuy = mysqli_query($conn, $sql);
                if($uhuy){
                    echo "berhasil";
                    header("location: februari.php");
                } else {
                    echo "error message: " . mysqli_error($conn);
                }   

            } else {
                $uploadGambar = "images/" .$_FILES['gambar_kegiatan']['name'];
                move_uploaded_file($_FILES['gambar_kegiatan']['tmp_name'], $uploadGambar);
        
                $waktu_1 = strtotime($wktMulai);
                $waktu_2 = strtotime($wktSelesai);
        
                $durasi = ($waktu_2-$waktu_1)-1;
                $real_durasi = date("H", $durasi);
        
                $sql = "UPDATE isi set keterangan = \"$keterangan\" , tgl_mulai = \"$tglMulai\" , tgl_selesai = \"$tglSelesai\", wkt_mulai = \"$wktMulai\" , wkt_selesai = \"$wktSelesai\", level_Kepentingan = \"$levelKepentingan\" , lokasi = \"$lokasi\" , gambar_kegiatan = \"null\" where id = \"$id_event\"";
            
                $uhuy = mysqli_query($conn, $sql);
                if($uhuy){
                    echo "berhasil";
                    header("location: februari.php");
                } else {
                    echo "error message: " . mysqli_error($conn);
                }   
            }
        }
    }
?>