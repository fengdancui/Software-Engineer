<?php
include '../public/common/config.php';
//echo "this page is for system administrator to add an account";
$id=$_POST['id'];
$unit=$_POST['unit'];
$title=$_POST['title'];
$credit=$_POST['credit'];
$tri=$_POST['tri'];
$sqladd="INSERT INTO `preference` (`id`, `unit`, `title`, `credit`, `trimester`) VALUES ('$id', '$unit', '$title', '$credit', '$tri');";
$dbh->exec($sqladd);
echo "<script>alert('Add successfully')</script>";
echo "<script>location='teaadhome.php'</script>";
?>