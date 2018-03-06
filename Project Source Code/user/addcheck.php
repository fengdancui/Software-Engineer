<?php
include '../public/common/config.php';
//echo "this page is for system administrator to add an account";
$id=$_POST['id'];
$un=$_POST['un'];
$pass=$_POST['pass'];
$sta=$_POST['sta'];
$role=$_POST['ro'];
$sql="select * from account where staffid='$id'";
$row=$dbh->query($sql);
$result=$row->fetch(pdo::FETCH_ASSOC);
if($result){
    echo "<script>alert('The account has exist, please add again')</script>";
    echo "<script>location='add.php'</script>";
}else{
    

$sqladd="INSERT INTO `account` (`staffid`, `username`, `password`, `status`, `role`) VALUES ('$id', '$un', '$pass', '$sta', '$role');";
$dbh->exec($sqladd);
echo "<script>alert('Add successfully')</script>";
echo "<script>location='sysadhome.php'</script>";

}
?>