<?php

require_once 'models/UsersModel.php';
require_once 'libraly/mainFunctions.php';

function registerAction($smarty)
{
    $territory['region']   = isset($_POST['region']) ? $_POST['region'] : '';
    $territory['district'] = isset($_POST['district']) ? $_POST['district'] : '';
    $territory['city'] = isset($_POST['city']) ? $_POST['city'] : '';
    $territory = json_encode($territory);
    $user['name'] = isset($_POST['name']) ? $_POST['name'] : '';
    $user['email'] = isset($_POST['email']) ? $_POST['email'] : '';
    $user['territory'] = $territory;
    $user_card = getUserData($user);
    $terr_name = getTerrName($user['territory']);
    
    $smarty->assign('name', $user_card[0]['name']);
    $smarty->assign('email', $user_card[0]['email']);
    $smarty->assign('territory', $terr_name);
    $smarty->assign('status', $user_card['status']);
    loadTemplate($smarty, 'card');
}
    
function getTerrName($data)
{
    $data = json_decode($data);
    $region = $data->region;
    $district = $data->district;
    $city = $data->city;
    
    $territory = getTerritory($region, $district, $city);
    $res = $territory[0]['ter_name']." | ".$territory[1]['ter_name']." | ".$territory[2]['ter_name'];
    return $res;
    
}




