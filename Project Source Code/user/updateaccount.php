<?php
include '../public/common/config.php';
//echo "this is the page for checking the edit result";
$status=$_POST['sta'];
$role=$_POST['ro'];
$un=$_POST['un'];
$pass=$_POST['pass'];
if($status<1 || $status>3){
    echo "<script>alert('You must choose status from 1, 2, and 3, please select and edit again')</script>";
    echo "<script>location='headhome.php'</script>";
}elseif ($role<1 || $role>4){
    echo "<script>alert('You must choose role from 1, 2, 3, and 4, please select and edit again')</script>";
    echo "<script>location='sysadhome.php'</script>";
}
else{
    $staff = $_COOKIE['staffidcookie2'];
   
    $sql="UPDATE `account` SET `username` = '$un', `password` = '$pass', `status` = '$status', `role` = '$role' WHERE `account`.`staffid` = $staff; ";
    $dbh->exec($sql);
    echo "<script>alert('You have edit status successfully')</script>";
    echo "<script>location='sysadhome.php'</script>";
}

?>