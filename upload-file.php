<?php
include_once 'php/settings.php' ;
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
                                        File Upload
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">Upload Zip file to cloud</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">



                            <div class="row m-t-50">
                                <div class="col-sm-12">
                                	
                                    <div class="demo-box p-b-0">
                                        <h4 class="m-t-0 header-title"><b>Select a file to upload</b></h4>
                                        <!-- <p class="text-muted m-b-15 font-13">
                                            You can limit the number of elements you are allowed to select via the
                                            <code>
                                                data-max-option
                                            </code>
                                            attribute. It also works for option groups.
                                        </p> -->
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="demo-box">
                                                <form id="upload_form" enctype="multipart/form-data" method="post">
                                                    <div class="form-group m-b-0">
                                                      <input type="file" class="filestyle" name="file1" id="file1" accept=".zip, .rar/*" required="" data-placeholder="No file"><br>
                                                      <input name="user" id="user" type="hidden" value="<?php echo $_SESSION['user_id'] ?>">
                                                      <input type="hidden" name="command" value="command" />
                                                  </div>
                                                  <div class="form-group m-b-0">
                                                    <input type="button" value="Upload File" class="btn btn-primary" id="submitFile" name="command" onclick="uploadFile()">
                                                </div>
                                                <br>
                                                  <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
                                                  <h3 id="status"></h3>
                                                  <p id="loaded_n_total"></p>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-md-offset-3">
                                              <div class="demo-box" id="returnDiv">
                                                    <div class="progress" style="display: none;">
                                                        <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                                            <!-- <span class="progreeFlow">0% Complete</span> -->
                                                        </div>
                                                    </div>
                                                    <span class="Doing text-info"></span>
                                                    <!-- <span class="progreeFlow pull-right text-info">0% Complete</span> -->
                                              </div>
                                        </div>

                                    </div> <!-- end row -->
                                </div> <!-- end col -->
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