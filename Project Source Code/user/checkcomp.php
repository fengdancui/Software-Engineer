<?php
//echo "this page is for teaching administrator to check whether completed"
include '../public/common/config.php';
$sql="SELECT username FROM `account` WHERE status=1 AND role=1 ";
$query=$dbh->query($sql);
$row=$query->fetchAll(PDO::FETCH_NUM);
$col = $query->rowCount();
//echo $col;
//print_r($row);
for($i=0;$i<$col;$i++){
    $rowname=$row[$i];
   $sql2="select * from $rowname[0]" ;
   $queryre=$dbh->query($sql2);
   if(!$queryre){
      echo "<script>alert('Has not completed')</script>";
    echo "<script>location='complist.php'</script>";     
   }
}echo "<script>alert('Has completed')</script>";
    echo "<script>location='complist.php'</script>"; 


?>