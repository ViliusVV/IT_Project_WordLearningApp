<?php
include_once "header.php"
?>

<div class="word card bg-dark card-dark">
    <h4 class="word card-header bg-info">
                <span style="color: white">
                    Anglų-lietuvių (buitis, lengvas)<br>
                    5 iš 35
                         <div class="progress progress-striped active progress-sm mr-2">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 69%"
                                 aria-valuenow="69" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                </span>
    </h4>
    <br>
    <div class="card-body" style="text-align: center">
        <h2 class="card-title">Domum</h2>
        <br> Vertimas <br>
        <label>
            <input class="fancy-input" type="text" placeholder=Žodis>
        </label>
    </div>
    <br>
    <div class="card-footer" style="text-align: center">
        <button type="button" class="col-sm btn btn-danger btn-circle btn-xl" style="margin-right: 1em"><i class="fa fa-arrow-left"></i></button>
        <button type="button" class="col-sm btn btn-success btn-circle btn-xl"><i class="fa fa-check"></i></button>
    </div>
</div>


    <div class="card bg-dark border-left-info shadow py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Progresas</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">69%</div>
                        </div>
                        <div class="col">
                            <div class="progress progress-striped active progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 69%"
                                     aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-book fa-2x text-gray-300"></i>
                </div>
            </div>
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