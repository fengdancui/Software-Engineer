<?php

//echo "this page is to allocate units for staff";
include '../public/common/config.php';
$sql="SELECT * FROM `account` WHERE status=1 AND role=1 ";
$query=$dbh->query($sql);
//$row=$query->fetchAll(PDO::FETCH_NUM);
//$col = $query->rowCount();
//echo $col;
//print_r($row);
/*for($i=0;$i<$col;$i++){
    $rowname=$row[$i];
    $sql2="select * from $rowname[0] where preference=1" ;
    $queryre=$dbh->query($sql2);
    $row2=$queryre->fetch();
    echo $row2['unit'];
}*/

while($row=$query->fetch(PDO::FETCH_ASSOC)){
    $id=$row['staffid'];
  $name= $row['username'];  
  $sql2="select * from $name where preference=1 or preference=2" ;
  $query2=$dbh->query($sql2);
  $col=$query2->rowCount();
  $sqlcol="INSERT INTO `number` (`staffid`, `username`, `number`) VALUES ('$id', '$name', '$col')";
  $dbh->exec($sqlcol);
  //echo $col;
  while($row2=$query2->fetch(PDO::FETCH_ASSOC)){      
      $unit= $row2['unit'];
      $title= $row2['title'];
      $credit= $row2['credit'];
      $trimester= $row2['trimester'];
      $preference=$row2['preference'];
      $are=$row2['are'];
      $have=$row2['have'];
      $sqlinsert="INSERT INTO `allocating` (`staffid`, `username`, `unit`, `title`, `credit`, `trimester`, `preference`, `are`, `have`) VALUES ('$id', '$name', '$unit', '$title', '$credit', '$trimester', '$preference', '$are', '$have')";
      $dbh->exec($sqlinsert);           
  }

}
$sqlpre="select * from preference";
$querypre=$dbh->query($sqlpre);
while($rowpre=$querypre->fetch(PDO::FETCH_ASSOC)){
    $unitpre=$rowpre['unit'];
    $tripre=$rowpre['trimester'];
    $sqlcreate="CREATE TABLE $unitpre$tripre (
    staffid INT(11) NOT NULL,
    username CHAR(11) NOT NULL,
    unit CHAR(11) NOT NULL,
    title TEXT(11) NOT NULL,
    credit INT(11) NOT NULL,
    trimester INT(11) NOT NULL,
    preference INT(11) NOT NULL,
    are INT(11) NOT NULL,
    have INT(11) NOT NULL,
    number INT(11) NOT NULL,
    PRIMARY KEY (`staffid`)
    )";
    $dbh->exec($sqlcreate);
    $sqlall="select * from allocating where unit='$unitpre' and trimester='$tripre'";
    $queryall=$dbh->query($sqlall);
    while($rowall=$queryall->fetch(PDO::FETCH_ASSOC)){
        $idall=$rowall['staffid'];
        $nameall=$rowall['username'];
        $unitall= $rowall['unit'];
        $titleall= $rowall['title'];
        $creditall= $rowall['credit'];
        $trimesterall= $rowall['trimester'];
        $preferenceall=$rowall['preference'];
        $areall=$rowall['are'];
        $haveall=$rowall['have'];
        $sqlnum="select number from number where staffid='$idall'";
        $querynum=$dbh->query($sqlnum);
        $rownum=$querynum->fetch(PDO::FETCH_ASSOC);
        $number=$rownum['number'];
        //echo $number;
        $sqladd="INSERT INTO `$unitpre$tripre` (`staffid`, `username`, `unit`, `title`, `credit`, `trimester`, `preference`, `are`, `have`, `number`) VALUES ('$idall', '$nameall', '$unitall', '$titleall', '$creditall', '$trimesterall', '$preferenceall', '$areall', '$haveall', '$number')";
        $dbh->exec($sqladd);
    }
}
echo "<script>alert('Allocated successfully')</script>";
echo "<script>location='allocated.php'</script>";















?>