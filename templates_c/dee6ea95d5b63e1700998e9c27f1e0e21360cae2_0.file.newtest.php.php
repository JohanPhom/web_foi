<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-15 16:07:32
  from 'D:\Wamp64\www\PROJET\club\newtest.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f60caa4bb5643_24206059',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dee6ea95d5b63e1700998e9c27f1e0e21360cae2' => 
    array (
      0 => 'D:\\Wamp64\\www\\PROJET\\club\\newtest.php',
      1 => 1592173747,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:other/header.php' => 1,
  ),
),false)) {
function content_5f60caa4bb5643_24206059 (Smarty_Internal_Template $_smarty_tpl) {
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

    <title>New test for <?php echo $_smarty_tpl->tpl_vars['club']->value->name;?>
</title>
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
            <div id="box_article_fan_page">
                <img src="multimedia/<?php echo $_smarty_tpl->tpl_vars['club']->value->image_title;?>
" style="position:absolute; left:50%; top:25%;z-index:1;" alt="<?php echo $_smarty_tpl->tpl_vars['club']->value->name;?>
 title" width="20%">
                <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
"><button class="button back">Back</button></a>
                <form id="form_test" action="index.php?page=newtest&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&nbquestion=1" method="POST">
                <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
                    <div class="errors" style="margin-top:100px;"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
                    <div class="successUpdate" style="margin-top:100px;"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
                <?php }?>
                <p>Create a new test for <?php echo $_smarty_tpl->tpl_vars['club']->value->name;?>
<p>
                <h2>Test / Quizz</h2>
                <label for="question1">Question 1 : </label>
                <input class="input_test" type="text" name="question1"><br>
                <label for="answer1">Answer 1 : </label>
                <input class="input_test" type="text" name="answer1"><br><br>
                <input type="button" class="button button_new_quizz" id="addNewQuestion" value="Add a new question">    
            
                <input type="submit" class="button button_new_quizz" value="submit the new test">
                </form>
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
