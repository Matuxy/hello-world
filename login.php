<?php
session_start();
require_once "config.php";
?>
<fieldset class="frame" style="margin-left: 35%">
    <form class="form" action="/db_action_page.php" method="POST">
        <div>
            <div class="col-45">
                <label for="ename">Nimi:</label>
            </div>
            <div>
                <span class="col-55">
                    <input type="text" id="ename" name="ename">
                </span>
            </div>
        </div>
        <div>
            <div class="col-45">
                <label for="email">Sähköposti:</label>
            </div>
            <div>
                <span class="col-55">
                    <input type="text" id="email" name="email">
                </span>
            </div>
        </div>
        <div>
            <div class="col-45">
                <label for="yht-type">Aihe:</label>
            </div>
            <div>
                <select class="col-45" id="yht-type" style="height: 23px;">
                    <option value="0">Tuotteet</option>
                    <option value="1">Tilaus</option>
                    <option value="2">Yhteydenottopyyntö</option>
                    <option value="3">Muu</option>
                </select>
            </div>
        </div>
        <div>
            <div class="col-45">
                <label for="viesti-txt">Viesti:</label>
            </div>
            <div>
                <textarea id="viesti-txt" name="viesti-txt" rows="4" cols="35"
                         style="height:100px" style="width: 330px">
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