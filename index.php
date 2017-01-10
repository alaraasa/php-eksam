<?php
require_once("config.php");
session_start();
/**
 * @author Alar Aasa <alar@alaraasa.ee>
 * @description Login and logout
 */
require "pages/menu.php";

if(isset($_SESSION["username"])){
    echo "Hello " . $_SESSION['username'] . "!";
}

if(isset($_GET["page"])){
    $page = $_GET["page"];
    if ($page == "list"){
        require("pages/list.php");
    }
    if ($page == "login"){
        require("pages/login.php");
    }

    if ($page == "register"){
        require("pages/register.php");
    }
}
