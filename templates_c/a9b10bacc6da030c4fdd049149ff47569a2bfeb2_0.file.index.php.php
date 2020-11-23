<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-10 18:43:28
  from 'D:\Wamp64\www\PROJET\index.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eb84b5047e210_71436391',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9b10bacc6da030c4fdd049149ff47569a2bfeb2' => 
    array (
      0 => 'D:\\Wamp64\\www\\PROJET\\index.php',
      1 => 1589136207,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb84b5047e210_71436391 (Smarty_Internal_Template $_smarty_tpl) {
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

    <title>Homepage</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, WebDiP, Movie">
    <meta name="description" content="Homepage of the first web page at FOI. This web
                                        page deals with movie that can be watched by users">
</head>

<body>
    <header>
    <a id="logo_header" class="header_object" href="smarty.php?page=index"><img src="multimedia/logo.png" alt="SITE LOGO" height="50"></a>
        <h1 id="header_title">The Fan zone</h1>
        <div>
            <form class="rechercher" method="GET">
                <input type="search" id="search_button" name="search" placeholder="Search">
                <button id="box_loupe" class="button" type="submit">Q</button>
            </form>
        </div>

        <div>
        </div>    
        <div id="sign_out">
            <a href="smarty.php?page=login">
                <h1>Login</h1>
            </a>
        </div>

    </header>
    <nav>
        <div id="normal_nav">
        <ul>
            <a href="smarty.php?page=index"><li>Home</li></a>
            <a href="smarty.php?page=login"><li>Login</li></a>
            <a href="smarty.php?page=multimedia"><li>Multimedia</li></a>
            <a href="smarty.php?page=list"><li>List</li></a>
            <a href="smarty.php?page=form"><li>AddForm</li></a>
            <a href="smarty.php?page=registration"><li>Register</li></a>
            <a href="smarty.php?page=listTest"><li>List test</li></a>
        </ul>
        </div>
    </nav>

    <section id="mainContent">
        <div class="background main_page_box">

            <div id="box1">
                <h2 id="title">Welcome</h2><br>
                <h3>to the best web site of streaming of the world. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto nobis et maiores. Blanditiis aliquam quia repellendus accusantium placeat optio vero quis, ratione alias</h3>
                <h3>dolorum praesentium accusamus quo illum tempora voluptates voluptatem, laboriosam esse cumque eos? Maxime eum nostrum maiores odit iste, quidem ratione qui dolores quam! Odio maxime, consequatur distinctio ipsa aut amet rerum! Repellat ad labore velit, laboriosam nemo distinctio sunt delectus quaerat voluptates, magni incidunt officiis dolores, debitis ab assumenda omnis perferendis dignissimos. Dolorem at non autem a.</h3>
            </div>

            <div id="fan_page_week">
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
            </div>

            <div id="box_article">

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_club']->value, 'club');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['club']->value) {
?>
                    <div id="<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
" class="article">
                        <div class="bonus" onclick="displayOption(<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
)"><img src="multimedia/plus.png" alt="add icone" height="30"></div>
                        <div id="option<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
" class="option noDisplay">
                            <img src="multimedia/<?php echo $_smarty_tpl->tpl_vars['club']->value->image_title;?>
" alt="GameOfThronetitle" width="200px;" style="margin:10px auto;"><br>
                            <?php if ($_smarty_tpl->tpl_vars['club']->value->has_test == true) {?>
                            <a><button class="button">Delete test</button></a><br>
                            <a><button class="button">Update test</button></a><br>
                            <a href="smarty.php?page=test&ID_club=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&user=<?php echo $_smarty_tpl->tpl_vars['user']->value['user'];?>
"><button class="button">Pass test</button></a><br>
                            <?php } else { ?>
                            <h1>This club has no test</h1>
                            <a href="smarty.php?page=newtest&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
"><button class="button">Create test</button></a><br>
                            <?php }?>
                            
                        </div>
                        <img class="PageTitle" src="multimedia/<?php echo $_smarty_tpl->tpl_vars['club']->value->image_title;?>
" alt="GameOfThronetitle">
                        <img src="multimedia/<?php echo $_smarty_tpl->tpl_vars['club']->value->image;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['club']->value->name;?>
">
                        <div>
                            <p>Followers : <?php echo $_smarty_tpl->tpl_vars['club']->value->nb_member;?>
 <a href="smarty.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
"><button class="button_article">Join</button></a></p>
                            <p>Moderators : <?php echo $_smarty_tpl->tpl_vars['club']->value->nb_moderator;?>
</p>
                            <p><?php echo $_smarty_tpl->tpl_vars['club']->value->description;?>
</p>
                        </div>
                    </div>

                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>                                                            
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
