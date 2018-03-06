<?php
echo "this page is for processing allocation";
include '../public/common/config.php';

$unitchair=$_POST['unitchair'];
$unit=$_COOKIE['uncookie'];
$trimester=$_COOKIE['tricookie'];
$staffid=$_COOKIE['idcookie'];
$sql="UPDATE `allocated` SET `unitchair` = '$unitchair' WHERE `allocated`.`staffid` = $staffid AND `allocated`.`unit` = '$unit' AND `allocated`.`trimester` = $trimester"; 
$dbh->exec($sql);
echo "<script>alert('You have edit successfully')</script>";
echo "<script>location='allocated.php'</script>";
?>
