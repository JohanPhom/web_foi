<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-15 16:00:06
  from 'D:\Wamp64\www\PROJET\club\forum.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f60c8e6b47e76_73234887',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bbf75c0f753a3071e192bf16c6ebf9056e229a30' => 
    array (
      0 => 'D:\\Wamp64\\www\\PROJET\\club\\forum.php',
      1 => 1592149015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:other/header.php' => 1,
  ),
),false)) {
function content_5f60c8e6b47e76_73234887 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>

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
            <div id="forum">
                <div style="background-color:rgb(0,0,82);border-top-left-radius:5px;border-top-right-radius:5px;color:white;font:bold 12px Arial, Tahoma,Calibri,Verdana,Geneva,sans-serif;padding:5px;font-size:1em;">
                    Forum
                </div>

                <?php if (isset($_smarty_tpl->tpl_vars['list_forum']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_forum']->value, 'forum');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['forum']->value) {
?>
                <div class="discussion">
                    <a href="index.php?page=discussion&ID=<?php echo $_smarty_tpl->tpl_vars['forum']->value->ID_forum;?>
">
                        <div class="image_club_forum" style="background-image:url('multimedia/<?php echo $_smarty_tpl->tpl_vars['forum']->value->club->image;?>
');">
                        </div>
                    </a>
                    <a href="index.php?page=discussion&ID=<?php echo $_smarty_tpl->tpl_vars['forum']->value->ID_forum;?>
">
                        <div>
                            <h1><?php echo $_smarty_tpl->tpl_vars['forum']->value->club->name;?>
 <img src="multimedia/<?php echo $_smarty_tpl->tpl_vars['forum']->value->club->image_title;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['forum']->value->club->name;?>
 logo" height="20"></h1>
                            <p><b>Topic :</b> <?php echo $_smarty_tpl->tpl_vars['forum']->value->text;?>
</p>
                            <div style="display:inline-flex">
                                <div style="width:230px;">Number answer : <?php echo $_smarty_tpl->tpl_vars['forum']->value->nb_answer;?>
</div>
                                <?php if ($_smarty_tpl->tpl_vars['forum']->value->best_answer == 1) {?>
                                <div class="best_answer_display">Validated</div>
                                <?php }?>
                            </div>
                        </div>
                    </a>
                    <div style="text-align:center">
                        <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1) {?>
                        <a class="delete_message" href="index.php?page=forum&del=<?php echo $_smarty_tpl->tpl_vars['forum']->value->ID_forum;?>
">
                            <img class="cross_message" src="multimedia/croix.png" alt="cross logo" height="20">
                        </a>
                        <?php }?>
                        <h2>Question asked by<br> <?php echo $_smarty_tpl->tpl_vars['forum']->value->user;?>
</h2>
                        <p>Date : <?php echo $_smarty_tpl->tpl_vars['forum']->value->date;?>
</p>
                    </div>
                </div>

                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
