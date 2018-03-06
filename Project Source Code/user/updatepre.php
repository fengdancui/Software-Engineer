<?php
//echo "this is the page to check whether the change can 生效";
include '../public/common/config.php';

$preference=$_POST['preference'];
$are=$_POST['are'];
$have=$_POST['have'];


if($preference<1||$preference>4){
    echo "<script>alert('Please select your preference from 1, 2, 3, and 4')</script>";
    echo "<script>location='changepre.php'</script>";
}


    if($are<1||$are>2||$have<1||$have>2){
        echo "<script>alert('Please select your expreience between 1 and 2')</script>";
        echo "<script>location='changepre.php'</script>";
    }



//判断是否已经选择preference
$un = $_COOKIE['mycookie'];
$unit=$_COOKIE['cookieunit'];
$trimester=$_COOKIE['cookietrimester'];
 $sql="UPDATE `$un` SET `preference` = '$preference', `are` = '$are', `have` = '$have' WHERE `$un`.`unit` = '$unit' and `trimester` = $trimester  ";
$dbh->exec($sql);
    


echo "<script>alert('You have edit preference successfully')</script>";
echo "<script>location='confirmpre.php'</script>";



?>