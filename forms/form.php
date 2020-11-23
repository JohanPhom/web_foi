<!DOCTYPE html>
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
    <script type="text/javascript" src="javascript/jphomsouv.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="javascript/jphomsouv_jquery.js"></script>


    <title>AddForm</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, addform, Movie">
    <meta name="description" content="Add form in which users can add some content 
                                            into the web site">
</head>

<body>

    {include file='other/header.php'}

    <section id="mainContent">
        <div class="background">
            <div id="new_content_title">
                {if isset($update_item) && $update_item->update == true}
                <h4>You are updating this movie : {$update_item->name}</h5>
                {else}
                <h4>Add new Content</h4>
                {/if}
            </div>
            {if isset($error)}
            <div class="errors">{$error}</div>
            {/if}
            {if isset($successInsert)}
            <div class="successUpdate">{$successInsert}</div>
            {/if}

            <div id="box_new_content">
                {if isset($update_item->ID)}
                <form id="form" action="smarty.php?page=form&ID={$update_item->ID}" method="POST">
                    {else}
                    <form id="form" action="smarty.php?page=form" method="POST">
                {/if}
                    <div id="boxa" class="divForm">
                        <label for="URL">*URL of the teaser</label><br />
                        <input type="url" {if isset($update_item)} value="{$update_item->URL}" {/if} id="URL" class="black_input" name="URL" placeholder="https://...">
                        <br />
                        <label for="file">Upload your movie file</label><br />
                        <input type="file" {if isset($update_item)} value="{$update_item->file}" {/if} id="file" class="black_input" name="file">
                    </div>
                    <div id="boxb" class="divForm">
                        <label for="name">*Name of the movie:</label>
                        <input type="text" {if isset($update_item)} value="{$update_item->name}" {/if} class="black_input" id="name" name="name"><br />
                        <label for="year_released">*Year of release</label><br />
                        <input type="number" {if isset($update_item)} value="{$update_item->year_released}" {/if} id="year_released" class="black_input" name="year_released"><br />
                    </div>
                    <div id="middle_box" class="divForm">
                        <div id="center_form">
                            <label for="option">*Option (at least 2)</label>
                            <label for="type">*Select the type</label>
                            <select multiple size="6" id="option" name="option[]">
                                <option value="3D" {if isset($update_item)} {if $update_item->option['3D'] == 1} selected {/if} {/if}>3D</option>
                                <option value="-16" {if isset($update_item)} {if $update_item->option['-16'] == 1} selected {/if} {/if}>-16</option>
                                <option value="free" {if isset($update_item)} {if $update_item->option['free'] == 1} selected {/if} {/if}>Free to watch</option>
                                <option value="dolby_atmos" {if isset($update_item)} {if $update_item->option['dolby_atmos'] == 1} selected {/if} {/if}>Dolby Atmos</option>
                                <option value="original_version" {if isset($update_item)} {if $update_item->option['original_version'] == 1} selected {/if} {/if}>Original Version</option>
                                <option value="subtitle" {if isset($update_item)} {if $update_item->option['subtitle'] == 1} selected {/if} {/if}>Subtitle</option>
                            </select>
                            <select id="type" name="type">
                                <option value="Adventure"{if isset($update_item)} {if $update_item->type == 'Adventure'} selected {/if} {/if}>Adventure</option>
                                <option value="Comic"{if isset($update_item)} {if $update_item->type == 'Comic'} selected {/if} {/if}>Comic</option>
                                <option value="Cartoon"{if isset($update_item)} {if $update_item->type == 'Cartoon'} selected {/if} {/if}>Cartoon</option>
                                <option value="Romance"{if isset($update_item)} {if $update_item->type == 'Romance'} selected {/if} {/if}>Romance</option>
                                <option value="Horror"{if isset($update_item)} {if $update_item->type == 'Horror'} selected {/if} {/if}>Horror</option>
                                <option value="Documentary"{if isset($update_item)} {if $update_item->type == 'Documentary'} selected {/if} {/if}>Documentary</option>
                            </select>
                        </div><br>
                        <label for="phone_number">*Your phone number</label>
                        <label for="running_time" style="margin-left:200px;">*Running time (min)</label><br />

                        <input type="tel" id="phone_number" {if isset($update_item)} value="{$update_item->phone_number}" {/if} class="black_input" name="phone_number" placeholder="Ex : 06 04 05 23 58">
                        <input type="number" id="running_time" {if isset($update_item)} value="{$update_item->running_time}" {/if} style="margin-left:150px;" class="black_input" name="running_time"><br />

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

</html>