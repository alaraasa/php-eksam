<?php
/**
 * @author Alar Aasa <alar@alaraasa.ee>
 */
require_once('../config.php');
require('classes/User.php');
require('classes/Helper.php');
require('classes/Monitor.php');

$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], "monitors");
$User = new User($mysqli);
$Helper = new Helper($mysqli);
$Monitor = new Monitor($mysqli);

