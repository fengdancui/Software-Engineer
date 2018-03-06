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
	$filename = $dbname . date('Ymd') . ".sql"; //���·��
	$fp = fopen($filename, 'w');
	fputs($fp, $mysql);
	fclose($fp);
	
	
	/* @����һ��zip�ļ� */
	
	function create_zip($files = array(),$destination = '',$overwrite = false) {
	    if(file_exists($destination) && !$overwrite){ //���zip�ļ��Ƿ����
	        return false;
	    }
	    if(is_array($files)) { //����ļ��Ƿ����
	        foreach($files as $file) { //ѭ��ͨ��ÿ���ļ�
	            if(file_exists($file)) { //ȷ������ļ�����
	                $valid_files[] = $file;
	            }
	        }
	    }
	    if(count($valid_files)) {
	        $zip = new ZipArchive(); //����zip�ļ�
	        if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true){
	            return false;
	        }
	        foreach($valid_files as $file) { //����ļ�
	            $zip->addFile($file,$file);
	        }
	        $zip->close();
	        return file_exists($destination);
	
	    } else {
	        return false;
	    }
	}
	
	$zipfilename=$dbname . date('Ymd') . ".zip";
	create_zip(array($filename),$zipfilename,true);//ִ��ѹ���ļ�
	
	echo "<script>alert('Database has been backuped successfully')</script>";
	echo "<script>location='sysadhome.php'</script>";
	
	
?>