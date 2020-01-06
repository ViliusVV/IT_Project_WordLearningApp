<?php
    include_once "header.php";
    include "includes/dbHelper.inc.php";

$role = GetRole();
$lang = $_GET["lang"];

if($role == "Mokinys" or $role == "Moderatorius")
{
//    $data = json_decode(file_get_contents("php://input"));

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

    $sql = "SELECT * FROM word WHERE lang_from=".$lang_f." AND lang_to=".$lang_t;
    $result = mysqli_query($dbConn, $sql);
    $data = array();

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
                    <th class="cell100 w-15 ">Žodis</th>
                    <th class="cell100 w-15">Vertimas</th>
                    <th class="cell100 w-15 ">Tematika</th>
                    <th class="cell100 w-15">Sudėtingumas</th>
                    <th class="cell100 w-15 ">
                        <a id="add" href="wordadd.php?lang=<?php echo $lang; ?>" type="button"
                                class="col-sm btn btn-success btn-circle m-r-40"><i class="fa fa-plus"></i></a>
                    </th>
                </tr>
                </thead>
            </table>
        </div>

        <div class="table100-body js-pscroll">
            <table>
                <tbody id="elements">
                <?php
                while($row = mysqli_fetch_assoc($result)) {

                    echo '
                    <tr id="rowtemplate" class="row100 body">
                        <td class="cell100 w-10 p-l-40">' . $row["word_id"] . '</td>
                        <td class="cell100 w-15">' . $row["word_from"] . '</td>
                        <td class="cell100 w-15">' . $row["word_to"] . '</td>
                        <td class="cell100 w-15">' . translateTheme($dbConn, $row["theme_id"]) . '</td>
                        <td class="cell100 w-15">' . translateDifficulty($row["difficulty"]) . '</td>
                        <td class="cell100 w-15">
                            <a href="wordedit.php?word_id='.$row["word_id"].'&lang='.$lang.'" type="button" class="col-sm btn btn-success btn-circle"><i class="fa fa-edit"></i></a>
                            <button id="'.$row["word_id"].'" type="button" class="col-sm btn btn-danger btn-circle m-l-20"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                    ';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function alertDel(e) {
            let idd = e.target.getAttribute('id');
            let yes = confirm("Ar tikrai norite ištrinti šį vertimą?");
            console.log(yes);
            if (yes) {
                console.log(idd);
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "deleteword.php?word_id="+idd, false);
                xhttp.send();
                location.reload();
            }
        }


        $(document).ready(function () {
            $('button').click(alertDel);

        })


    </script>


<?php
include_once "footer.php"
?>