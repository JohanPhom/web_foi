<header class="header_soft">
    <a id="logo_header" class="header_object" href="index.php"><img src="multimedia/logo.png" alt="SITE LOGO" height="50"></a>
    <h1 id="header_title">The fan club web site</h1>
    <div id="search">
        <form class="rechercher" action="index.php?page=forum" method="POST">
            <input type="search" id="search_button" name="search" placeholder="Search">
            <button class="button" id="box_loupe" type="submit">Q</button>
        </form>
    </div>
    <div id="userType">
        <a href="index.php?page=profil">
            {if $user->role == 1}
            Administrator : {$user->username}
            {/if}
            {if $user->role == 2}
            Moderator : {$user->username}
            {/if}
            {if $user->role == 3}
            Registered user : {$user->username}
            {/if}
        </a>
        {if $user->role == 4}
        Unregistered user
        {/if}
    </div>
    {if $user->role == 4}
    <div id="sign_in" class="sign">
        <a href="index.php?page=login">
            <h1>Login</h1>
        </a>
    </div>
    {else}
    <div id="sign_out" class="sign">
        <a href="index.php?destroy=1">
            <h1>Sign out</h1>
        </a>
    </div>
    {/if}
</header>

<nav>
    <div id="normal_nav">
        <ul>
            <a href="index.php">
                <li>Home</li>
            </a>
            {if $user->role == 4}
            <a href="index.php?page=login">
                <li>Login</li>
            </a>
            {/if}
            {if $user->role == 1}
            <a href="index.php?page=log">
                <li>Log</li>
            </a>
            {/if}
          
            {if $user->role == 4 || $user->role == 1}
            <a href="index.php?page=registration">
                <li>Register</li>
            </a>
            {/if}
            <a href="index.php?page=author">
                <li>Author</li>
            </a>
            <a href="index.php?page=forum">
                <li>Forum</li>
            </a>
            <a href="index.php?page=doc">
                <li>Documentation</li>
            </a>
        </ul>
    </div>
</nav>

{if $user->role < 4} 
    <div id="nb_point_page">
        {$user->stat->current_point} points
    </div>
{/if}

<div id="theme">
    <label for="soft">Soft theme</label>
    <input type="radio" id="soft" name="theme" value="soft" checked>
    <label for="dark">Dark theme</label>
    <input type="radio" id="dark" name="theme" value="dark">
</div>

<div id="time">
    {if $user->role == 1}<a href="index.php?page=time">{/if}<h2>{$time}</h2>{if $user->role == 1}</a>{/if}
</div>

<div class="cookie_box">
    <div>
        <h1>Accept terms of the site</h1><h2 style="margin-left:100px;">to enter the web site.</h2>
    </div>
    <div>
        <p>We use cookies to personalise content and ads, to provide social media features and to analyse our traffic.
        We also share information about your use of our site with our social media, advertising and analytics partners
        who may combine it with other information that you’ve provided to them or that they’ve collected from your use of their services.
        You consent to our cookies if you continue to use our website.</p>
        <button id="accept_cookie" class="button">Accept the terms</button>
    </div>
</div>