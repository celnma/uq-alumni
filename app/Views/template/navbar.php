<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>UQ Alumni</title>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <!--Boxicons for icons-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">

    <style>
        .sidebar{
            width:230px;
            height:100vh;
            background-color:var(--sidebar-color);
            z-index: 1000;
            padding: 10px 10px;
        }
        .sidebar li {
            margin-top: 10px;
            list-style: none;
            display: flex;
            align-items: center;
            height: 35px;
        } 
        a {
            color:#695CFE;
        }
        .nav-item a {
            color:#363359
            /*color:#707070; */
        }
        .nav-item a:hover{
            color:#695CFE
        }
        .nav-item i {
            font-size:22px
        }
        .nav-item .nav-text {
            font-weight:500;
        }
    </style>


</head>

<body> 

<div class="container-fluid">
    <div class="row">
        <div class="col-2 m-0 p-0">
            <nav class="sidebar position-fixed">
            <header class="row mx-auto p-3 px-3">
                <span class="h5">UQ Alumni</span>
            </header>
            <div class="menu-bar mt-3">
                <ul>
                    <li class="nav-item my-3">
                        <a class= "nav-link" href=<?php echo base_url('dashboard') ?>>
                            <i class="bx bx-home-alt align-text-top icon px-1"></i>
                            <span class="text align-text-bottom nav-text px-2">Job Board</span>
                        </a>
                    </li>
                    <li class="nav-item my-3">
                        <a class= "nav-link" href=<?php echo base_url('favourites') ?>>
                                <i class="bx bx-star align-text-top icon px-1"></i>
                                <span class="text align-text-bottom nav-text px-2">Favourites</span>
                            </a>
                        </li>
                        <li class="nav-item my-3">
                            <a class= "nav-link" href=<?php echo base_url('career') ?>>
                                <i class="bx bx-laptop align-text-top icon px-1"></i>
                                <span class="text align-text-bottom nav-text px-2">Applications</span>
                            </a>
                        </li>
                        <li class="nav-item my-3">
                            <a class= "nav-link" href=<?php echo base_url('events') ?>>
                                <i class="bx bx-purchase-tag align-text-top icon px-1"></i>
                                <span class="text align-text-bottom nav-text px-2">Offers</span>
                            </a>
                        </li>
                        <li class="nav-item my-3">
                            <a class= "nav-link" href=<?php echo base_url('login/logout') ?>>
                                <i class="bx bx-log-out align-text-top icon px-1" id="log_out"></i>
                                <span class="text align-text-bottom nav-text px-2">Logout</span>
                            </a>
                        </li>
                        <li class="nav-item my-3">
                            <a class= "nav-link" href=<?php echo base_url('settings') ?>>
                                <i class="bx bx-cog align-text-top icon px-1" id="user"></i>
                                <span class="text align-text-bottom nav-text px-2">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
        </nav>
           
        </div>
        


