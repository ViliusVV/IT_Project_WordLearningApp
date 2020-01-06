<?php
include_once "header.php";
include_once "includes/dbHelper.inc.php";

$lang = $_GET["lang"];
$user_id  = 0;
if(isset($_POST["word_from"])) {
    if ($lang == "liet-angl") {
        $lang_f = 1;
        $lang_t = 2;
    } elseif ($lang == "liet-lot") {
        $lang_f = 1;
        $lang_t = 3;
    } elseif ($lang == "angl-lot") {
        $lang_f = 2;
        $lang_t = 3;
    } elseif ($lang == "private") {
        $lang_f = 0;
        $lang_t = 0;
        $user_id  = $_SESSION["user_id"];
    } else {
        GoToNow("index.php");
    }

    $sql = 'INSERT INTO word (theme_id, difficulty, user_id, lang_from, lang_to, word_from, word_to) VALUES('.$_POST["theme"].', '.$_POST["difficulty"].', '.$user_id.', '.$lang_f.', '.$lang_t.', "'.$_POST["word_from"].'", "'.$_POST["word_to"].'")';
    $result = mysqli_query($dbConn, $sql);
    GoToNow("wordlist.php?lang=".$lang);
}
?>

    <div class="word card bg-dark card-dark">
        <form action="wordadd.php?lang=<?php echo $lang ?>" method="POST">
            <h4 class="word card-header bg-info">
                <span style="color: white">
                    Pridėti žodį<br>
                </span>
            </h4>
            <br>
            <div class="card-body register" style="text-align: center">
                <!--                <p id="warning" style="color: #bd4147; text-align: center">Pasirinkite visus punktus!</p>-->
                <h2 class="card-title">Pridėti žodį</h2>
                <br> Žodis: <br>
                <input  class="fancy-input" type="text"
                                                                id="word_from"
                                                                name="word_from"
                                                                placeholder="Žodis"
                                                                required
                    >
                <br> Vertimas: <br>
                <input class="fancy-input" type="text"
                                                                id="word_to"
                                                                name="word_to"
                                                                placeholder="Vertimas"
                                                                required
                    >
                <br> Pasirinkite tematiką: <br>
                <select name="theme" id="theme">
                    <option selected value="0">Be temos</option>
                    <option value="1">Gyvūnai</option>
                    <option value="2">Augalai</option>
                    <option value="3">IT</option>
                    <option value="4">Elektronika</option>
                </select>

                <br> Pasirinkite sudėtingumą: <br>
                <select name="difficulty" id="difficulty">
                    <option selected value="1">Lengvai</option>
                    <option value="2">Vidutiniškai</option>
                    <option value="3">Sunkiai</option>
                </select>
            </div>
            <br>
            <div class="card-footer" style="text-align: center">
                <a href="wordlist.php?lang=<?php echo $_GET["lang"]; ?>" type="button" class="col-sm btn btn-danger btn-circle btn-xl" style="margin-right: 1em"><i class="fa fa-arrow-left"></i></a>
                <button type="submit" class="col-sm btn btn-success btn-circle btn-xl"><i class="fa fa-check"></i></button>
            </div>
        </form>
    </div>




<?php
include_once "footer.php"
?>