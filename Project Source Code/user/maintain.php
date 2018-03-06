<?php
	include '../public/common/config.php';
	
	$dbname = "dbname";
	$dbh->query("set names 'utf8'");
	$mysql = "set charset utf8;\r\n";
	$q1 = $dbh->query("show tables");
	while ($t = $q1->fetch())
	{
	    $table = $t[0];
	    $q2 = $dbh->query("show create table `$table`");
	    $sql = $q2->fetch();
	    $mysql .= $sql['Create Table'] . ";\r\n";
	    $q3 = $dbh->query("select * from `$table`");
	    while ($data =$q3->fetch(pdo::FETCH_ASSOC))
	    {
	        $keys = array_keys($data);
	        $keys = array_map('addslashes', $keys);
	        $keys = join('`,`', $keys);
	        $keys = "`" . $keys . "`";
	        $vals = array_values($data);
	        $vals = array_map('addslashes', $vals);
	        $vals = join("','", $vals);
	        $vals = "'" . $vals . "'";
	        $mysql .= "insert into `$table`($keys) values($vals);\r\n";
	    }
	}
	$filename = $dbname . date('Ymd') . ".sql"; //存放路径
	$fp = fopen($filename, 'w');
	fputs($fp, $mysql);
	fclose($fp);
	
	
	/* @创建一个zip文件 */
	
	function create_zip($files = array(),$destination = '',$overwrite = false) {
	    if(file_exists($destination) && !$overwrite){ //检测zip文件是否存在
	        return false;
	    }
	    if(is_array($files)) { //检测文件是否存在
	        foreach($files as $file) { //循环通过每个文件
	            if(file_exists($file)) { //确定这个文件存在
	                $valid_files[] = $file;
	            }
	        }
	    }
	    if(count($valid_files)) {
	        $zip = new ZipArchive(); //创建zip文件
	        if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true){
	            return false;
	        }
	        foreach($valid_files as $file) { //添加文件
	            $zip->addFile($file,$file);
	        }
	        $zip->close();
	        return file_exists($destination);
	
	    } else {
	        return false;
	    }
	}
	
	$zipfilename=$dbname . date('Ymd') . ".zip";
	create_zip(array($filename),$zipfilename,true);//执行压缩文件
	
	echo "<script>alert('Database has been backuped successfully')</script>";
	echo "<script>location='sysadhome.php'</script>";
	
	
?>