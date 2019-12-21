<?php
    include_once "header.php";
    include "includes/dbHelper.inc.php";

$role = GetRole();
if($role == "Moderatorius")
{
    $data = json_decode(file_get_contents("php://input"));

    $sql = "SELECT * FROM word";
    $result = mysqli_query($dbConn, $sql);
    $data = array();
    if(mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_array()) {
            $data[] = array(
                'word_from' => ($row['word_from']),
                'word_to' => $row['word_to'],
            );
        }
    }
    $jsonobj = json_encode($data);
    $lang = $_GET["lang"];
    $post = $_GET["send"];
}
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
                        <button id="add" href="userlist.php" type="button"
                                class="col-sm btn btn-success btn-circle m-r-30"><i class="fa fa-plus"></i></button>
                        <button id="save" href="userlist.php" type="button" class="col-sm btn btn-success btn-circle"><i
                                    class="fa fa-check"></i></button>
                    </th>
                </tr>
                </thead>
            </table>
        </div>

        <div class="table100-body js-pscroll">
            <table>
                <tbody id="elements">

                <tr id="rowtemplate" class="row100 body">
                    <td class="cell100 w-10 p-l-40">0</td>
                    <td class="cell100 w-40 p-l-40"><input id="fromword0" class="fancy-input" type="text"
                                                           placeholder=Žodis
                                                           value="" style="margin-bottom: 0px; margin-top:0px">
                    </td>
                    <td class="cell100 w-40"><input id="toword0" class="fancy-input" type="text" placeholder=Žodis
                                                    value=""
                                                    style="margin-bottom: 0px; margin-top:0px"></td>
                    <td class="cell100 w-15">
                        <button id="del0" type="button" class="col-sm btn btn-danger btn-circle m-l-20"><i
                                    class="fa fa-times"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        let idCounter = 1;
        let n = 50;
        let dictArr = [{"word_from":"kat\u0117","word_to":"cat"},{"word_from":"\u0161uo","word_to":"dog"},{"word_from":"karv\u0117","word_to":"cow"},{"word_from":"tigras","word_to":"tiger"},{"word_from":"\u017eirafa","word_to":"giraffe"},{"word_from":"li\u016bta","word_to":"lion"},{"word_from":"gyvat\u0117","word_to":"snake"}];


        function alertDel(e) {
            let idd = e.target.getAttribute('id');
            if(idd == null) return;
            let num = idd.match(/\d+/)[0];
            let yes = confirm("Ar tikrai norite ištrinti šį vertimą?");
            if (yes) {
                console.log(num);
                $("#row" + num).hide();
                dictArr[num - 1] = {};
                dictArr = dictArr.filter(value => JSON.stringify(value) !== '{}');

            }
        }


        $(document).ready(function () {

            $("#rowtemplate").hide();
            $('button[id^=del]').click(alertDel);

            $('#add').click(function () {
                dictArr.push({});
                $("#rowtemplate").show();
                let tempElem = $('#rowtemplate').clone();
                tempElem.attr('id', '');
                $("#rowtemplate").hide();
                tempElem.find('#fromword').attr('value', 'te');
                tempElem.find('#toword').attr('value', 'te');
                tempElem.find('td')[0].textContent = idCounter;
                tempElem.find('button[id^=del]').attr('id', 'del' + idCounter);
                tempElem.find('input[id^=fromword]').attr('id', 'fromword' + idCounter);
                tempElem.find('input[id^=toword]').attr('id', 'toword' + idCounter);
                tempElem.prependTo('#elements');
                $('button[id^=del]').off('click');
                $('button[id^=del]').click(alertDel);
                idCounter++;
            });
            $('#save').click(function () {

                $("input[id^=fromword]").each(function (i, el) {
                    let idid = $(el).attr("id").match(/\d+/)[0];
                    if(idid > 0)
                    {
                        console.log(parseInt($(el).attr("id")));
                        dictArr[idid-1].word_from = $(el).val();
                    }
                });

                $("input[id^=toword]").each(function (i, el) {
                    let idid = $(el).attr("id").match(/\d+/)[0];
                    if(idid > 0)
                    {
                        dictArr[idid-1].word_to = $(el).val();
                    }
                });

                dictArr = dictArr.filter(value => JSON.stringify(value) !== '{}');
                console.log(dictArr);

                var xhr = new XMLHttpRequest();
                var url = window.location.href + "&send=true";
                xhr.open("POST", url, true);
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // var json = JSON.parse(xhr.responseText);
                        console.log("ready");
                    }
                };
                var data = JSON.stringify(dictArr);
                xhr.send(data);
            });

            for(let le in dictArr){
                console.log(dictArr[0].word_from);
                $("#rowtemplate").show();
                let tempElem = $('#rowtemplate').clone();
                tempElem.attr('id', 'row' + idCounter);
                $("#rowtemplate").hide();
                tempElem.find('#fromword0').attr('value', dictArr[le].word_from);
                tempElem.find('#toword0').attr('value', dictArr[le].word_to);
                tempElem.find('td')[0].textContent = idCounter;
                tempElem.find('button[id^=del]').attr('id', 'del' + idCounter);
                tempElem.find('input[id^=fromword]').attr('id', 'fromword' + idCounter);
                tempElem.find('input[id^=toword]').attr('id', 'toword' + idCounter);
                tempElem.prependTo('#elements');
                $('button[id^=del]').off('click');
                $('button[id^=del]').click(alertDel);
                idCounter++;
            }

        })


    </script>


<?php
include_once "footer.php"
?>