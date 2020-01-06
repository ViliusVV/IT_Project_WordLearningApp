<?php
include_once "header.php";
include_once "includes/dbHelper.inc.php";

$lang = $_GET["lang"];
$user_id  = 0;
if(isset($_POST["word_from"])) {

    $sql = 'UPDATE word SET word_from="'.$_POST["word_from"].'", word_to="'.$_POST["word_to"].'", theme_id='.$_POST["theme"].', difficulty='.$_POST["difficulty"].' WHERE word_id='.$_GET['word_id'];
    $result = mysqli_query($dbConn, $sql);
    GoToNow("wordlist.php?lang=".$lang);
}

$sql = 'SELECT * FROM word WHERE word_id='.$_GET["word_id"];
$result = mysqli_query($dbConn, $sql);
$row = mysqli_fetch_assoc($result);

?>

    <div class="word card bg-dark card-dark">
        <form action="wordedit.php?lang=<?php echo $lang.'&word_id='.$_GET['word_id']; ?>" method="POST">
            <h4 class="word card-header bg-info">
                <span style="color: white">
                    Redaguoti žodį<br>
                </span>
            </h4>
            <br>
            <div class="card-body register" style="text-align: center">
                <!--                <p id="warning" style="color: #bd4147; text-align: center">Pasirinkite visus punktus!</p>-->
                <h2 class="card-title">Redaguoti žodį</h2>
                <br> Žodis: <br>
                <input  class="fancy-input" type="text"
                        id="word_from"
                        name="word_from"
                        placeholder="Žodis"
                        required
                        value="<?php echo $row["word_from"] ?>"
                >
                <br> Vertimas: <br>
                <input class="fancy-input" type="text"
                       id="word_to"
                       name="word_to"
                       placeholder="Vertimas"
                       required
                       value="<?php echo $row["word_to"] ?>"
                >
                <br> Pasirinkite tematiką: <br>
                <select name="theme" id="theme">
                    <option <?php if($row["theme_id"] == 0) echo "selected" ?> value="0">Be temos</option>
                    <option <?php if($row["theme_id"] == 1) echo "selected" ?> value="1">Gyvūnai</option>
                    <option <?php if($row["theme_id"] == 2) echo "selected" ?> value="2">Augalai</option>
                    <option <?php if($row["theme_id"] == 3) echo "selected" ?> value="3">IT</option>
                    <option <?php if($row["theme_id"] == 4) echo "selected" ?> value="4">Elektronika</option>
                </select>

                <br> Pasirinkite sudėtingumą: <br>
                <select name="difficulty" id="difficulty">
                    <option <?php if($row["difficulty"] == 1) echo "selected" ?>  value="1">Lengvai</option>
                    <option <?php if($row["difficulty"] == 2) echo "selected" ?>  value="2">Vidutiniškai</option>
                    <option <?php if($row["difficulty"] == 3) echo "selected" ?> value="3">Sunkiai</option>
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