<?php

function Check_If_Exists($connect , $table , $column , $value)
{
  include_once("dbconnect.php") ;
  $query = mysqli_query($connect , "SELECT * FROM ".$table." WHERE ".$column." = '$value' ") ;
  if($query)
  {
    $num = numQuery($query) ;
    if($num == 0)
    {
      return 1 ; // no user
    }
    else
    {
      return 0 ; // user exists
    }
  }
}

function getFilesX($folder)
{
    echo "<ul style='list-style: none;'>";
        $num = 0 ;
        foreach (scandir($folder) as $row) {
            // $num += 1 ;
          $newFolder = $folder.'/'.$row ; 
            if(is_dir($folder.'/'.$row))
            {
              $id = str_replace('/', '-', $newFolder) ;
              $id = str_replace('.', '-', $id) ;
              // $folder = $newFolder ;
        ?>
            <li id="<?php echo $id ; ?>" folder="<?php echo $folder.'/'.$row ?>" title="Click to open folder" class="file-folder" style="cursor: pointer;" id="id_<?php echo $num ; ?>"><i class="mdi mdi-folder"></i> <?php echo $row; ?></li>
        <?php
              // getFiles($newFolder) ;
            }
            elseif(is_file($folder."/".$row))
            {
        ?>
            <li title="Click to download file"><a href="folder/<?php echo $row ; ?>" download><?php echo $row ; ?></a></li>
        <?php 
            }
            
        }
    echo "</ul>";
}

function getFiles($folder)
{
  $thatfolder = "" ;
    echo "<div class='basicTree'><ul class='nested' style='list-style: none;'>";
        // $num = 0 ;
    if(!is_dir($folder))
    {
      echo "<br> <div class='text-center col-6 h4 alrt alet-warning'>Oops This folder no longer exist in this directory!</div>";
      exit() ;
    }
        $directories = scandir($folder ,1) ;
        // echo $directories ;
        for($i=0;$i<count($directories)-2;$i++) {
            // $num += 1 ;
          $newFolder = $folder.'/'.$directories[$i] ; 
            if(is_dir($folder.'/'.$directories[$i]))
            {
              $id = str_replace('/', '-', $newFolder) ;
              $id = str_replace('.', '-', $id) ;
              // $folder = $newFolder ;
              
              // 
        ?>
            <li id="<?php echo $id ; ?>" folder="<?php echo $folder.'/'.$directories[$i] ?>" class="file-folder" style="*cursor: pointer;" id="id_<?php echo $num ; ?>"><i style="cursor: pointer;" id="folderToggle<?php echo $id ; ?>" class="fa fa-folder-open folder"></i> <?php echo $directories[$i]; ?></li>
        <?php
              getFiles($newFolder) ;
            }
            elseif(is_file($folder."/".$directories[$i]))
            {
        ?>
            <li class="" title="Click to download file"><i class="mdi mdi-file"></i> <a href="<?php echo $folder.'/'.$directories[$i] ; ?>" download><?php echo $directories[$i] ; ?></a></li>
        <?php 
            }
            
        }
        $thatfolder = explode("/", $folder) ;
        $thatfolder = $thatfolder[count($thatfolder)-1] ;
    echo "<li class='hidden'>download all files in folder <a target='_blank' href=downloader.php?file='".base64_encode($folder)."'>".$thatfolder."<a/></li></ul></div>";
}

function passwordHash($password)
{
	$pass = hash("sha256", md5($password)) ;
	return $pass ;
}

function numQuery($query)
{
	$num = mysqli_num_rows($query) ;
	return $num ;
}

function getGrade($percent)
{
  $percent = explode("%", $percent)[0] ; //substr($percent , -2) ;
  // $grade = "" ;
  switch ($percent) {
    case $percent >= 70:
      $grade = "A (Excellent)" ;
      break;
    case $percent >= 60 && $percent <= 69:
      $grade = "B (Very Good)" ;
      break;
    case $percent >= 50 && $percent <= 59:
      $grade = "C (Good)" ;
      break;
    case $percent >= 45 && $percent <= 49:
      $grade = "D (Satisfactory)" ;
      break;
    case $percent >= 40 && $percent <= 44:
      $grade = "E (Weak Pass)" ;
      break;
    case $percent >= 0 && $percent <= 39:
      $grade = "F (Failure)" ;
      break;
    
    default:
      $grade = "F" ;
      break;
  }
  if($percent == 0){ $grade = "F (Failure)" ; }
  return $grade ;
}

function over30($score , $tot)
{
  // $return = round(($score/$tot)*30) ;
  $return = ($score/$tot)*30 ;
  return $return ;
}

function getLastSeen($time , $now)
{
  // $time = $now-86300 ;
  $diff = $now - $time ;
  switch ($diff) {
    case $diff < 60:
      $return = $diff."secs" ;
      break;
    case $diff >= 60 && $diff < 3600:
      $min = floor($diff/60) ;
      $return = $min."mins" ;
      break;
    case $diff >= 3600 && $diff < 86400:
      $hr = floor($diff/3600) ;
      $return = $hr."hrs" ;
      break;
    case $diff >= 86400:
      $day = floor($diff/86400) ;
      $return = $day."days" ;
      break;
    
    default:
      $return = $diff."secs" ;
      break;
  }
  return $return ;
}

function cleanText($txt)
{
  require_once 'dbconnect.php' ;
  $con = dbconnect() ;
  return mysqli_real_escape_string($con , trim($txt)) ;
}

function cleanSpecialCharacters($string)
{
  $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
  return preg_replace('/[^A-Za-z0-9.\-]/', '' , $string); // Removes special chars.
}

