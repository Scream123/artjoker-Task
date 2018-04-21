<?php
require_once 'libraly/mainFunctions.php';

function indexAction($smarty){
    $smarty->assign('pageTitle', 'Главная страница сайта');
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}


