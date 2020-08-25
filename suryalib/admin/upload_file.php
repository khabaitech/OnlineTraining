<?php
ob_start();
session_start();
function upload_file($path, $new_name){
		$userfile_error = $_FILES['file']['error'];
      echo $_FILES['file'] ;
	if ($userfile_error > 0){
		echo '<div align=center><b>Problem: ';
		switch ($userfile_error){
			case 1: echo 'Document exceeded upload_max_filesize Go <a href="javascript:history.go(-1)">Back</a>'; break;
			case 2: echo 'Document exceeded 25KB Go <a href="javascript:history.go(-1)">Back</a>'; break;
			case 3: echo 'Document only partially uploaded Go <a href="javascript:history.go(-1)">Back</a>'; break;
			case 4: echo 'No Document uploaded Go <a href="javascript:history.go(-1)">Back</a>'; break;
			}
			exit;
		}
		$userfile = $_FILES['file']['tmp_name'];
	$userfile_name = $_FILES['file']['name'];
	$userfile_type = $_FILES['file']['type'];
	$extension = explode('.',$userfile_name);
	$exten = $extension[1];
	$_SESSION['exten'] = $exten;
	if (($exten != 'pdf') && ($exten != 'doc')){
	    
			echo '<div align=center><b>Your document MUST be PDF or Word document. <br>The document submitted is: '.$userfile_name.' Go <a href="javascript:history.go(-1)">Back</a> and re-select another document with the right extension';
			exit;
	}
		global $newfile_name;
		
		$newfile_name = mktime().'.'.$extension[1];
	$upfile = $path.'/'.$newfile_name;
		if (is_uploaded_file($userfile)){
		if (!move_uploaded_file($userfile, $upfile)){
			echo 'Could not move file to destination directory';
			exit;
		}
	}
	else {
		echo 'Problem: Possible file upload attack. Filename: '.$userfile_name;
		exit;
	}
}	
ob_flush();
?>