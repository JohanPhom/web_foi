<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-15 15:59:41
  from 'D:\Wamp64\www\PROJET\club\fanPage.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f60c8cd550197_12467481',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3905867292f89da9922c29cb226b9cc8fd0acd1' => 
    array (
      0 => 'D:\\Wamp64\\www\\PROJET\\club\\fanPage.php',
      1 => 1592173652,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:other/header.php' => 1,
  ),
),false)) {
function content_5f60c8cd550197_12467481 (Smarty_Internal_Template $_smarty_tpl) {
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

    <title><?php echo $_smarty_tpl->tpl_vars['club']->value->name;?>
 fan page</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, WebDiP, Movie, author">
    <meta name="description" content="Page about the author">
</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender('file:other/header.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php $_smarty_tpl->_assignInScope('check_member', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_member']->value, 'member');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['member']->value) {
?> 
        <?php if ($_smarty_tpl->tpl_vars['member']->value->ID == $_smarty_tpl->tpl_vars['user']->value->ID) {?>
            <?php $_smarty_tpl->_assignInScope('check_member', 1);?>
        <?php }?>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <section id="mainContent">
        <div class="background">
            <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
            <div class="errors"> <img src="multimedia/croix.png" alt="cross" height="30"> <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
            <div class="successUpdate"><img src="multimedia/valid.png" alt="cross" height="30"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['notice']->value)) {?>
            <div class="notice"><?php echo $_smarty_tpl->tpl_vars['notice']->value;?>
</div>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['club']->value)) {?>
                <div id="box_article_fan_page">
                    <img id="title_fan_page" src="multimedia/<?php echo $_smarty_tpl->tpl_vars['club']->value->image_title;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['club']->value->name;?>
 title" width="20%">
                    <img id="background_fan_page" src="multimedia/<?php echo $_smarty_tpl->tpl_vars['club']->value->image;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['club']->value->name;?>
" width="100%">
                    <div id="menu_fan_page">
                        <div>
                            <a href="index.php#<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
"><button class="button back">Back</button></a>
                            <br><br>
                            <img src="multimedia/<?php echo $_smarty_tpl->tpl_vars['club']->value->image_title;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['club']->value->name;?>
 title" width="80%"><br>
                            <h2>Title : <?php echo $_smarty_tpl->tpl_vars['club']->value->name;?>
</h2>
                            <?php if ($_smarty_tpl->tpl_vars['club']->value->has_test == false) {?>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1) {?>
                                    <a href="index.php?page=newtest&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
"><button class="button">Create new test</button></a>
                                <?php }?>
                            <?php } else { ?>
                                <?php if (isset($_smarty_tpl->tpl_vars['user']->value->username)) {?>
                                    <?php if ($_smarty_tpl->tpl_vars['check_member']->value == 1) {?>
                                    <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&unfollow"><button class="deleteButton">Unfollow</button></a>
                                    <?php } else { ?>
                                    <a href="index.php?page=test&user=<?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
&ID_club=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
"><button class="button">Join</button></a>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1 || $_smarty_tpl->tpl_vars['moderate']->value == 1) {?>
                                    <a href="index.php?page=listTestClub&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
"><button class="button">List test passed</button></a>
                                    <?php }?>
                                <?php }?>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1 || $_smarty_tpl->tpl_vars['moderate']->value == 1) {?>
                            <a href="index.php?page=statForum&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
"><button class="button">Stat forum</button></a>
                            <?php }?>
                        </div>
                        <div>
                            <p><img src="multimedia/writer.png" alt="icone" height="25"> Author : <b><?php echo $_smarty_tpl->tpl_vars['club']->value->author;?>
</b></p>
                            <p><img src="multimedia/item.png" alt="icone" height="25"> Number of different item : <b><?php echo $_smarty_tpl->tpl_vars['club']->value->nb_item;?>
</b></p>
                            <p><img src="multimedia/suscribers.png" alt="icone" height="25"> Suscribers : <b><?php echo $_smarty_tpl->tpl_vars['club']->value->nb_member;?>
</b></p>
                            <p><img src="multimedia/date.png" alt="icone" height="25"> Creation date : <b><?php echo $_smarty_tpl->tpl_vars['club']->value->date_creation;?>
</b></p>
                            <p><img src="multimedia/login_icon.png" alt="icone" height="25"> Creator user : <b><?php echo $_smarty_tpl->tpl_vars['club']->value->creator_user;?>
</b></p>
                        </div>
                        <div><br><br><b>Synopsis :</b> <br><br><?php echo $_smarty_tpl->tpl_vars['club']->value->description;?>
</div>
                        <h1 class="center_title_fan_page" id="list_item">
                            <?php if ($_smarty_tpl->tpl_vars['offset']->value > 0) {?>
                                <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&offset=<?php echo $_smarty_tpl->tpl_vars['offset']->value-1;?>
#list_item"><img class="arrow" src="multimedia/left_arrow.png" alt="left arrow" height="40"></a>
                            <?php }?>
                                Items
                            <?php if (isset($_smarty_tpl->tpl_vars['list_item']->value)) {?>
                                <?php if (count($_smarty_tpl->tpl_vars['list_item']->value) == $_smarty_tpl->tpl_vars['pagination']->value) {?>
                                    <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&offset=<?php echo $_smarty_tpl->tpl_vars['offset']->value+1;?>
#list_item"><img class="arrow" src="multimedia/right_arrow.png" alt="right arrow" height="40"></a>
                                <?php }?>
                            <?php }?>
                        </h1>

                        <?php if (isset($_smarty_tpl->tpl_vars['list_item']->value)) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_item']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                        
                        <div id="item<?php echo $_smarty_tpl->tpl_vars['item']->value->ID;?>
