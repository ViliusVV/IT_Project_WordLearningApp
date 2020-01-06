<?php
include_once "header.php";

$lang = $_GET["lang"];

?>

    <div class="word card bg-dark card-dark">
        <form action="wordlearn.php" method="GET">
        <h4 class="word card-header bg-info">
                <span style="color: white">
                    <?php echo shortLangToLong($lang) ?> mokymosi nustatymai<br>
                </span>
        </h4>
        <br>
        <div class="card-body" style="text-align: center">
<!--            <p id="warning" style="color: #bd4147; text-align: center">Pasirinkite visus punktus!</p>-->
            <h2 class="card-title">Nustaymai</h2>
            <br> Pasirinkite tematiką: <br>
            <select name="theme" id="theme">
                <option selected value="99">Visi</option>
                <option value="0">Be temos</option>
                <option value="1">Gyvūnai</option>
                <option value="2">Augalai</option>
                <option value="3">IT</option>
                <option value="4">Elektronika</option>
            </select>

            <br> Pasirinkite sudėtingumą: <br>
            <select name="difficulty" id="difficulty">
                <option selected value="0">Visi</option>
                <option value="1">Lengvai</option>
                <option value="2">Vidutiniškai</option>
                <option value="3">Sunkiai</option>
            </select>

            <br> Etapas: <br>
            <select name="round" id="round">
                <option selected value="1">Pirmas</option>
                <option value="2">Antras</option>
            </select>
            <input type='hidden' name='lang' value='<?php echo $lang ?>' />
        </div>
        <br>
        <div class="card-footer" style="text-align: center">
            <a href="index.php" type="button" class="col-sm btn btn-danger btn-circle btn-xl" style="margin-right: 1em"><i class="fa fa-arrow-left"></i></a>
            <button type="submit" class="col-sm btn btn-success btn-circle btn-xl"><i class="fa fa-check"></i></button>
        </div>
        </form>
    </div>




<?php
include_once "footer.php"
?>