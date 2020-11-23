<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-03 15:04:46
  from 'D:\Wamp64\www\homework_4\forms\form.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eaedd8e82b672_44452437',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6670d6b22b65cba46b74d095af1c25c6f8bce8da' => 
    array (
      0 => 'D:\\Wamp64\\www\\homework_4\\forms\\form.php',
      1 => 1588518261,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:other/header.php' => 1,
  ),
),false)) {
function content_5eaedd8e82b672_44452437 (Smarty_Internal_Template $_smarty_tpl) {
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


    <title>AddForm</title>
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
            <div id="new_content_title">
                <?php if (isset($_smarty_tpl->tpl_vars['update_item']->value) && $_smarty_tpl->tpl_vars['update_item']->value->update == true) {?>
                <h4>You are updating this movie : <?php echo $_smarty_tpl->tpl_vars['update_item']->value->name;?>
</h5>
                <?php } else { ?>
                <h4>Add new Content</h4>
                <?php }?>
            </div>
            <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
            <div class="errors"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['successInsert']->value)) {?>
            <div class="successUpdate"><?php echo $_smarty_tpl->tpl_vars['successInsert']->value;?>
</div>
            <?php }?>

            <div id="box_new_content">
                <?php if (isset($_smarty_tpl->tpl_vars['update_item']->value->ID)) {?>
                <form id="form" action="smarty.php?page=form&ID=<?php echo $_smarty_tpl->tpl_vars['update_item']->value->ID;?>
" method="POST">
                    <?php } else { ?>
                    <form id="form" action="smarty.php?page=form" method="POST">
                <?php }?>
                    <div id="boxa" class="divForm">
                        <label for="URL">*URL of the teaser</label><br />
                        <input type="url" <?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> value="<?php echo $_smarty_tpl->tpl_vars['update_item']->value->URL;?>
" <?php }?> id="URL" class="black_input" name="URL" placeholder="https://...">
                        <br />
                        <label for="file">Upload your movie file</label><br />
                        <input type="file" <?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> value="<?php echo $_smarty_tpl->tpl_vars['update_item']->value->file;?>
" <?php }?> id="file" class="black_input" name="file">
                    </div>
                    <div id="boxb" class="divForm">
                        <label for="name">*Name of the movie:</label>
                        <input type="text" <?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> value="<?php echo $_smarty_tpl->tpl_vars['update_item']->value->name;?>
" <?php }?> class="black_input" id="name" name="name"><br />
                        <label for="year_released">*Year of release</label><br />
                        <input type="number" <?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> value="<?php echo $_smarty_tpl->tpl_vars['update_item']->value->year_released;?>
" <?php }?> id="year_released" class="black_input" name="year_released"><br />
                    </div>
                    <div id="middle_box" class="divForm">
                        <div id="center_form">
                            <label for="option">*Option (at least 2)</label>
                            <label for="type">*Select the type</label>
                            <select multiple size="6" id="option" name="option[]">
                                <option value="3D" <?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> <?php if ($_smarty_tpl->tpl_vars['update_item']->value->option['3D'] == 1) {?> selected <?php }?> <?php }?>>3D</option>
                                <option value="-16" <?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> <?php if ($_smarty_tpl->tpl_vars['update_item']->value->option['-16'] == 1) {?> selected <?php }?> <?php }?>>-16</option>
                                <option value="free" <?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> <?php if ($_smarty_tpl->tpl_vars['update_item']->value->option['free'] == 1) {?> selected <?php }?> <?php }?>>Free to watch</option>
                                <option value="dolby_atmos" <?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> <?php if ($_smarty_tpl->tpl_vars['update_item']->value->option['dolby_atmos'] == 1) {?> selected <?php }?> <?php }?>>Dolby Atmos</option>
                                <option value="original_version" <?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> <?php if ($_smarty_tpl->tpl_vars['update_item']->value->option['original_version'] == 1) {?> selected <?php }?> <?php }?>>Original Version</option>
                                <option value="subtitle" <?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> <?php if ($_smarty_tpl->tpl_vars['update_item']->value->option['subtitle'] == 1) {?> selected <?php }?> <?php }?>>Subtitle</option>
                            </select>
                            <select id="type" name="type">
                                <option value="Adventure"<?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> <?php if ($_smarty_tpl->tpl_vars['update_item']->value->type == 'Adventure') {?> selected <?php }?> <?php }?>>Adventure</option>
                                <option value="Comic"<?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> <?php if ($_smarty_tpl->tpl_vars['update_item']->value->type == 'Comic') {?> selected <?php }?> <?php }?>>Comic</option>
                                <option value="Cartoon"<?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> <?php if ($_smarty_tpl->tpl_vars['update_item']->value->type == 'Cartoon') {?> selected <?php }?> <?php }?>>Cartoon</option>
                                <option value="Romance"<?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> <?php if ($_smarty_tpl->tpl_vars['update_item']->value->type == 'Romance') {?> selected <?php }?> <?php }?>>Romance</option>
                                <option value="Horror"<?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> <?php if ($_smarty_tpl->tpl_vars['update_item']->value->type == 'Horror') {?> selected <?php }?> <?php }?>>Horror</option>
                                <option value="Documentary"<?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> <?php if ($_smarty_tpl->tpl_vars['update_item']->value->type == 'Documentary') {?> selected <?php }?> <?php }?>>Documentary</option>
                            </select>
                        </div><br>
                        <label for="phone_number">*Your phone number</label>
                        <label for="running_time" style="margin-left:200px;">*Running time (min)</label><br />

                        <input type="tel" id="phone_number" <?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> value="<?php echo $_smarty_tpl->tpl_vars['update_item']->value->phone_number;?>
" <?php }?> class="black_input" name="phone_number" placeholder="Ex : 06 04 05 23 58">
                        <input type="number" id="running_time" <?php if (isset($_smarty_tpl->tpl_vars['update_item']->value)) {?> value="<?php echo $_smarty_tpl->tpl_vars['update_item']->value->running_time;?>
" <?php }?> style="margin-left:150px;" class="black_input" name="running_time"><br />

                        <label for="quality">*Quality of your file</label><br />
                        SD<input type="range" id="quality" class="black_input" name="quality" list="tickmarks" min="0" max="5">4K<br />
                        <datalist id="tickmarks">
                            <option value="SD" label="SD">
                            <option value="HD" label="HD">
                            <option value="Full HD" label="Full HD">
                            <option value="Quad HD" label="Quad HD">
                            <option value="2K" label="2K">
                            <option value="4K" label="4K">
                        </datalist><br />

                        <div id="div_checkbox">
                            *I agree to the terms of service general terms and conditions and privacy policy
                            <input type="checkbox" id="checkbox1" class="black_input" name="checkbox1" value="true">
                            *I want to receive email for new content about this movie
                            <input type="checkbox" id="checkbox2" class="black_input" name="checkbox2" value="true">
                        </div>
                        <button id="submitButton" type="submit" class="button">Submit</button>
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
