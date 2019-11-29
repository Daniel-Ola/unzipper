<?php
include_once "php/settings.php" ;
include_once "php/dbfunctions.php" ;
$pageTitle = "Manage Users" ;
include_once 'includes/head.php' ;
$dataRead = new DataRead() ;
$allFiles = $dataRead->getAllFiles() ;//['return'] ;

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
                                        Uploaded Files
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">Uploaded Files</h4>
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

                            <table id="datatable" class="table table-striped table-bordered"><!-- datatable -->
                                <thead>
                                <tr>
                                    <th>File</th>
                                    <th>Date</th>
                                    <!-- <th>User Type</th> -->
                                    <th>Action</th>
                                    <th>Delete</th>
                                    <!-- <th>Salary</th> -->
                                </tr>
                                </thead>


                                <tbody>
                                <?php
                                    foreach ($allFiles as $row) {
                                        $filename = explode("_", $row['filename']) ;
                                        $filename = $filename[1] ;
                                        $date = $row['uploaded_on'] ;
                                        $month = date("m" , strtotime($date)) ;
                                        $day = date("d" , strtotime($date)) ;
                                        $dateObj   = DateTime::createFromFormat('!m', $month);
                                        $monthName = $dateObj->format('F'); // March
                                ?>
                                    <tr>
                                        <td><?php echo $filename ; ?></td>
                                        <td><?php echo $monthName." ".$day; ?></td>
                                        <?php
                                            if($row['status'] == 0)
                                            {
                                        ?>
                                            <td class=""><a href="unzip.php?file=<?php echo $row['filename'] ; ?>" class="btn btn-info" id="id_<?php echo $row['id'] ?>"><!-- <i class="mdi mdi-download"></i> --> Extract</a><a href="#" class="pull-right hidden"><i class="mdi mdi-check-circle-outline"> <?php echo $action; ?></i> </a></td>
                                        <?php
                                            }
                                            elseif($row['status'] == 1)
                                            {
                                        ?>
                                            <td class=""><a href="view.php?file=<?php echo $row['filename'] ; ?>" class="btn btn-info" id="id_<?php echo $row['id'] ?>"><!-- <i class="mdi mdi-eye"></i> --> View Folder</a><a href="#" class="pull-right hidden"><i class="mdi mdi-check-circle-outline"> <?php echo $action; ?></i> </a></td>
                                        <?php
                                            }
                                        ?>
                                        
                                        <td class="text-center"><a href="#" class="btn btn-danger delete-file" id="id_<?php echo $row['id'] ?>"><i class="mdi mdi-delete"></i> Delete</a></td>
                                        <!-- <td>$320,800</td> -->
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