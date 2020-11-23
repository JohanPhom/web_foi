<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-08 16:14:17
  from 'D:\Wamp64\www\PROJET\newitem.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ede47b9621de5_55757019',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a59dd47fae8ac3bdc231dc8a816201ff6ef76b73' => 
    array (
      0 => 'D:\\Wamp64\\www\\PROJET\\newitem.php',
      1 => 1591625625,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:other/header.php' => 1,
  ),
),false)) {
function content_5ede47b9621de5_55757019 (Smarty_Internal_Template $_smarty_tpl) {
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
            <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
            <div class="errors"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
            <div class="successUpdate"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
            <?php }?>
            <div id="new_content_title">
                <a href="javascript:history.go(-1)"><button class="button back">Back</button></a>
                <?php if (isset($_smarty_tpl->tpl_vars['item']->value)) {?>
                <h4>Update item "<?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
"</h4>
                <?php } else { ?>
                <h4>Add new item</h4>
                <?php }?>
            </div>
            <div id="box_new_content">
                <form id="form" action="index.php?page=newItem&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
&<?php if (isset($_smarty_tpl->tpl_vars['item']->value)) {?>validateUpdate=1&update=<?php echo $_smarty_tpl->tpl_vars['item']->value->ID;
} else { ?>new=1<?php }?>" method="POST">
                    <div class="divForm" style="height:auto;"> 
                        <a href="index.php?page=fanPage&ID=<?php echo $_smarty_tpl->tpl_vars['club']->value->ID;?>
">
                            <img src="multimedia/<?php echo $_smarty_tpl->tpl_vars['club']->value->image_title;?>
" alt="newclub" height="100px" style="margin:auto;justify-self:auto;">
                        </a>
                        <br><br>
                        <label for="name">Name of the new item</label>
                        <input class="black_input" type="text" id="name" <?php if (isset($_smarty_tpl->tpl_vars['item']->value)) {?>value="<?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
"<?php }?> name="name"><br>

                        <label for="description">Description</label>
                        <textarea cols="50" rows="10" name="description" id="description"> <?php if (isset($_smarty_tpl->tpl_vars['item']->value)) {
echo $_smarty_tpl->tpl_vars['item']->value->description;
}?></textarea><br><br>
                        
                        <label for="quantity">Quantity</label>
                        <input class="black_input" type="number" id="quantity" <?php if (isset($_smarty_tpl->tpl_vars['item']->value)) {?>value="<?php echo $_smarty_tpl->tpl_vars['item']->value->quantity;?>
"<?php }?> name="quantity" style="margin-left:10px;background-color:white;width:70px;"><br>
                        
                        <label for="price">Price</label>
                        <input class="black_input" type="number" id="price" <?php if (isset($_smarty_tpl->tpl_vars['item']->value)) {?>value="<?php echo $_smarty_tpl->tpl_vars['item']->value->price;?>
"<?php }?> name="price" style="margin-left:10px;background-color:white;width:70px;"><br>
                        
                        <label for="image">Image path</label>
                        <input class="black_input" type="file" <?php if (isset($_smarty_tpl->tpl_vars['item']->value)) {?>value="<?php echo $_smarty_tpl->tpl_vars['item']->value->image;?>
"<?php }?> id="image" name="image"><br><br>
                        
                        <input id="submitButton" type="submit" <?php if (isset($_smarty_tpl->tpl_vars['item']->value)) {?>value="Update"<?php } else { ?>value="Submit"<?php }?> class="button">
                    </div>
                    <div class="divForm">
                        <h2>Items already registered for <?php echo $_smarty_tpl->tpl_vars['club']->value->name;?>
</h2>
                        <div id="itemList" class="scroll">
                        <?php if (!empty($_smarty_tpl->tpl_vars['list_item']->value)) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_item']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                <div class="item_fan_page" style="max-height:250px">
                                    <p><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</p>  
                                    <img src="multimedia/<?php echo $_smarty_tpl->tpl_vars['item']->value->image;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
" height="100px"><br>           
                                    <p>Price: <?php echo $_smarty_tpl->tpl_vars['item']->value->price;?>
</p>
                                    <p>Available: <?php echo $_smarty_tpl->tpl_vars['item']->value->quantity;?>
</p>
                                </div>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php } else { ?>
                            <div class="errors" style="grid-column:1/4;text-align:center;">There is not item for this club</div>
                        <?php }?>
                        </div>
                    </div>
                </form>
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
