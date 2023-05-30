<?php
session_start();
if(!isset($_SESSION['uname'])){
    echo "<script>location.href='login.php'</script>";
}
$piccaption="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    function getValue($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $conn=new mysqli('localhost','root','','splashblog');
    $piccaption=getValue($_POST['caption']);
    $imgname=$_FILES['img']['name'];
    $tmpname=$_FILES['img']['tmp_name'];
    $imgex=strtolower(pathinfo($imgname,PATHINFO_EXTENSION));
    $newname=uniqid("IMG-",true).".".$imgex;
    $newloc="image/upload/".$newname;
    move_uploaded_file($tmpname,$newloc);
    $targetid=getValue($_POST['idvalue']);
    $sql="select * from gallery where id = '$targetid'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    unlink($row['images']);
    $sql="update gallery set images='$newloc', caption='$piccaption' where id='$targetid'";
    if($conn->query($sql)){
        echo "<script>alert('Image Updated')</script>";
        echo "<script>location.href='gallery.php'</script>";
    }
    else{
        echo "<script>alert('Image failed to Update')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
    <link rel='stylesheet' href='update.css'>
</head>
<body>
<header>
        <a href="home.php">SPLASHBLOG</a>
    <ul>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    </header>
    <center>
    <main id="piccontainer">
        <form enctype="multipart/form-data" id="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type='file' name='img' required><br>
        <input type='hidden' name='idvalue' value=<?php echo $_GET['idnum'];?>><br>
        <textarea rows="10" cols="30" name='caption' required placeholder='Caption'></textarea>   <br>
        <input id='post' type='submit' value='Post'>
        </form>
    </main>
    </center>
</body>
</html>