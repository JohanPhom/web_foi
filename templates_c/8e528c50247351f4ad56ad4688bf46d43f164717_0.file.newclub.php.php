<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-15 14:21:12
  from 'D:\Wamp64\www\PROJET\newclub.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebea558736860_77111197',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e528c50247351f4ad56ad4688bf46d43f164717' => 
    array (
      0 => 'D:\\Wamp64\\www\\PROJET\\newclub.php',
      1 => 1589551027,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:other/header.php' => 1,
  ),
),false)) {
function content_5ebea558736860_77111197 (Smarty_Internal_Template $_smarty_tpl) {
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
 type="text/javascript" src="javascript/jphomsouv.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="javascript/jphomsouv_jquery.js"><?php echo '</script'; ?>
>


    <title>New club</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, addform, Movie">
    <meta name="description" content="Add form in which users can add some content 
                                            into the web site">
</head>

<body>

    <?php $_smarty_tpl->_subTemplateRender('file:other/header.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <section id="mainContent">
        <div class="background">
            <div id="new_content_title">
                <a href="javascript:history.go(-1)"><button class="button back">Back</button></a>
                <h4>Add new fan club</h4>
            </div>
            <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
            <div class="errors"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
            <div class="successUpdate"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
            <?php }?>

            <div id="box_new_content">
                <form id="form" action="index.php?page=newclub" method="POST">
                    <div class="divForm">
                        <label for="name">Name of the new club</label>
                        <input class="black_input" type="text" id="name" name="name"><br>

                        <label for="description">Description :</label><br><br>
                        <textarea cols="50" rows="10" name="description" id="description"></textarea><br><br>

                        <label for="author">Author</label><br>
                        <input class="black_input" type="text" name="author" id="author"><br>

                        <label for="image">File image</label><br>
                        <input class="black_input" type="file" name="image" id="image"><br>

                        <label for="image_title">File for image title (png)</label><br>
                        <input class="black_input" type="file" name="image_title" id="image_title"><br>

                        <button id="submitButton" type="submit" class="button">Submit</button>
                    </div>
                    <img src="multimedia/breakingbad.png" alt="newclub" height="90%" style="margin:auto;">
                </form>
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
            <a class="link_footer" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2Fforms%2Fform.php"><img src="multimedia/HTML5.png" alt="HTML5 LOGO" height="70"></a>
        </div>
    </footer>
</body>

</html><?php }
}
