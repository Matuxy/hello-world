<!-- PHP ja tietokantaharjoitus
Yritetään poista Tamminen Tapsa -->
<!-- //<?php 
    DELETE FROM henkilo WHERE nimi= 'Tapio Tamminen'
?>
Tulos: #1451 - Cannot delete or update a parent row: a foreign key constraint fails 
(`autokanta`.`auto`, CONSTRAINT `omistaja_va` FOREIGN KEY (`omistaja`) REFERENCES `henkilo` (`hetu`))-->

1 rivi(ä) muutettu. (Kysely kesti 0,0111 sekuntia.)
UPDATE henkilo SET osoite ='Mäkelänkatu 15' WHERE nimi = 'Matti Miettinen'

CES-528
Anne Autoil
0000-00-00
50
Holtiton tuhauttelu
