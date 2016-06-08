<?php
	switch($_GET['object'])
	{
		case 1:
			$download_file = $_COOKIE['Transcipts_name'];
			break;
		case 2:
			$download_file = $_COOKIE['Letter_name'];
	}
	$file_name = $download_file;
	switch($_GET['object'])
	{
		case 1:
		{
			$file_path = "../ApplicationManager Sub-system/UploadFile/". $download_file;
			
		}
			break;
		case 2:
		{
			$file_path = "../Upload Sub-system/Upload File/". $download_file;
		}
	}

	
	$file_size = filesize(mb_convert_encoding($file_path , "BIG5"));
	header('Pragma: public');
	header('Expires: 0');
	header('Last-Modified: ' . gmdate('D, d M Y H:i ') . ' GMT');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Cache-Control: private', false);
	header('Content-Type: application/octet-stream');
	header('Content-Length: ' . $file_size);
	header('Content-Disposition: attachment; filename="' . $file_name . '";');
	header('Content-Transfer-Encoding: big_chinese_ci');
	readfile(mb_convert_encoding($file_path , "BIG5"));
?>
