<?php
include_once "basicHeader.php";
?>

<div class="loginContainer">
    <div id="login">
        <form action="index.php" method="POST">
            <fieldset class="clearfix">
                <p id="warning" style="color: #bd4147; text-align: center">*Nėra tokio vartotojo arba neteisingas slaptažodis</p>
                <p><span class="fontawesome-user"></span><input type="text"
                                                                placeholder="El.paštas"
                                                                required
                                                                oninvalid="this.setCustomValidity('Reikalingas elektroninis paštas')"
                                                                oninput="this.setCustomValidity('')"
                                                                ></p>

                <p><span class="fontawesome-lock"></span><input type="password"
                                                                placeholder="Slaptažodis"
                                                                required
                                                                oninvalid="this.setCustomValidity('Reikalingas slaptažodis')"
                                                                oninput="this.setCustomValidity('')"
                                                                ></p>

                <p><input type="submit" value="Prisijungti"></p>
            </fieldset>
        </form>
        <p>Nėra paskyros? <a href="register.php">Užsiregistruoti</a><span class="fontawesome-arrow-right"></span></p>
        <p><span class="fontawesome-home"></span> <a href="index.php">Grįžti</a></p>
    </div>
</div>


</body>
</html>