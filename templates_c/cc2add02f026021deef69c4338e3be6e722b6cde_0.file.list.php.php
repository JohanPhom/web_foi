<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-29 16:15:58
  from 'D:\Wamp64\www\homework_4\other\list.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ea9a83eb91b41_67395676',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc2add02f026021deef69c4338e3be6e722b6cde' => 
    array (
      0 => 'D:\\Wamp64\\www\\homework_4\\other\\list.php',
      1 => 1588176921,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:other/header.php' => 1,
  ),
),false)) {
function content_5ea9a83eb91b41_67395676 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <?php echo '<script'; ?>
 type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="javascript/jphomsouv_jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="javascript/jphomsouv.js"><?php echo '</script'; ?>
>

    <title>List</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, List, Movie">
    <meta name="description" content="List of the movies and their options">
</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender('file:other/header.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <section id="mainContent">
        <div class="background">

            <form action="smarty.php?page=list" method="POST">
                <input type="search" id="search_box_list" name="search" placeholder="Search">
                <input type="submit" id="button_search_list" value="ok">
            </form>
            <table id="tableGenerated" class="tablica1">
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>3D</th>
                    <th>Original version</th>
                    <th>Duration</th>
                    <th>Year of release</th>
                    <th>Date Added</th>

                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab']->value, 'tabs');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tabs']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['tabs']->value->name;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['tabs']->value->type;?>
</td>
                    <?php if ($_smarty_tpl->tpl_vars['tabs']->value->option['3D'] == true) {?>
                    <td>Yes</td>
                    <?php } else { ?>
                    <td>No</td>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['tabs']->value->option['original_version'] == true) {?>
                    <td>Yes</td>
                    <?php } else { ?>
                    <td>No</td>
                    <?php }?>
                    <td><?php echo $_smarty_tpl->tpl_vars['tabs']->value->running_time;?>
min</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['tabs']->value->year_released;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['tabs']->value->date_added;?>
</td>
                    <td><a href="smarty.php?page=form&ID=<?php echo $_smarty_tpl->tpl_vars['tabs']->value->ID;?>
">Update</a></td>
                    <td><a href="smarty.php?page=list&DEL=<?php echo $_smarty_tpl->tpl_vars['tabs']->value->ID;?>
"><img class="red_cross" src="multimedia/croix.png" alt="red cross" height="30"></a></td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>

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
            <a class="link_footer" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2Fother%2Flist.php"><img src="multimedia/HTML5.png" alt="HTML5 LOGO" height="70"></a>
        </div>
    </footer>
</body>

</html><?php }
}
