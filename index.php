<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/Sondage.css" />
    <link rel="stylesheet" href="bootstrap-3.3.5-dist\css/bootstrap.css">
    <!--<link rel="stylesheet" href="bootstrap-3.3.5-dist\css/bootstrap.min.css">-->
    <link rel="stylesheet" href="bootstrap-3.3.5-dist\css/bootstrap-theme.min.css">
    <!--<link rel="stylesheet" href="bootstrap-3.3.5-dist\css/bootstrap-theme.css">-->
    <title>Survey</title>

</head>
<body>
<div class="container">
    <form class="form-signin" action="PHP/Connection.php" method="post">
        <div>
            <div class="panel-body">
                <h2 class="form-signin-heading">Please sign in</h2>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus, name="email">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required, name="pw">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" data-href="">Sign in</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>

<!--

<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span>

-->








