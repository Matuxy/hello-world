<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.2/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.2/css/font-awesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="uusi.css">
    

    <style>
        .background_image {
            background-image: url("taustakuva_2.png");
            background-position: center;
            background-repeat: no-repeat; 
            background-size: cover;
        }
    </style>

    <div class="row">
        <div class="header-logo">
            <img src="Neilikka_logo.png" alt="Kukkakauppa Neilikka" style="height: 100%">
        </div>
    </div>
</head>
<main>
<body class="background_image">
    <div class="navbar" style="background-color: rgb(206, 136, 206)" style="opacity: 0.7">
        <a href="kukkakauppa.php">Etusivu</a>
        <div class="subnav">
            <button class="subnavbtn">Tuotteet <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
                <a href="kasvit_sisa.php">Sisäkasvit</a>
                <a href="kasvit_ulko.php">Ulkokasvit</a>
                <a href="tools.php">Työkalut</a>
                <a href="other.php">Muut</a>
            </div>
        </div>
        <div class="subnav">
            <button class="subnavbtn">Myymälät <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
                <a href="kk_hki.php">Helsinki</a>
                <a href="kk_espoo.php">Espoo</a>
            </div>
        </div>
        <div class="subnav">
            <a href="about_us.php">Tietoa meistä</a>
        </div>
        <div class="subnav">
            <a href="yhteydet.php">Ota yhteyttä</a>
        </div>

        <a href="#myModal" style="float:right" data-toggle="modal">Kirjaudu sisään</a>        
    </div>
    <?php include "modal_signin.php"; ?>
<script>
    $('#modal1').on('hide', function() {
window.location.reload();
});
</script>