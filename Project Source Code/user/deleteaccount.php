<?php

//echo "this page is for deleting account";

include '../public/common/config.php';
//echo"this is the page for the system administrator to edit account information";
$id=$_GET['StaffID'];

$sql="DELETE FROM `account` WHERE `account`.`staffid` = $id";
$query=$dbh->exec($sql);
echo "<script>alert('Delete successfully')</script>";
echo "<script>location='sysadhome.php'</script>";

?>