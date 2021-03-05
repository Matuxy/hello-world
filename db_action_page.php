<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "asiakas_rek";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$ename = $_POST["ename"];
$ename = $conn->real_escape_string(strip_tags($_POST["ename"]));
$sname = $_POST["sname"];
$address = $_POST["address"];
$pstnro = $_POST["pstnro"];
$ptp = $_POST["ptp"];
$puhno = $_POST["puhno"];
$email = $_POST["email"];

$sql = "INSERT INTO henkilo (ename, sname, address, pstnro, ptp, puhno, email) 
        VALUES ($ename, $sname, $address, $pstnro, $ptp, $puhno, $email)";
        //VALUES ('Matti', 'Kukkaro', 'Persaukistenkatu 4', '53566', 'Laehia', '23752825', 'a.s@gmail.com')";
// insert in database 
try {
    if ($result = $conn->query($sql)) {
      echo "<div 'Henkilön lisäys onnistui'></div>";
    }else {
      throw new Exception($conn->error);
    }
    
  }catch (Exception $e) {
    echo "Lisäys ei onnistunut: <br>" . $e;
    $conn->close();
  }
