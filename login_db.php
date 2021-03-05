<?php
session_start();
require_once "config.php";

if (isset($_POST['submit'])) {    
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
$mysqli->close();
?>