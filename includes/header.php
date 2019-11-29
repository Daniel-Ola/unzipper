<!-- Navigation Bar-->
<?php $getuserDet = userDet($_SESSION['user_id']) ; ?>
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <!--<a href="index.html" class="logo">-->
                            <!--Zircos-->
                        <!--</a>-->
                        <!-- Image Logo -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/logo.png" alt="" height="30">
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

                        <ul class="nav navbar-nav navbar-right pull-right">

                            <li class="dropdown navbar-c-items">
                                <a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="assets/images/happy.png" alt="user-img" class="img-circle"> </a>
                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li class="text-center">
                                        <h5>Hi, <?php

                                            if(!$getuserDet)
                                            {
                                                echo "User";
                                            }
                                            else
                                            {
                                                echo $getuserDet['username'];
                                            }

                                        ?></h5>
                                    </li>
                                    <li><a href="logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>

                            </li>
                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>
                    <!-- end menu-extras -->

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                        <?php
                            if($getuserDet['access'] == 0)
                            {
                        ?>
                                <li class="has-submenu">
                                    <a href="upload-file.php"><i class="mdi mdi-cloud-upload"></i>Upload File</a>
                                </li>

                                <li class="has-submenu">
                                    <a href="users.php"><i class="mdi mdi-account-multiple-outline"></i>Users</a>
                                </li>

                                <li class="has-submenu">
                                    <a href="uploaded.php"><i class="mdi mdi-cloud-upload"></i>Uploaded Files</a>
                                </li>
                        <?php
                            }
                            else
                            {
                        ?>
                                <li class="has-submenu">
                                    <a href="download.php"><i class="mdi mdi-cloud-download"></i>Download Files</a>
                                </li>
                        <?php
                            }
                        ?>
                            
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar