<?php
include '../public/common/config.php';
date_default_timezone_set('prc');
//$date=date("Y-m-d");
//echo date("y-m-d",$time);
$sql="select * from setting";
$query=$dbh->query($sql);
$row=$query->fetch(PDO::FETCH_ASSOC);
//echo $row['startdate'];
?>
<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>Setting Table</title>

<link rel="stylesheet" href="public/css/normalize.css">
 <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/font-awesome.min.css" rel="stylesheet">
    <link href="../public/css/templatemo_style.css" rel="stylesheet">

    <link href="../public/css/circle.css" rel="stylesheet">
    <link href="../public/css/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="../public/css/nivo-slider.css">
    <link href='http://fonts.useso.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>
    <script src="../public/js/modernizr.custom.js"></script>

<style type="text/css">
.btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
.btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
.btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
.btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
.btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
.btn-primary.active { color: rgba(255, 255, 255, 0.75); }
.btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
.btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
.btn-block { width: 20%; display:block; }
.btn-al {align:rignt;}

* { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }



input
{
	
  border-top:0px ;
  border-left:0px ;
  border-right:0px ;
  text-align:center;
}
.login { 
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -150px 0 0 -150px;
	width:300px;
	height:300px;
}
.login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }


.STYLE1 {font-family: Arial, Helvetica, sans-serif}
.font{
font-family:Arial, Helvetica, sans-serif;
font-size:16px;
}
.font2{font-family:Arial, Helvetica, sans-serif;}
</style>

</head>
<body>
<div class="mWrapper">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 col-md-4">
            <div class="logo">
              <a  href="../../index.php"><img src="../public/images/logo.png" alt="TAS"></a>
            </div>
          </div>
          <div class="col-sm-8 col-md-8">
            <nav class="mainMenu">
              <ul class="nav">
                <li><a href="../../index.php">Home</a></li>
                <li><a href="hometea.php">Function</a></li>
                <li><a href="teaadhome.php">Edit</a></li>
                <li><a href="addunit.php">Add</a></li>
                <li><a href="setting.php">Setting</a></li>
                <li><a href="mailto:fcui@deakin.au">Email</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div> 
   
    <h1 align="center" class="font2"><strong>Setting Table</strong></h1>
    <br>
   <form action="checksetting.php" method="post">
    <table class="font" border="1" align="center" width="350">
    <tr align="center">
    <td>Start Date </td>
    <td><input id="startdate" name="startdate" type="date" required="required"/></td>
    </tr>
     <tr align="center">
    <td>End Date </td>
    <td><input id="enddate" name="enddate" type="date" required="required"/></td>
    </tr>
     <tr align="center">
    <td>Number of Units </td>
    <td><input  type="number" name="numberunit" required="required"/></td>
    </tr>
     <tr align="center">
    <td>Number of Staff </td>
    <td><input  type="number" name="numberstaff" required="required"/></td>
    </tr>
  
  </table>
  
<br>
  <table class="font" border="0" align="center" width="350">
    <tr align="center">
<td>
<input type="submit" class="btn btn-primary btn-large btn-al" value="submit" >

<input type="reset" class="btn btn-primary btn-large btn-al" value="reset" >
 </td> </tr></table></form>
  
</body>
</html>

