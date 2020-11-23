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


    <title>New club</title>
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
            <div style="width:90%;margin:20px auto;padding:20px;border-radius:5px;">
                <div id="profil_box">
                    <div style="text-align:center;padding-left:30px;">
                        <div id="profil_image">
                        </div>
                        <p><b>Name :</b> {$user->name}</p>
                        <p><b>Surname :</b> {$user->surname}</p>
                        <p><b>Username :</b> {$user->username}</p>
                        <p><b>Email :</b> {$user->email}</p><br>
                        <a href="index.php?page=profil&ID={$user->ID}&reset=1"><p class="button"><b>RESET POINTS</b></p></a>
                    </div>
                    <div id="title_profil">
                        <div id="nb_point">Points = {$user->stat->current_point} pts</div>
                        <div id="subtitle_profil">Profil : {$user->username}</div>
                        <br><br><br>
                        <h1 style="text-transform:uppercase;letter-spacing:2px;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Information</h1>
                        <div id="profil_information_box">
                            <div style="border:1px solid black;margin:10px;padding:15px;background-color:rgb(212, 250, 255">
                                <p><b>Club followed :</b><br><br>
                                    {if isset($club_followed)}
                                        {foreach $club_followed as $club}
                                            <a href="index.php?page=fanPage&ID={$club['ID']}">{$club['name']}</a>,
                                        {/foreach}.
                                    {else}
                                        You don't follow any club yet
                                    {/if}
                                </p>
                                <p><b>Moderator of :</b><br><br>
                                    {if isset($club_moderated)}
                                        {foreach $club_moderated as $club}
                                            <a href="index.php?page=fanPage&ID={$club['ID']}">{$club['name']}</a>,
                                        {/foreach}.
                                    {else}
                                        You don't moderate any club yet
                                    {/if}
                                </p>
                                <p><b>Number of question : {$user->stat->nb_question}</b> </p>
                                <p><b>Number of answer : {$user->stat->nb_answer}</b> </p>
                            </div>
                            <div id="itemList" class="scroll" style="height:400px;">
                                <h1 style="grid-column:1/4;justify-self:center">List item</h1>
                                {if isset($list_item)}
                                {foreach $list_item as $item}
                                <div class="item_profil">
                                    <a class="delete_item" href="index.php?page=profil&del={$item->ID}">
                                        <img class="delete_item" src="multimedia/croix.png" alt="cross logo" height="20px">
                                    </a>

                                    <p>{$item->name}</p>
                                    <a href="index.php?page=fanPage&ID={$item->ID_club}#item{$item->ID}">
                                        <img src="multimedia/{$item->image}" alt="{$item->name}" height="70px"><br>
                                    </a>
                                </div>
                                {/foreach}
                                {else}
                                <div style="grid-column:1/4;text-align:center;">You don't have any item yet</div>
                                {/if}
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

</html>