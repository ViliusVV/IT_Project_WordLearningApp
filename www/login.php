<?php
include_once "basicHeader.php";
?>

<div class="loginContainer">
    <div id="login">
        <form action="javascript:void(0);" method="POST">
            <fieldset class="clearfix">
                <p><span class="fontawesome-user"></span><input type="text"
                                                                placeholder="El.paštas"
                                                                required></p>

                <p><span class="fontawesome-lock"></span><input type="password"
                                                                placeholder='Slaptažodis'"
                                                                required></p>

                <p><input type="submit" value="Prisijungti"></p>
            </fieldset>
        </form>
        <p>Nėra paskyros? <a href="#">Užsiregistruoti</a><span class="fontawesome-arrow-right"></span></p>
    </div>
</div>
</body>

</html>