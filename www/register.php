<?php
include_once "basicHeader.php";
?>

<div class="loginContainer">
    <div id="login">
        <form action="javascript:void(0);" method="POST">
            <fieldset class="clearfix">
                <p><span class="fontawesome-user"></span><input type="text" value="username"
                                                                onBlur="if(this.value == '') this.value = 'El.paštas'"
                                                                onFocus="if(this.value == 'El.paštas') this.value = ''"
                                                                required></p>

                <p><span class="fontawesome-lock"></span><input type="password" value="password"
                                                                onBlur="if(this.value == '') this.value = 'Slaptažodis'"
                                                                onFocus="if(this.value == 'Slaptažodis') this.value = ''"
                                                                required></p>
                <p><input type="submit" value="Prisijungti"></p>
            </fieldset>
        </form>
        <p>Nėra paskyros? <a href="#">Užsiregistruoti</a><span class="fontawesome-arrow-right"></span></p>
    </div>
</div>
</body>

</html>