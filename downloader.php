<?php

if(!isset($_GET['file']))
{
	header("location: download.php") ;
}
else
{
	$folderCode = $_GET['file'] ;
	$folder = base64_decode($folderCode) ;
	// echo $folder;
	$files = glob($folder."/*.*") ;
	// print_r($files) ;
	for($i = 0 ; $i <= count($files)-1 ; $i++)
	{
		$myFile = $files[$i];
		echo $myFile;
		$fileType = mime_content_type($files[$i]) ;
		// echo $fileType."<br>";
		// if(file_exists($fileType)) {
        header('Content-Description: File Transfer');
        header('Content-Type: '.$fileType);
        header('Content-Disposition: attachment; filename="'.basename($myFile).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($myFile));
        flush(); // Flush system output buffer
        readfile($myFile);
        echo "string<br>";
        // exit;
    	/*}
    	else
    	{
    		echo "string<br>";
    	}*/
	}
}

?>