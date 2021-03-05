<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kukkakauppa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nimi = $conn->real_escape_string(strip_tags($_POST["ename"]));
$email = $conn->real_escape_string(strip_tags($_POST["email"]));
$aihe = $_POST["aihe"];
$viesti = $conn->real_escape_string(strip_tags($_POST["viesti-txt"]));

if (isset($_POST['checkAccount'])) {
    $uutisk = 'k';
} else {
    $uutisk = 'e';
}


$sql = "INSERT INTO yht_otto (nimi, email, aihe, viesti, uutis_kirje) 
        VALUES ($nimi, $email, $aihe, $viesti, $uutisk)";

try {
    if ($result = $conn->query($sql)) {
        echo "Henkilön lisäys onnistui";
    } else {
        throw new Exception($conn->error);
    }
} catch (Exception $e) {
    echo "Henkilön lisäys epäonnistui" . $e;
    $conn->close();
}
