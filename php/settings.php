<?php
session_start() ;
include_once "config.php" ;
include_once "dbconnect.php" ;
include_once "dbfunctions.php" ;
if(!isset($_SESSION['user_id']))
{
	redirect("../logout.php") ;
}
else
{
	function userDet($id)
	{
		$connect  = dbconnect() ;
		$query = mysqli_query($connect , "SELECT * FROM users WHERE id = '$id' ") ;
		if($query)
		{
			$fetch = fetcher($query) ;
			return $fetch ;
		}
		else
		{
			return false ;
		}
	}
	$id = $_SESSION['user_id'] ;
	$details = userDet($id) ;
	$access = $details['access'] ;
	$adminURL = array("/users.php" , "" , "/uploaded.php" , "/upload-file.php") ;
	if($access == 1)
	{
		$script = $_SERVER['SCRIPT_NAME'] ;
		if(in_array($script, $adminURL))
		{
			redirect("download.php") ;
		}
	}

	// increase download
	function downloadAdd($id , $file)
	{
		$connect = dbconnect() ;
		$select  = explode("_" , fetcher(mysqli_query($connect , "SELECT downloads FROM files "))['downloads']) ;
		// echo $select ;
		if(!in_array($id, $select))
		{
			$array = array_push($select, $id) ;
			$array = implode("_", $select) ;
			$query = mysqli_query($connect , "UPDATE files SET downloads = '$array' WHERE filename = '$file' ") ;
		}
	}
	
	// 

}

?>