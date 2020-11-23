<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-04 16:24:47
  from 'D:\Wamp64\www\homework_4\other\header.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eb041cf325229_16194958',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8ee876c4289efe7e0292141f001c197f1b73398' => 
    array (
      0 => 'D:\\Wamp64\\www\\homework_4\\other\\header.php',
      1 => 1588609485,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb041cf325229_16194958 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
    <a id="logo_header" class="header_object" href="smarty.php?page=index"><img src="multimedia/logo.png" alt="SITE LOGO" height="50"></a>
    <h1 id="header_title">The best movie web site</h1>
        <div id="search">
            <form class="rechercher" method="GET">
                <input type="search" id="search_button" name="search" placeholder="Search">
                <button class="button" id="box_loupe" type="submit">Q</button>
            </form>
        </div>
        <div id="userType">
        <?php if ($_smarty_tpl->tpl_vars['user']->value['role'] == 1) {?>
            Administrator : <?php echo $_smarty_tpl->tpl_vars['user']->value['user'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['user']->value['role'] == 2) {?>
            Moderator : <?php echo $_smarty_tpl->tpl_vars['user']->value['user'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['user']->value['role'] == 3) {?>
            Registered user : <?php echo $_smarty_tpl->tpl_vars['user']->value['user'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['user']->value['role'] == 4) {?>
            Unregistered user
        <?php }?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['user']->value['role'] == 4) {?>
        <div id="sign_out">
            <a href="smarty.php?page=login">
                <h1>Login</h1>
            </a>
        </div>
        <?php } else { ?>
        <div id="sign_out">
            <a href="smarty.php?page=index&destroy=1">
                <h1>Sign out</h1>
            </a>
        </div>
        <?php }?>
    </header>

    <nav>
            <div id="normal_nav">
            <ul>
                <a href="smarty.php?page=index"><li>Home</li></a>
                <a href="smarty.php?page=login"><li>Login</li></a>
                <?php if ($_smarty_tpl->tpl_vars['user']->value['role'] <= 2) {?>
                <a href="smarty.php?page=multimedia"><li>Multimedia</li></a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['user']->value['role'] <= 3) {?>
                <a href="smarty.php?page=list"><li>List</li></a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['user']->value['role'] == 1) {?>
                <a href="smarty.php?page=form"><li>AddForm</li></a>
                <?php }?>
                <a href="smarty.php?page=registration"><li>Register</li></a>
                <?php if ($_smarty_tpl->tpl_vars['user']->value['role'] == 1) {?>
                <a href="smarty.php?page=era"><li>ERA</li></a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['user']->value['role'] == 1) {?>
                <a href="smarty.php?page=navigation"><li>Diagram</li></a>
                <?php }?>
                <a href="smarty.php?page=plan"><li>Plan</li></a>
                <a href="smarty.php?page=load"><li>Load</li></a>
            </ul>
        </div>

            <div id="responsive_nav">
                <div class="onglet">
                    <div id="navigation"><img src="multimedia/barres.png" height="20" alt="barres"></div>
                    <div class="sousmenu">
                    <a href="smarty.php?page=index">
                        <div class="sousmenu_elt">Home</div>
                    </a>
                    <a href="smarty.php?page=login">
                        <div class="sousmenu_elt">Login</div>
                    </a>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value['role'] <= 2) {?>
                    <a href="smarty.php?page=multimedia">
                        <div class="sousmenu_elt">Multimedia</div>
                    </a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value['role'] <= 3) {?>
                    <a href="smarty.php?page=list">
                        <div class="sousmenu_elt">List</div>
                    </a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value['role'] == 1) {?>
                    <a href="smarty.php?page=form">
                        <div class="sousmenu_elt">Add form</div>
                    </a>
                    <?php }?>
                    <a href="smarty.php?page=registration">
                        <div class="sousmenu_elt">Register</div>
                    </a>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value['role'] == 1) {?>
                    <a href="smarty.php?page=era">
                        <div class="sousmenu_elt">ERA</div>
                    </a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value['role'] == 1) {?>
                    <a href="smarty.php?page=navigation">
                        <div class="sousmenu_elt">Diagram</div>
                    </a>
                    <?php }?>
                    <a href="smarty.php?page=plan">
                        <div class="sousmenu_elt">Plan</div>
                    </a>
                    <a href="smarty.php?page=load">
                        <div class="sousmenu_elt">Load</div>
                    </a>
                    </div>
                </div>
            </div>
        </nav><?php }
}
