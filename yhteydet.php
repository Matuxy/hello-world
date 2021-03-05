<?php include 'header_ul.php'; ?>


<div style="margin-left: 35%">
    <br>
    <p><h3> Voit ottaa meihin yhteyttä:</h3></p>
    
    <p style="display: inline"> * Puhelimitse yksittäisiin  <a href="myymalat.php">myymälöihin</a></p>
    
    <p type="text"> * Sähköpostitse: <a href="mailto:asiakaspalvelu@puutarhaliikeneilikka.fi">asiakaspalvelu@puutarhaliikeneilikka.fi</a></p>
    <p type="text"> * Täyttämällä alla olevan yhteydenottopyynnön</p>
</div>

<fieldset class="frame" style="margin-left: 35%" >
    <form class="form" action="db_yhtotto.php" method="POST">
        <div>
            <div class="col-45">
                <label for="ename">Nimi:</label>
            </div>
            <div>
                <span class="col-45">
                    <input type="text" id="ename" name="ename" requied>
                </span>
            </div>
        </div>
        <div>
            <div class="col-45">
                <label for="email">Sähköposti:</label>
            </div>
            <div>
                <span class="col-55">
                    <input type="text" id="email" name="email" required>
                </span>
            </div>
        </div>
        <div>
            <div class="col-45">
                <label for="aihe">Aihe:</label>
            </div>
            <div>
                <select class="col-45" name="aihe" style="height: 23px;" required>
                    <option value="0">Tuotteet</option>
                    <option value="1">Tilaus</option>
                    <option value="2">Yhteydenottopyyntö</option>
                    <option value="3">Muu</option>
                </select>
            </div>
        </div>
        <br>
        <div>        
            <label for="viesti-txt">Viesti:</label>         
            <div>
                <textarea id="viesti-txt" name="viesti-txt" rows="4" cols="40"
                style="resize: none;"  style="border-radius: 6px;">
            </textarea>
            </div>
        </div>
        <div>
            <div>
                <input type="checkbox" id="uutisk" name="uutisk">
                <label for="uutiskirje"> Haluan tilata Puutarhaliike Neilikan uutiskirjeen </label>
            </div>
        </div>
        <br>
        <div>
            <input style="display : relative" class="button" type="submit" value="Lähetä">
        </div>
    </form>
</fieldset>
<br>
<br>
<br>
<br>

<div class="footer">
    <?php include 'footer.html'; ?>
</div>