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
                <a class="navbar-brand" href="#">Survey Baker</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">Survey<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Create</a></li>
                            <li><a href="#">Complete</a></li>
                            <li><a href="#">Display</a></li>
                        </ul>
                    </li>
                    <li><a href="#signout">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="min-height: 100%;">
    <div class="row">

        <!--Centre et info-->
        <div class="wrapper">
            <div id="carousel-example-generic" class="carousel slide" data-ride="false"
                 style=" display: table-cell; float: none">
                <div class="carousel-inner panel-body" role="listbox">
                    <div class="item active">
                        <div id="SurveyTitle">
                            <label>Survey name</label> <input type="text">
                        </div>
                    </div>
                    <div class="item">
                        <img data-src="holder.js/1140x500/auto/#666:#444/text:Second slide" alt="Second slide">
                    </div>
                    <div class="item">
                        <img data-src="holder.js/1140x500/auto/#555:#333/text:Third slide" alt="Third slide">
                    </div>
                </div>
            </div>
        </div>

        <!--Side bar menu-->
        <div class="col-sm-3 col-sm-offset-3 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">

            </div>
        </div>
        <!-- /.blog-sidebar -->

    </div>
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