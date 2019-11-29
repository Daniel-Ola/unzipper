<?php
include_once "php/settings.php" ;
include_once "php/dbfunctions.php" ;
$pageTitle = "Manage Users" ;
include_once 'includes/head.php' ;
$dataRead = new DataRead() ;
$allUsers = $dataRead->getAllUsers() ;//['return'] ;

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
                                        All Users
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">All Users</h4>
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
                                    <th>Name</th>
                                    <th>Login ID</th>
                                    <th>User Type</th>
                                    <th>Action</th>
                                    <!-- <th>Start date</th>
                                    <th>Salary</th> -->
                                </tr>
                                </thead>


                                <tbody>
                                <?php
                                    foreach ($allUsers as $row) {
                                        $type = $row['access'] ;
                                        if($type == 1):
                                            $type = "User" ;
                                            $action = "Make Admin" ;
                                        elseif($type == 0):
                                            $type = "Admin" ;
                                            $action = "Make User" ;
                                        endif;
                                ?>
                                    <tr>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['user_id']; ?></td>
                                        <td><?php echo $type; ?></td>
                                        <td class="text-center"><a href="#" class="btn btn-danger delete-user" id="id_<?php echo $row['id'] ?>"><i class="mdi mdi-delete"></i> Delete</a><a href="#" id="user_<?php echo $row['id'] ; ?>" class="pull-right btn btn-primary toggle-user" user-type=<?php echo $row['access']; ?>><!-- <i class="mdi mdi-check-circle-outline"> --> <?php echo $action; ?></i> </a></td>
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