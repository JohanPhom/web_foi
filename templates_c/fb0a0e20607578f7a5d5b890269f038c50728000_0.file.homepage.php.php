<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-14 18:21:07
  from 'D:\Wamp64\www\PROJET\other\homepage.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee64e736a9ca4_02978237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb0a0e20607578f7a5d5b890269f038c50728000' => 
    array (
      0 => 'D:\\Wamp64\\www\\PROJET\\other\\homepage.php',
      1 => 1592148437,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:other/header.php' => 1,
  ),
),false)) {
function content_5ee64e736a9ca4_02978237 (Smarty_Internal_Template $_smarty_tpl) {
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

    <title>Homepage</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, WebDiP, Movie">
    <meta name="description" content="Homepage of the first web page at FOI. This web
                                        page deals with movie that can be watched by users">
</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender('file:other/header.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <section id="mainContent" class="background">
        <div class="main_page_box">

            <div id="box1">
                <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1) {?>
                <div>
                    <img id="setting_icon" onclick="displaySetting()" src="multimedia/setting.png" alt="setting" height="30px">
                    <div id="setting_box" class="invisible">
                        <h1 id="setting_title">Settings</h1>
                        <a href="index.php?page=newclub"><p>Create a new club</p></a>
                        <a href="index.php?page=listTest"><p>List of test passed</p></a>
                        <a href="index.php?page=listUser"><p>List of users</p></a>
                        <a href="index.php?page=log"><p>Syslog</p></a>
                        <a href="Private/user.php"><p>Password list</p></a>
                    </div>
                </div>
                <?php }?>
                <h2 id="title">Welcome</h2><br>
                <h3>to the best web site of fan club of the world. Here you can join your favorite fan club by passing a test. You must have at least 50% of the total point to be accepted.</h3>
                <h3>Once you are accepted to the club, you can buy items from the club and participate to forums by adding topics and answers to questions from other users. Collect points through your participation and you will have enough points to buy items and maybe be promoted as moderator of the club.</h3>
            </div>

            <div id="fan_page_week">
                <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['best_club']->value->ID;?>
#title_fan_page">
                    <h1 style="background-color:rgb(29,65,123);">Fan club of the week</h1>
                    <h2><?php echo $_smarty_tpl->tpl_vars['best_club']->value->name;?>
</h2>
                    <img src="multimedia/<?php echo $_smarty_tpl->tpl_vars['best_club']->value->image;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['best_club']->value->name;?>
 logo" width="200">
                    <p>Followers : <?php echo $_smarty_tpl->tpl_vars['best_club']->value->nb_member;?>
</p>
                    <p>Moderator : <?php echo $_smarty_tpl->tpl_vars['best_club']->value->nb_moderator;?>
</p>
                    <img src="multimedia/top1.png" alt="top1" height="100">
                </a>
            </div>

            <div id="pag_index" style="grid-column:1/3;text-align:center;color:white;margin-top:20px">
                <?php if ($_smarty_tpl->tpl_vars['indexPagination']->value != 0) {?>
                <a href="index.php<?php if ($_smarty_tpl->tpl_vars['indexPagination']->value > 0) {?>?pagination=<?php echo $_smarty_tpl->tpl_vars['indexPagination']->value-1;
}?>#pag_index"><img src="multimedia/white_left_arrow.png" class="arrow" alt="right_arrow" height="30px;"></a>
                <?php }?>
                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? ($_smarty_tpl->tpl_vars['nb_club']->value/$_smarty_tpl->tpl_vars['pagination']->value)-1+1 - (0) : 0-(($_smarty_tpl->tpl_vars['nb_club']->value/$_smarty_tpl->tpl_vars['pagination']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                    <a href="index.php?pagination=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
#pag_index"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
                <?php }
}
?>
                <?php if ($_smarty_tpl->tpl_vars['indexPagination']->value != floor($_smarty_tpl->tpl_vars['nb_club']->value/$_smarty_tpl->tpl_vars['pagination']->value)) {?>
                    <a href="index.php?pagination=<?php echo $_smarty_tpl->tpl_vars['indexPagination']->value+1;?>
#pag_index">
                        <img src="multimedia/white_right_arrow.png" class="arrow"  alt="right_arrow" height="30">
                    </a>
                <?php }?>
            </div>
            <div id="box_article">


                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['indexPagination']->value*$_smarty_tpl->tpl_vars['pagination']->value+$_smarty_tpl->tpl_vars['pagination']->value-1+1 - ($_smarty_tpl->tpl_vars['indexPagination']->value*$_smarty_tpl->tpl_vars['pagination']->value) : $_smarty_tpl->tpl_vars['indexPagination']->value*$_smarty_tpl->tpl_vars['pagination']->value-($_smarty_tpl->tpl_vars['indexPagination']->value*$_smarty_tpl->tpl_vars['pagination']->value+$_smarty_tpl->tpl_vars['pagination']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['indexPagination']->value*$_smarty_tpl->tpl_vars['pagination']->value, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                    <?php if (isset($_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value])) {?>
                    <div id="<?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->ID;?>
" class="article">
                        <div class="bonus" onclick="displayOption(<?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->ID;?>
)"><img src="multimedia/plus.png" alt="add icone" height="30"></div>
                        <div id="option<?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->ID;?>
" class="option invisible">
                            <img src="multimedia/<?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->image_title;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->name;?>
 title" width="200" style="margin:30px auto;"><br>
                            <?php if ($_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->has_test == true) {?>
                                <?php if (isset($_smarty_tpl->tpl_vars['user']->value->role)) {?>
                                <a href="index.php?page=test&ID_club=<?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->ID;?>
&user=<?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
"><button class="button">Pass test</button></a><br>
                                <?php } else { ?>
                                <h1 style="margin:0px 20px;">You have to be connected to pass a test</h1>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1) {?>
                                    <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->ID;?>
&deleteTest=1"><button class="deleteButton">Delete test</button></a><br>
                                <?php }?>
                            <?php } else { ?>
                                <h1>This club has no test</h1>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1) {?>
                                    <a href="index.php?page=newtest&ID=<?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->ID;?>
"><button class="button">Create test</button></a><br>
                                <?php }?>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1) {?>
                                <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->ID;?>
&deleteClub=1"><button class="deleteButton">Delete club</button></a><br>
                            <?php }?>
                            
                            
                        </div>
                        <img class="PageTitle" src="multimedia/<?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->image_title;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->name;?>
 title">
                        <img class="image_club" src="multimedia/<?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->image;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->name;?>
">
                        <div>
                            <p>Followers : <?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->nb_member;?>
 <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->ID;?>
#title_fan_page"><button class="button button_article">Join</button></a></p>
                            <p>Moderators : <?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->nb_moderator;?>
</p>
                            <p><?php echo $_smarty_tpl->tpl_vars['list_club']->value[$_smarty_tpl->tpl_vars['i']->value]->description;?>
</p>
                        </div>
                    </div>
                    <?php }?>
                <?php }
}
?>                                                            
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
            <a class="link_footer" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2Findex.php"><img src="multimedia/HTML5.png" alt="HTML5 LOGO" height="70"></a>
        </div>
    </footer>
</body>

</html><?php }
}
