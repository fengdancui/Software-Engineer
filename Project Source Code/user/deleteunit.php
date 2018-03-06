<?php

//echo "this page is for deleting unit from database";

include '../public/common/config.php';
//echo"this is the page for the system administrator to edit account information";
$id=$_GET['id'];

$sql="DELETE FROM `preference` WHERE `preference`.`id` = $id";
$query=$dbh->exec($sql);
echo "<script>alert('Delete successfully')</script>";
echo "<script>location='teaadhome.php'</script>";

?>