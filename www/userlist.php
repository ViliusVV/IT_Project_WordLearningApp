<?php
include_once "header.php";
include_once "includes/dbHelper.inc.php";

$sql = "SELECT * FROM user";
$result = mysqli_query($dbConn, $sql);

?>


    <div class="table100 ver3">
        <div class="table100-head">
            <table>
                <thead>
                <tr class="row100 head">
                    <th class="cell100 w-15 p-l-40">ID</th>
                    <th class="cell100 w-40">Vardas Pavardė</th>
                    <th class="cell100 w-30">El.paštas</th>
                    <th class="cell100 w-15">Funkcijos</th>
                </tr>
                </thead>
            </table>
        </div>

        <div class="table100-body js-pscroll">
            <table>
                <tbody>
                <?php
                while($row = mysqli_fetch_assoc($result)) {
                    if($row["user_id"] == 0) continue;
                    echo '
                        <tr class="row100 body">
                            <td class="cell100 w-15 p-l-40">'.$row["user_id"].'</td>
                            <td class="cell100 w-40"">'.$row["name"].' '.$row["surname"].'</td>
                            <td class="cell100 w-30">'.$row["email"].'</td>
                            <td class="cell100 w-15">
                                <a href="useredit.php?user_id='.$row["user_id"].'" type="button" class="col-sm btn btn-success btn-circle"><i class="fa fa-user-edit"></i></a>
                                <button id="'.$row["user_id"].'" type="button" class="col-sm btn btn-danger btn-circle m-l-20"><i class="fa fa-times"></i>
                            </td>
                        </tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>


<script>
    $(document).ready(function ()
    {
        $('button').click(function (e)
        {
            let deleted = confirm("Ar tikrai norite pašalinti šį vartotoją");
            let idid = e.target.getAttribute('id');
            console.log(idid);
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "deleteuser.php?user_id="+idid, false);
            xhttp.send();
            location.reload();
        })
    })
</script>


<?php
include_once "footer.php"
?>