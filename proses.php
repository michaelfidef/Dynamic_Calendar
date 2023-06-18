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

                $datetimeStart = $tglMulai . ' ' . $wktMulai;
                $datetimeEnd = $tglSelesai . ' ' . $wktSelesai;
                $duration = round((strtotime($datetimeEnd) - strtotime($datetimeStart)) / (60 * 60), 2);

                // Menghitung jam dan menit
                $hours = floor($duration);
                $minutes = round(($duration - $hours) * 60);

                // Format durasi dalam format angka
                $hoursPadded = str_pad($hours, 2, "0", STR_PAD_LEFT);
                $minutesPadded = str_pad($minutes, 2, "0", STR_PAD_LEFT);
                $durationFormatted = $hoursPadded . $minutesPadded;
                            
        
                $sql = "INSERT INTO isi (keterangan, tgl_mulai, wkt_mulai, tgl_selesai, wkt_selesai, level_Kepentingan, durasi, lokasi, gambar_kegiatan) 
                        VALUES ('$keterangan','$tglMulai', '$wktMulai', '$tglSelesai', '$wktSelesai', '$levelKepentingan', '$durationFormatted', '$lokasi', '$uploadGambar')";
        
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

                $datetimeStart = $tglMulai . ' ' . $wktMulai;
                $datetimeEnd = $tglSelesai . ' ' . $wktSelesai;
                $duration = round((strtotime($datetimeEnd) - strtotime($datetimeStart)) / (60 * 60), 2);

                // Menghitung jam dan menit
                $hours = floor($duration);
                $minutes = round(($duration - $hours) * 60);

                // Format durasi dalam format angka
                $hoursPadded = str_pad($hours, 2, "0", STR_PAD_LEFT);
                $minutesPadded = str_pad($minutes, 2, "0", STR_PAD_LEFT);
                $durationFormatted = $hoursPadded . $minutesPadded;
        
                $sql = "UPDATE isi set keterangan = \"$keterangan\" , tgl_mulai = \"$tglMulai\" , tgl_selesai = \"$tglSelesai\", wkt_mulai = \"$wktMulai\" , wkt_selesai = \"$wktSelesai\", level_Kepentingan = \"$levelKepentingan\" , durasi = \"$durationFormatted\", gambar_kegiatan = \"$uploadGambar\",lokasi = \"$lokasi\" where id = \"$id_event\"";
            
                $uhuy = mysqli_query($conn, $sql);
                if($uhuy){
                    echo "<script> alert('Data berhasil diedit');</script>";
                    header("location: februari.php");
                } else {
                    echo "<script> alert('Data Gagal diedit!');</script>";
                    echo "error message: " . mysqli_error($conn);
                }   

            } else {
                $uploadGambar = "images/" .$_FILES['gambar_kegiatan']['name'];
                move_uploaded_file($_FILES['gambar_kegiatan']['tmp_name'], $uploadGambar);

                $datetimeStart = $tglMulai . ' ' . $wktMulai;
                $datetimeEnd = $tglSelesai . ' ' . $wktSelesai;
                $duration = round((strtotime($datetimeEnd) - strtotime($datetimeStart)) / (60 * 60), 2);

                // Menghitung jam dan menit
                $hours = floor($duration);
                $minutes = round(($duration - $hours) * 60);

                // Format durasi dalam format angka
                $hoursPadded = str_pad($hours, 2, "0", STR_PAD_LEFT);
                $minutesPadded = str_pad($minutes, 2, "0", STR_PAD_LEFT);
                $durationFormatted = $hoursPadded . $minutesPadded;
        
                $sql = "UPDATE isi set keterangan = \"$keterangan\" , tgl_mulai = \"$tglMulai\" , tgl_selesai = \"$tglSelesai\", wkt_mulai = \"$wktMulai\" , wkt_selesai = \"$wktSelesai\", level_Kepentingan = \"$levelKepentingan\" ,durasi = \"$durationFormatted\", lokasi = \"$lokasi\" , gambar_kegiatan = \"null\" where id = \"$id_event\"";
            
                $uhuy = mysqli_query($conn, $sql);
                if($uhuy){
                    echo "<script> alert('Data berhasil diedit');</script>";
                    header("location: februari.php");
                } else {
                    echo "<script> alert('Data Gagal diedit!');</script>";
                    echo "error message: " . mysqli_error($conn);
                }   
            } 
        }
    }
    
?>
