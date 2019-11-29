<?php
include_once 'dbconnect.php' ;
include_once 'config.php' ;



class DataWrite
{
	function deleteUser($id)
	{
		$connect = dbconnect() ;
		$query = mysqli_query($connect , "UPDATE users SET status = '0' WHERE id = '$id' ") ;
		if($query):
			return true ;
		else:
			return false ;
		endif;
	}

	function deleteFile($id)
	{
		$connect = dbconnect() ;
		$query = mysqli_query($connect , "UPDATE files SET deleted = '1' WHERE id = '$id' ") ;
		if($query):
			return true ;
		else:
			return false ;
		endif;
	}

	function toggleUser($id , $type)
	{
		$connect = dbconnect() ;
		$query = mysqli_query($connect , "UPDATE users SET access = '$type' WHERE id = '$id' ") ;
		if($query):
			return true ;
		else:
			return false ;
		endif;
	}

	function saveFile($filename , $who)
	{
		$connect = dbconnect() ;
		$query = mysqli_query($connect , "INSERT INTO files (filename , uploaded_by) VALUES('$filename' , '$who') ") ;
		if($query): return true ;
			else: return false ;
			endif;
	}

	function register($user_id , $password , $name)
	{
		$connect = dbconnect() ;
		$query = mysqli_query($connect , "INSERT INTO users (user_id , password , username) VALUES('$user_id' , '$password' , '$name') ") ;
		if($query): return mysqli_insert_id($connect) ;
			else: return -1 ;
			endif;
	}
}


class DataRead
{
	function login($user_id , $password)
	{
		$connect = dbconnect() ;
		$query = mysqli_query($connect , "SELECT * FROM users WHERE user_id = '$user_id' ") ;
		if($query)
		{
			$fetch = fetcher($query) ;
			$pwrd = $fetch['password'] ;
			if($pwrd === $password)
			{
				return $fetch['id'] ; //true ;
			}
			else
			{
				return -1 ;//$query ; //-1 ;
			}
		}
		else
		{
			return -1 ; //mysqli_error($connect) ;
		}
	}

	function getAllUsers()
	{
		$connect = dbconnect() ;
		$query = mysqli_query($connect , "SELECT * FROM users WHERE status = '1' ") ;
		if($query)
		{
			return $query ; //array("return" => fetcher($query)) ;
		}
		else
		{
			return false ; //array('return' => "error" );
		}
	}

	function getAllFiles()
	{
		$connect = dbconnect() ;
		$query = mysqli_query($connect , "SELECT * FROM files WHERE deleted = '0' ORDER BY uploaded_on DESC ") ;
		if($query)
		{
			return $query ; //array("return" => fetcher($query)) ;
		}
		else
		{
			return false ; //array('return' => "error" );
		}
	}

	function getAllFolders()
	{
		$connect = dbconnect() ;
		$query = mysqli_query($connect , "SELECT * FROM files WHERE status = '1' AND deleted = '0' ORDER BY uploaded_on DESC ") ;
		if($query)
		{
			return $query ; //array("return" => fetcher($query)) ;
		}
		else
		{
			return false ; //array('return' => "error" );
		}
	}
}



?>