" class="item_fan_page">
                            <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1 || $_smarty_tpl->tpl_vars['moderate']->value == 1) {?>
                                <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&deleteItem=<?php echo $_smarty_tpl->tpl_vars['item']->value->ID;?>
"><img class="cross_item" src="multimedia/croix.png" alt="cross" height="30"></a>
                            <?php }?>
                            <h1 style="margin:0px;"><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</h1>
                            <?php if ($_smarty_tpl->tpl_vars['moderate']->value == 1) {?>
                            <a href="index.php?page=newItem&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&update=<?php echo $_smarty_tpl->tpl_vars['item']->value->ID;?>
">
                            <?php }?>
                                <img src="multimedia/<?php echo $_smarty_tpl->tpl_vars['item']->value->image;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
" height="150"><br>
                            <?php if ($_smarty_tpl->tpl_vars['moderate']->value == 1) {?>
                            </a>
                            <?php }?>
                            <p>Price: <?php echo $_smarty_tpl->tpl_vars['item']->value->price;?>
 points</p>
                            <p>Available: <?php echo $_smarty_tpl->tpl_vars['item']->value->quantity;?>
</p>
                            <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&buy=<?php echo $_smarty_tpl->tpl_vars['item']->value->ID;?>
"><button class="buy_item">Buy now</button></a>
                        </div>
                        
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php } elseif ($_smarty_tpl->tpl_vars['club']->value->nb_item > 0) {?>

                        <?php } else { ?>
                        <div class="errors error_fan_page">There is not item for this club</div>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['moderate']->value == 1) {?>
                        <a href="index.php?page=newItem&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
" class="button_add_item"><button class="button">Add new item</button></a>
                        <?php }?>
                        <h1 class="center_title_fan_page">Forums</h1>
                        
                        <?php if ($_smarty_tpl->tpl_vars['check_member']->value == 1) {?>
                        <?php if ($_smarty_tpl->tpl_vars['user']->value->role < 4) {?> 
                        <div id="new_question_forum">
                            <form action="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
#new_question_forum" method="POST">
                                <label for="question">Ask your own question</label><br>
                                <textarea cols="50" rows="2" name="question"></textarea><br>
                                <input type="submit" class="button" value="Send" style="width:50px;margin:0px;">
                            </form>
                        </div>
                        <?php }?>
                        <?php }?>
                    <div id="forum_fan_page">
                        <?php if (isset($_smarty_tpl->tpl_vars['list_forum']->value)) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_forum']->value, 'forum');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['forum']->value) {
?>
                        <a href="index.php?page=discussion&ID=<?php echo $_smarty_tpl->tpl_vars['forum']->value->ID_forum;?>
">
                        <div class="discussion">
                            <div class="image_club_forum" style="background-image:url('multimedia/<?php echo $_smarty_tpl->tpl_vars['forum']->value->club->image;?>
');">
                            </div>
                            <div>
                                <h1><?php echo $_smarty_tpl->tpl_vars['forum']->value->club->name;?>
 <img src="multimedia/<?php echo $_smarty_tpl->tpl_vars['forum']->value->club->image_title;?>
" height="20"></h1>
                                <p><b>Topic :</b> <?php echo $_smarty_tpl->tpl_vars['forum']->value->text;?>
</p>
                                <p>Number answer : <?php echo $_smarty_tpl->tpl_vars['forum']->value->nb_answer;?>
</p>
                            </div>
                            <div style="text-align:center">
                                <h2>Question asked by<br> <?php echo $_smarty_tpl->tpl_vars['forum']->value->user;?>
</h2>
                                <p>Date : <?php echo $_smarty_tpl->tpl_vars['forum']->value->date;?>
</p>
                            </div>
                        </div>
                        </a>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>
                    </div>
                </div>
            <?php }?>
            </div>
            <div id="list_user">
            <h1 class="center">List member</h1>
            <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1 || $_smarty_tpl->tpl_vars['moderate']->value == 1) {?>
                <p class="center" style="color:red;">Click on username to assign moderator</p>
                <?php if (isset($_smarty_tpl->tpl_vars['list_member']->value)) {?>
                    <ul>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_member']->value, 'member');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['member']->value) {
?>    
                            <li>
                                <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&moderate=<?php echo $_smarty_tpl->tpl_vars['member']->value->ID;?>
"><?php echo $_smarty_tpl->tpl_vars['member']->value->username;?>
</a>
                                <?php if ($_smarty_tpl->tpl_vars['club']->value->ID_creator == $_smarty_tpl->tpl_vars['member']->value->ID) {?>
                                    (Administrator)
                                <?php } elseif ($_smarty_tpl->tpl_vars['member']->value->moderate == 1) {?>
                                    (Moderator) 
                                    <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&unmoderate=<?php echo $_smarty_tpl->tpl_vars['member']->value->ID;?>
">
                                        <img src="multimedia/croix.png" alt="cross" height="20">
                                    </a>
                                <?php }?>
                            </li>
                            <br>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                <?php }?>
                <br>
                <h2 class="center">Number of item to be promoted moderator</h2>
                <form class="center" action="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
#list_user" method="POST">
                    <input type="number" min="0" name="set_promote" value="<?php echo $_smarty_tpl->tpl_vars['club']->value->promote;?>
" style="border:1px solid black; width:50px;color:black"><br>
                    <input type="submit" class="button" style="width:100px;height:35px;">
                </form>
            <?php } else { ?>
            <p class="center" style="color:red;">You must be moderator to have access</p>
            <?php }?>
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
