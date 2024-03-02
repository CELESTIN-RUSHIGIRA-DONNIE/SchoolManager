<?php
    session_start();
    include('config/dbcon.php')
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Donnie dashboard</title>

        <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
        
        <link href="assets/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css" />
        

        <style>
            a{
                text-decoration: none;
                color: black;
            }
            a:hover
            {
                text-decoration: none;
            }
        </style>
    </head>

    <body class="sb-nav-fixed">
        <?php include('includes/navbar-top.php'); ?>
        
        <div id="layoutSidenav">
             
        <?php include('includes/sidebar.php'); ?>

        <div id="layoutSidenav_content">
            <main>