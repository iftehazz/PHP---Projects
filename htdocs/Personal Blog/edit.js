function updatebtn(idnumber){
    window.location.href="update.php?idnum="+idnumber;
}
function deletebtn(idnumber){
    if(confirm("Are you sure?")){
        window.location.href="delete.php?idnum="+idnumber;
    }
}