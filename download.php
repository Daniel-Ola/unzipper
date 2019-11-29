<?php
include_once "php/settings.php" ;
include_once "php/dbfunctions.php" ;
$pageTitle = "Manage Users" ;
include_once 'includes/head.php' ;
$dataRead = new DataRead() ;
$allFiles = $dataRead->getAllFolders() ;//['return'] ;

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
                                    <li class="active">
                                        Download Files
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">Download Files</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b></b></h4>
                            <!-- <p class="text-muted font-13 m-b-30">
                                DataTables has most features enabled by default, so all you need to do to use it with
                                your own tables is to call the construction function: <code>$().DataTable();</code>.
                            </p> -->

                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>File</th>
                                    <!-- <th>Login ID</th> -->
                                    <!-- <th>User Type</th> -->
                                    <th>Action</th>
                                    <!-- <th>Start date</th>
                                    <th>Salary</th> -->
                                </tr>
                                </thead>


                                <tbody>
                                <?php
                                    foreach ($allFiles as $row) {
                                        $filename = explode("_", $row['filename']) ;
                                        $filename = $filename[1] ;
                                ?>
                                    <tr>
                                        <td><?php echo $filename ; ?></td>
                                        <td class=""><a href="view.php?file=<?php echo $row['filename'] ; ?>" class="btn btn-info" id="id_<?php echo $row['id'] ?>">View Folder</a><a href="#" class="pull-right hidden"><i class="mdi mdi-check-circle-outline"> <?php echo $action; ?></i> </a></td>
                                        <!-- <td>2011/04/25</td>
                                        <td>$320,800</td> -->
                                    </tr>
                                <?php
                                    }
                                ?>
                                
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end row -->



                <!-- Footer -->
                <?php include_once "includes/footer.php" ; ?>
                <!-- End Footer -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <!-- jQuery  -->
        <?php
            include_once "includes/scripts.php" ;
            include_once "includes/datatable.php" ;
        ?>

    </body>
</html>