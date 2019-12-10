<?php
include_once "header.php"
?>

    <div class="word card bg-dark card-dark">
        <form action="report.php" method="POST">
            <h4 class="word card-header bg-info">
                <span style="color: white">
                    Ataskaitos pateikimo nustatymai<br>
                </span>
            </h4>
            <br>
            <div class="card-body" style="text-align: center">
<!--                <p id="warning" style="color: #bd4147; text-align: center">Pasirinkite visus punktus!</p>-->
                <h2 class="card-title">Nustaymai</h2>
                <br> Pasirinkite tematiką: <br>
                <select name="theme" id="theme">
                    <option disabled selected value="noselect">Pasirinkite...</option>
                    <option value="visi">Visi</option>
                    <option value="gyvunai">Gyvūnai</option>
                    <option value="augalai">Augalai</option>
                    <option value="it">IT</option>
                    <option value="elektronika">Elektronika</option>
                </select>

                <br> Pasirinkite sudėtingumą: <br>
                <select name="difficulty" id="difficulty">
                    <option disabled selected value="noselect">Pasirinkite...</option>
                    <option value="visi">Visi</option>
                    <option value="lengvai">Lengvai</option>
                    <option value="vidutiniskai">Vidutiniškai</option>
                    <option value="sunkai">Sunkiai</option>
                </select>
            </div>
            <br>
            <div class="card-footer" style="text-align: center">
                <button type="button" class="col-sm btn btn-danger btn-circle btn-xl" style="margin-right: 1em"><i class="fa fa-arrow-left"></i></button>
                <button type="submit" class="col-sm btn btn-success btn-circle btn-xl"><i class="fa fa-check"></i></button>
            </div>
        </form>
    </div>




<?php
include_once "footer.php"
?>