<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

?>

<html lang="fr">

<head>
    <link rel="styleSheet" type="text/css" href="CSS/jphomsouv.css">
    <link rel="styleSheet" type="text/css" href="CSS/jphomsouv_responsive.css">
    <link rel="styleSheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="styleSheet" type="text/css" href="CSS/jphomsouv_print.css">


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="javascript/jphomsouv_jquery.js"></script>
    <script type="text/javascript" src="javascript/registration_jquery.js"></script>

    <title>Registration</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, Registration, Movie">
    <meta name="description" content="Registration page">
</head>


<body>
    {include file='other/header.php'}

    <section id="mainContent">
        <div class="background">
            <div class="login_box registration_box">
                <div class="center_title center_title_registration">REGISTRATION</div><br><br>
                {if isset($successUpdate)}
                    <div class="successUpdate">{$successUpdate}</div>
                {/if}
                {if isset($failUpdate)}
                    <div class="errors">{$failUpdate}</div>
                {/if}
                <div id="form_box" class="form_registration_box">
                    <form id="form" action="index.php?page=registration" method="POST">
                        <label for="genre">Male</label>
                        <input class="radio" id="male" type="radio" name="genre" value="male">
                        <label for="genre">Female</label>
                        <input class="radio" id="female" type="radio" name="genre" value="female"><br><br>

                        <label for="name">Name*</label><br>
                        <input type="text" id="name"  name="name" placeholder="John"><br>

                        <label for="username">Surname*</label><br>
                        <input type="text" id="surname"  name="surname" placeholder="Smith" ><br>

                        <label for="phone">Phone number:</label><br>
                        <input type="phone" id="phone" name="phone" placeholder="0604173652..."><br>
                        
                        <label for="email">E-mail:</label><br>
                        <input type="email" id="email"  name="email" placeholder="john.SmithXX@gmail.com">
                        <img id="icone_email" class="noDisplay"  src="multimedia/profil.png" alt="profil image" height="15" ><br>

                        <label for="username">Username*</label><br>
                        <input type="text"  id="username" name="username" placeholder="John35520">
                        <img id="icone_login" class="noDisplay" src="multimedia/profil.png" alt="profil image" height="15" ><br>
                        <input type="button" id="updateButton" name="submit" class="button noDisplay" value="Enable update">
                        </button><br>

                        <label for="password">Password*</label><br>
                        <input type="password" id="password"  name="password" placeholder="7fgdq5qdg5"><br>

                        <label for="cpassword">Confirm your password*</label><br>
                        <input type="password" id="cpassword"  name="cpassword"><br><br>

                        
                        <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LcrSAAVAAAAAKOsXKiEHE7Y0-TnoLJr3RBAmGev"></div><br>

                        <button class="button" type="submit" id="submit" name="submit" value="submit" disabled>Submit
                        </button>
                        <button class="button" type="reset" value="Reset">Reset</button>
                    </form>

                    <div id="right_side">
                        Register with
                        <br><a id="fb" href="https://www.facebook.com/"><img src="multimedia/facebook.png" alt="facebook logo" height="80"></a>
                        <a id="google" href="https://accounts.google.com/login/signinchooser?hl=fr&flowName=GlifWebSignIn&flowEntry=ServiceLogin"><img src="multimedia/google.png" alt="google logo" height="90"></a>
                        <br><br><br>
                        <div id="fb_res" class="res">
                            facebook account
                        </div>
                        <div id="google_res" class="res">
                            Google account
                        </div><br>
                        Exemple of user :<br><br>Email : johan@gmail.com<br>Username : jojo<br><br>
                        <div id="errorEmail" class="errors noDisplay"></div><br>
                        <div id="errorUsername" class="errors noDisplay"></div>
                        <br /><br /><br /><br />
                    </div>
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
            <a class="link_footer" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2Fforms%2Fregistration.php"><img src="multimedia/HTML5.png" alt="HTML5 LOGO" height="70"></a>
        </div>
    </footer>
</body>

</html>