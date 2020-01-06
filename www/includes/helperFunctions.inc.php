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
    else{
        return "NaN";
    }
}