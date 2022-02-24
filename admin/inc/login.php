
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <link href="../css/style_login.css" rel="stylesheet" type="text/css" media="all" />
    <link href='//fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- main -->
<div class="main">
    <h1>Restaurant</h1>
    <div class="main-info">
        <div class="main-pos">
            <span></span>
        </div>
        <div class="main-info1">
            <h3>Sign In</h3>
            <form action="../control/control.php" method="post">
                <input type="hidden" name="pg" value="login">
                <input type="text" placeholder="Email" required=" " name="log">
                <input type="password" placeholder="Password" required=" " name="pass">
                <input type="submit" value="Login">
            </form>

        </div>
    </div>

</div>
<!-- //main -->
</body>
</html>