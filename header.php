<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="http://www.thesoftwareguy.in/favicon.ico" type="image/x-icon" />
        <meta name="author" content="Shahrukh Khan - thesoftwareguy.in">
        <meta name="description" content="Simple shopping list using PHP and Azure SQL">
        <title>Simple Shopping List using PHP and Azure SQL</title>

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap-cosmo.css" rel="stylesheet">
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="bootstrap/js/html5shiv.js"></script>
          <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
        
        <link href="style.css" rel="stylesheet">

        <?php //include("../res-ads-analy/google_analytics.html"); ?>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery-1.10.2.min.js"></script>
    </head>
    <body>
        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="https://app301.azurewebsites.net/webdev/"><span class="glyphicon glyphicon-home"></span> APP 301 - Shopping List</a>
                </div>
            </div>
        </div>

        <div class="container mainbody">
            <div class="col-lg-12" style="margin:0 auto;padding:10px 0; clear:both;">
                <?php //include("../res-ads-analy/ads728-90.html"); ?>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <?php if ($ERROR_MSG <> "") { ?>
                    <div class="alert alert-dismissable alert-<?php echo $ERROR_TYPE ?>">
                        <button data-dismiss="alert" class="close" type="button">x</button>
                        <p><?php echo $ERROR_MSG; ?></p>
                    </div>
                <?php } ?>
            </div>