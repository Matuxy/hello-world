<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="login.css">
<script $("#login").hover(function() {
    $("#login-form").slideTogle();
});>
</script>
<nav>
    <ul class="ext-nav">
        <li id="login">
            <a href="#" margin-right="40px">login</a>
            <form id="login-form" action="login_slide.js" method="post">
                <p><input class="text" type="text" name="username" placeholder="username" /></p>
                <p><input class="text" type="password" name="password" placeholder="password" /></p>
                <p><input class="submit" type="submit" value="submit" /></p>
            </form>
        </li>
    </ul>
</nav>
