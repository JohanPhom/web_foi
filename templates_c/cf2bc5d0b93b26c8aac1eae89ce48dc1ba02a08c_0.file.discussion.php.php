<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-11 22:22:26
  from 'D:\Wamp64\www\PROJET\discussion.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee292821d4fc8_92327341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf2bc5d0b93b26c8aac1eae89ce48dc1ba02a08c' => 
    array (
      0 => 'D:\\Wamp64\\www\\PROJET\\discussion.php',
      1 => 1591906945,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:other/header.php' => 1,
  ),
),false)) {
function content_5ee292821d4fc8_92327341 (Smarty_Internal_Template $_smarty_tpl) {
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

    <title>Forum</title>
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
            <?php if (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
            <div class="successUpdate"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
            <div class="errors"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
            <?php }?>
            <div style="display:inline">
                <a href="index.php?page=forum" style="margin-left:10%;width:80px;"><button class="button back">Back</button></a>
                <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1 || $_smarty_tpl->tpl_vars['moderate']->value == 1) {?>
                <a href="index.php?page=forum&del=<?php echo $_smarty_tpl->tpl_vars['topic']->value->ID_forum;?>
"><button class="deleteButton" style="margin-left:30px;width:200px">Delete topic</button></a><br>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 4) {?>
                <div class="errors" style="margin-bottom:50px;">You have to be connected to answer this topic !</div>
                <?php }?>
            </div>
            <div id="forum">
                <div style="background-color:rgb(0,0,82);border-top-left-radius:5px;border-top-right-radius:5px;color:white;font:bold 12px Arial, Tahoma,Calibri,Verdana,Geneva,sans-serif;padding:5px;font-size:1em;">
                    Discussion
                </div>
                
                <?php if (isset($_smarty_tpl->tpl_vars['topic']->value)) {?>
                    <div class="discussion" style="background-color:rgb(212, 255, 244)" style="padding:10px">
                        <div class="image_club_forum" style="background-image:url('multimedia/<?php echo $_smarty_tpl->tpl_vars['topic']->value->club->image;?>
');">
                        </div>
                        <div>
                        <h1>Topic: <?php echo $_smarty_tpl->tpl_vars['topic']->value->text;?>
</h1>
                        </div>
                        <div class="center">
                            <h1>Asked by <?php echo $_smarty_tpl->tpl_vars['topic']->value->user;?>
</h1>
                            <p>Date : <?php echo $_smarty_tpl->tpl_vars['topic']->value->date;?>
</p>
                        </div>
                    </div>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['list_message']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_message']->value, 'message');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
?>
                        <div class="discussion" style="padding:10px;<?php if ($_smarty_tpl->tpl_vars['message']->value->best_answer == 1) {?>background-color:rgb(147, 255, 153)<?php }?>">
                            <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1) {?>
                            <a class="delete_message" href="index.php?page=discussion&ID=<?php echo $_smarty_tpl->tpl_vars['topic']->value->ID_forum;?>
&del=<?php echo $_smarty_tpl->tpl_vars['message']->value->ID;?>
">
                                <img class="cross_message" src="multimedia/croix.png" alt="cross logo" height="20px">
                            </a>
                            <?php }?>
                            
                            <?php if ($_smarty_tpl->tpl_vars['message']->value->best_answer == 1) {?>
                            <a  class="best_answer" href="index.php?page=discussion&ID=<?php echo $_smarty_tpl->tpl_vars['topic']->value->ID_forum;?>
&reset=<?php echo $_smarty_tpl->tpl_vars['message']->value->ID;?>
">
                                <img  src="multimedia/valid.png" alt="best answer logo" height="50px">
                            </a>
                            <?php }?>
                            
                            <div>
                                <p>Answer from<br><b><?php echo $_smarty_tpl->tpl_vars['message']->value->user;?>
 :</b> </p>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1 || $_smarty_tpl->tpl_vars['moderate']->value == 1) {?>
                                    <?php if ($_smarty_tpl->tpl_vars['message']->value->best_answer == -1) {?>
                                    <div style="width:250px">
                                        <?php if ($_smarty_tpl->tpl_vars['topic']->value->best_answer != 1) {?>
                                        <a href="index.php?page=discussion&ID=<?php echo $_smarty_tpl->tpl_vars['topic']->value->ID_forum;?>
&best_answer=<?php echo $_smarty_tpl->tpl_vars['message']->value->ID;?>
">
                                            <img id="plus_discussion" src="multimedia/plus.png" alt="bonus" height="20px">
                                            Best answer
                                        </a>
                                        <?php }?>
                                    </div>
                                    <?php }?>
                                <?php }?>
                            </div>
                            <p class="center">"<?php echo $_smarty_tpl->tpl_vars['message']->value->text;?>
"
                                <?php if (isset($_smarty_tpl->tpl_vars['message']->value->image) && $_smarty_tpl->tpl_vars['message']->value->terms == 1) {?><br>
                                    <img src="multimedia/<?php echo $_smarty_tpl->tpl_vars['message']->value->image;?>
" alt="image message" width="200px">
                                <?php }?>
                            </p>
                            <div class="center">
                                <h1>Date</h1>
                                <p><?php echo $_smarty_tpl->tpl_vars['message']->value->date;?>
</p>
                            </div>
                        </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
                
            </div>

            <?php if ($_smarty_tpl->tpl_vars['member']->value != 1) {?>
                <div class="errors" style="margin-bottom:20px;">Join the club to answer this question</div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['user']->value->role < 4 && $_smarty_tpl->tpl_vars['topic']->value->best_answer != 1 && $_smarty_tpl->tpl_vars['member']->value == 1) {?>
            <form action="index.php?page=discussion&ID=<?php echo $_smarty_tpl->tpl_vars['topic']->value->ID_forum;?>
" method="POST" class="center" style="color:white">
                <textarea cols="100" rows="5" name="answer" placeholder="Your answer"></textarea><br>
                <input type="file" name="image" style="width:300px;background-color:white;color:black;">
                <input type="checkbox" name="terms" style="width:50px;">
                I accept the terms
                <input type="submit" class="button" value="Send" style="width:100px;">
            </form>            
            <?php }?>
            
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
                <a class="link_footer" href="index.html"><img src="multimedia/facebook.png" alt="Facebook Logo"
                        height="30"></a>
                <a class="link_footer" href="index.html"><img src="multimedia/instagram.png" alt="Instagram Logo"
                        height="30"></a>
                <a class="link_footer" href="index.html"><img src="multimedia/gmail.png" alt="Gmail Logo"
                        height="30"></a>
                <a class="link_footer" href="index.html"><img src="multimedia/twitter.png" alt="Twitter Logo"
                        height="30"></a>

            </div>
        </div>
        <div><br>
            <address>
                Contact me : <a class="link_footer" href="mailto:jphomsouv@foi.hr">Phomsouvandara Johan</a>
            </address>
            <small>&copy; 2020 M. Phomsouvandara</small><br>

            <a class="link_footer"
                href="https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2FCSS%2Fjphomsouv.css&profile=css3svg&usermedium=all&warning=1&vextwarning=&lang=fr"><img
                    src="multimedia/CSS3.png" alt="CSS3 LOGO" height="80"></a>
            <a class="link_footer" href="https://www.foi.unizg.hr/"><img src="multimedia/foi-logo.jpg" alt="FOI LOGO"
                    height="70"></a>
            <a class="link_footer"
                href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2Findex.html"><img
                    src="multimedia/HTML5.png" alt="HTML5 LOGO" height="70"></a>
        </div>
    </footer>
</body>

</html><?php }
}
