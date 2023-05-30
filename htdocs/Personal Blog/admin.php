<?php
session_start();
if(isset($_SESSION['uname'])){
    
}
else{
    echo "<script>location.href='home.php'</script>";
}


$piccaption="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    function getValue($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $piccaption=getValue($_POST['caption']);
    $imgname=$_FILES['img']['name'];
    $tmpname=$_FILES['img']['tmp_name'];
    $imgex=strtolower(pathinfo($imgname,PATHINFO_EXTENSION));
    $newname=uniqid("IMG-",true).".".$imgex;
    $newloc="image/upload/".$newname;
    move_uploaded_file($tmpname,$newloc);
    $conn=new mysqli('localhost','root','','splashblog');

    $idnum="";
    $sql="select id from gallery order by id desc limit 1";
    $result=$conn->query($sql);
    if($result->num_rows == 1){
        $row=$result->fetch_assoc();
        $idnum=$row['id'];
        $idnum++;
    }
    else{
        $idnum=1;
    }

    $sql="insert into gallery (id,images,caption) values('$idnum','$newloc','$piccaption')";
    if($conn->query($sql)){
        echo "<script>alert('Image Uploaded')</script>";
    }
    else{
        echo "<script>alert('Image Failed to Upload')</script>";
    }
    $conn->close();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
        <a href="home.php">SPLASHBLOG</a>
    <ul>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="edit.php">Edit</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    </header>
    <!-- <center>
    <main id="piccontainer">
        <form enctype="multipart/form-data" id="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type='file' name='img' required><br>
        <textarea rows="10" cols="30" name='caption' required placeholder='Caption'></textarea>   <br>
        <input id='post' type='submit' value='Post'>
        </form>
    </main>
    </center> -->
    <?php
        if($_SESSION["uname"]=='iftehaz'){
            echo "
            <center>
            <main id='piccontainer'>
                <form enctype='multipart/form-data' id='form' method='POST' action='<?php echo htmlspecialchars(".$_SERVER['PHP_SELF'].");?>'>
                <input type='file' name='img' required><br>
                <textarea rows='10' cols='30' name='caption' required placeholder='Caption'></textarea>   <br>
                <input id='post' type='submit' value='Post'>
                </form>
            </main>
            </center>";
        }
        else{
            echo "<script>location.href='gallery.php'</script>>";
        }
    ?>
</body>
</html>