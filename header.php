<?php
header("Access-Control-Allow-Origin: *");
session_start();
if(!isset($_SESSION['tokenSession'][0])){ header('location: login.php'); }

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Business Customer</title>
    <meta name="description" content="Business Customer">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="images/globaltel_circles_original.png">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>



<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="images/logo-white.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="images/globaltel_circles_white.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.php"> <i class="menu-icon fa fa-home"></i>Home </a>
                </li>
<!--                <h3 class="menu-title">Business lists</h3>-->
<!--                <li class="menu-item-has-children dropdown">-->
<!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Customers</a>-->
<!--                    <ul class="sub-menu children dropdown-menu">-->
<!--                        <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>-->
<!--                        <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>-->
<!--                        <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>-->
<!--                        <li><i class="fa fa-share-square-o"></i><a href="ui-social-buttons.html">Social Buttons</a></li>-->
<!--                        <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>-->
<!--                        <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>-->
<!--                        <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>-->
<!--                        <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>-->
<!--                        <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>-->
<!--                        <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>-->
<!--                        <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Lists</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="tables-data.php">Customer lists</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</aside>

<div id="right-panel" class="right-panel">

    <header id="header" class="header">
        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="images/globaltel_circles_original.png" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" id="customers" href="#"><i class="fa fa-user"></i> </a>

                        <a class="nav-link" id="logout" href="#"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>

    </header>
