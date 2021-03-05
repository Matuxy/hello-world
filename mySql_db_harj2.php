<?php
echo "Tietokannan testaus.<br>";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Autokanta";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Tietokantayhteys OK.<br>";
//Katotaan mitä kannassa on
$sql = "SELECT * FROM henkilo";

if ($result = $conn -> query($sql)) {
  echo "Kannassa olevat henkilöt: <br>";
  while ($row = $result -> fetch_row()) {
    printf ("%s (%s) <br>", $row[0], $row[1]);
  }
  $result -> free_result();
}

//Yritetään poista Tamminen Tapsa --> 
try {
  $sql = "DELETE FROM henkilo WHERE nimi = 'Tapio Tamminen'";
  if ($result = $conn->query($sql)) {
    echo "Poisto onnistui. <br>";
  }else {
    throw new Exception($conn->error);
  }
  
}catch (Exception $e) {
  echo "Poisto ei sallittu: <br>" . $e. "<br>";
}

 


/*if ($tulos->num_rows >0) {
  echo "Autoja = ". $tulos->num_rows;
  while ($rivi = $tulos->num_rows->$f)
}*/
// Päivitä kanta
echo "Päivitetään Tammisen Teemun tietoja.  <br>";
$sql = "UPDATE henkilo SET osoite ='Tammistontie 19' WHERE nimi = 'Teemu Tamminen'";

if ($conn->query($sql) === TRUE) {
    echo "Päivitys onnistui. <br>";
  } else {
    echo "Error updating record: " . $conn->error;
  }

  // Lisätään uusi henkilö
echo "Lisätään uusi henkilö.  <br>";
$sql = "INSERT INTO henkilo (hetu, nimi, osoite, puhno)
       VALUES ('110156-1234', 'Olli Narsisti', 'Pääkatu 5', '09-018924587')";

if ($conn->query($sql) === TRUE) {
    echo "Lisäys onnistui. <br>". $sql;
  } else {
    echo "Henkilö tiedot ovat jo kannassa: " . $conn->error;
  }

  // Lisätään Ollille 
  echo "Lisätään sakkotapahtuma.  <br>";
  $sql = "INSERT INTO sakko (auto, henkilo, pvm, summa, syy)
       VALUES ('ABC-123','Olli Narsisti', '20210211', '120', 'Kaahailu')";

if ($conn->query($sql) === TRUE) {
    echo "Lisäys onnistui. <br>";
  } else {
    echo "Sakon lisäys ei onnistunut: " . $conn->error;
  }
  // Lopeta yhteys
$conn->close();
?>