function validateSignup()
{
  if(isset($_GET['status']))
  {
    $stat = cleanText($_GET['status']) ;
    switch ($stat) {
      /*case 'usernameerror':
        $reply = "* Username already exist." ;
        break;*/
      case 'success':
        $reply = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <strong>* You are almost done. Enter otp sent to your number to continue'.'</strong>
                </div>' ;
        break;
      case 'userexists':
        $reply = '<h4 class="alert alert-info text-center">User Exists</h4>' ;
        break;
      case 'usernotexist':
        $reply = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <strong>* This phone number has not been registered, you may consider signing up.</strong>
                </div>' ;
        break;
      /*case 'passworderror':
        $reply = "* Password does not match." ;
        break;*/
      
      default:
        $reply = "" ;
        // redirect("./index.php") ;
        break;
    }
  }
  else
  {
    $reply = "" ;
  }
  return $reply ;
}


function validateSmile()
{
  if(isset($_GET['status']))
  {
    $stat = cleanText($_GET['status']) ;
    switch ($stat) {
      /*case 'usernameerror':
        $reply = "* Username already exist." ;
        break;*/
      case 'success':
        $reply = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <strong>* Zip file uploaded successfully</strong>
                </div>' ;
        break;
      case 'file-move-error':
        $reply = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <strong>* Sorry! could not move the specified file(s).</strong>
                </div>' ;
        break;
      case 'file-type-error':
        $reply = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <strong>* File type not supported.</strong>
                </div>' ;
        break;
      case 'invalid-file':
        $reply = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <strong>* File type not supported.</strong>
                </div>' ;
        break;
      /*case 'passworderror':
        $reply = "* Password does not match." ;
        break;*/
      
      default:
        $reply = "" ;
        // redirect("./index.php") ;
        break;
    }
  }
  else
  {
    $reply = "" ;
  }
  return $reply ;
}

function validateLogin()
{
  if(isset($_GET['status']))
  {
    $stat = $_GET['status'] ;
    switch ($stat) {
      case 'error':
        $reply = '<div class="alert alert-warning" role="alert">
    <strong>* Invalid login details.</strong>
</div>' ;
        break;
      case 'passworderror':
        $reply = "* Incorrect Password." ;
        break;
      
      default:
        $reply = "" ;
        break;
    }
  }
  else
  {
    $reply = "" ;
  }
  return $reply ;
}

function fetcher($query)
{
	$fetch = mysqli_fetch_assoc($query) ;
  return $fetch ;
}

function redirect($page)
{
// 	header("location:".$page) ;

//   echo '<script> window.location.href="'.$page.'";</script>';
// echo "<script> window.location.assign('".$page."') ; </script>" ;
echo "<script> window.location.replace('".$page."') ; </script>" ;
// echo '<script type="text/javascript">';
        // echo 'window.location.assign("'.$page.'");';
        // echo '</script>';
        // echo '<noscript>';
        // echo '<meta http-equiv="refresh" content="0;url='.$page.'" />';
        // echo '</noscript>'; exit;
}

function getRest($rand_opt , $optgrp_arr)
{
  switch ($rand_opt) {
    case !in_array(0, $rand_opt):
            $return = $optgrp_arr[0];
        break;
    case !in_array(1, $rand_opt):
            $return = $optgrp_arr[1];
        break;
    case !in_array(2, $rand_opt):
            $return = $optgrp_arr[2];
        break;
    case !in_array(3, $rand_opt):
            $return = $optgrp_arr[3];
        break;
    
    default:
        $return = "option e";
        break;
  }
  return $return ;
}

function sendSMS($sendto, $message)
{
    if(strlen($sendto) == 11 || strlen($sendto) == 10)
    {
        if(strpos("#".$sendto,"#0") !== FALSE && strlen($sendto) <= 11) $sendto = "234" . substr($sendto,1);
        if(strpos("#".$sendto,"#0") === FALSE && strlen($sendto) == 11) $sendto = "234" . substr($sendto,1);        
    }
/*	
    $url = "http://zoracom.smsrouter.gtsmessenger.com/ws/instant.php?action=sendSMS&login=admin&password=7f1b1592"
	. "&to=" . UrlEncode($sendto)
	. "&from=" . UrlEncode("33811")
	. "&message=" . UrlEncode($message);
*/    
 //http://www.smslive247.com/http/index.aspx?cmd=sendquickmsg&owneremail=xxx&subacct=xxx&subacctpwd=xxx&message=xxx&sender=xxx&sendto=xxx&msgtype=0
    $url = "http://www.smslive247.com/http/index.aspx?"
    . "cmd=sendquickmsg"
    . "&owneremail=" . UrlEncode("niofa141@gmail.com")
    . "&subacct=" . UrlEncode("OLORUNTOBA ALO")
    . "&subacctpwd=" . UrlEncode("CASES")
    . "&message=" . UrlEncode($message)
    . "&sender=" . UrlEncode("Student Disciplinary Council")
    . "&sendto=" . UrlEncode($sendto)
    . "&msgtype=0" ;
    
//echo $url;

//showAlert($url);

    $curl_handle=curl_init();
      curl_setopt($curl_handle,CURLOPT_URL,$url);
      curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
      curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
      $buffer = curl_exec($curl_handle);
      curl_close($curl_handle);
      if (empty($buffer)){
              print "Nothing returned from url.<p>";
          return false;
      }
      else{
              print $buffer;
          
          return true;
      }
}

function sendEmail($email,$subject,$message)
{
	$sender = "Student Disciplinary Council<noreply@sdcmail.com>";
	$sent = mail($email,$subject,$message,"From: $sender"."\r\n"."Content-type: text/html; charset=iso-8859-1","-fwebmaster@".$_SERVER["SERVER_NAME"]);
	if($sent) return true;
	return false;
}



?>