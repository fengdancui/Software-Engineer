<?php
include '../public/common/config.php';
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$numberunit=$_POST['numberunit'];
$numberstaff=$_POST['numberstaff'];
$dates = strtotime($startdate);
$datee = strtotime($enddate);
if($dates>$datee){
     echo "<script>alert('Your start state is later than end date, please choose again')</script>";
     echo "<script>location='setting.php'</script>";
}else {
     $sql="UPDATE `setting` SET `startdate` = '$startdate', `enddate` = '$enddate', `numberunit` = '$numberunit', `numberstaff` = '$numberstaff' ";
     $dbh->exec($sql);
     echo "<script>alert('Successfully')</script>";
     echo "<script>location='hometea.php'</script>";
}

?>