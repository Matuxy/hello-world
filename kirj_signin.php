<!DOCTYPE html>
<html lang="en">

<head>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="uusi.css">

    <?php
    session_start();

    require_once "Auth.php";
    require_once "Util.php";

    $auth = new Auth();
    $db_handle = new DBController();
    $util = new Util();

    require_once "authCookieSessionValidate.php";

    if ($isLoggedIn) {
        echo "ohjataan muualle";
        $util->redirect("dashboard.php");
    }

    if (!empty($_POST["login"])) {
        echo "Login ok";
        $isAuthenticated = false;

        $username = $_POST["member_name"];
        $password = $_POST["member_password"];

        $user = $auth->getMemberByUsername($username);
        echo $user;
        if ($user != null) {
            if (password_verify($password, $user[0]["member_password"])) {
                $isAuthenticated = true;
            }
        }

        if ($isAuthenticated) {
            $_SESSION["member_id"] = $user[0]["member_id"];

            // Set Auth Cookies if 'Remember Me' checked
            if (!empty($_POST["remember"])) {
                setcookie("member_login", $username, $cookie_expiration_time);

                $random_password = $util->getToken(16);
                setcookie("random_password", $random_password, $cookie_expiration_time);

                $random_selector = $util->getToken(32);
                setcookie("random_selector", $random_selector, $cookie_expiration_time);

                $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
                $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);

                $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);

                // mark existing token as expired
                $userToken = $auth->getTokenByUsername($username, 0);
                if (!empty($userToken[0]["id"])) {
                    $auth->markAsExpired($userToken[0]["id"]);
                }
                // Insert new token
                $auth->insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date);
            } else {
                $util->clearAuthCookie();
            }
            $util->redirect("dashboard.php");
        } else {
            $message = "Invalid Login";
        }
    }
    ?>

</head>

<!-- Modal HTML -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <header class="modal-header">
                <h3>Kirjaudu sisään</h3>
                <button type="button" class="close-modal-button" aria-label="Close modal window">X</button>
            </header>
            <div class="modal-body">
                <div class="error-message">
                    <?php if (isset($message)) {
                        echo $message;
                    } ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="member_name" placeholder="Käyttäjätunnus" required="required">
                </div>
                <div class="form-group">
                    <input name="member_password" type="password" placeholder="Salasana" required="required" value="<?php if (isset($_COOKIE["member_password"])) {
                                                                                                                        echo $_COOKIE["member_password"];
                                                                                                                    } ?>" class="form-control">
                </div>
                <div>
                    <div class="form-group">
                        <input type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["member_login"])) { ?> checked <?php } ?> /> <label for="remember-me">Muista minut</label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" value="submit" style="background-color: blue" class="btn btn-primary btn-lg btn-block login-btn">Kirjaudu</button>
                </div>                <div class="_8icz"></div>
                <div class="form-group">
                    <button data-modal-id="reqModal" class="modal-trigger" class="btn btn-primary btn-lg btn-block login-btn" data-target="#reqModal" data-toggle="modal">Rekisteröidy</button>
                </div>
            </div>
        </div>
    </div>