<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-04 16:43:04
  from 'D:\Wamp64\www\homework_4\other\multimedia.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eb04618151b19_27903019',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a33f4b662cef25b7acd39d30ac80875952225e61' => 
    array (
      0 => 'D:\\Wamp64\\www\\homework_4\\other\\multimedia.php',
      1 => 1588610579,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:other/header.php' => 1,
  ),
),false)) {
function content_5eb04618151b19_27903019 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
    <?php echo '<script'; ?>
 type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="javascript/jphomsouv_jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="javascript/jphomsouv.js"><?php echo '</script'; ?>
>

    <title>Multimedia</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, Multimedia, Movie">
    <meta name="description" content="Best teaser and best animation choosen by users">
</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender('file:other/header.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <section id="mainContent">
        <div class="background">
            <div class="best_movie">
                Top 3 trailer<br /><br />
                <div>
                    <p class="description">Avengers : Endgame<br /><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quia vero repellat accusantium obcaecati asperiores, quae earum ratione? Quia perferendis fugit, earum cum fuga dolor aliquid magnam odio nobis consectetur velit minima sapiente, eius animi maiores a ut molestias nihil, sunt qui beatae esse! Mollitia saepe autem deserunt praesentium tempora!</p>
                    <iframe class="movie left" width="600" height="300" src="https://www.youtube.com/embed/TcMBFSGVi1c" allowfullscreen></iframe><br />
                </div>
                <div>
                    <iframe width="600" height="300" src="https://www.youtube.com/embed/zSWdZVtXT7E" allowfullscreen></iframe>
                    <p class="description">Interstellar<br /><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quia vero repellat accusantium obcaecati asperiores, quae earum ratione? Quia perferendis fugit, earum cum fuga dolor aliquid magnam odio nobis consectetur velit minima sapiente, eius animi maiores a ut molestias nihil, sunt qui beatae esse! Mollitia saepe autem deserunt praesentium tempora!</p>
                </div>
                <div>
                    <p class="description">The hobbit : The desolation of Smog<br /><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quia vero repellat accusantium obcaecati asperiores, quae earum ratione? Quia perferendis fugit, earum cum fuga dolor aliquid magnam odio nobis consectetur velit minima sapiente, eius animi maiores a ut molestias nihil, sunt qui beatae esse! Mollitia saepe autem deserunt praesentium tempora!</p>
                    <iframe width="600" height="300" src="https://www.youtube.com/embed/OPVWy1tFXuc" allowfullscreen></iframe>
                </div>
            </div>
            <div class="best_movie"><br /><br />
                Top 3 animations viewers<br /><br />
                <div>
                    <video preload="none" controls width="600" height="300">
                        <source src="multimedia/Intro.mp4">
                    </video>
                    <p class="description">1st best animation<br /><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quia vero repellat accusantium obcaecati asperiores, quae earum ratione? Quia perferendis fugit, earum cum fuga dolor aliquid magnam odio nobis consectetur velit minima sapiente, eius animi maiores a ut molestias nihil, sunt qui beatae esse! Mollitia saepe autem deserunt praesentium tempora!</p>
                </div>
                <div>
                    <p class="description">2nd best animation<br /><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quia vero repellat accusantium obcaecati asperiores, quae earum ratione? Quia perferendis fugit, earum cum fuga dolor aliquid magnam odio nobis consectetur velit minima sapiente, eius animi maiores a ut molestias nihil, sunt qui beatae esse! Mollitia saepe autem deserunt praesentium tempora!</p>
                    <video preload="none" controls width="600" height="300">
                        <source src="multimedia/Cloud.mp4">
                    </video>
                </div>
                <div>
                    <video preload="none" controls width="600" height="300">
                        <source src="multimedia/corona.mp4">
                    </video>
                    <p class="description">3rd best animation<br /><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quia vero repellat accusantium obcaecati asperiores, quae earum ratione? Quia perferendis fugit, earum cum fuga dolor aliquid magnam odio nobis consectetur velit minima sapiente, eius animi maiores a ut molestias nihil, sunt qui beatae esse! Mollitia saepe autem deserunt praesentium tempora!</p>
                </div>
            </div>

            <div class="best_movie"><br /><br />
                Top 3 best soundtrack<br /><br />
                <audio src="multimedia/BachGavotteShort.mp3" controls autoplay></audio>

                <audio controls>
                    <source src="multimedia/PurcellSongSpinShort.mp3">
                </audio>
                <audio controls>
                    <source src="multimedia/WalloonLilliShort.mp3">
                </audio>
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
            <a class="link_footer" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2Fother%2Fmultimedia.php"><img src="multimedia/HTML5.png" alt="HTML5 LOGO" height="70"></a>
        </div>
    </footer>
</body>

</html><?php }
}
