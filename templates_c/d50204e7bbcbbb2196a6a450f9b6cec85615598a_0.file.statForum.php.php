<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-15 16:06:10
  from 'D:\Wamp64\www\PROJET\club\statForum.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f60ca52239746_06792320',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd50204e7bbcbbb2196a6a450f9b6cec85615598a' => 
    array (
      0 => 'D:\\Wamp64\\www\\PROJET\\club\\statForum.php',
      1 => 1592153406,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:other/header.php' => 1,
  ),
),false)) {
function content_5f60ca52239746_06792320 (Smarty_Internal_Template $_smarty_tpl) {
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
            <a class="center" href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
">
            <img id="1" class="center" src="multimedia/<?php echo $_smarty_tpl->tpl_vars['club']->value->image_title;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['club']->value->name;?>
 title" width="30%"><br>
            </a><br><br>
            <h1 style="color:beige; margin:auto;font-family:monospace;font-size:2em">Statistics forum</h1>
            <table style="margin-bottom:50px;">
                <thead>
                    <th><a href="index.php?page=statForum&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&filter=username#1">User</a></th>
                    <th><a href="index.php?page=statForum&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&filter=f.ID_forum#1">Forum</th>
                    <th><a href="index.php?page=statForum&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&filter=ID_type_message#1">Message</th>
                    <th>Content</th>
                    <th><a href="index.php?page=statForum&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&filter=date#1">Date</th>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['stat']->value, 'line');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['line']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['line']->value->user;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['line']->value->ID_forum;?>
</td>
                        <?php if ($_smarty_tpl->tpl_vars['line']->value->question == 1) {?>
                            <td>Question</td>
                        <?php } else { ?>
                            <td>Answer</td>
                        <?php }?>
                        <td><?php echo $_smarty_tpl->tpl_vars['line']->value->text;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['line']->value->date;?>
</td>
                    </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">Total number of questions : <?php echo $_smarty_tpl->tpl_vars['stat_message']->value['question'];?>
</td>
                    </tr>
                    <tr>
                        <td colspan="5">Total number of answers : <?php echo $_smarty_tpl->tpl_vars['stat_message']->value['answer'];?>
</td>
                    </tr>
                </tfoot>
            </table>
            <div id="graph">
                <canvas id="myCanvas"></canvas>
                <div id="legend">
                    <h1><img src="multimedia/<?php echo $_smarty_tpl->tpl_vars['club']->value->image_title;?>
" alt="logo club" height="35px"> Forum </h1>
                    <h2>Legend</h2><br><br>
                    <div style="display:flex">Question (<?php echo $_smarty_tpl->tpl_vars['stat_message']->value['question'];?>
) <div id="question_color"></div></div><br><br>
                    <div style="display:flex">Answer (<?php echo $_smarty_tpl->tpl_vars['stat_message']->value['answer'];?>
) <div id="answer_color"></div></div><br><br>
                </div>
            </div>
            <a style="margin:auto;width:10%;margin-bottom:50px;" href="javascript:window.print()"><button class="button">Print</button></a>
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
