<?php
ini_set('display_errors','off');
/*$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.".$fileTmpLoc;
    exit();
}
if(move_uploaded_file($fileTmpLoc, "uploads/$fileName")){
    print_r($_POST);
} else {
    echo "move_uploaded_file function failed";
}*/



include_once "php/config.php" ;
include_once "php/dbfunctions.php" ;
$dataWrite = new DataWrite() ;
		$rand = time() ; //rand(10,100);
		$streplaceFileName = cleanSpecialCharacters($_FILES['file1']['name']);
		$file = $rand.'_'.$streplaceFileName;
		$ds = DIRECTORY_SEPARATOR;
		$storeFolder = 'uploads/';
		if((!empty($_FILES)) && !empty($_FILES['file1']['name']))
		{
			if(preg_match('/[.](zip|rar)$/', $_FILES['file1']['name']))
			{
				//inspecting your file
				$filename = $rand . '_' . $streplaceFileName;
				$tempFile = $_FILES['file1']['tmp_name'];
				$targetPath = $storeFolder . $ds;
				$targetFile = $targetPath.$filename;
				$who = $_POST['user'] ;
				$saveFile = $dataWrite->saveFile($filename , $who) ;
				// echo $saveFile;
				if($saveFile):
					$check = move_uploaded_file($tempFile,$targetFile);
					if($check):
						echo $_FILES['file1']['name'].' Uploaded Successfully!';
						// redirect("../upload-file.php?status=success") ;
					else:
						echo "Could not upload file to our database";
						// redirect("../upload-file.php?status=file-move-error") ;
					endif;
				else:
					echo "Could not save file";
					// redirect("../upload-file.php?status=file-move-error") ;
				endif;
			}
			else
			{
				echo "Invalid file type";
				// redirect("../upload-file.php?status=file-type-error"); //"erro 2";
			}
		}
		else
		{
			echo "Invalid file";
			// redirect("../upload-file?status=invalid-file") ;
		}
	



?>
