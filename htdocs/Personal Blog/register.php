<html lang="en">
<head>
<script type="text/javascript">
function insert()
{
alert("Inserted");
}
</script>
</head>
<?php
include('connection.php');
if(isset($_POST['submit']))
{
if(!empty($_POST['username']) && ($_POST['password']))
{
  $name=$_POST['username'];
  $pass = $_POST['password'];
  $hash = password_hash($pass, PASSWORD_DEFAULT);
  mysqli_query($con,"insert into admin (uname,pass) values('$name','$hash')");
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
        <li><a href="login.php">Login</a></li>
        <li><a href="home.php">Home</a></li>
    </ul>
    </header>

    <center>
    <main id="formcontainer">
        <form id="form" method="POST" onsubmit="insert()" >
            <input class="field" type="text" name="username" placeholder="Username" autocomplete="off" required><br>
            <input class="field" type="password" name="password" placeholder="Password" required><br>
            <input id="submit" type='submit' name='submit' value="Register">
        </form>
    </main>
    </center>
</body>
</html>