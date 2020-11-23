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


    <title>New item</title>
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
            {if isset($error)}
            <div class="errors">{$error}</div>
            {/if}
            {if isset($success)}
            <div class="successUpdate">{$success}</div>
            {/if}
            <div id="new_content_title">
                <a href="index.php?page=fanPage&ID={$club->ID}#list_item"><button class="button back">Back</button></a>
                {if isset($item)}
                <h4>Update item "{$item->name}"</h4>
                {else}
                <h4>Add new item</h4>
                {/if}
            </div>
            <div id="box_new_content">
                <form id="form" action="index.php?page=newItem&ID={$club->ID}&{if isset($item)}validateUpdate=1&update={$item->ID}{else}new=1{/if}" method="POST">
                    <div class="divForm" style="height:auto;"> 
                        <a href="index.php?page=fanPage&ID={$club->ID}">
                            <img src="multimedia/{$club->image_title}" alt="newclub" height="100px" style="margin:auto;justify-self:auto;">
                        </a>
                        <br><br>
                        <label for="name">Name of the new item</label>
                        <input class="black_input" type="text" id="name" {if isset($item)}value="{$item->name}"{/if} name="name"><br>

                        <label for="description">Description</label>
                        <textarea cols="50" rows="10" name="description" id="description"> {if isset($item)}{$item->description}{/if}</textarea><br><br>
                        
                        <label for="quantity">Quantity</label>
                        <input class="black_input" type="number" id="quantity" {if isset($item)}value="{$item->quantity}"{/if} name="quantity" style="margin-left:10px;background-color:white;width:70px;"><br>
                        
                        <label for="price">Price</label>
                        <input class="black_input" type="number" id="price" {if isset($item)}value="{$item->price}"{/if} name="price" style="margin-left:10px;background-color:white;width:70px;"><br>
                        
                        <label for="image">Image path</label>
                        <input class="black_input" type="file" {if isset($item)}value="{$item->image}"{/if} id="image" name="image"><br><br>
                        
                        <input id="submitButton" type="submit" {if isset($item)}value="Update"{else}value="Submit"{/if} class="button">
                    </div>
                    <div class="divForm">
                        <h2>Items already registered for {$club->name}</h2>
                        <div id="itemList" class="scroll">
                        {if !empty($list_item)}
                            {foreach $list_item as $item}
                                <div class="item_fan_page" style="max-height:250px">
                                    <p>{$item->name}</p>  
                                    <img src="multimedia/{$item->image}" alt="{$item->name}" height="100px"><br>           
                                    <p>Price: {$item->price}</p>
                                    <p>Available: {$item->quantity}</p>
                                </div>
                            {/foreach}
                        {else}
                            <div class="errors" style="grid-column:1/4;text-align:center;">There is not item for this club</div>
                        {/if}
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

</html>