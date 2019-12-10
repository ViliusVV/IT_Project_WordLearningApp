<?php
include_once "header.php"
?>


    <div class="table100 ver3 m-l-250 m-r-250">
        <div class="table100-head">
            <table>

                <thead>
                <caption>Monthly savings</caption>
                <tr class="row100 head">
                    <th class="cell100 w-10 p-l-40">ID</th>
                    <th class="cell100 w-40 p-l-40">Žodis</th>
                    <th class="cell100 w-40">Vertimas</th>
                    <th class="cell100 w-15 ">
                        <button id="add" href="userlist.php" type="button" class="col-sm btn btn-success btn-circle m-r-30"><i class="fa fa-plus"></i></button>
                        <button id="save" href="userlist.php" type="button" class="col-sm btn btn-success btn-circle"><i class="fa fa-check"></i></button>
                    </th>
                </tr>
                </thead>
            </table>
        </div>

        <div class="table100-body js-pscroll">
            <table>
                <tbody id="elements">
                    <tr class="row100 body">
                        <td class="cell100 w-10 p-l-40">1</td>
                        <td class="cell100 w-40 p-l-40"><input id="fromword" class="fancy-input" type="text" placeholder=Žodis
                                                               value="namas" style="margin-bottom: 0px; margin-top:0px">
                        </td>
                        <td class="cell100 w-40"><input id="toword" class="fancy-input" type="text" placeholder=Žodis value="house"
                                                        style="margin-bottom: 0px; margin-top:0px"></td>
                        <td class="cell100 w-15">
                            <button id="del1" href="userlist.php" type="button" class="col-sm btn btn-danger btn-circle m-l-20"><i
                                        class="fa fa-times"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function alertDel()
        {
            let yes = confirm("Ar tikrai norite ištrinti šį vertimą?");

            if(yes)
            {
                $('#elements').children(":first").remove();
            }
        }

        $(document).ready(function () {
            $('button[id^=del]').click(alertDel);

            $('#add').click(function ()
            {
                let tempElem = $('#elements').children(":first").clone();
                tempElem.find('#fromword').attr('value', '');
                tempElem.find('#toword').attr('value', '');
                tempElem.find('button[id^=del]').attr('id', 'del99');
                tempElem.prependTo('#elements');
                $('button[id^=del]').off('click');
                $('button[id^=del]').click(alertDel);

            });
            $('#save').click(function ()
            {
                alert("Išsaugota!");
            })
        })


    </script>


<?php
include_once "footer.php"
?>