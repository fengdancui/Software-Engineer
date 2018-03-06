<?php
//this is the page to check whether the change can 生效
include '../public/common/config.php';
$sql="SELECT unit FROM `preference`";
$query = $dbh->query($sql);
$sqltit="SELECT title FROM `preference`";
$querytit = $dbh->query($sqltit);
$sqlcre="SELECT credit FROM `preference`";
$querycre=$dbh->query($sqlcre);
$sqltri="SELECT trimester FROM `preference`";
$querytri=$dbh->query($sqltri);
$preference=$_POST['preference'];
$are=$_POST['are'];
$have=$_POST['have'];


for ($i= 0;$i< count($preference); $i++){
$str= $preference[$i];
if($str<1||$str>4){
    echo "<script>alert('Please select your preference from 1, 2, 3, and 4')</script>";
    echo "<script>location='selectpre.php'</script>";
}
}
for ($i= 0;$i< count($are); $i++){
    $str1= $are[$i];
    $str2=$have[$i];
    if($str1<1||$str1>2||$str2<1||$str2>2){
        echo "<script>alert('Please select your expreience between 1 and 2')</script>";
        echo "<script>location='selectpre.php'</script>";
    }
}


//判断是否已经选择preference
$un = $_COOKIE['mycookie'];
//判断数据库中是否有相应的表
$sql3 = "select * from $un";
$rows = $dbh->query($sql3);
if ($rows){
    echo "<script>alert('You have selected preference, now you only can change your preference')</script>";
    echo "<script>location='confirmpre.php'</script>";
}else {
      $sql2 = "CREATE TABLE $un (
    unit CHAR(11) NOT NULL, 
    title TEXT(11) NOT NULL,
    credit INT(11) NOT NULL,
    trimester INT(11) NOT NULL,
    preference INT(11) NOT NULL,
    are INT(11) NOT NULL,
    have INT(11) NOT NULL
    )";

    // use exec() because no results are returned
    $dbh->exec($sql2);
    //把数据存入到数据库的表中
    for ($j= 0;$j< count($are); $j++){
        $strpre=$preference[$j];
        $strare=$are[$j];
        $strhave=$have[$j];
       $row=$query->fetch(PDO::FETCH_COLUMN);
       $rowtitle=$querytit->fetch(PDO::FETCH_COLUMN);
       $rowcre=$querycre->fetch(PDO::FETCH_COLUMN);
       $rowtri=$querytri->fetch(PDO::FETCH_COLUMN);
       $sqladd="INSERT INTO `$un` (`unit`,`title`, `credit`, `trimester`, `preference`, `are`, `have`) VALUES ('$row', '$rowtitle', '$rowcre', '$rowtri', '$strpre', '$strare', '$strhave');";
        $dbh->exec($sqladd);
       
    } 
    echo "<script>alert('Thank you for your chosen, now you can confirm or change')</script>";
    echo "<script>location='confirmpre.php'</script>";
   
} 




?>