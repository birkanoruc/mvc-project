<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Responsive Admin Template</title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Birkan ORUÇ">
    <meta name="keywords" content="Admin Dashboard">

    <!-- Favicon -->
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- Choices JS -->
    <script src="/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

    <!-- Main Theme Js -->
    <script src="/assets/js/main.js"></script>

    <!-- Bootstrap Css -->
    <link href="/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="style">

    <!-- Style Css -->
    <link href="/assets/css/styles.min.css" rel="stylesheet">

    <!-- Icons Css -->
    <link href="/assets/css/icons.css" rel="stylesheet">

    <!-- Node Waves Css -->
    <link href="/assets/libs/node-waves/waves.min.css" rel="stylesheet">

    <!-- Simplebar Css -->
    <link href="/assets/libs/simplebar/simplebar.min.css" rel="stylesheet">

    <!-- Color Picker Css -->
    <link href="/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link href="/assets/libs/@simonwep/pickr/themes/nano.min.css" rel="stylesheet">

    <!-- Choices Css -->
    <link href="/assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" >

</head>

<body>

    <?php require base_path("views/admin/layouts/partials/switcher.php"); ?>

    <?php require base_path("views/admin/layouts/partials/loader.php"); ?>

    <div class="page">

        <?php require base_path("views/admin/layouts/partials/header/header.php"); ?>

        <?php require base_path("views/admin/layouts/partials/sidebar.php"); ?>

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">

                <?php require base_path("views/admin/layouts/partials/page-header.php"); ?>

                <!-- Start::row-1 -->
                <div class="row"></div>