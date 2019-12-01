<?php
include_once "basicHeader.php";
?>

<div class="loginContainer">
    <div id="login">
        <form action="index.php" method="POST">
            <fieldset class="clearfix">
                <p><span class="fontawesome-user"></span><input type="text"
                                                                placeholder="Vardas"
                                                                required
                                                                oninvalid="this.setCustomValidity('Reikalingas vardas')"
                                                                oninput="this.setCustomValidity('')"
                    ></p>

                <p><span class="fontawesome-user"></span><input type="text"
                                                                placeholder="El.paštas"
                                                                required
                                                                oninvalid="this.setCustomValidity('Reikalinga pavardė')"
                                                                oninput="this.setCustomValidity('')"
                    ></p>

                <p><span class="fontawesome-user"></span><input type="text"
                                                                placeholder="El.paštas"
                                                                required
                                                                oninvalid="this.setCustomValidity('Reikalingas elektroninis el.paštas')"
                                                                oninput="this.setCustomValidity('')"
                    ></p>

                <p><span class="fontawesome-lock"></span><input type="password"
                                                                placeholder="Slaptažodis"
                                                                required
                                                                oninvalid="this.setCustomValidity('Reikalingas slaptažodis')"
                                                                oninput="this.setCustomValidity('')"
                    ></p>

                <p><span class="fontawesome-user"></span><input type="text"
                                                                placeholder="Pakartokite slaptažodį"
                                                                required
                                                                oninvalid="this.setCustomValidity('Reikia pakartoti slaptažodį')"
                                                                oninput="this.setCustomValidity('')"
                    ></p>

                <p><input type="submit" value="Užsiregistruoti"></p>
            </fieldset>
        </form>
        <p><span class="fontawesome-home"></span> <a href="index.php">Grįžti</a></p>
    </div>
</div>