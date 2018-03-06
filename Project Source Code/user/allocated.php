<?php
//echo "this page is to allocate";
include '../public/common/config.php';
$sqlpre="select * from preference";
$querypre=$dbh->query($sqlpre);
while($rowpre=$querypre->fetch(PDO::FETCH_ASSOC)){
    $unitpre=$rowpre['unit'];
    $tripre=$rowpre['trimester'];
    $sql="select * from $unitpre$tripre order by rand() desc limit 0,1";
    $query=$dbh->query($sql);
    while($row=$query->fetch(PDO::FETCH_ASSOC)){
        $staffid=$row['staffid'];
        $username=$row['username'];
        $unit=$row['unit'];
        $title=$row['title'];
        $credit=$row['credit'];
        $trimester=$row['trimester'];
        $are=$row['are'];
       
         $sqlinsert="INSERT INTO `allocated` (`staffid`, `username`, `unit`, `title`, `credit`, `trimester`, `unitchair`) VALUES ('$staffid', '$username', '$unit', '$title', '$credit', '$trimester', '$are')";
      $dbh->exec($sqlinsert);           
     
    }
}
echo "<script>location='allocatedresult.php'</script>";





?>