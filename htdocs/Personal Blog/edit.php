<?php
session_start();
if(!isset($_SESSION['uname'])){
    echo "<script>location.href='login.php'</script>";
}
$conn=new mysqli('localhost','root','','splashblog');
$sql="select * from gallery order by id";
$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="edit.css">
    <script src='edit.js'></script>
</head>
<body>
    <header>
        <a href="home.php">SPLASHBLOG</a>
    <ul>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="admin.php">Admin</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    </header>

    <main id="maincontainer">
    <?php
        while($row=$result->fetch_assoc()){
                echo "<div id='imgeditor'>
                        <img id='picno' src=".$row['images'].">
                        <p id='caption'>".$row['caption']."</p>
                        <button class='button btn1' onclick='updatebtn(".$row['id'].")'>Update</button>
                        <button class='button btn2' onclick='deletebtn(".$row['id'].")'>Delete</button>
                      </div>";
        }
    ?>
    </main>
    <footer style="color:white;font-size:.8rem;text-align: center;width:100%">©Iftehaz Newaz</footer>
</body>
</html>