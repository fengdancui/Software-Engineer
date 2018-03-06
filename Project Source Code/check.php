<?php
include 'public/common/config.php';

$username=$_POST['username'];
$password=$_POST['password'];
setcookie('mycookie',$username);
$date=date("Y-m-d");
$datenew=strtotime($date);
$sql="select * from setting";
$query=$dbh->query($sql);
$rowsetting=$query->fetch(PDO::FETCH_ASSOC);
$startdate=$rowsetting['startdate'];
$enddate=$rowsetting['enddate'];
$start=strtotime($startdate);
$end=strtotime($enddate);
//$sql="select * from account where username='$username' and password='$password'";

$stmt = $dbh->prepare("SELECT * FROM account WHERE username='$username' and password='$password'");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$rows = $dbh->query("SELECT * FROM account WHERE username='$username'");
$sta = $rows->fetchColumn(3);
$roles = $dbh->query("SELECT * FROM account WHERE username='$username'");
$role=$roles->fetchColumn(4);
if($row){
    if($sta==1){
        
        if($role==1){
            if($datenew>$start&&$datenew<$end){
                echo "<script>location='user/selectpre.php'</script>";
            }else{
                echo "<script>alert('The system has not opened for staff')</script>";
               echo "<script>location='login.php'</script>";
            }
            }
        if($role==2){echo "<script>location='user/hometea.php'</script>";}
        if($role==3){echo "<script>location='user/sysadhome.php'</script>";}
        if($role==4){echo "<script>location='user/headhome.php'</script>";}
    }
    if ($sta==2){
        echo "<script>alert('Your account has been suspended')</script>";
        echo "<script>location='login.php'</script>";
    }
   if ($sta==3){
        echo "<script>alert('Your account has been terminated')</script>";
        echo "<script>location='login.php'</script>";
    }
    
    //echo "<script>location='login.php'</script>";
}else{
    
    echo "<script>alert('Your account has not exist or your password is wrong, please check and login again')</script>";
   echo "<script>location='login.php'</script>";
}
//这个方法也可以
/*$row_count = $row->rowCount();
if($row_count==0){
    
    echo "<script>location='login.php'</script>";
}else{
    echo "<script>location='index.php'</script>";
}*/
  
    ?>
