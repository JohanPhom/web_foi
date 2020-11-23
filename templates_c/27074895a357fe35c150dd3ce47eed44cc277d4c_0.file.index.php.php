<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-03 14:01:24
  from 'D:\Wamp64\www\homework_4\index.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eaeceb456e281_08807162',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27074895a357fe35c150dd3ce47eed44cc277d4c' => 
    array (
      0 => 'D:\\Wamp64\\www\\homework_4\\index.php',
      1 => 1588514482,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eaeceb456e281_08807162 (Smarty_Internal_Template $_smarty_tpl) {
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
 type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="javascript/jphomsouv_jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="javascript/jphomsouv.js"><?php echo '</script'; ?>
>

    <title>Homepage</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, WebDiP, Movie">
    <meta name="description" content="Homepage of the first web page at FOI. This web
                                        page deals with movie that can be watched by users">
</head>

<body>
    <header>
    <a id="logo_header" class="header_object" href="smarty.php?page=index"><img src="multimedia/logo.png" alt="SITE LOGO" height="50"></a>
        <h1 id="header_title">The best movie web site</h1>
        <div>
            <form class="rechercher" method="GET">
                <input type="search" id="search_button" name="search" placeholder="Search">
                <button id="box_loupe" class="button" type="submit">Q</button>
            </form>
        </div>

        <div>
            
        </div>    
        <div id="sign_out">
            <a href="smarty.php?page=login">
                <h1>Login</h1>
            </a>
        </div>
        
    </header>

    <section id="mainContent">
        <div class="background main_page_box">

            <figure id="icone_image">
                <img src="multimedia/icone_image.png" usemap="#mapa1" alt="image with icones" height="200">
                <map name="mapa1">
                    <area href="smarty.php?page=multimedia" alt="multimedia" shape="circle" coords="43,60,30" />
                    <area href="smarty.php?page=login" alt="login_icon" shape="circle" coords="137,62,30" />
                    <area href="smarty.php?page=list" alt="pravokutnik" shape="rect" coords="200,35,253,90" />
                    <area href="smarty.php?page=registration" alt="registration icon" shape="rect" coords="300,35,355,90" />
                    <area href="smarty.php?page=index" alt="icone_index" shape="poly" coords="87,152,127,120,167,152,157,152,157,180,95,180,95,152" />
                    <area href="smarty.php?page=form" alt="add_content" shape="circle" coords="246,152,33" />
                </map>

            </figure>

            <?php echo '<?php

            ';
echo '?>';?>


            <div id="box1">
                <h2 id="title">Welcome</h2><br>
                <h3>to the best web site of streaming of the world. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto nobis et maiores. Blanditiis aliquam quia repellendus accusantium placeat optio vero quis, ratione alias</h3>
                <h3>dolorum praesentium accusamus quo illum tempora voluptates voluptatem, laboriosam esse cumque eos? Maxime eum nostrum maiores odit iste, quidem ratione qui dolores quam! Odio maxime, consequatur distinctio ipsa aut amet rerum! Repellat ad labore velit, laboriosam nemo distinctio sunt delectus quaerat voluptates, magni incidunt officiis dolores, debitis ab assumenda omnis perferendis dignissimos. Dolorem at non autem a.</h3>
                <div id="video_teaser">
                    <h1>Watch the last teaser</h1>
                    <iframe width="600" height="300" src="https://www.youtube.com/embed/zAGVQLHvwOY" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div id="box2">
                <div id="ID_photo">Autor<br><br><img class="photo" src="multimedia/PHOMSOUVANDARA.jpg" alt="ID photo" height="100"></div>
                <div id="box2_1">
                    <div class="personnal_info">
                        Name : Phomsouvandara
                    </div>
                    <div class="personnal_info">
                        Surname : Johan
                    </div>
                    <div class="personnal_info">
                        Date of birth : March 25th 1999
                    </div>
                    <div class="personnal_info">
                        Student ID : 123456789123456
                    </div>
                    <div class="personnal_info">
                        <address> <a href="mailto:jphomsouv@foi.hr">Email : jphomsouv@foi.hr</a></address>
                    </div>
                </div>
                <div id="description_text">
                    Little description:<br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste neque vero a ut numquam cupiditate, quo ratione perspiciatis repellat, ipsum nulla nemo odit mollitia esse, adipisci amet saepe. Quia veritatis reprehenderit cum nam corporis molestiae enim similique, dignissimos, ex ad natus adipisci! Vero vel corrupti dolore omnis doloribus quas animi commodi cumque quibusdam dignissimos eveniet nihil mollitia incidunt quaerat fugit iusto quasi pariatur odit at ipsum eum sequi, officiis aspernatur! Praesentium sint debitis architecto labore aperiam voluptatibus beatae. Eum, aperiam?
                </div>
            </div>

            <div id="box_article">

                <div class="article">
                    <a id="pd" href="index.php">
                        <img src="multimedia/MOANAY.jpg" alt="MOANAY" height="200">
                    </a>
                    <div>
                        Title : MOANAY (2018)
                        <p>Description :</p>
                        <p>Moana is a Disney film that opened in 2016 to critical acclaim. Directed by Ron Clements and John Musker, it features an adventurous teenager named Moana living on a Polynesian island in ancient times. </p>
                    </div>
                </div>

                <div class="article">
                    <a href="index.php">
                        <img src="multimedia/evade.jpg" alt="Evade" height="200">
                    </a>
                    <div>
                        Title : Les Evadés (1994)
                        <p>Description :</p>
                        <p>Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.</p>
                    </div>
                </div>

                <div class="article">
                    <a href="index.php">
                        <img src="multimedia/schindler.jpg" alt="schindler" height="200">
                    </a>
                    <div>
                        Title : The Schindlers List (1993)
                        <p>Description :</p>
                        <p>In German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.</p>
                    </div>
                </div>

                <div class="article">
                    <a href="index.php">
                        <img src="multimedia/raging.jpg" alt="raging" height="200">
                    </a>
                    <div>
                        Title : Ragging Bull (1980)
                        <p>Description :</p>
                        <p>The life of boxer Jake LaMotta, whose violence and temper that led him to the top in the ring destroyed his life outside of it.</p>
                    </div>
                </div>

                <div class="article">
                    <a href="index.php">
                        <img src="multimedia/godfather.jpg" alt="godfather" height="200">
                    </a>
                    <div>
                        Title : Godfather (1972)
                        <p>Description :</p>
                        <p>
                            The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.
                        </p>
                    </div>
                </div>

                <div class="article">
                    <a href="index.php">
                        <img src="multimedia/pulpfiction.jpg" alt="pulpfiction" height="200">
                    </a>
                    <div>
                        Title : Pulpfiction (1994)
                        <p>Description :</p>
                        <p>
                            The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.
                        </p>
                    </div>
                </div>

                <div class="article">
                    <a href="index.php">
                        <img src="multimedia/chernobyl.jpg" alt="Chernobyl" height="200">
                    </a>
                    <div>
                        Title : Chernobyl (2019)
                        <p>Description :</p>
                        <p>
                            In April 1986, an explosion at the Chernobyl nuclear power plant in the Union of Soviet Socialist Republics becomes one of the world's worst man-made catastrophes. </p>
                    </div>
                </div>

                <div class="article">
                    <a href="index.php">
                        <img src="multimedia/inception.jpg" alt="inception" height="200">
                    </a>
                    <div>
                        Title : Inception (2010)
                        <p>Description :</p>
                        <p>
                            A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.
                        </p>
                    </div>
                </div>

                <div class="article">
                    <a href="index.php">
                        <img src="multimedia/darknight.jpg" alt="darknight" height="200">
                    </a>
                    <div>
                        Title : Batman : The dark night rises (2008)
                        <p>Description :</p>
                        <p>
                            When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.
                        </p>
                    </div>
                </div>

                <div class="article">
                    <a href="index.php">
                        <img src="multimedia/toystory3.jpg" alt="toystory3" height="200">
                    </a>
                    <div>
                        Title : Toy Story 3 (2010)
                        <p>Description :</p>
                        <p>
                            The toys are mistakenly delivered to a day-care center instead of the attic right before Andy leaves for college, and it's up to Woody to convince the other toys that they weren't abandoned and to return home.
                        </p>
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
            <a class="link_footer" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2019%2Fzadaca_03%2Fjphomsouv%2Findex.php"><img src="multimedia/HTML5.png" alt="HTML5 LOGO" height="70"></a>
        </div>
    </footer>
</body>

</html><?php }
}
