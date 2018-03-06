<?php
include '../public/common/config.php';
//echo "this is the page for checking the edit result";
$unit=$_POST['unit'];
$title=$_POST['title'];
$credit=$_POST['credit'];
$tri=$_POST['tri'];
$id = $_COOKIE['idcookie'];

    $sql="UPDATE `preference` SET `unit` = '$unit', `title` = '$title', `credit` = '$credit', `trimester` = '$tri' WHERE `preference`.`id` = $id; ";
    $dbh->exec($sql);
   
    echo "<script>alert('You have edit unit successfully')</script>";
    echo "<script>location='teaadhome.php'</script>";


?>