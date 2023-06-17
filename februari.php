<?php
include 'koneksi.php';
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
    <title>KALENDER 2023</title>
    <link rel="stylesheet" href="./DESIGN/DESIGN.CSS">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <div class="sidebar">
        <header>Welcome <?php echo $_COOKIE["nama"]; ?></header>
        <ul>
              <li><a href="event.php"><i class="fas"></i>Events</a></li>
              <li><a href="add.php"><i class="far"></i>Service</a></li>
              <li><a href="login.php"><i class="fas"></i>Log Out</a></li>
        </ul>
    </div>
    <header class="calender">
        <button id="left" class="left"> &#8249;</button>
        <span id="month" class="month">February</span>&emsp;<span id="year" class="year"> 2023</span>
        <button id="right" class="right"> &#8250;</button>
    </header> 
    <table>
        <thead> 
            <tr> 
                <td class="btn hari">Sun</td>
                <td class="btn hari">Mon</td>
                <td class="btn hari">Tue</td>
                <td class="btn hari">Wed</td>
                <td class="btn hari">Thu</td>
                <td class="btn hari">Fri</td>
                <td class="btn hari">Sat</td>
            </tr>
        </thead>
        <tbody id="calender">
        
        </tbody>
    </table>
    <footer>
        <p><b>FTI UKDW 2023 &#169;Copyright</b></p>
        <script src="./js/read.js"></script>
    </footer>
    
</body>
</html>