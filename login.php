<?php 
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kalender 2023</title>
        <link rel="stylesheet" href="./DESIGN/login.css">
    </head>
    <body>
        <header class="calender"> <h1> WELCOME TO 2024 </h1> </header>
        <main>
            <div class="login-box">
                <h2>Login Here</h2>
                <span class="warning" hidden>FOR ERROR</span>
                <form method="post"  onsubmit="return validasi()" action = "login.php" >
                    <label>Email</label>
                    <input type="text" placeholder="Enter Email" name="email" id="email">
                    <label>Password</label>
                    <input type="password" placeholder="Enter Password" name="password" id="password">
                    <input type="submit" name="submit" value="Login" id="submit">
                    <a href="#">Forgot Password</a>
                    
                </form>
            </div>     
        </main>
        <footer>
            <p><b>FTI UKDW 2023 &#169;Copyright</b></p>
            <script src="./js/login.js"></script>
        </footer>
    </body>
</html>
<?php
include 'koneksi.php';
    if ($_POST) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $login = mysqli_query($conn, " SELECT * FROM users_login WHERE email = '$email' AND password = '$password'");
        $cek = mysqli_num_rows($login);

        if ($cek > 0) {
            session_start();
            $data = mysqli_fetch_array($login);
            $namahasil = $row["nama"];
            setcookie("nama", $data["nama"], time()+60*10);
            $_SESSION["email"] = $email;
            header("location: februari.php");
            };
        }
mysqli_close($conn);
?>