<?php
session_start();
if(!isset($_SESSION))
    header("location: ../index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../CSS/Sondage.css"/>
    <link rel="stylesheet" href="../bootstrap-3.3.5-dist/css/bootstrap.css">
    <!--<link rel="stylesheet" href="bootstrap-3.3.5-dist\css/bootstrap.min.css">-->
    <link rel="stylesheet" href="../bootstrap-3.3.5-dist/css/bootstrap-theme.min.css">
    <!--<link rel="stylesheet" href="bootstrap-3.3.5-dist\css/bootstrap-theme.css">-->
    <link href="data:text/css;charset=utf-8," data-href="../dist/css/bootstrap-theme.min.css" rel="stylesheet"
          id="bs-theme-stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/blog.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">

</head>
<body>
<div>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="ClientHome.php">Survey Baker</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">Survey<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="ClientHome.php">Create</a></li>
                            <li><a href="EnterSurvey.php">Fill Survey</a></li>
                            <li><a href="DisplaySurvey.php">Display</a></li>
                        </ul>
                    </li>
                    <li><a href="SignOut.php">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="min-height: 100%;">
    <form class="SondageAddQuestion" action="AddSurvey.php" method="post">
        <div>
            <div class="panel-body">
                <h2 class="WhiteHeader">Survey Creation</h2>
                <ul id="Question">

                </ul>
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="button"></button>
            </div>
        </div>
    </form>
</div>

<div></div>
<div class="blog-footer">
    <p>Source can be found on <a href="http://github.com/dragonmost/Sondage">GitHub</a> by Sam Baker.</p>

    <p>
        <a href="#">Back to top</a>
    </p>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
</body>
</html>