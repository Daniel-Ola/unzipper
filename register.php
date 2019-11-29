<?php 
    $pageTitle = "Register" ;
    include_once 'includes/head.php' ;
    include_once 'php/config.php' ;
?>

    <body>

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                        <a href="index.html" class="text-success">
                                            <span><img src="assets/images/logo.png" alt="" height="36"></span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <?php echo validateSignup() ; ?>
                                    <form class="form-horizontal" action="php/actionmanager.php" method="post">

                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" name="name" type="text" required="" placeholder="Enter your name here">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" name="user_id" type="text" required="" placeholder="Enter Username/Phonenumber">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <div class="col-xs-12">
<!--                                                 <div class="checkbox checkbox-success">
                                                    <input id="checkbox-signup" type="checkbox" checked>
                                                    <label for="checkbox-signup"> -->
                                                        <a href="login.php">Login here</a>
                                                    <!-- </label>
                                                </div> -->

                                            </div>
                                        </div>

                                        <!-- <div class="form-group text-center m-t-30">
                                            <div class="col-sm-12">
                                                <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                                            </div>
                                        </div> -->

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" name="command" value="register" type="submit">Sign Up</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                                </div>
                            </div>

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->
<?php include_once "includes/scripts.php" ; ?>

    </body>
</html>