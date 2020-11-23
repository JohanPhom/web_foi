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

    <title>Settings</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, WebDiP, Movie, author">
    <meta name="description" content="Page about the author">
</head>

<body>
    {include file= 'other/header.php'}

    <section id="mainContent">
        <div class="background">
            <div class="activation_box" id="setting">
                {if isset($error)}
                <div class="errors"> <img src="multimedia/croix.png" alt="cross" height="30px"> {$error}</div>
                {/if}
                {if isset($success)}
                <div class="successUpdate"><img src="multimedia/valid.png" alt="cross" height="30px">{$success}</div>
                {/if}
                <div class="setting_subbox">
                    <h1>Virtual time</h1>
                    <a href="http://barka.foi.hr/WebDiP/pomak_vremena/vrijeme.html" target="_blanck"><h2>SET TIME</h2></a>
                    <form method="POST" action="">
                
                        <input type="radio" name="format" value="json" style="width:30px;" checked>JSON<br>
                        <input type="submit" value="Save time" name="config" class="button" style="width:100px">
                        
                    </form>
                </div>
                <div class="setting_subbox">
                    <h1>Set pagination</h1>
                    <form method="POST" action="">
                        <input type="number" value="{$pagination}" style="width:40px;" name="pagination"> rows<br>
                        <input type="submit" value="Save pagination" name="config" class="button" style="width:200px">
                    </form>
                </div>
                <div class="setting_subbox">
                    <h1>Set cookie duration</h1>
                    <form method="POST" action="">
                        <input type="number" value="{$cookie_duration}" style="width:30px;" name="cookie_duration"> days<br>
                        <input type="submit" value="Save cookie time" name="config" class="button" style="width:200px">
                    </form>
                </div>
                <div class="setting_subbox">
                    <h1>Set email duration</h1>
                    <form method="POST" action="">
                        <input type="number" value="{$valid_email}" style="width:30px;" name="valid_email"> hours<br>
                        <input type="submit" value="Save time" name="config" class="button" style="width:200px">
                    </form>
                </div>
                <div class="setting_subbox">
                    <h1>Set time login</h1>
                    <form method="POST" action="">
                        <input type="number" value="{$log_time}" style="width:30px;" name="log_time"> hours<br>
                        <input type="submit" value="Save time" name="config" class="button" style="width:200px">
                    </form>
                </div>
                <div class="setting_subbox">
                    <h1>Set points for</h1>
                    <form method="POST" action="">
                        <label for="pts_question">Question : </label>
                        <input type="number" value="{$point_array['question']}" style="width:30px;" name="pts_question"> points<br>
                        <label for="pts_answer">Answer : </label>
                        <input type="number" value="{$point_array['answer']}" style="width:30px;" name="pts_answer"> points<br>
                        <input type="submit" value="Save points" name="config" class="button" style="width:200px">
                    </form>
                </div>
            </div>
        </div>

    </section>
    <footer>
        <div class="wrapper">
            <div>
                About us<br><br>
                <div><a class="link_footer" href="index.html">Contact us</a></div>
                <div><a class="link_footer" href="index.html">Futur project</a></div>
                <div><a class="link_footer" href="index.html">Partnership</a></div>

            </div>
            <div id="middle_column">
                Social Network<br><br>
                <div><a class="link_footer" href="index.html">Facebook</a></div>
                <div><a class="link_footer" href="index.html">Instagram</a></div>
                <div><a class="link_footer" href="index.html">Snapchat</a></div>
            </div>
            <div>
                Navigation<br><br>
                <div><a class="link_footer" href="forms/login.html">Login</a></div>
                <div><a class="link_footer" href="forms/registration.html">Registration</a></div>
                <div><a class="link_footer" href="index.html">Form</a></div>
            </div>
            <div id="icon_box">
                <a class="link_footer" href="index.html"><img src="multimedia/facebook.png" alt="Facebook Logo" height="30"></a>
                <a class="link_footer" href="index.html"><img src="multimedia/instagram.png" alt="Instagram Logo" height="30"></a>
                <a class="link_footer" href="index.html"><img src="multimedia/gmail.png" alt="Gmail Logo" height="30"></a>
                <a class="link_footer" href="index.html"><img src="multimedia/twitter.png" alt="Twitter Logo" height="30"></a>

            </div>
        </div>
        <div><br>
            <address>
                Contact me : <a class="link_footer" href="mailto:jphomsouv@foi.hr">Phomsouvandara Johan</a>
            </address>
            <small>&copy; 2020 M. Phomsouvandara</small><br>

            <a class="link_footer" href="https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2FCSS%2Fjphomsouv.css&profile=css3svg&usermedium=all&warning=1&vextwarning=&lang=fr"><img src="multimedia/CSS3.png" alt="CSS3 LOGO" height="80"></a>
            <a class="link_footer" href="https://www.foi.unizg.hr/"><img src="multimedia/foi-logo.jpg" alt="FOI LOGO" height="70"></a>
            <a class="link_footer" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2Findex.html"><img src="multimedia/HTML5.png" alt="HTML5 LOGO" height="70"></a>
        </div>
    </footer>
</body>

</html>