<?php
include_once "header.php"
?>

<div class="word card bg-dark card-dark">
    <h4 class="word card-header bg-info">
                <span style="color: white">
                    Anglų-lietuvių (buitis, lengvas)<br>
                    5 iš 35
                         <div class="progress progress-striped active progress-sm mr-2">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 70%"
                                 aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                </span>
    </h4>
    <br>
    <div class="card-body" style="text-align: center">
        <p id="warning" style="color: #bd4147; text-align: center">Įveskite vertimą!</p>
        <h2 class="card-title">Domum</h2>
        <br> Vertimas <br>
        <label>
            <input class="fancy-input" type="text" placeholder=Žodis>
        </label>
    </div>
    <br>
    <div class="card-footer" style="text-align: center">
        <a href="index.php"><button type="button" class="col-sm btn btn-danger btn-circle btn-xl" style="margin-right: 1em"><i class="fa fa-arrow-left"></i></button></a>
        <button id="check" type="button" class="col-sm btn btn-success btn-circle btn-xl"><i class="fa fa-check"></i></button>
    </div>
</div>




<!--<script>-->
<!--    $(document).ready(function () -->
<!--    {-->
<!--        $()    -->
<!--    })-->
<!--</script>-->

<?php
    include_once "footer.php"
?>