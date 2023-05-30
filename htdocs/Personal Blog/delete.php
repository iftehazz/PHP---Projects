<?php
$idnumber=$_GET['idnum'];
$conn=new mysqli('localhost','root','','splashblog');
$sql="delete from gallery where id='$idnumber'";
if($conn->query($sql)){
    echo "<script>alert('Deleted Succesfully')</script>";
    echo "<script>location.href='edit.php'</script>";
}
else{
    echo "<script>alert('Failed to Delete')</script>";
}
?>