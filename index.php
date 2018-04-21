<?php

require_once 'config/config.php';
require_once 'libraly/mainFunctions.php';

$controllerName = isset($_GET['controller'])?ucfirst($_GET['controller']):'Index';

$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

loadPage($smarty, $controllerName, $actionName);