<?php
function GoToNow ($url){
    echo '<script language="javascript">window.location.href ="'."http://$_SERVER[HTTP_HOST]/".$url.'"</script>';
}

function GetRole(){
    $role = $_SESSION["role_id"];
    if($role == null)
    {
        return null;
    }
    if($role == 1)
    {
        return "Mokinys";
    }
    if($role == 2)
    {
        return "Moderatorius";
    }
    if($role == 3)
    {
        return "Administratorius";
    }
}

function translateTheme($dbConn, $id)
{

    $sql = 'SELECT * FROM theme WHERE theme_id='.$id;
    $result = mysqli_query($dbConn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row["theme_name"];
}

function translateDifficulty($dif)
{

    if($dif == 1){
        return "Lengvas";
    }
    elseif ($dif == 2){
        return "Vidutiniškas";
    }
    elseif ($dif == 3){
        return "Sudėtingas";
    }
    elseif ($dif == 99 or $dif == 0){
        return "Visi";
    }
    else{
        return "NaN";
    }
}

function shortLangToLong($lang){
    if($lang == "liet-angl"){
        return "Lietuvių-Anglų";
    }
    elseif ($lang == "liet-lot"){
        return "Lietuvių-Lotynų";
    }
    elseif ($lang == "angl-lot"){
        return "Anglų-Lotynų";
    }
    elseif ($lang == "private"){
        return "Mano žodynas";
    }
}

function getUnlearnedWordCount($dbConn, $lang, $theme, $dif, $round)
{
    session_start();
    $user_id = 0;
    $lang_f = 0;
    $lang_t = 0;
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
    }
    $sql = 'SELECT COUNT(word.word_id) as cnt FROM word WHERE word.lang_from='.$lang_f.' AND word.lang_to='.$lang_t;
    if($lang == "private"){
        $ql = $sql.' AND word.user_id='.$user_id;
    }
    $result = mysqli_query($dbConn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row["cnt"];
}

function getLearntWordCount($lang)
{

}