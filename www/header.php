<?php


include_once "basicHeader.php";


?>


<div id="sidebar">
    <!-- Bootstrap List Group -->
    <ul id="sidebarGroup" class="list-group">
        <!-- Separator with title -->
        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small>MENIU</small>
        </li>
        <!-- /END Separator -->

        <!-- Menu with submenu -->
        <div>
            <a href="#submenu1" data-toggle="collapse" aria-expanded="false" data-parent="#sidebarGroup"
               class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-tachometer-alt fa-fw mr-3"></span>
                    <span class="menu-collapsed">Dashboard</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu1' class="collapse sidebar-submenu">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Charts</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Reports</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Tables</span>
                </a>
            </div>
        </div>

        <!-- Menu with submenu -->
        <div>
            <a href="#submenu2" data-toggle="collapse" aria-expanded="false" data-parent="#sidebarGroup"
               class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Profile</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu2' class="collapse sidebar-submenu">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Settings</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Password</span>
                </a>
            </div>
        </div>

        <a href="#" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-tasks fa-fw mr-3"></span>
                <span class="menu-collapsed">Tasks</span>
            </div>
        </a>

        <!-- Separator with title -->
        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small>NUSTATYMAI</small>
        </li>
        <!-- /END Separator -->
        <a href="#" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-calendar fa-fw mr-3"></span>
                <span class="menu-collapsed">Calendar</span>
            </div>
        </a>
        <a href="#" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-envelope-open-text fa-fw mr-3"></span>
                <span class="menu-collapsed">Messages <span class="badge badge-pill badge-primary ml-2">5</span></span>
            </div>
        </a>
        <!-- Separator without title -->
        <li class="list-group-item sidebar-separator menu-collapsed"></li>
        <!-- /END Separator -->
        <a href="#" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-question fa-fw mr-3"></span>
                <span class="menu-collapsed">Help</span>
            </div>
        </a>
        <a href="#" data-toggle="sidebar-colapse"
           class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                <span id="collapse-text" class="menu-collapsed">Collapse</span>
            </div>
        </a>
    </ul><!-- List Group END-->
</div>

<div id="topbar" style="width: 100%">
    <div class="row">
        <h4 class="col-auto mr-auto"> Užsienio kalbų žodžių mokymosi aplinka</h4>
        <a href="login.php" style="margin-right:25px; float: right" class="col-auto  btn btn-primary btn-blue">
            <span class="fa fa-sign-in-alt fa-fw mr-3"></span>
            Prisijungti
        </a>
        <a href="register.php" class="col-auto  btn btn-primary btn-pink">
            <span class="fa fa-user-plus fa-fw mr-3"></span>
            Užsiregistruoti
        </a>
    </div>

</div>
