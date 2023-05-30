<?php
    $conn=new mysqli('localhost','root','','splashblog');
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="INSERT INTO `admin` (`uname`, `pass`) VALUES ('$Username', '$password')";
    if($conn->query($sql)){
        echo "<script>alert('Inserted')</script>";
    }
    else{
        echo "<script>alert('Not Inserted')</script>";
    }
    echo "<script>location.href='login.php'</script>";

    
    /* 
    $conn=new mysqli('localhost','root','','splashblog');
    $username=$_POST['username'];
    $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql="INSERT INTO `admin` (`uname`, `pass`) VALUES ('$username', '$password')";
    if($conn->query($sql)){
        echo "<script>alert('Inserted')</script>";
    }
    else{
        echo "<script>alert('Not Inserted')</script>";
    }
    echo "<script>location.href='login.php'</script>"; */
?>