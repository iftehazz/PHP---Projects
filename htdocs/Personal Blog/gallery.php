<?php
    session_start();
    if(isset($_SESSION['uname'])){
        
    }
    else{
        echo "<script>location.href='home.php'</script>";
    }
    if($_SESSION["uname"]=='iftehaz'){
        $conn=new mysqli('localhost','iftehaz','1212','splashblog');
    }
    else{
        $conn=new mysqli('localhost','viewers','2121','splashblog');
    }
    $sql="select images,caption from gallery order by id";
    $rslt=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="gallery.css">
</head>
<body>
    <!-- <header>
        <a href="home.php">SPLASHBLOG</a>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="logout.php">Logout</a></li
    </ul>
    </header> -->
    <?php
        if($_SESSION["uname"]=='iftehaz'){
            echo "
            <header>
            <a href='home.php'>SPLASHBLOG</a>
            <ul>
            <li><a href='home.php'>Home</a></li>
            <li><a href='admin.php'>Admin</a></li>
            <li><a href='logout.php'>Logout</a></li
            </ul>
            </header>";
        }
        else{
            echo "
            <header>
            <a href='home.php'>SPLASHBLOG</a>
            <ul>
            <li><a href='home.php'>Home</a></li>
            <li><a href='logout.php'>Logout</a></li
            </ul>
            </header>";
        }
    ?>
    <main id="maincontainer">
        <?php
            if($rslt->num_rows <= 0){
                echo "<script>alert('No image')</script>";
            }
            else{
                while($row=$rslt->fetch_assoc()){
                    echo "
                    <div id='imgcontainer'>
                    <img src=".$row['images'].
                    "><p>".$row['caption']."</p>
                    </div>";
                }
            }
        ?>
    </main>
    <footer style="color:white;font-size:.8rem;text-align: center;width:100%;">©Iftehaz Newaz</footer>
</body>
</html>