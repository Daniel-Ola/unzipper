<?php
include_once 'php/settings.php' ;
include_once 'php/config.php' ;
$getuserDet = userDet($_SESSION['user_id']) ;
if($getuserDet['access'] == 0)
{
	redirect("upload-file.php") ;
}
else
{
	redirect("download.php") ;
}
?>