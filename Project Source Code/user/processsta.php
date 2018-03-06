<?php
include '../public/common/config.php';
//echo "this is the page for checking the edit result";
$status=$_POST['changesta'];
if($status<1 || $status>3){
    echo "<script>alert('You must choose status from 1, 2, and 3, please select and edit again')</script>";
    echo "<script>location='headhome.php'</script>";
}else{
    $staff = $_COOKIE['staffidcookie'];
   
    $sql="UPDATE `account` SET `status` = '$status' WHERE `account`.`staffid` = $staff;";
    $dbh->exec($sql);
    echo "<script>alert('You have edit status successfully')</script>";
    echo "<script>location='headhome.php'</script>";
}

?>