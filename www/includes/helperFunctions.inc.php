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