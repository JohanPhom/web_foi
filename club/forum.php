<!DOCTYPE html>

<html lang="fr">

<head>
    <link rel="styleSheet" type="text/css" href="CSS/jphomsouv.css">
    <link rel="styleSheet" type="text/css" href="CSS/jphomsouv_responsive.css">
    <link rel="styleSheet" media="print" href="CSS/jphomsouv_print.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="javascript/jphomsouv_jquery.js"></script>
    <script type="text/javascript" src="javascript/jphomsouv.js"></script>

    <title>Forum</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, WebDiP, Movie, author">
    <meta name="description" content="Page about the author">
</head>

<body>
    {include file= 'other/header.php'}

    <section id="mainContent">
        <div class="background">
            {if isset($success)}
            <div class="successUpdate">{$success}</div>
            {/if}
            {if isset($error)}
            <div class="errors">{$error}</div>
            {/if}
            <div id="forum">
                <div style="background-color:rgb(0,0,82);border-top-left-radius:5px;border-top-right-radius:5px;color:white;font:bold 12px Arial, Tahoma,Calibri,Verdana,Geneva,sans-serif;padding:5px;font-size:1em;">
                    Forum
                </div>

                {if isset($list_forum)}
                {foreach $list_forum as $forum}
                <div class="discussion">
                    <a href="index.php?page=discussion&ID={$forum->ID_forum}">
                        <div class="image_club_forum" style="background-image:url('multimedia/{$forum->club->image}');">
                        </div>
                    </a>
                    <a href="index.php?page=discussion&ID={$forum->ID_forum}">
                        <div>
                            <h1>{$forum->club->name} <img src="multimedia/{$forum->club->image_title}" alt="{$forum->club->name} logo" height="20"></h1>
                            <p><b>Topic :</b> {$forum->text}</p>
                            <div style="display:inline-flex">
                                <div style="width:230px;">Number answer : {$forum->nb_answer}</div>
                                {if $forum->best_answer == 1}
                                <div class="best_answer_display">Validated</div>
                                {/if}
                            </div>
                        </div>
                    </a>
                    <div style="text-align:center">
                        {if $user->role == 1}
                        <a class="delete_message" href="index.php?page=forum&del={$forum->ID_forum}">
                            <img class="cross_message" src="multimedia/croix.png" alt="cross logo" height="20">
                        </a>
                        {/if}
                        <h2>Question asked by<br> {$forum->user}</h2>
                        <p>Date : {$forum->date}</p>
                    </div>
                </div>

                {/foreach}
                {/if}
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

</html>