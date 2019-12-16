<?php
include_once "basicHeader.php";
include "includes/dbHelper.inc.php";
include "includes/helperFunctions.inc.php";
//
//
//    $email = $_POST["email"];
//    $password = $_POST["password"];
//

if(isset($_POST["email"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE user.email LIKE ?";
    $stmt = mysqli_prepare($dbConn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    if ($row != null) {
        if(password_verify($password, $row["pass_hash"])) {
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $row["name"];
            $_SESSION["surname"] = $row["surname"];
            $_SESSION["role_id"] = $row["role"];
            GoToNow("index.php");
        }
        else
        {
            $passbad = null;
        }
    }
}
?>

<div class="loginContainer">
    <div id="login">
        <form action="login.php" method="POST">
<?php
    if($row == null and isset($_POST["email"]) or $passbad){
        echo '<p id="warning" style="color: #bd4147; text-align: center">*Nėra tokio vartotojo arba neteisingas slaptažodis</p>';
    }
?>
                <p><span class="fontawesome-user"></span><input type="text"
                                                                name = "email"
                                                                placeholder="El.paštas"
                                                                required
                                                                oninvalid="this.setCustomValidity('Reikalingas elektroninis paštas')"
                                                                oninput="this.setCustomValidity('')"
                                                                ></p>

                <p><span class="fontawesome-lock"></span><input type="password"
                                                                name = "password"
                                                                placeholder="Slaptažodis"
                                                                required
                                                                oninvalid="this.setCustomValidity('Reikalingas slaptažodis')"
                                                                oninput="this.setCustomValidity('')"
                                                                ></p>

                <p><input type="submit" value="Prisijungti"></p>
        </form>
        <p>Nėra paskyros? <a href="register.php">Užsiregistruoti</a><span class="fontawesome-arrow-right"></span></p>
        <p><span class="fontawesome-home"></span> <a href="index.php">Grįžti</a></p>
    </div>
</div>


</body>
</html>