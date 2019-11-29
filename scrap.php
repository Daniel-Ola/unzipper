<?php
// include_once "php/settings.php" ;
// echo $_SESSION['user_id'];
$pageTitle = "Upload File" ;
include_once 'includes/head.php' ;
// include_once 'php/config.php' ;

?>

    <body>


        <!-- Navigation Bar-->
        <?php //include_once "includes/header.php" ; ?>
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
                                        <a href="#">Dre Files</a>
                                    </li>
                                    <!-- <li>
                                        <a href="#">Forms</a>
                                    </li> -->
                                    <li class="active">
                                        Advanced Plugins
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">Advanced Plugins</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="row scrap" id="resp">

                                        <?php require_once 'https://google.com' ?>

                                        <!-- content here -->



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
    <script type="text/javascript">
        
//         var xhr = new XMLHttpRequest();
// xhr.open("GET", "https://google.com", true);
// xhr.onreadystatechange = function() {
//   if (xhr.readyState == 4) {
//     // innerText does not let the attacker inject HTML elements.
//     document.getElementById("resp").innerText = xhr.responseText;
//   }
// }
// xhr.send();


    </script>
</html>