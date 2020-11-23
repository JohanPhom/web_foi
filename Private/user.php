<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="fr">

<head>
    <link rel="styleSheet" type="text/css" href="../CSS/jphomsouv.css">
    <link rel="styleSheet" type="text/css" href="../CSS/jphomsouv_responsive.css">
    <link rel="styleSheet" media="print" href="../CSS/jphomsouv_print.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../javascript/listPassword_jquery.js"></script>

    <title>Password List</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, WebDiP, FanClub, User password">
    <meta name="description" content="List users and password">
</head>

<header class="header_soft">
    <a id="logo_header" class="header_object" href="../index.php"><img src="../multimedia/logo.png" alt="SITE LOGO" height="50"></a>
    <h1 id="header_title">The fan club web site</h1>
    <div id="search">
        <form class="rechercher" method="GET">
            <input type="search" id="search_button" name="search" placeholder="Search">
            <button class="button" id="box_loupe" type="submit">Q</button>
        </form>
    </div>
    <div id="userType">
            Administrator
    </div>
    <div id="sign_out">
        <a href="../index.php?destroy=1">
            <h1>Sign out</h1>
        </a>
    </div>
</header>

<nav>
    <div id="normal_nav">
        <ul>
            <a href="../index.php">
                <li>Home</li>
            </a>
            <a href="../index.php?page=login">
                <li>Login</li>
            </a>

            <a href="../index.php?page=registration">
                <li>Register</li>
            </a>
            
            <a href="../index.php?page=author">
                <li>Author</li>
            </a>
            <a href="../index.php?page=forum">
                <li>Forum</li>
            </a>
        </ul>
    </div>
</nav>

<body>

    <section id="mainContent">
        <div class="background">
            <div id="tableGenerated">
                    
            </div>
        </div>

    </section>
    <footer>
        <div class="wrapper">
            <div>
                About us<br><br>
                <div><a class="link_footer" href="../index.php">Contact us</a></div>
                <div><a class="link_footer" href="../index.php">Futur project</a></div>
                <div><a class="link_footer" href="../index.php">Partnership</a></div>

            </div>
            <div id="middle_column">
                Social Network<br><br>
                <div><a class="link_footer" href="../index.php">Facebook</a></div>
                <div><a class="link_footer" href="../index.php">Instagram</a></div>
                <div><a class="link_footer" href="../index.php">Snapchat</a></div>
            </div>
            <div>
                Navigation<br><br>
                <div><a class="link_footer" href="forms/login.html">Login</a></div>
                <div><a class="link_footer" href="forms/registration.html">Registration</a></div>
                <div><a class="link_footer" href="../index.php">Form</a></div>
            </div>
            <div id="icon_box">
                <a class="link_footer" href="../index.php"><img src="../multimedia/facebook.png" alt="Facebook Logo" height="30"></a>
                <a class="link_footer" href="../index.php"><img src="../multimedia/instagram.png" alt="Instagram Logo" height="30"></a>
                <a class="link_footer" href="../index.php"><img src="../multimedia/gmail.png" alt="Gmail Logo" height="30"></a>
                <a class="link_footer" href="../index.php"><img src="../multimedia/twitter.png" alt="Twitter Logo" height="30"></a>

            </div>
        </div>
        <div><br>
            <address>
                Contact me : <a class="link_footer" href="mailto:jphomsouv@foi.hr">Phomsouvandara Johan</a>
            </address>
            <small>&copy; 2020 M. Phomsouvandara</small><br>

            <a class="link_footer" href="https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2FCSS%2Fjphomsouv.css&profile=css3svg&usermedium=all&warning=1&vextwarning=&lang=fr"><img src="../multimedia/CSS3.png" alt="CSS3 LOGO" height="80"></a>
            <a class="link_footer" href="https://www.foi.unizg.hr/"><img src="../multimedia/foi-logo.jpg" alt="FOI LOGO" height="70"></a>
            <a class="link_footer" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2Findex.html"><img src="../multimedia/HTML5.png" alt="HTML5 LOGO" height="70"></a>
        </div>
    </footer>
</body>

</html>