<?php

include_once "basicHeader.php";
include "includes/helperFunctions.inc.php";

?>


<div id="sidebar">
    <!-- Bootstrap List Group -->
    <ul id="sidebarGroup" class="list-group">

        <!-- MENU Separator with title -->
        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small>MENIU</small>
        </li>
        <!-- /END Separator -->

        <a href="index.php" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-home fa-fw mr-3"></span>
                <span class="menu-collapsed">Pagrindinis</span>
            </div>
        </a>


        <?php
        if (GetRole() == "Mokinys") {
            echo '
<div>
            <a href="#submenu1" data-toggle="collapse" aria-expanded="false" data-parent="#sidebarGroup"
               class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <i class="fas fa-spell-check fa-fw mr-3"></i>
                    <span class="menu-collapsed">Mokytis</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id=\'submenu1\' class="collapse sidebar-submenu">
                <a href="wordlearn.php" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Lietuvių-anglų</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Lietuvių-Lotynų</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Anglų-Esperanto</span>
                </a>
            </div>
        </div>

        <div>
            <a href="#submenu2" data-toggle="collapse" aria-expanded="false" data-parent="#sidebarGroup"
               class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <i class="fas fa-book-reader fa-fw mr-3"></i>
                    <span class="menu-collapsed">Mano žodynas</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id=\'submenu2\' class="collapse sidebar-submenu">
                <a href="wordlist.php" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Sukuriti žodyna</span>
                </a>
                <a href="mylearn.php" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Mokytis Žodyna</span>
                </a>
            </div>
        </div>

        <a href="reportoptions.php" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-chart-line fa-fw mr-3"></span>
                <span class="menu-collapsed">Ataskaitos ir statistika</span>
            </div>
        </a>';
        }
        ?>


        <?php
        if (GetRole() == "Moderatorius") {
            echo '
             <!-- Separator with title -->
        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small>MODERAVIMAS</small>
        </li>
        <!-- /END Separator -->
        <div>
            <a href="#submenu3" data-toggle="collapse" aria-expanded="false" data-parent="#sidebarGroup"
               class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <i class="fas fa-book-open fa-fw mr-3"></i>
                    <span class="menu-collapsed">Redaguoti žodyną</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id=\'submenu3\' class="collapse sidebar-submenu">
                <a href="wordlist.php" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Lietuvių-anglų</span>
                </a>
                <a href="wordlist.php" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Lietuvių-Lotynų</span>
                </a>
                <a href="wordlist.php" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Anglų-Esperanto</span>
                </a>
            </div>
        </div>
            ';
        }
        ?>

        <!--        Separator with title -->
        <!--        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">-->
        <!--            <small>NUSTATYMAI</small>-->
        <!--        </li>-->
        <!--       /END Separator -->
        <!--        <a href="#submenu3" data-toggle="collapse" aria-expanded="false" data-parent="#sidebarGroup"-->
        <!--           class="bg-dark list-group-item list-group-item-action flex-column align-items-start">-->
        <!--            <div class="d-flex w-100 justify-content-start align-items-center">-->
        <!--                <span class="fa fa-user fa-fw mr-3"></span>-->
        <!--                <span class="menu-collapsed">Profilis</span>-->
        <!--                <span class="submenu-icon ml-auto"></span>-->
        <!--            </div>-->
        <!--        </a>-->
        <!--         Submenu content -->
        <!--        <div id='submenu3' class="collapse sidebar-submenu">-->
        <!--            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">-->
        <!--                <span class="menu-collapsed">Nustatymai</span>-->
        <!--            </a>-->
        <!--            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">-->
        <!--                <span class="menu-collapsed">Slaptažodžio keitimas</span>-->
        <!--            </a>-->
        <!--        </div>-->


<?php
if (GetRole() == "Administratorius") {
    echo '
        <!-- Separator with title -->
        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small>ADMINISTRATORIUS</small>
        </li>
        <!-- /END Separator -->
        <a href="userlist.php" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-users fa-fw mr-3"></span>
                <span class="menu-collapsed">Profilių redagavimas</span>
            </div>
        </a>
        </a>


        <!--        <a href="wordlist.php"" class="bg-dark list-group-item list-group-item-action">-->
        <!--            <div class="d-flex w-100 justify-content-start align-items-center">-->
        <!--                <span class="fa fa-envelope-open-text fa-fw mr-3"></span>-->
        <!--                <span class="menu-collapsed">Žodynų redagavimas</span>-->
        <!--            </div>-->
        <!--        </a>-->


        <!--        <li class="list-group-item sidebar-separator menu-collapsed"></li>-->
        <!--       -->
        <!--        <a href="#" class="bg-dark list-group-item list-group-item-action">-->
        <!--            <div class="d-flex w-100 justify-content-start align-items-center">-->
        <!--                <span class="fa fa-question fa-fw mr-3"></span>-->
        <!--                <span class="menu-collapsed">Help</span>-->
        <!--            </div>-->
        <!--        </a>-->
        <!--        <a href="#" data-toggle="sidebar-colapse"-->
        <!--           class="bg-dark list-group-item list-group-item-action d-flex align-items-center">-->
        <!--            <div class="d-flex w-100 justify-content-start align-items-center">-->
        <!--                <span id="collapse-icon" class="fa fa-2x mr-3"></span>-->
        <!--                <span id="collapse-text" class="menu-collapsed">Collapse</span>-->
        <!--            </div>-->
        <!--        </a>-->';
}
?>

    </ul><!-- List Group END-->
</div>

<div id="topbar" style="display: flex;">
    <div id="topbar-row" class="row" style="width: 100%; margin: auto;">
        <h4 class="col-auto mr-auto"> Užsienio kalbų žodžių mokymosi aplinka</h4>
        <h4 id="user-header" style="margin-right: 25px"><span class="fa fa-user fa-fw mr-3"></span></h4>
        <a id="login-button" href="login.php" style="margin-right:25px; float: right"
           class="col-auto  btn btn-primary btn-blue">
            <span class="fa fa-sign-in-alt fa-fw mr-3"></span>
            Prisijungti
        </a>
        <a id="register-button" href="register.php" class="col-auto  btn btn-primary btn-pink">
            <span class="fa fa-user-plus fa-fw mr-3"></span>
            Užsiregistruoti
        </a>
        <a id="logout-button" href="logout.php" class="col-auto  btn btn-primary btn-pink">
            <span class="fa fa-sign-out-alt fa-fw mr-3"></span>
            Atsijungti
        </a>
    </div>
</div>


<script>
    <?php
    if (GetRole() != null) {
        echo "isLogged = true;";
        echo 'loginname = "' . $_SESSION["name"] . ' ' . $_SESSION["surname"] . ' (' . GetRole() . ')' . '"';
    } else {
        echo "isLogged = false;";
    }
    ?>


    if (isLogged) {
        $(document).ready(function () {
            $("#user-header").append(loginname);
            $("#login-button").hide();
            $("#register-button").hide();
        });
    } else {
        $(document).ready(function () {
            $("#user-header").hide();
            $("#logout-button").hide();
            $("#sidebar").hide()
            $("body").css("padding-left", "0px");
            $("#topbar").css("padding", "10px 20px 10px 20px")
        });
    }
</script>

<div id="content" class="js-pscroll">

