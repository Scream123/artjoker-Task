<?php


function getDistricts($terr_id)
{
    global $connection;
    
    $sql = "SELECT * 
            FROM t_koatuu_tree
            WHERE (`ter_pid`='{$terr_id}') AND `ter_type_id` = 2";
    $rs = mysqli_query($connection, $sql);
    $rs = createSmartyRsArray($rs);

    return $rs;
}

function getCities($terr_id)
{
    global $connection;
    
    $sql = "SELECT * 
            FROM t_koatuu_tree
            WHERE (`ter_pid`='{$terr_id}') AND (`ter_type_id` = '1' 
                                            OR `ter_type_id` = '6'
                                            OR `ter_type_id` = '5'
                                            OR `ter_type_id` = '4')";
    $rs = mysqli_query($connection, $sql);
    $rs = createSmartyRsArray($rs);

    return $rs;
}

