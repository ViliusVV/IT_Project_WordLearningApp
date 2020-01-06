<?php
include_once "header.php";
include_once "includes/dbHelper.inc.php";

$lang = $_GET["lang"];
$diff = $_GET["difficulty"];
$theme = $_GET["theme"];
$round = $_GET["round"];

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

$sql = "SELECT * FROM stat WHERE stat.word_id=".$_GET['wid'];
$result = mysqli_query($dbConn, $sql);
if($result != false) $row = mysqli_fetch_assoc($result);

$corr = null;
if(isset($_GET["word_to_ans"])){
    if($_GET["word_to_ans"] == $_GET["correct"]){
        $corr = true;
        if($row != null) {
            $sql = 'UPDATE stat SET guess_count = guess_count + 1, unlearned = 1 WHERE stat.word_id='.$_GET["wid"].' AND stat.user_id='.$_SESSION["user_id"];
        }
        else{
            $sql = 'INSERT INTO stat(user_id, guess_count, wrong_count, word_id, unlearned) VALUE ('.$_SESSION["user_id"].', 1, 0, '.$_GET["wid"].', 1)';
        }
        ;                }
    else{
        $corr = false;
        if($row != null) {
            $sql = 'UPDATE stat SET stat.wrong_count = wrong_count+1, guess_count = guess_count + 1, unlearned = 0 WHERE stat.word_id='.$_GET["wid"].' AND stat.user_id='.$_SESSION["user_id"];
        }
        else{
            $sql = 'INSERT INTO stat(user_id, guess_count, wrong_count, word_id, unlearned) VALUE ('.$_SESSION["user_id"].', 1, 1, '.$_GET["wid"].', 0)';
        }
    }
    $result = mysqli_query($dbConn, $sql);
}

//$randsql = 'SELECT word.word_from, word.word_to, word.word_id, stat.unlearned FROM word LEFT JOIN stat ON word.word_id=stat.word_id WHERE word.lang_from='.$lang_f.' AND word.lang_to='.$lang_t.' AND  (stat.word_id IS NULL OR (stat.unlearned=0 AND stat.user_id='.$_SESSION["user_id"].')) ';
$randsql = 'SELECT word.word_from, word.word_to, word.word_id, stat.unlearned, word.user_id FROM word LEFT JOIN stat ON word.word_id=stat.word_id WHERE word.lang_from='.$lang_f.' AND word.lang_to='.$lang_t;
$countWords = 'SELECT COUNT(word.word_id) as cnt FROM word LEFT JOIN stat ON word.word_id=stat.word_id WHERE word.lang_from='.$lang_f.' AND word.lang_to='.$lang_t;
$countGuessed = 'SELECT COUNT(word.word_id) as cnt FROM word LEFT JOIN stat ON word.word_id=stat.word_id WHERE stat.stat_id IS NOT NULL AND word.lang_from='.$lang_f.' AND word.lang_to='.$lang_t.' AND stat.user_id='.$_SESSION["user_id"];

if($theme !=  99){
    $countWords = $countWords.' AND theme_id='.$theme;
    $randsql = $randsql.' AND theme_id='.$theme;
    $countGuessed = $countGuessed.' AND theme_id='.$theme;
}
if($diff != 0){
    $countWords = $countWords.' AND difficulty='.$diff;
    $randsql = $randsql.' AND difficulty='.$diff;
    $countGuessed = $countGuessed.' AND difficulty='.$diff;
}
if($lang == "private")
{
    $countWords = $countWords.' AND word.user_id='.$_SESSION["user_id"];
    $randsql = $randsql.' AND word.user_id='.$_SESSION["user_id"];
}
if($round == 1){
    $randsql = $randsql.' AND  (stat.word_id IS NULL) ';
}
else{
    $randsql = $randsql.' AND  stat.unlearned=0';
    $countWords = $countWords.' AND  stat.unlearned=0';
}
$randsql = $randsql.' ORDER BY RAND() LIMIT 1;';

$result = mysqli_query($dbConn, $randsql);
$row1 = mysqli_fetch_assoc($result);
if($row1 == null) {
    if(isset($_GET["word_to_ans"])){
        GoToNow("dictsucc.php");
    }
    else{
        GoToNow("dicterr.php");
    }

}
$result = mysqli_query($dbConn, $countWords);
$row2 = mysqli_fetch_assoc($result);
$result = mysqli_query($dbConn, $countGuessed);
$row3 = mysqli_fetch_assoc($result);
$wordcount = $row2["cnt"];
$guessCount = $row3["cnt"];
$perc = ceil($guessCount / $wordcount *100);
if(is_nan($perc)){
    $perc = 0;
}
if($round != 1)
{
    $perc = 100;
}

?>

<div class="word card bg-dark card-dark">
    <form method="GET" action="wordlearn.php">
    <h4 class="word card-header bg-info">
                <span style="color: white">
                    <?php echo shortLangToLong($lang).', '.$round.' etapas ('.translateTheme($dbConn, $theme).', '.translateDifficulty($diff).')' ?><br>
                    <?php
                    if($round == 1){
                        echo $guessCount.' iš '.$wordcount;
                    }
                    else{
                        echo 'Liko '. $wordcount;
                    }
                    ?>

                         <div class="progress progress-striped active progress-sm mr-2">
                            <div class="progress-bar bg-success" role="progressbar" style="width:  <?php echo $perc ?>%"
                                 aria-valuenow="<?php echo $perc ?>" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                </span>
    </h4>
    <br>
    <div class="card-body" style="text-align: center">
        <?php
            if(isset($_GET["word_to_ans"])) {
                if ($corr) {
                    echo '<p id="success" style="color: #5ebd0e; text-align: center">Teisingai!</p>';;
                } else {
                    echo '<p id="warning" style="color: #bd4147; text-align: center">Neteisingai!</p>';
                }
            }
        ?>

        <h2 class="card-title"><?php echo $row1["word_from"]; ?></h2>
        <br> Vertimas <br>
        <input hidden name="lang" value="<?php echo $lang; ?>">
        <input hidden name="theme" value="<?php echo $theme; ?>">
        <input hidden name="difficulty" value="<?php echo $diff; ?>">
        <input hidden name="round" value="<?php echo $round; ?>">
        <input hidden name="correct" value="<?php echo $row1["word_to"]; ?>">
        <input hidden name="wid" value="<?php echo $row1["word_id"]; ?>">
        <label>
            <input class="fancy-input" name="word_to_ans" type="text"  required placeholder=Žodis>
        </label>
    </div>
    <br>
    <div class="card-footer" style="text-align: center">
        <a href="learnoptions.php?lang=<?php echo $lang ?>"><button type="button" class="col-sm btn btn-danger btn-circle btn-xl" style="margin-right: 1em"><i class="fa fa-arrow-left"></i></button></a>
        <button id="check" type="submit" class="col-sm btn btn-success btn-circle btn-xl"><i class="fa fa-check"></i></button>
    </div>
    </form>
</div>




<!--<script>-->
<!--    $(document).ready(function () -->
<!--    {-->
<!--        $()    -->
<!--    })-->
<!--</script>-->

<?php
    include_once "footer.php";
?>