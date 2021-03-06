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

    <title>List test {$club->name}</title>
    <meta charset="UTF-8">
    <meta name="author" content="Phomsouvandara">
    <meta name="keywords" content="FOI, WebDiP, Movie, author">
    <meta name="description" content="Page about the author">
</head>

<body>
    {include file= 'other/header.php'}

    <section id="mainContent">
        <div class="background">
            <div class="center">
                <a href="index.php?page=fanPage&ID={$club->ID}">
                <img src="multimedia/{$club->image_title}" alt="{$club->name} title" width="30%"><br>
                </a>
            </div><br>
            <div id="pageTest" class="center" style="color:white;letter-spacing:2px;">
            <a href="index.php?page=listTestClub&ID={$club->ID}{if $testPagination>0}&pagination={$testPagination-1}{/if}#pageTest"><img src="multimedia/white_left_arrow.png" class="arrow" alt="right_arrow" height="30px;"></a>
                {for $i = 0 to ($nb_test/$pagination)-1}
                    <a href="index.php?page=listTestClub&ID={$club->ID}&pagination={$i}#pageTest">
                        {$i}
                    </a>
                {/for}
                {if $testPagination != floor($nb_test/$pagination)}
                    <a href="index.php?page=listTestClub&ID={$club->ID}&pagination={$testPagination+1}#pageTest">
                        <img src="multimedia/white_right_arrow.png" class="arrow"  alt="right_arrow" height="30px;">
                    </a>
                {/if}
            </div>
            <table>
                <tr>
                    <th><a href="index.php?page=listTestClub&ID={$club->ID}&filter=username">User</a></th>
                    <th><a href="index.php?page=listTestClub&ID={$club->ID}&filter=ID_test">ID test</a></th>
                    <th><a href="index.php?page=listTestClub&ID={$club->ID}&filter=nb_question">Nb question</a></th>
                    <th><a href="index.php?page=listTestClub&ID={$club->ID}&filter=good_answer">Nb good answers</a></th>
                    <th><a href="index.php?page=listTestClub&ID={$club->ID}&filter=success">Successed / Failed</a></th>
                    <th><a href="index.php?page=listTestClub&ID={$club->ID}&filter=nb_attempt">Nb attempt</a></th>
                    <th><a href="index.php?page=listTestClub&ID={$club->ID}&filter=date">Date</a></th>
                </tr>
                {for $i=$testPagination*$pagination to $testPagination*$pagination+$pagination-1}
                {if isset($list_test[$i])}
                <tr>
                    <td>{$list_test[$i]['username']}</td>
                    <td>{$list_test[$i]['ID_test']}</td>
                    <td>{$list_test[$i]['nb_question']}</td>
                    <td>{$list_test[$i]['good_answer']}</td>
                    {if ($list_test[$i]['success'] == 1)}
                    <td><img src="multimedia/valid.png" alt="valid logo" height="50px"> </td>
                    {else}
                    <td><img src="multimedia/croix.png" alt="valid logo" height="50px"> </td>
                    {/if}
                    <td>{$list_test[$i]['nb_attempt']}</td>
                    <td>{$list_test[$i]['date']}</td>
                </tr>
                {/if}
                {/for}
            </table>
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