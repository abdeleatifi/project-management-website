
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>singin</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style2jdid.css">

    </head>
    
    <body>
    <nav class="navbar navbar-expand navbar-dark bg-primary" id="loun"> <a href="#menu-toggle" id="menu-toggle" class="navbar-brand"><span class="navbar-toggler-icon"></span></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false"
            aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link" href="#">Home</a> </li>
                <li class="nav-item active"> <a class="nav-link" href="index.php">Projets <span class="sr-only">(current)</span></a> </li>
                <li class="nav-item"> <a class="nav-link" href="#">blabla1</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#">blabla2</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#">blabla3</a> </li>

            </ul>
            <div id="singinbutton">
                <a href="profile.php">PROFILE</a>
            </div>
            <form class="form-inline my-2 my-md-0"> </form>
        </div>

    </nav>
        <div class="login-wrap">
            <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Forgot Password</label>
                <div class="login-form">
                    <div class="sign-in-htm">
                        <form action="traitement.php" method="post">
                        <div class="group">
                            <label for="user" class="label">Username or Email</label>
                            <input id="user" name="username" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" name="code" type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign In">
                        </div>
                        <div class="hr"></div>
                        </form>
                    </div>
                    <form action="traitement32.php" method="post">
                    <div class="for-pwd-htm">
                        <div class="group">
                            <label for="user" class="label">Username or Email</label>
                            <input id="user" name="userfor" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">New Password</label>
                            <input id="passfor" name="codefor" type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Reset Password">
                        </div>
                        <div class="hr"></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <footer id="copyright-agileinfo">
            <p class="copyright-agileinfo"> &copy; 2019 FSTm </p>
        </footer>
    
    </body>
