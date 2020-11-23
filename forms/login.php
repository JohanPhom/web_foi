<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html lang="fr">

<head>
    <link rel="styleSheet" type="text/css" href="CSS/jphomsouv.css">
    <link rel="styleSheet" type="text/css" href="CSS/jphomsouv_responsive.css">
    <link rel="styleSheet" media="print" href="CSS/jphomsouv_print.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="javascript/jphomsouv_jquery.js"></script>
    <script type="text/javascript" src="javascript/jphomsouv.js"></script>
    <script type="text/javascript" src="javascript/login.js"></script>

    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, Login, Movie">
    <meta name="description" content="Login page">
</head>

<body>
    
    {include file='other/header.php'}

    <section id="mainContent">
        <div class="background">
            {if isset($error)}
                <div class="errors">{$error}</div>
            {/if}
            <div class="login_box">
                <div class="center_title">LOGIN</div><br><br><br>
                <div id="form_box">
                    <form id="loginForm" action="index.php?page=login" method="POST">
                        <label for="username">Username*</label><br>
                        <input type="text" {$errorU} id="username" name="username" placeholder="John"><br>
                        <label for="password">Password*</label><br>
                        <input type="password" {$errorP} id="password" name="password" placeholder="7fgdq5qdg5"><br><br>
                        <input type="checkbox" id="remember_user" class="radio" name="remember_user"> Remember me 
                        <br>
                        {if $errorU != '' || $errorP != ''}<div style="color:red;margin-bottom:20px;">Username or password invalid</div>{/if}
                        <button id="submit_login" type="submit" class="button" value="Submit">Submit</button>
                        <button type="reset" class="button" value="Reset">Reset</button><br>
                        <a href="index.php?page=forgotten">Forgotten password</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="wrapper">
            <div>
                About us<br><br>
                <div><a class="link_footer" href="index.php">Contact us</a></div>
                <div><a class="link_footer" href="index.php">Futur project</a></div>
                <div><a class="link_footer" href="index.php">Partnership</a></div>

            </div>
            <div id="middle_column">
                Social Network<br><br>
                <div><a class="link_footer" href="index.php">Facebook</a></div>
                <div><a class="link_footer" href="index.php">Instagram</a></div>
                <div><a class="link_footer" href="index.php">Snapchat</a></div>
            </div>
            <div>
                Navigation<br><br>
                <div><a class="link_footer" href="forms/login.php">Login</a></div>
                <div><a class="link_footer" href="forms/registration.php">Registration</a></div>
                <div><a class="link_footer" href="index.php">Form</a></div>
            </div>
            <div id="icon_box">
                <a class="link_footer" href="index.php"><img src="multimedia/facebook.png" alt="Facebook Logo" height="30"></a>
                <a class="link_footer" href="index.php"><img src="multimedia/instagram.png" alt="Instagram Logo" height="30"></a>
                <a class="link_footer" href="index.php"><img src="multimedia/gmail.png" alt="Gmail Logo" height="30"></a>
                <a class="link_footer" href="index.php"><img src="multimedia/twitter.png" alt="Twitter Logo" height="30"></a>

            </div>
        </div>
        <div><br>
            <address>
                Contact me : <a class="link_footer" href="mailto:jphomsouv@foi.hr">Phomsouvandara Johan</a>
            </address>
            <small>&copy; 2020 M. Phomsouvandara</small><br>

            <a class="link_footer" href="https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2FCSS%2Fjphomsouv.css&profile=css3svg&usermedium=all&warning=1&vextwarning=&lang=fr"><img src="multimedia/CSS3.png" alt="CSS3 LOGO" height="80"></a>
            <a class="link_footer" href="https://www.foi.unizg.hr/"><img src="multimedia/foi-logo.jpg" alt="FOI LOGO" height="70"></a>
            <a class="link_footer" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2Fforms%2Flogin.php"><img src="multimedia/HTML5.png" alt="HTML5 LOGO" height="70"></a>
        </div>
    </footer>
</body>

</html>