<?php
include_once "header.php";
include_once "includes/dbHelper.inc.php";
include_once "includes/helperFunctions.inc.php";

$lang = $_GET["lang"];
$diff = $_GET["difficulty"];
$theme = $_GET["theme"];
$round = 1;

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

//$randsql = 'SELECT word.word_from, word.word_to, word.word_id, stat.unlearned FROM word LEFT JOIN stat ON word.word_id=stat.word_id WHERE word.lang_from='.$lang_f.' AND word.lang_to='.$lang_t.' AND  (stat.word_id IS NULL OR (stat.unlearned=0 AND stat.user_id='.$_SESSION["user_id"].')) ';
$randsql = 'SELECT word.word_from, word.word_to, word.word_id, stat.guess_count, stat.wrong_count, stat.unlearned, word.user_id FROM word LEFT JOIN stat ON word.word_id=stat.word_id WHERE word.lang_from='.$lang_f.' AND word.lang_to='.$lang_t;
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

//$randsql = $randsql.' AND  (stat.unlearned=0 OR stat.word_id IS NULL)';
$countGuessed = $countGuessed.' AND stat.unlearned=1  ';

if(isset($_GET["sortby"])){
    $randsql = $randsql." ORDER BY ".$_GET['sortby']." LIMIT 20";
}
else{
    $randsql = $randsql." ORDER BY wrong_count DESC LIMIT 20";
}

$result = mysqli_query($dbConn, $randsql);

if($result == false) {
    GoToNow("dicterr.php");
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


<div class="card bg-dark border-left-info shadow py-2 m-l-150 m-r-150">

    <h3 style="text-align: center">
        <button id="login-button" href="#" style="margin-right:25px;" class="send btn btn-primary btn-blue">
            <span class="fa fa-envelope fa-fw mr-3"></span>
            Išsiųsti ataskaita į el.paštą
        </button><br><br>
        <?php
            echo    'Vartotojas: '.$_SESSION["name"]. ' '.$_SESSION["surname"].'<br>
                     Žodynas: '.shortLangToLong($lang).'<br>
                     Tematika: '.translateTheme($dbConn, $theme).'<br>
                     Sudėtingumas: '.translateDifficulty($diff).'<br>';

        ?>
    </h3>
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Progresas</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> <?php echo $perc ?>%</div>
                        </div>
                        <div class="col">
                            <div class="progress progress-striped active progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar" style="width:  <?php echo $perc ?>%"
                                     aria-valuenow="<?php echo $perc ?>" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-book fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>

    <h3 style="text-align: center">
        Sunkiausiai įsimenami žodžiai:
    </h3>

    </div>

    <br><br>
    <div class="table100 ver3 m-l-250 m-r-250">
        <div class="table100-head">
            <table>

                <thead style="height: 50px">
                <caption>Monthly savings</caption>
                <tr class="row100 head">
                    <th class="cell100 w-15 p-l-40">ID</th>
                    <?php echo '<th class="cell100 w-20"><a href="report.php?lang='.$lang.'&theme='.$theme.'&difficulty='.$diff.'&sortby=word_from" class="unstyled-button" a>Žodis</a></a></th>' ?>
                    <?php echo '<th class="cell100 w-20"><a href="report.php?lang='.$lang.'&theme='.$theme.'&difficulty='.$diff.'&sortby=word_to" class="unstyled-button" a>Vertimas</a></a></th>' ?>
                    <th class="cell100 w-15 ">Klaidų skaičius</th>
                    <th class="cell100 w-15 ">Iš viso spėtą kartų</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="table100-body js-pscroll">
            <table>
                <tbody id="elements">

                <?php
                $result = mysqli_query($dbConn, $randsql);
                while($row = mysqli_fetch_assoc($result)) {

                    echo '
                        <tr class="row100 body">
                            <td class="cell100 w-15 p-l-40">'.$row["word_id"].'</td>
                            <td class="cell100 w-20 ">'.$row["word_from"].'</td>
                            <td class="cell100 w-20">'.$row["word_to"].'</td>
                            <td class="cell100 w-15 ">'.$row["guess_count"].'</td>
                            <td class="cell100 w-15 ">'.$row["wrong_count"].'</td>
                        </tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

<script>
    let email = "<?php echo $_SESSION["email"]; ?>";
    let content = "<?php echo 'Pabaigta žodyno:'.$perc; ?>%";
    $(document).ready(function () {
        $('.send').click(function () {
            console.log(email);
            data = new FormData()
            data.set('email',email)
            data.set('content', content)
            let request = new XMLHttpRequest();
            request.open("POST", 'includes/mailFunctions.inc.php', false);
            request.send(data)
        })
    })
</script>
<?php
include_once "footer.php"
?>