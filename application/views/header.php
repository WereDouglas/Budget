<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BUDGET MASTER</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.4 -->
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url(); ?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>css/mine.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>css/mine.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <?php

        function allowed($sessdata, $action) {

            return (strpos($sessdata, $action) == TRUE);
        }

        $see = $this->session->userdata('views');
        ?>
    </head>
    <body class="skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="container">

            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <img height="30px" width="40px" src="<?php echo base_url(); ?>images/logo311.png" class="img-circle" alt="logo" />

                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <?php if ($this->session->userdata('department') == "" && $this->session->userdata('unit') == "") { ?> 
                                <!-- Notifications: style can be found in dropdown.less -->
                                <li class="dropdown notifications-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-bell-o"></i>
                                        <span class="label label-warning"><?php echo count($inactive) ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">You have <?php echo count($inactive) ?> users pending activation</li>
                                        <li>
                                            <!-- inner menu: contains the actual data -->
                                            <ul class="menu">
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-users text-aqua"></i> 
                                                        <?php
                                                        foreach ($inactive as $key) {
                                                            echo $key->name .' '.$key->department. '<br>';
                                                        }
                                                        ?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>                                       
                                    </ul>
                                </li>
                                <!-- Tasks: style can be found in dropdown.less -->
                                <li class="dropdown tasks-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-flag-o"></i>
                                        <span class="label label-danger"><?php echo count($pending) ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">You have <?php echo count($pending) ?> budgets for review and approval</li>
                                        <li>
                                            <!-- inner menu: contains the actual data -->
                                            <ul class="menu">
                                               <?php
                                                        foreach ($pending as $key) {
                                                            echo $key->submitted .' '.$key->unit. '<br>';
                                                        }
                                                        ?>
                                            </ul>
                                        </li>
                                        <li class="footer">
                                            <a href="#">View all tasks</a>
                                        </li>
                                    </ul>
                                </li>

                            <?php } ?>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php if ($this->session->userdata('image') == "") { ?>                                                    
                                        <img class="user-image" alt="image"  src="<?= base_url(); ?>images/placeholder.jpg">

                                    <?php } else { ?>
                                        <img src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('image'); ?>" class="user-image" alt="Image" />
                                    <?php } ?>	
                                    <span class="hidden-xs"> <?php echo $this->session->userdata('name'); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <?php if ($this->session->userdata('image') == "") { ?>                                                    
                                            <img class="img-circle" alt="image"  src="<?= base_url(); ?>images/placeholder.jpg">

                                        <?php } else { ?>
                                            <img src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('image'); ?>" class="img-circle" alt="Image" />
                                        <?php } ?>   <p>
                                            <?php echo $this->session->userdata('email'); ?>
                                            <small> <?php echo $this->session->userdata('created'); ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url() . "index.php/login/"; ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php if ($this->session->userdata('image') == "") { ?>                                                    
                                <img  alt="image"  src="<?= base_url(); ?>images/placeholder.jpg">

                            <?php } else { ?>
                                <img src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('image'); ?>"  alt="Image" />
                            <?php } ?>

                        </div>
                        <div class="pull-left info">
                            <p>  <?php echo $this->session->userdata('name'); ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..." />
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <?php if ($this->session->userdata('department') == "") { ?>   
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/budget/tabular"; ?>">
                                    <i class="fa fa-circle-o"></i> <span>Add Budget</span> 
                                </a>
                            </li>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/consolidate/"; ?>">
                                    <i class="fa fa-circle-o"></i> <span>Consolidated tabular reports</span>              </a>
                            </li>

                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/grid/summary"; ?>">
                                    <i class="fa fa-circle-o"></i> <span>Budget Summary</span>              </a>
                            </li>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/budget/grid"; ?>">
                                    <i class="fa fa-circle-o"></i> <span>Manage Budgets</span>              </a>
                            </li>

                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/period"; ?>">
                                    <i class="fa fa-th"></i> <span>New Budget Period</span>              </a>
                            </li>

                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/department/"; ?>">
                                    <i class="fa fa-circle-o text-aqua"></i> <span>Departments</span>
                                    <small class="label pull-right bg-red"><?php echo count($departments); ?></small>
                                </a>
                            </li>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/objective"; ?>">
                                    <i class="fa fa-circle-o text-aqua"></i> <span>Objectives</span>
                                    <small class="label pull-right bg-red"><?php echo count($objectives); ?></small>
                                </a>
                            </li>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/category"; ?>">
                                    <i class="fa fa-files-o"></i> <span>Budget categories</span>
                                    <small class="label pull-right bg-red"><?php echo count($categories); ?></small>
                                </a>
                            </li>

                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/rate"; ?>">
                                    <i class="fa fa-th"></i> <span>Exchange rates</span> <small class="label pull-right bg-green"><?php echo count($rates); ?></small>
                                </a>
                            </li>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/user"; ?>">
                                    <i class="fa fa-th"></i> <span>Users</span> <small class="label pull-right bg-green"><?php echo count($users); ?></small>
                                </a>
                            </li>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/role"; ?>">
                                    <i class="fa fa-th"></i> <span>Roles</span> <small class="label pull-right bg-green"><?php echo count($roles); ?></small>
                                </a>
                            </li>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/budget/summary"; ?>">
                                    <i class="fa fa-th"></i> <span>Normal Summary</span> 
                                </a>
                            </li>



                        <?php } else { ?>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/main/start"; ?>">
                                    <i class="fa fa-th"></i> <span>Start page</span> 
                                </a>
                            </li>  

                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/budget/tabular"; ?>">
                                    <i class="fa fa-th"></i> <span>Add Budget</span> 
                                </a>
                            </li>   
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/budget/all"; ?>">
                                    <i class="fa fa-th"></i> <span>View Budgets</span> 
                                </a>
                            </li>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/budget/grid"; ?>">
                                    <i class="fa fa-th"></i> <span>Manage Budgets</span>              </a>
                            </li>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/budget/summary"; ?>">
                                    <i class="fa fa-th"></i> <span>Summary</span> 
                                </a>
                            </li>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/consolidate/"; ?>">
                                    <i class="fa fa-th"></i> <span>Consolidated tabular reports</span>              </a>
                            </li>                          

                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/budget/"; ?>">
                                    <i class="fa fa-th"></i> <span>New Budget Form</span>              </a>
                            </li>

                            <!--                            <li>
                                                            <a target="frame" href="<?php echo base_url() . "index.php/consolidate/graphs"; ?>">
                                                                <i class="fa fa-th"></i> <span>Consolidated graphical reports</span>              </a>
                                                        </li>          -->
                        <?php } ?>


                        <!--              <li>
                                      <a href="../calendar.html">
                                        <i class="fa fa-circle-o text-aqua"></i> <span>Organisation profile</span>
                                        <small class="label pull-right bg-red">3</small>
                                      </a>
                                    </li>-->


<!--            <li><a href="../../documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
  <li class="header">LABELS</li>
  <li><a href="#"><i class="fa fa-users"></i> <span>Users</span></a></li>
  <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
  <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
        </div>
        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->