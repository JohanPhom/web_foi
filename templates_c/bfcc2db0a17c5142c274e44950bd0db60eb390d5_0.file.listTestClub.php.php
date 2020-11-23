<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-08 17:02:33
  from 'D:\Wamp64\www\PROJET\listTestClub.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ede530935d717_60880443',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bfcc2db0a17c5142c274e44950bd0db60eb390d5' => 
    array (
      0 => 'D:\\Wamp64\\www\\PROJET\\listTestClub.php',
      1 => 1591628552,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:other/header.php' => 1,
  ),
),false)) {
function content_5ede530935d717_60880443 (Smarty_Internal_Template $_smarty_tpl) {
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
            <form action="index.php?page=listTestClub" method="POST">
                <input type="search" id="search_box_list" name="search" placeholder="Search">
                <input type="submit" id="button_search_list" value="ok">
                <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
">
                <img src="multimedia/<?php echo $_smarty_tpl->tpl_vars['club']->value->image_title;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['club']->value->name;?>
 title" width="30%"><br>
                </a>
            </form>
            <div id="pageTest" class="center" style="color:white;letter-spacing:2px;">
            <a href="index.php?page=listTestClub&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;
if ($_smarty_tpl->tpl_vars['testPagination']->value > 0) {?>&pagination=<?php echo $_smarty_tpl->tpl_vars['testPagination']->value-1;
}?>#pageTest"><img src="multimedia/white_left_arrow.png" class="arrow" alt="right_arrow" height="30px;"></a>
                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? ($_smarty_tpl->tpl_vars['nb_test']->value/$_smarty_tpl->tpl_vars['pagination']->value)-1+1 - (0) : 0-(($_smarty_tpl->tpl_vars['nb_test']->value/$_smarty_tpl->tpl_vars['pagination']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                    <a href="index.php?page=listTestClub&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&pagination=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
#pageTest">
                        <?php echo $_smarty_tpl->tpl_vars['i']->value;?>

                    </a>
                <?php }
}
?>
                <?php if ($_smarty_tpl->tpl_vars['testPagination']->value != floor($_smarty_tpl->tpl_vars['nb_test']->value/$_smarty_tpl->tpl_vars['pagination']->value)) {?>
                    <a href="index.php?page=listTestClub&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&pagination=<?php echo $_smarty_tpl->tpl_vars['testPagination']->value+1;?>
#pageTest">
                        <img src="multimedia/white_right_arrow.png" class="arrow"  alt="right_arrow" height="30px;">
                    </a>
                <?php }?>
            </div>
            <table>
                <tr>
                    <th><a href="index.php?page=listTestClub&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&filter=username">User</a></th>
                    <th><a href="index.php?page=listTestClub&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&filter=ID_test">ID test</a></th>
                    <th><a href="index.php?page=listTestClub&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&filter=nb_question">Nb question</a></th>
                    <th><a href="index.php?page=listTestClub&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&filter=good_answer">Nb good answers</a></th>
                    <th><a href="index.php?page=listTestClub&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&filter=success">Successed / Failed</a></th>
                    <th><a href="index.php?page=listTestClub&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&filter=nb_attempt">Nb attempt</a></th>
                    <th><a href="index.php?page=listTestClub&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&filter=date">Date</a></th>
                </tr>
                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['testPagination']->value*$_smarty_tpl->tpl_vars['pagination']->value+$_smarty_tpl->tpl_vars['pagination']->value-1+1 - ($_smarty_tpl->tpl_vars['testPagination']->value*$_smarty_tpl->tpl_vars['pagination']->value) : $_smarty_tpl->tpl_vars['testPagination']->value*$_smarty_tpl->tpl_vars['pagination']->value-($_smarty_tpl->tpl_vars['testPagination']->value*$_smarty_tpl->tpl_vars['pagination']->value+$_smarty_tpl->tpl_vars['pagination']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['testPagination']->value*$_smarty_tpl->tpl_vars['pagination']->value, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                <?php if (isset($_smarty_tpl->tpl_vars['list_test']->value[$_smarty_tpl->tpl_vars['i']->value])) {?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['list_test']->value[$_smarty_tpl->tpl_vars['i']->value]['username'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['list_test']->value[$_smarty_tpl->tpl_vars['i']->value]['ID_test'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['list_test']->value[$_smarty_tpl->tpl_vars['i']->value]['nb_question'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['list_test']->value[$_smarty_tpl->tpl_vars['i']->value]['good_answer'];?>
</td>
                    <?php if (($_smarty_tpl->tpl_vars['list_test']->value[$_smarty_tpl->tpl_vars['i']->value]['success'] == 1)) {?>
                    <td><img src="multimedia/valid.png" alt="valid logo" height="50px"> </td>
                    <?php } else { ?>
                    <td><img src="multimedia/croix.png" alt="valid logo" height="50px"> </td>
                    <?php }?>
                    <td><?php echo $_smarty_tpl->tpl_vars['list_test']->value[$_smarty_tpl->tpl_vars['i']->value]['nb_attempt'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['list_test']->value[$_smarty_tpl->tpl_vars['i']->value]['date'];?>
</td>
                </tr>
                <?php }?>
                <?php }
}
?>
            </table>
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
