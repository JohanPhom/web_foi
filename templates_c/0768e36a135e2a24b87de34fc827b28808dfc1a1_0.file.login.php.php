<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-12 14:52:24
  from 'D:\Wamp64\www\PROJET\forms\login.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee37a885592f8_82316727',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0768e36a135e2a24b87de34fc827b28808dfc1a1' => 
    array (
      0 => 'D:\\Wamp64\\www\\PROJET\\forms\\login.php',
      1 => 1591966120,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:other/header.php' => 1,
  ),
),false)) {
function content_5ee37a885592f8_82316727 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php echo '<script'; ?>
 type="text/javascript" src="javascript/login.js"><?php echo '</script'; ?>
>

    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, Login, Movie">
    <meta name="description" content="Login page">
</head>

<body>
    
    <?php $_smarty_tpl->_subTemplateRender('file:other/header.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <section id="mainContent">
        <div class="background">
            <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
                <div class="errors"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
            <?php }?>
            <div class="login_box">
                <div class="center_title">LOGIN</div><br><br><br>
                <div id="form_box">
                    <form id="loginForm" action="index.php?page=login" method="POST">
                        <label for="username">Username*</label><br>
                        <input type="text" <?php echo $_smarty_tpl->tpl_vars['errorU']->value;?>
 id="username" name="username" placeholder="John"><br>
                        <label for="password">Password*</label><br>
                        <input type="password" <?php echo $_smarty_tpl->tpl_vars['errorP']->value;?>
 id="password" name="password" placeholder="7fgdq5qdg5"><br><br>
                        <input type="checkbox" id="remember_user" class="radio" name="remember_user"> Remember me 
                        <br>
                        <?php if ($_smarty_tpl->tpl_vars['errorU']->value != '' || $_smarty_tpl->tpl_vars['errorP']->value != '') {?><div style="color:red;margin-bottom:20px;">Username or password invalid</div><?php }?>
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

</html><?php }
}
