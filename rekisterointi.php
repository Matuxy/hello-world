<?php
session_start();
require_once "config.php";


debug_to_console("Login ilmeisesti määritelty", $_POST);

    if (isset($_POST["login"])) {
        $username = $mysqli->real_escape_string(stripslashes(strip_tags($_POST["username"])));
        $password = $mysqli->real_escape_string($_POST["password"]);
        $sql = "SELECT * FROM as_tilit WHERE username = '$username'";
        $result = $mysqli->query($sql);
        if ($result->num_rows == 0) {
            $error2 = "There is no account associated with this username!<br>";
        } else {
            $sql = "SELECT * FROM as_tilit WHERE email = '" . $username . "'AND Password = '" . $password . "'";
            $result = $mysqli->query($sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_row();
                $_SESSION["loggedIn"] = TRUE;
                $_SESSION["username"] = $row[1];
                $_SESSION["userID"] = $row[0];
                $_SESSION["email"] = $row[3];
            } else {
                $error2 = "Invalid username or password!<br>";
            }
        }
    }

?>
<!DOCTYPE HTML>
<html>

<body>

    <h1>Login</h1>
    <form class="submitPres" id="lForm" method="POST">
        <label>Käyttäjätunnus: </label><br><input name="username" type="text" placeholder="email-osoite" required><br><br>
        <label>Salasana: </label><br><input name="password" type="password" pattern=".{5,}" required><br><br>
        <span class="error">
            <?php
            if (isset($error2)) {
                echo ($error2);
            }
            ?>
        </span>
        <button type="submit" class="submit" name="login">Login</button>
    </form>
    <script>
        function openForm() {
            document.getElementById("lForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("lForm").style.display = "none";
        }
    </script>
</body>

</html>