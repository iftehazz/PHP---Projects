<?php
session_start();
if(isset($_SESSION['uname'])){
    echo "<script>location.href='admin.php'</script>";
}

include('connection.php');
if(isset($_POST['submit'])){
  $uname=$_POST['username'];
  $pass = $_POST['password'];
  $uname = strip_tags(mysqli_real_escape_string($con,trim($uname)));
  $pass = strip_tags(mysqli_real_escape_string($con,trim($pass)));
  $sql="select * from admin where uname='".$uname."' limit 1";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)==1){
    $row = mysqli_fetch_array($result);
    $hash = $row['pass'];
    if(password_verify($pass, $hash )){
        session_start();
        $_SESSION["uname"] = $uname;
        echo '<script>window.location="admin.php"</script>';
        exit();
    }
    else{
        echo "<script>alert('Invalid username or password')</script>";
        header("refresh:0; url=login.php");
        exit();
    }
  }
  else{
    echo "<script>alert('Invalid username or password')</script>";
    header("refresh:0; url=login.php");
    exit();
  }

}

?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<header>
        <a href="home.php">SPLASHBLOG</a>
    <ul>
        <li><a href="register.php">Register</a></li>
        <li><a href="home.php">Home</a></li>
    </ul>
    </header>

    <center>
    <main id="formcontainer">
        <form id="form" method="POST">
            <input class="field" type="text" name="username" placeholder="Username" autocomplete="off" required><br>
            <input class="field" type="password" name="password" placeholder="Password" required><br>
            <input id="submit" type='submit' name='submit' value="Login">
        </form>
    </main>
    </center>
</body>
</html>