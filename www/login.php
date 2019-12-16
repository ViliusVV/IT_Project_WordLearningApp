<?php
include_once "basicHeader.php";
include "includes/dbHelper.inc.php";
//
//
//    $email = $_POST["email"];
//    $password = $_POST["password"];
//

    $email = $_POST["email"];
    $password = $_POST["password"];

    $email = 'user@mail.com';
    $sql = "SELECT * FROM user WHERE user.email LIKE '.".$email.".'";

    $stmt = mysqli_prepare($dbConn, "SELECT * FROM user WHERE user.email LIKE '?'");
    mysqli_stmt_bind_param($stmt, 's', $email);
    $result = mysqli_query($dbConn, $sql);

    if ($result) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["password"]. "<br>";
        }
    } else {
        echo "0 results";
    }



echo "etset<br>";
echo $email."<br>".$password;
echo "etset<br>";
?>

<div class="loginContainer">
    <div id="login">
        <form action="login.php" method="POST">
<!--                <p id="warning" style="color: #bd4147; text-align: center">*Nėra tokio vartotojo arba neteisingas slaptažodis</p>-->
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