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

    <title>{$club->name} fan page</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, WebDiP, Movie, author">
    <meta name="description" content="Page about the author">
</head>

<body>
    {include file= 'other/header.php'}

    {$check_member = 0}
    {foreach $list_member as $member} 
        {if $member->ID == $user->ID}
            {$check_member = 1}
        {/if}
    {/foreach}

    <section id="mainContent">
        <div class="background">
            {if isset($error)}
            <div class="errors"> <img src="multimedia/croix.png" alt="cross" height="30"> {$error}</div>
            {/if}
            {if isset($success)}
            <div class="successUpdate"><img src="multimedia/valid.png" alt="cross" height="30">{$success}</div>
            {/if}
            {if isset($notice)}
            <div class="notice">{$notice}</div>
            {/if}
            {if isset($club)}
                <div id="box_article_fan_page">
                    <img id="title_fan_page" src="multimedia/{$club->image_title}" alt="{$club->name} title" width="20%">
                    <img id="background_fan_page" src="multimedia/{$club->image}" alt="{$club->name}" width="100%">
                    <div id="menu_fan_page">
                        <div>
                            <a href="index.php#{$club->ID}"><button class="button back">Back</button></a>
                            <br><br>
                            <img src="multimedia/{$club->image_title}" alt="{$club->name} title" width="80%"><br>
                            <h2>Title : {$club->name}</h2>
                            {if $club->has_test == false}
                                {if $user->role == 1}
                                    <a href="index.php?page=newtest&ID={$club->ID}"><button class="button">Create new test</button></a>
                                {/if}
                            {else}
                                {if isset($user->username)}
                                    {if $check_member == 1}
                                    <a href="index.php?page=fanPage&ID={$club->ID}&unfollow"><button class="deleteButton">Unfollow</button></a>
                                    {else}
                                    <a href="index.php?page=test&user={$user->username}&ID_club={$club->ID}"><button class="button">Join</button></a>
                                    {/if}
                                    {if $user->role == 1 || $moderate == 1}
                                    <a href="index.php?page=listTestClub&ID={$club->ID}"><button class="button">List test passed</button></a>
                                    {/if}
                                {/if}
                            {/if}
                            {if $user->role == 1 || $moderate == 1}
                            <a href="index.php?page=statForum&ID={$club->ID}"><button class="button">Stat forum</button></a>
                            {/if}
                        </div>
                        <div>
                            <p><img src="multimedia/writer.png" alt="icone" height="25"> Author : <b>{$club->author}</b></p>
                            <p><img src="multimedia/item.png" alt="icone" height="25"> Number of different item : <b>{$club->nb_item}</b></p>
                            <p><img src="multimedia/suscribers.png" alt="icone" height="25"> Suscribers : <b>{$club->nb_member}</b></p>
                            <p><img src="multimedia/date.png" alt="icone" height="25"> Creation date : <b>{$club->date_creation}</b></p>
                            <p><img src="multimedia/login_icon.png" alt="icone" height="25"> Creator user : <b>{$club->creator_user}</b></p>
                        </div>
                        <div><br><br><b>Synopsis :</b> <br><br>{$club->description}</div>
                        <h1 class="center_title_fan_page" id="list_item">
                            {if $offset > 0}
                                <a href="index.php?page=fanPage&ID={$club->ID}&offset={$offset-1}#list_item"><img class="arrow" src="multimedia/left_arrow.png" alt="left arrow" height="40"></a>
                            {/if}
                                Items
                            {if isset($list_item)}
                                {if $list_item|@count == $pagination}
                                    <a href="index.php?page=fanPage&ID={$club->ID}&offset={$offset+1}#list_item"><img class="arrow" src="multimedia/right_arrow.png" alt="right arrow" height="40"></a>
                                {/if}
                            {/if}
                        </h1>

                        {if isset($list_item)}
                        {foreach $list_item as $item}
                        
                        <div id="item{$item->ID}" class="item_fan_page">
                            {if $user->role == 1 || $moderate == 1}
                                <a href="index.php?page=fanPage&ID={$club->ID}&deleteItem={$item->ID}"><img class="cross_item" src="multimedia/croix.png" alt="cross" height="30"></a>
                            {/if}
                            <h1 style="margin:0px;">{$item->name}</h1>
                            {if $moderate == 1}
                            <a href="index.php?page=newItem&ID={$club->ID}&update={$item->ID}">
                            {/if}
                                <img src="multimedia/{$item->image}" alt="{$item->name}" height="150"><br>
                            {if $moderate == 1}
                            </a>
                            {/if}
                            <p>Price: {$item->price} points</p>
                            <p>Available: {$item->quantity}</p>
                            <a href="index.php?page=fanPage&ID={$club->ID}&buy={$item->ID}"><button class="buy_item">Buy now</button></a>
                        </div>
                        
                        {/foreach}
                        {elseif $club->nb_item > 0}

                        {else}
                        <div class="errors error_fan_page">There is not item for this club</div>
                        {/if}
                        {if $moderate == 1}
                        <a href="index.php?page=newItem&ID={$club->ID}" class="button_add_item"><button class="button">Add new item</button></a>
                        {/if}
                        <h1 class="center_title_fan_page">Forums</h1>
                        
                        {if $check_member == 1}
                        {if $user->role < 4} 
                        <div id="new_question_forum">
                            <form action="index.php?page=fanPage&ID={$club->ID}#new_question_forum" method="POST">
                                <label for="question">Ask your own question</label><br>
                                <textarea cols="50" rows="2" name="question"></textarea><br>
                                <input type="submit" class="button" value="Send" style="width:50px;margin:0px;">
                            </form>
                        </div>
                        {/if}
                        {/if}
                    <div id="forum_fan_page">
                        {if isset($list_forum)}
                        {foreach $list_forum as $forum}
                        <a href="index.php?page=discussion&ID={$forum->ID_forum}">
                        <div class="discussion">
                            <div class="image_club_forum" style="background-image:url('multimedia/{$forum->club->image}');">
                            </div>
                            <div>
                                <h1>{$forum->club->name} <img src="multimedia/{$forum->club->image_title}" height="20"></h1>
                                <p><b>Topic :</b> {$forum->text}</p>
                                <p>Number answer : {$forum->nb_answer}</p>
                            </div>
                            <div style="text-align:center">
                                <h2>Question asked by<br> {$forum->user}</h2>
                                <p>Date : {$forum->date}</p>
                            </div>
                        </div>
                        </a>
                        {/foreach}
                        {/if}
                    </div>
                </div>
            {/if}
            </div>
            <div id="list_user">
            <h1 class="center">List member</h1>
            {if $user->role == 1 || $moderate == 1}
                <p class="center" style="color:red;">Click on username to assign moderator</p>
                {if isset($list_member)}
                    <ul>
                        {foreach $list_member as $member}    
                            <li>
                                <a href="index.php?page=fanPage&ID={$club->ID}&moderate={$member->ID}">{$member->username}</a>
                                {if $club->ID_creator == $member->ID}
                                    (Administrator)
                                {elseif $member->moderate == 1}
                                    (Moderator) 
                                    <a href="index.php?page=fanPage&ID={$club->ID}&unmoderate={$member->ID}">
                                        <img src="multimedia/croix.png" alt="cross" height="20">
                                    </a>
                                {/if}
                            </li>
                            <br>
                        {/foreach}
                    </ul>
                {/if}
                <br>
                <h2 class="center">Number of item to be promoted moderator</h2>
                <form class="center" action="index.php?page=fanPage&ID={$club->ID}#list_user" method="POST">
                    <input type="number" min="0" name="set_promote" value="{$club->promote}" style="border:1px solid black; width:50px;color:black"><br>
                    <input type="submit" class="button" style="width:100px;height:35px;">
                </form>
            {else}
            <p class="center" style="color:red;">You must be moderator to have access</p>
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