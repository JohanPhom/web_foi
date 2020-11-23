<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-15 15:57:28
  from 'D:\Wamp64\www\PROJET\other\header.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f60c8486e82b8_75444470',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5188e73e662e1c06683e39306673e237b4fb9252' => 
    array (
      0 => 'D:\\Wamp64\\www\\PROJET\\other\\header.php',
      1 => 1592151871,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f60c8486e82b8_75444470 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="header_soft">
    <a id="logo_header" class="header_object" href="index.php"><img src="multimedia/logo.png" alt="SITE LOGO" height="50"></a>
    <h1 id="header_title">The fan club web site</h1>
    <div id="search">
        <form class="rechercher" action="index.php?page=forum" method="POST">
            <input type="search" id="search_button" name="search" placeholder="Search">
            <button class="button" id="box_loupe" type="submit">Q</button>
        </form>
    </div>
    <div id="userType">
        <a href="index.php?page=profil">
            <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1) {?>
            Administrator : <?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>

            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 2) {?>
            Moderator : <?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>

            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 3) {?>
            Registered user : <?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>

            <?php }?>
        </a>
        <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 4) {?>
        Unregistered user
        <?php }?>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 4) {?>
    <div id="sign_in" class="sign">
        <a href="index.php?page=login">
            <h1>Login</h1>
        </a>
    </div>
    <?php } else { ?>
    <div id="sign_out" class="sign">
        <a href="index.php?destroy=1">
            <h1>Sign out</h1>
        </a>
    </div>
    <?php }?>
</header>

<nav>
    <div id="normal_nav">
        <ul>
            <a href="index.php">
                <li>Home</li>
            </a>
            <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 4) {?>
            <a href="index.php?page=login">
                <li>Login</li>
            </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1) {?>
            <a href="index.php?page=log">
                <li>Log</li>
            </a>
            <?php }?>
          
            <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 4 || $_smarty_tpl->tpl_vars['user']->value->role == 1) {?>
            <a href="index.php?page=registration">
                <li>Register</li>
            </a>
            <?php }?>
            <a href="index.php?page=author">
                <li>Author</li>
            </a>
            <a href="index.php?page=forum">
                <li>Forum</li>
            </a>
            <a href="index.php?page=doc">
                <li>Documentation</li>
            </a>
        </ul>
    </div>
</nav>

<?php if ($_smarty_tpl->tpl_vars['user']->value->role < 4) {?> 
    <div id="nb_point_page">
        <?php echo $_smarty_tpl->tpl_vars['user']->value->stat->current_point;?>
 points
    </div>
<?php }?>

<div id="theme">
    <label for="soft">Soft theme</label>
    <input type="radio" id="soft" name="theme" value="soft" checked>
    <label for="dark">Dark theme</label>
    <input type="radio" id="dark" name="theme" value="dark">
</div>

<div id="time">
    <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1) {?><a href="index.php?page=time"><?php }?><h2><?php echo $_smarty_tpl->tpl_vars['time']->value;?>
</h2><?php if ($_smarty_tpl->tpl_vars['user']->value->role == 1) {?></a><?php }?>
</div>

<div class="cookie_box">
    <div>
        <h1>Accept terms of the site</h1><h2 style="margin-left:100px;">to enter the web site.</h2>
    </div>
    <div>
        <p>We use cookies to personalise content and ads, to provide social media features and to analyse our traffic.
        We also share information about your use of our site with our social media, advertising and analytics partners
        who may combine it with other information that you’ve provided to them or that they’ve collected from your use of their services.
        You consent to our cookies if you continue to use our website.</p>
        <button id="accept_cookie" class="button">Accept the terms</button>
    </div>
</div><?php }
}
