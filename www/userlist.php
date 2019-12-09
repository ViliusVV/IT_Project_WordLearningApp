<?php
include_once "header.php"
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
                <tr class="row100 body">
                    <td class="cell100 w-15 p-l-40">5</td>
                    <td class="cell100 w-40"">Vilius Valinskis</td>
                    <td class="cell100 w-30">lisqrnd@gmx.com/td>
                    <td class="cell100 w-15">
                        <a href="userlist.php" type="button" class="col-sm btn btn-success btn-circle"><i class="fa fa-edit"></i></a>
                        <a href="userlist.php" type="button" class="col-sm btn btn-danger btn-circle m-l-20"><i class="fa fa-user-edit"></i>
                    </td>
                </tr>




                </tbody>
            </table>
        </div>
    </div>


<?php
include_once "footer.php"
?>