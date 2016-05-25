<?php
	echo $_GET['object'];
	switch($_GET['object'])
	{
		case 1:
			$download_file = $_COOKIE['Transcipts_name'];
			break;
		case 2:
			$download_file = $_COOKIE['Letter_name'];
	}

	$file_name = $download_file;
	$file_path = "../Upload Sub-system/Upload File/" . $download_file;
	$file_size = filesize($file_path);
	header('Pragma: public');
	header('Expires: 0');
	header('Last-Modified: ' . gmdate('D, d M Y H:i ') . ' GMT');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Cache-Control: private', false);
	header('Content-Type: application/octet-stream');
	header('Content-Length: ' . $file_size);
	header('Content-Disposition: attachment; filename="' . $file_name . '";');
	header('Content-Transfer-Encoding: binary');
	readfile($file_path);
?>