<?php
require_once 'libraly/mainFunctions.php';
require_once 'models/TerrModel.php';

function getDiscrictAction($smarty)
{
    $terr_id = isset($_POST['ter_id']) ? $_POST['ter_id'] : null;
    $districts_arr = getDistricts($terr_id);
    $smarty->assign('districts_arr', $districts_arr);
    
    loadTemplate($smarty, 'districts');
}

function getCityAction($smarty)
{
    $terr_id = isset($_POST['ter_id']) ? $_POST['ter_id'] : null;
    $cities_arr = getCities($terr_id);
    $smarty->assign('cities_arr', $cities_arr);
    
    loadTemplate($smarty, 'cities');
}








