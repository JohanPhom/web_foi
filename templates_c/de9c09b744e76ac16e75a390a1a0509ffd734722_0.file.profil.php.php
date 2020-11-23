<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-14 14:57:10
  from 'D:\Wamp64\www\PROJET\other\profil.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee61ea60236d2_85498980',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de9c09b744e76ac16e75a390a1a0509ffd734722' => 
    array (
      0 => 'D:\\Wamp64\\www\\PROJET\\other\\profil.php',
      1 => 1591257582,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:other/header.php' => 1,
  ),
),false)) {
function content_5ee61ea60236d2_85498980 (Smarty_Internal_Template $_smarty_tpl) {
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
            <div style="width:90%;margin:20px auto;padding:20px;border-radius:5px;">
                <div id="profil_box">
                    <div style="text-align:center;padding-left:30px;">
                        <div id="profil_image">
                        </div>
                        <p><b>Name :</b> <?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
</p>
                        <p><b>Surname :</b> <?php echo $_smarty_tpl->tpl_vars['user']->value->surname;?>
</p>
                        <p><b>Username :</b> <?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
</p>
                        <p><b>Email :</b> <?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
</p><br>
                        <a href="index.php?page=profil&ID=<?php echo $_smarty_tpl->tpl_vars['user']->value->ID;?>
&reset=1"><p class="button"><b>RESET POINTS</b></p></a>
                    </div>
                    <div id="title_profil">
                        <div id="nb_point">Points = <?php echo $_smarty_tpl->tpl_vars['user']->value->stat->current_point;?>
 pts</div>
                        <div id="subtitle_profil">Profil : <?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
</div>
                        <br><br><br>
                        <h1 style="text-transform:uppercase;letter-spacing:2px;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Information</h1>
                        <div id="profil_information_box">
                            <div style="border:1px solid black;margin:10px;padding:15px;background-color:rgb(212, 250, 255">
                                <p><b>Club followed :</b><br><br>
                                    <?php if (isset($_smarty_tpl->tpl_vars['club_followed']->value)) {?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['club_followed']->value, 'club');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['club']->value) {
?>
                                            <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['club']->value['name'];?>
</a>,
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>.
                                    <?php } else { ?>
                                        You don't follow any club yet
                                    <?php }?>
                                </p>
                                <p><b>Moderator of :</b><br><br>
                                    <?php if (isset($_smarty_tpl->tpl_vars['club_moderated']->value)) {?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['club_moderated']->value, 'club');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['club']->value) {
?>
                                            <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['club']->value['name'];?>
</a>,
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>.
                                    <?php } else { ?>
                                        You don't moderate any club yet
                                    <?php }?>
                                </p>
                                <p><b>Number of question : <?php echo $_smarty_tpl->tpl_vars['user']->value->stat->nb_question;?>
</b> </p>
                                <p><b>Number of answer : <?php echo $_smarty_tpl->tpl_vars['user']->value->stat->nb_answer;?>
</b> </p>
                            </div>
                            <div id="itemList" class="scroll" style="height:400px;">
                                <h1 style="grid-column:1/4;justify-self:center">List item</h1>
                                <?php if (isset($_smarty_tpl->tpl_vars['list_item']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_item']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                <div class="item_profil">
                                    <a class="delete_item" href="index.php?page=profil&del=<?php echo $_smarty_tpl->tpl_vars['item']->value->ID;?>
">
                                        <img class="delete_item" src="multimedia/croix.png" alt="cross logo" height="20px">
                                    </a>

                                    <p><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</p>
                                    <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['item']->value->ID_club;?>
#item<?php echo $_smarty_tpl->tpl_vars['item']->value->ID;?>
">
                                        <img src="multimedia/<?php echo $_smarty_tpl->tpl_vars['item']->value->image;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
" height="70px"><br>
                                    </a>
                                </div>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <?php } else { ?>
                                <div style="grid-column:1/4;text-align:center;">You don't have any item yet</div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
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
            <a class="link_footer" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2Fforms%2Fform.php"><img src="multimedia/HTML5.png" alt="HTML5 LOGO" height="70"></a>
        </div>
    </footer>
</body>

</html><?php }
}
