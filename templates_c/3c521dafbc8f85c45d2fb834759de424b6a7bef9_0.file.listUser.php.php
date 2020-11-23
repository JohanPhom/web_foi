<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-15 16:09:11
  from 'D:\Wamp64\www\PROJET\other\listUser.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f60cb07592615_59071632',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c521dafbc8f85c45d2fb834759de424b6a7bef9' => 
    array (
      0 => 'D:\\Wamp64\\www\\PROJET\\other\\listUser.php',
      1 => 1591979579,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:other/header.php' => 1,
  ),
),false)) {
function content_5f60cb07592615_59071632 (Smarty_Internal_Template $_smarty_tpl) {
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

    <title>List users</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, WebDiP, FanClub, User">
    <meta name="description" content="List about users">
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
            <?php if (isset($_smarty_tpl->tpl_vars['list_users']->value)) {?>
            <form action="index.php?page=listTest" method="POST">
                <input type="search" id="search_box_list" name="search" placeholder="Search">
                <input type="submit" id="button_search_list" value="ok">
            </form>
            <table>
                <tr>
                    <th>Username</th>
                    <th>Date registration</th>
                    <th>Last loggin</th>
                    <th>Locked</th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
                <tr>
                    <td><a href="index.php?page=listUser&del=<?php echo $_smarty_tpl->tpl_vars['user']->value->ID;?>
"><img style="position:absolute;left:170px;" src="multimedia/croix.png" alt="cross" height="30px"></a><?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->registration_date;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->last_log;?>
</td>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['user']->value->is_locked == -1) {?>
                            
                            <a href="index.php?page=listUser&lock=<?php echo $_smarty_tpl->tpl_vars['user']->value->ID;?>
">Not locked</a>
                            <img src="multimedia/valid.png" alt="valid icon" height="30px">
                        <?php } else { ?>
                            <a href="index.php?page=listUser&unlock=<?php echo $_smarty_tpl->tpl_vars['user']->value->ID;?>
">Click to unlock</a>
                            <img src="multimedia/croix.png" alt="wrong icon" height="30px">
                        <?php }?>
                    </td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
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
