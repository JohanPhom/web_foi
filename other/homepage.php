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

    <title>Homepage</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, WebDiP, Movie">
    <meta name="description" content="Homepage of the first web page at FOI. This web
                                        page deals with movie that can be watched by users">
</head>

<body>
    {include file= 'other/header.php'}
    <section id="mainContent" class="background">
        <div class="main_page_box">

            <div id="box1">
                {if $user->role == 1}
                <div>
                    <img id="setting_icon" onclick="displaySetting()" src="multimedia/setting.png" alt="setting" height="30px">
                    <div id="setting_box" class="invisible">
                        <h1 id="setting_title">Settings</h1>
                        <a href="index.php?page=newclub"><p>Create a new club</p></a>
                        <a href="index.php?page=listTest"><p>List of test passed</p></a>
                        <a href="index.php?page=listUser"><p>List of users</p></a>
                        <a href="index.php?page=log"><p>Syslog</p></a>
                        <a href="Private/user.php"><p>Password list</p></a>
                    </div>
                </div>
                {/if}
                <h2 id="title">Welcome</h2><br>
                <h3>to the best web site of fan club of the world. Here you can join your favorite fan club by passing a test. You must have at least 50% of the total point to be accepted.</h3>
                <h3>Once you are accepted to the club, you can buy items from the club and participate to forums by adding topics and answers to questions from other users. Collect points through your participation and you will have enough points to buy items and maybe be promoted as moderator of the club.</h3>
            </div>

            <div id="fan_page_week">
                <a href="index.php?page=fanPage&ID={$best_club->ID}#title_fan_page">
                    <h1 style="background-color:rgb(29,65,123);">Fan club of the week</h1>
                    <h2>{$best_club->name}</h2>
                    <img src="multimedia/{$best_club->image}" alt="{$best_club->name} logo" width="200">
                    <p>Followers : {$best_club->nb_member}</p>
                    <p>Moderator : {$best_club->nb_moderator}</p>
                    <img src="multimedia/top1.png" alt="top1" height="100">
                </a>
            </div>

            <div id="pag_index" style="grid-column:1/3;text-align:center;color:white;margin-top:20px">
                {if $indexPagination != 0}
                <a href="index.php{if $indexPagination > 0}?pagination={$indexPagination-1}{/if}#pag_index"><img src="multimedia/white_left_arrow.png" class="arrow" alt="right_arrow" height="30px;"></a>
                {/if}
                {for $i = 0 to ($nb_club/$pagination)-1}
                    <a href="index.php?pagination={$i}#pag_index">{$i}</a>
                {/for}
                {if $indexPagination != floor($nb_club/$pagination)}
                    <a href="index.php?pagination={$indexPagination+1}#pag_index">
                        <img src="multimedia/white_right_arrow.png" class="arrow"  alt="right_arrow" height="30">
                    </a>
                {/if}
            </div>
            <div id="box_article">


                {for $i=$indexPagination*$pagination to $indexPagination*$pagination+$pagination-1}
                    {if isset($list_club[$i])}
                    <div id="{$list_club[$i]->ID}" class="article">
                        <div class="bonus" onclick="displayOption({$list_club[$i]->ID})"><img src="multimedia/plus.png" alt="add icone" height="30"></div>
                        <div id="option{$list_club[$i]->ID}" class="option invisible">
                            <img src="multimedia/{$list_club[$i]->image_title}" alt="{$list_club[$i]->name} title" width="200" style="margin:30px auto;"><br>
                            {if $list_club[$i]->has_test == true}
                                {if isset($user->role)}
                                <a href="index.php?page=test&ID_club={$list_club[$i]->ID}&user={$user->role}"><button class="button">Pass test</button></a><br>
                                {else}
                                <h1 style="margin:0px 20px;">You have to be connected to pass a test</h1>
                                {/if}
                                {if $user->role == 1}
                                    <a href="index.php?page=fanPage&ID={$list_club[$i]->ID}&deleteTest=1"><button class="deleteButton">Delete test</button></a><br>
                                {/if}
                            {else}
                                <h1>This club has no test</h1>
                                {if $user->role == 1}
                                    <a href="index.php?page=newtest&ID={$list_club[$i]->ID}"><button class="button">Create test</button></a><br>
                                {/if}
                            {/if}
                            {if $user->role == 1}
                                <a href="index.php?page=fanPage&ID={$list_club[$i]->ID}&deleteClub=1"><button class="deleteButton">Delete club</button></a><br>
                            {/if}
                            
                            
                        </div>
                        <img class="PageTitle" src="multimedia/{$list_club[$i]->image_title}" alt="{$list_club[$i]->name} title">
                        <img class="image_club" src="multimedia/{$list_club[$i]->image}" alt="{$list_club[$i]->name}">
                        <div>
                            <p>Followers : {$list_club[$i]->nb_member} <a href="index.php?page=fanPage&ID={$list_club[$i]->ID}#title_fan_page"><button class="button button_article">Join</button></a></p>
                            <p>Moderators : {$list_club[$i]->nb_moderator}</p>
                            <p>{$list_club[$i]->description}</p>
                        </div>
                    </div>
                    {/if}
                {/for}                                                            
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

</html>