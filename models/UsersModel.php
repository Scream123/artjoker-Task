<?php

function getUserData($user){
    global $connection;
    $email = $user['email'];
    $name = $user['name'];
    $territory = $user['territory'];

    $sql = "SELECT * FROM users
                WHERE (`email`='{$email}')
                LIMIT 1";
        $rs = mysqli_query($connection, $sql);
        $rs = createSmartyRsArray($rs);

        if(isset($rs[0])){
            $rs['status'] = "Вы уже зарегистрированы";
        }else{
            $sql = "INSERT INTO users(name, email, territory)
                VALUES('{$name}', '{$email}','{$territory}')";
    
            $rs = mysqli_query($connection, $sql);
            $sql = "SELECT * FROM users
                WHERE (`email`='{$email}')
                LIMIT 1";
            $rs = mysqli_query($connection, $sql);
            $rs = createSmartyRsArray($rs);
            $rs['status'] = "Регистрация прошла успешно";
        }
   
    return $rs;
}

function getTerritory($region, $district, $city)
{
    global $connection;
    $sql = "SELECT ter_name FROM t_koatuu_tree
                WHERE (`ter_id`='{$region}') OR (`ter_id`='{$district}') OR (`ter_id`='{$city}')
                LIMIT 3";
        $rs = mysqli_query($connection, $sql);
        $rs = createSmartyRsArray($rs);
    return $rs;
}


