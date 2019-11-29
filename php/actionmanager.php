<?php
$actionmanager = new Actionmanager() ;
include_once "config.php" ;
include_once "dbfunctions.php" ;
if(isset($_POST['command']) && $_POST['command'] == "login")
{
	$actionmanager->login() ;
}
if(isset($_POST['command']) && $_POST['command'] == "register")
{
	$actionmanager->register() ;
}
elseif(isset($_POST['command']) && $_POST['command'] == "delete-user")
{
	$actionmanager->deleteUser() ;
}
elseif(isset($_POST['command']) && $_POST['command'] == "delete-file")
{
	$actionmanager->deleteFile() ;
}
elseif(isset($_POST['command']) && $_POST['command'] == "toggle-user")
{
	$actionmanager->toggleUser() ;
}
elseif(isset($_POST['command']) && $_POST['command'] == "findFile")
{
	$actionmanager->findFile() ;
}
elseif(isset($_FILES['file']['name']) && $_FILES['file']['name'] != "")
{
	$actionmanager->uploadZip() ;
}






class Actionmanager
{
	
	function login()
	{
		$user_id = $_POST['user_id'] ;
		$password = passwordHash($_POST['password']) ;
		$dataRead = new DataRead() ;
		$doJob = $dataRead->login($user_id , $password) ;
		if($doJob != -1 && $doJob != 0)
		{
			session_start() ;
			$_SESSION['user_id'] = $doJob ;
			redirect("../account.php") ;
		}
		else
		{
			// print_r($doJob);
			redirect("../login.php?status=error") ;
		}
	}

	function register()
	{
		$user_id = $_POST['user_id'] ;
		$name = $_POST['name'] ;
		$password = passwordHash($_POST['password']) ;
		$dataWrite = new DataWrite() ;
		$doJob = $dataWrite->register($user_id , $password , $name) ;
		if($doJob != -1)
		{
			session_start() ;
			$_SESSION['user_id'] = $doJob ;
			redirect("../download.php") ;
		}
		else
		{
			// print_r($doJob);
			redirect("../register.php?status=userexists") ;
		}
	}

	function deleteUser()
	{
		$id = $_POST['id'] ;
		$dataWrite = new DataWrite() ;
		$doJob = $dataWrite->deleteUser($id) ;
		if($doJob)
		{
			echo "success";
		}
		else
		{
			echo "failed";
		}
	}

	function deleteFile()
	{
		$id = $_POST['id'] ;
		$dataWrite = new DataWrite() ;
		$doJob = $dataWrite->deleteFile($id) ;
		if($doJob)
		{
			echo "success";
		}
		else
		{
			echo "failed";
		}
	}

	function toggleUser()
	{
		$id = $_POST['id'] ;
		$type = $_POST['type'] ;
		$dataWrite = new DataWrite() ;
		switch ($type) {
			case '0':
				$type = 1 ;
				break;
			case '1':
				$type = 0 ;
				break;
			
			default:
				$type = 1 ;
				break;
		}
		$doJob = $dataWrite->toggleUser($id , $type) ;
		if($doJob)
		{
			echo "success";
		}
		else
		{
			echo "failed";
		}
	}

	function uploadZip()
	{
		ini_set('upload_max_filesize', '12M');
		ini_set('post_max_size', '12M');
		ini_set('max_input_time', 3000);
		ini_set('max_execution_time', 3000);
		$dataWrite = new DataWrite() ;
		$rand = time() ; //rand(10,100);
		$streplaceFileName = cleanSpecialCharacters($_FILES['file']['name']);
		$file = $rand.'_'.$streplaceFileName;
		$ds = DIRECTORY_SEPARATOR;
		$storeFolder = '../uploads';
		if((!empty($_FILES)) && !empty($_FILES['file']['name']))
		{
			if(preg_match('/[.](zip|rar)$/', $_FILES['file']['name']))
			{
				//inspecting your file
				$filename = $rand . '_' . $streplaceFileName;
				$tempFile = $_FILES['file']['tmp_name'];
				$targetPath = $storeFolder . $ds;
				$targetFile = $targetPath.$filename;
				$who = $_POST['user'] ;
				$saveFile = $dataWrite->saveFile($filename , $who) ;
				// echo $saveFile;
				if($saveFile):
					$check = move_uploaded_file($tempFile,$targetFile);
					if($check):
						echo 'file Uploaded Successfully!';
						// redirect("../upload-file.php?status=success") ;
					else:
						echo "Could not upload file to db ".$_FILES['file']['error'];
						// redirect("../upload-file.php?status=file-move-error") ;
					endif;
				else:
					echo "Could not save file ".$saveFile;
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
			echo "Empty file";
			// redirect("../upload-file?status=invalid-file") ;
		}
	}

	function findFile()
	{
		getFiles("../".$_POST['folder']) ;
		// echo $_POST['folder'];
	}
}
?>