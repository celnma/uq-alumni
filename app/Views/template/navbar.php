<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>UQ Alumni</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <!--Boxicons for icons-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>

<body> 

<div class="container-fluid p-0 d-flex  border">
    <nav class="sidebar border">
        <header class="row mx-auto p-2 px-3">
            <span class="h5">UQ Alumni</span>
        </header>
        <div class="menu-bar mt-2">
            <ul>
                <li class="nav-item">
                    <a class= "nav-link align-middle" href=<?php echo base_url('dashboard') ?>>
                        <i class="bx bx-home-alt icon px-1"></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class= "nav-link" href=<?php echo base_url('contact') ?>>
                        <i class="bx bx-calendar icon px-1"></i>
                        <span class="text nav-text">Events</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class= "nav-link" href=<?php echo base_url('career') ?>>
                        <i class="bx bx-laptop icon px-1"></i>
                        <span class="text nav-text">Career</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class= "nav-link" href=<?php echo base_url('events') ?>>
                        <i class="bx bx-phone icon px-1"></i>
                        <span class="text nav-text">Contact book</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class= "nav-link" href=<?php echo base_url('login/logout') ?>>
                        <i class="bx bx-log-out icon px-1" id="log_out"></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class= "nav-link" href=<?php echo base_url('settings') ?>>
                        <i class="bx bx-cog icon px-1" id="user"></i>
                        <span class="text nav-text">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main content container-fluid mt-3">
        

    
