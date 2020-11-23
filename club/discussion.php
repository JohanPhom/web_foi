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
            <div style="display:inline">
                <a href="index.php?page=forum" style="margin-left:10%;width:80px;"><button class="button back">Back</button></a>
                {if $user->role == 1 || $moderate == 1}
                <a href="index.php?page=forum&del={$topic->ID_forum}"><button class="deleteButton" style="margin-left:30px;width:200px">Delete topic</button></a><br>
                {/if}
                {if $user->role == 4}
                <div class="errors" style="margin-bottom:50px;">You have to be connected to answer this topic !</div>
                {/if}
            </div>
            <div id="forum">
                <div style="background-color:rgb(0,0,82);border-top-left-radius:5px;border-top-right-radius:5px;color:white;font:bold 12px Arial, Tahoma,Calibri,Verdana,Geneva,sans-serif;padding:5px;font-size:1em;">
                    Discussion
                </div>
                
                {if isset($topic)}
                    <div class="discussion" style="background-color:rgb(212, 255, 244);padding:10px">
                        <div class="image_club_forum" style="background-image:url('multimedia/{$topic->club->image}');">
                        </div>
                        <div>
                        <h1>Topic: {$topic->text}</h1>
                        </div>
                        <div class="center">
                            <h1>Asked by {$topic->user}</h1>
                            <p>Date : {$topic->date}</p>
                        </div>
                    </div>
                {/if}
                {if isset($list_message)}
                    {foreach $list_message as $message}
                        <div class="discussion" style="padding:10px;{if $message->best_answer == 1}background-color:rgb(147, 255, 153){/if}">
                            {if $user->role == 1}
                            <a class="delete_message" href="index.php?page=discussion&ID={$topic->ID_forum}&del={$message->ID}">
                                <img class="cross_message" src="multimedia/croix.png" alt="cross logo" height="20px">
                            </a>
                            {/if}
                            
                            {if $message->best_answer == 1}
                            <a  class="best_answer" href="index.php?page=discussion&ID={$topic->ID_forum}&reset={$message->ID}">
                                <img  src="multimedia/valid.png" alt="best answer logo" height="50px">
                            </a>
                            {/if}
                            
                            <div>
                                <p>Answer from<br><b>{$message->user} :</b> </p>
                                {if $user->role == 1 || $moderate == 1}
                                    {if $message->best_answer == -1}
                                    <div style="width:250px">
                                        {if $topic->best_answer != 1}
                                        <a href="index.php?page=discussion&ID={$topic->ID_forum}&best_answer={$message->ID}">
                                            <img id="plus_discussion" src="multimedia/plus.png" alt="bonus" height="20px">
                                            Best answer
                                        </a>
                                        {/if}
                                    </div>
                                    {/if}
                                {/if}
                            </div>
                            <p class="center">"{$message->text}"
                                {if isset($message->image) && $message->terms == 1}<br>
                                    <img src="multimedia/{$message->image}" alt="image message" width="200px">
                                {/if}
                            </p>
                            <div class="center">
                                <h1>Date</h1>
                                <p>{$message->date}</p>
                            </div>
                        </div>
                    {/foreach}
                {/if}
                
            </div>

            {if $member != 1}
                <div class="errors" style="margin-bottom:20px;">Join the club to answer this question</div>
            {/if}
            {if $user->role < 4 && $topic->best_answer != 1 && $member == 1}
            <form action="index.php?page=discussion&ID={$topic->ID_forum}" method="POST" class="center" style="color:white">
                <textarea cols="100" rows="5" name="answer" placeholder="Your answer"></textarea><br>
                <input type="file" name="image" style="width:300px;background-color:white;color:black;">
                <input type="checkbox" name="terms" style="width:50px;">
                I accept the terms
                <input type="submit" class="button" value="Send" style="width:100px;">
            </form>            
            {/if}
            
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
                <a class="link_footer" href="index.html"><img src="multimedia/facebook.png" alt="Facebook Logo"
                        height="30"></a>
                <a class="link_footer" href="index.html"><img src="multimedia/instagram.png" alt="Instagram Logo"
                        height="30"></a>
                <a class="link_footer" href="index.html"><img src="multimedia/gmail.png" alt="Gmail Logo"
                        height="30"></a>
                <a class="link_footer" href="index.html"><img src="multimedia/twitter.png" alt="Twitter Logo"
                        height="30"></a>

            </div>
        </div>
        <div><br>
            <address>
                Contact me : <a class="link_footer" href="mailto:jphomsouv@foi.hr">Phomsouvandara Johan</a>
            </address>
            <small>&copy; 2020 M. Phomsouvandara</small><br>

            <a class="link_footer"
                href="https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2FCSS%2Fjphomsouv.css&profile=css3svg&usermedium=all&warning=1&vextwarning=&lang=fr"><img
                    src="multimedia/CSS3.png" alt="CSS3 LOGO" height="80"></a>
            <a class="link_footer" href="https://www.foi.unizg.hr/"><img src="multimedia/foi-logo.jpg" alt="FOI LOGO"
                    height="70"></a>
            <a class="link_footer"
                href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2Findex.html"><img
                    src="multimedia/HTML5.png" alt="HTML5 LOGO" height="70"></a>
        </div>
    </footer>
</body>

</html>