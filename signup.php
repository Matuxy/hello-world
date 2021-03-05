<?php
session_start();
require_once "config.php";
include 'header_ul.php';

debug_to_console("Submit ei määritelty", $_POST);
if (isset($_POST['submit'])) {  
    debug_to_console("Submit oli määritelty");  
    unset($error);
    $username = $mysqli->real_escape_string(stripslashes(strip_tags($_POST["username"])));
    $password = $mysqli->real_escape_string(($_POST["password"]));
    $email = $mysqli->real_escape_string(stripslashes(strip_tags($_POST["email"])));

    $sql = 'SELECT * FROM as_tilit WHERE username = "' . $username . '"';
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $error = "<div style='color: red'><b>Tämä käyttäjätunnus on jo käytössä!</b></div>";
    } else {
        $sql = 'SELECT * FROM as_tilit WHERE email = "' . $email . '"';
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $error = "<div style='color: red'><b>Tämä sähköposti-osoite on käytössä toisella käyttäjällä!</b></div>";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO as_tilit ( username, password, email, last_update) VALUES ('$username','$hashed_password','$email', CURRENT_TIMESTAMP)";
            if ($mysqli->query($sql)) {
                $_SESSION["loggedIn"] = TRUE;
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $email;
                $error = "<div style='color: green'><b>Käyttäjätunnuksen luonti onnistui</b></div>";
            } else {
                $error = "<div style='color: red'><b>Tilin luonti epäonnistui. Yritä myöhemmin uudelleen.</b></div>";
            }
        }
    }
    if (isset($error)) {
        echo $error;
    }
}

?>


<br>
<div action="" class="form" id="myForm" style="float:right" method="POST">
    <form class="form-container">
        <h1>Kirjaudu sisään</h1><br>      
        <span class="error">
            <?php
            if (isset($error)) {
                echo "kukkuu";
                echo ($error);
            }
            ?>
        </span>
        <label for="username"><b>Käyttäjätunnnus</b></label>
        <input type="text" placeholder="" name="username" required>

        <label for="email"><b>Sähköposti</b></label>
        <input type="email" placeholder="" name="email" >

        <label for="password"><b>Salasana</b></label>
        <input type="password" placeholder="Enter Password" name="password" required required>

        <input type="submit" class="btn" name="submit" value="Kirjaudu">
        <button type="button" class="btn cancel" onclick="closeForm()">Sulje</button>
    </form>
</div>

<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>
</body>

</html>