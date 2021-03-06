<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-15 16:07:44
  from 'D:\Wamp64\www\PROJET\other\time.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f60cab0e73c19_58188232',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4aa05e14b47574a67d66945e8e2d756e472b93ab' => 
    array (
      0 => 'D:\\Wamp64\\www\\PROJET\\other\\time.php',
      1 => 1592168112,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:other/header.php' => 1,
  ),
),false)) {
function content_5f60cab0e73c19_58188232 (Smarty_Internal_Template $_smarty_tpl) {
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

    <title>Settings</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, WebDiP, Movie, author">
    <meta name="description" content="Page about the author">
</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender('file:other/header.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <section id="mainContent">
        <div class="background">
            <div class="activation_box" id="setting">
                <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
                <div class="errors"> <img src="multimedia/croix.png" alt="cross" height="30px"> <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
                <div class="successUpdate"><img src="multimedia/valid.png" alt="cross" height="30px"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
                <?php }?>
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
                        <input type="number" value="<?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
" style="width:40px;" name="pagination"> rows<br>
                        <input type="submit" value="Save pagination" name="config" class="button" style="width:200px">
                    </form>
                </div>
                <div class="setting_subbox">
                    <h1>Set cookie duration</h1>
                    <form method="POST" action="">
                        <input type="number" value="<?php echo $_smarty_tpl->tpl_vars['cookie_duration']->value;?>
" style="width:30px;" name="cookie_duration"> days<br>
                        <input type="submit" value="Save cookie time" name="config" class="button" style="width:200px">
                    </form>
                </div>
                <div class="setting_subbox">
                    <h1>Set email duration</h1>
                    <form method="POST" action="">
                        <input type="number" value="<?php echo $_smarty_tpl->tpl_vars['valid_email']->value;?>
" style="width:30px;" name="valid_email"> hours<br>
                        <input type="submit" value="Save time" name="config" class="button" style="width:200px">
                    </form>
                </div>
                <div class="setting_subbox">
                    <h1>Set time login</h1>
                    <form method="POST" action="">
                        <input type="number" value="<?php echo $_smarty_tpl->tpl_vars['log_time']->value;?>
" style="width:30px;" name="log_time"> hours<br>
                        <input type="submit" value="Save time" name="config" class="button" style="width:200px">
                    </form>
                </div>
                <div class="setting_subbox">
                    <h1>Set points for</h1>
                    <form method="POST" action="">
                        <label for="pts_question">Question : </label>
                        <input type="number" value="<?php echo $_smarty_tpl->tpl_vars['point_array']->value['question'];?>
" style="width:30px;" name="pts_question"> points<br>
                        <label for="pts_answer">Answer : </label>
                        <input type="number" value="<?php echo $_smarty_tpl->tpl_vars['point_array']->value['answer'];?>
" style="width:30px;" name="pts_answer"> points<br>
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

</html><?php }
}
