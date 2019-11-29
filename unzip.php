<?php
include_once "php/settings.php" ;
// echo $_SESSION['user_id'];
$pageTitle = "Upload File" ;
include_once 'includes/head.php' ;
// include_once 'php/config.php' ;

?>

    <body>


        <!-- Navigation Bar-->
        <?php include_once "includes/header.php" ; ?>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li>
                                        <a href="#">Dre-Files</a>
                                    </li>
                                    <!-- <li>
                                        <a href="#">Forms</a>
                                    </li> -->
                                    <li class="active">
                                        Extract FIles
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">Extract Files</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="row">



                                        <?php

// echo mime_content_type('tofolder/') . "</br>"; 

/*$thelist ="" ;
  if ($handle = opendir('uploads/')) {
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
        $thelist .= '<a href="'.$file.'">'.$file.'</a><br>';
      }
    }
    closedir($handle);
  }*/


if(!isset($_GET['file']))
{
	header("location: download.php") ;
}
else
{
	$file = "uploads/".$_GET['file'] ;
	$fileOrigin = $_GET['file'] ;
	// echo $file;
	$newFolderPath = explode("_", $_GET['file']) ;
	$newFolderPath = "folder/".$newFolderPath[0]."/".explode(".zip", $newFolderPath[1])[0]."-zip" ;
	// echo $newFolderPath;
	// die() ;
	$zip = new ZipArchive ;
	$file = $zip->open($file) ;
	if($file === TRUE)
	{
		$zip->extractTo($newFolderPath) ;
		
		$zip->close($file) ;
		include_once "php/dbconnect.php" ;
		$connect = dbconnect() ;
		$query = mysqli_query($connect , "UPDATE files SET status = '1' WHERE filename = '$fileOrigin' ") ;
		if($query)
		{
			echo "File Extraction Completed!";
		}
		else
		{
			echo "Could not extract files";
		}
	}
	else
	{
		echo "Could not extract files";
	}

}

?>



                                    </div><!-- end row -->

                                </div>

                            </div>
                            <!-- end row -->


                        </div> <!-- end card-box -->
                    </div><!-- end col-->

                </div>
                <!-- end row -->



                <!-- Footer -->
                <?php include_once "includes/footer.php" ; ?>
                <!-- End Footer -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <!-- jQuery  -->
        <?php include_once "includes/scripts.php" ; ?>

    </body>
</html>




