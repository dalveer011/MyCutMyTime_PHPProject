<?php
/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-11-25
 * Time: 5:32 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!--extra line we have to add to make it responsive bootstrap stuff-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--including bootstrap css files through cdn here-->
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <!--including my css file after because it will override some css in bootstrap-->
    <link rel="stylesheet" href="css/myCSS.css"/>
    <!--extra script we have to add to make broswer compatibility for older ie browser-->
    <!-- HTML5 shim for IE backwards compatibility -->
    <!--[if lt IE 9]>

    <![endif]-->


    <link rel="stylesheet" href="css/myCSS.css">
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>

    <script src="js/route.js"></script>
    <style>
        input[type="submit"] {
            background:none;
            border:none;
            padding:0;
            font: inherit;
        }
    </style>
