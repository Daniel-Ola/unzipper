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
                                        View Folders
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">View Folder</h4>
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
                                            $file = $_GET['file'] ;
                                            downloadAdd($_SESSION['user_id'] , $file) ;
                                            echo "Click the file you wish to download <br>";
                                            $folders = explode("_", $file) ;
                                            // echo $folders;
                                            $folder1 = $folders[0] ;
                                            $folder2 = explode(".zip", $folders[1])[0] ;
                                            $folder = "folder/".$folder1."/".$folder2."-zip" ;
                                            // echo $folder;
                                            getFiles($folder) ;
                                        ?>
                                        <!-- <div id="basicTree" >
                                            <ul>
                                                <li>Ubold
                                                    <ul>
                                                        <li data-jstree='{"opened":true}'>Assets
                                                            <ul>
                                                                <li data-jstree='{"type":"file"}'>Css</li>
                                                                <li data-jstree='{"opened":true}'>Plugins
                                                                    <ul>
                                                                        <li data-jstree='{"selected":true,"type":"file"}'>Plugin one</li>
                                                                        <li data-jstree='{"type":"file"}'>Plugin two</li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li data-jstree='{"opened":true}'>Email Template
                                                            <ul>
                                                                <li data-jstree='{"type":"file"}'>Email one</li>
                                                                <li data-jstree='{"type":"file"}'>Email two</li>
                                                            </ul>
                                                        </li>
                                                        <li data-jstree='{"icon":"md md-dashboard"}'>Dashboard</li>
                                                        <li data-jstree='{"icon":"md md-format-underline"}'>Typography</li>
                                                        <li data-jstree='{"opened":true}'>User Interface
                                                            <ul>
                                                                <li data-jstree='{"type":"file"}'>Buttons</li>
                                                                <li data-jstree='{"type":"file"}'>Cards</li>
                                                            </ul>
                                                        </li>
                                                        <li data-jstree='{"icon":"md md-my-library-books"}'>Forms</li>
                                                        <li data-jstree='{"icon":"md md-format-list-bulleted"}'>Tables</li>
                                                    </ul>
                                                </li>
                                                <li data-jstree='{"type":"file"}'>Frontend</li>
                                            </ul>
                                        </div> -->



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