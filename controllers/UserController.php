<?php

// подключаем модели
require_once 'models/UsersModel.php';
require_once 'libraly/mainFunctions.php';

/**
 *  AJAX регистрация пользователя
 *  return - json массив данных нового пользователя
 */
function registerAction(){
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    $pwd1 = isset($_POST['r_pass']) ? $_POST['r_pass'] : null;
    $pwd2 = isset($_POST['r_pass2']) ? $_POST['r_pass2'] : null;
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $name = trim($name);
    $surname = isset($_POST['surname']) ? $_POST['surname'] : null;
    $surname = trim($surname);
    $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
    $adress = isset($_POST['adress']) ? $_POST['adress'] : null;
   
    $resData = null;
    $resData = checkRegisterParams($email, $pwd1, $pwd2, $name, $surname, $phone, $adress);
    if(!$resData&&checkUserEmail($email)){
        $resData = false;
        $resData['message'] = "Пользователь с таким email ('{$email}') уже зарегитрирован";
    }
    
    if(!$resData){
        $pwdMD5 = md5($pwd1);
        $userData = registerNewUser($email, $pwdMD5, $name, $surname, $phone, $adress);
        if($userData['success']){
            $resData['message'] = "Пользователь успешно зарегистрирован";
            $resData['success'] = 1;
            
        $userData = $userData[0];
        $_SESSION['user'] = $userData;
        $_SESSION['user']['displayName'] = $userData['name'];
        $activation = md5($userData['id']).md5($userData['name']);
        $to = $userData['email']; 
        $subject = "Подтверждение регистрации"; // тема письма
        $message = "Для подтверждения регистрации перейдите по ссылке: http://localhost/acceptic_gavrilenko/index.php?controller=User&action=activation&email={$userData['email']}&activation={$activation}";
        mail($to,$subject,$message);
        }
    }else{
        $resData['success'] = 0;
        $resData['message'][] = "Ошибка регистрации";
    }
    echo json_encode($resData);
}

/**
 * Выход
 */
function logoutAction(){
    if(isset($_SESSION['user'])){
      unset($_SESSION['user']);
    }
    redirect("index.php");
}

/**
 * 
 */

function loginAction(){
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    $pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd']: null;
    $pwd = trim($pwd);
    $userData = loginUser($email, $pwd);
    
    if($userData['success']){
        $userData = $userData[0];
        $_SESSION['user'] = $userData;
        $_SESSION['user']['display_name'] = $userData['name'];
        if($userData['status']){
            $resData['status'] = 1;
        }else{
            $resData['status'] = 0; 
        }
        $resData['success'] = 1;
    }else{
        $resData['success'] = 0;
        $resData['message'] = "Неверный логин или пароль";
    }
    echo json_encode($resData);
}

function userPageAction($smarty){
    if(isset($_SESSION['user'])){
    $smarty->assign('pageTitle', 'Персональная страница пользователя');
    $smarty->assign(status, 1);
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'userPage');
    loadTemplate($smarty, 'footer');
    }else{
        redirect("index.php");
    }
}

function activationAction(){
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $activation = isset($_REQUEST['activation']) ? $_REQUEST['activation']: null;
 $result = activationUser($email, $activation);
if($result){
    header("Location: index.php");
}else{
   echo "Ошибка подтверждения регистрации";
}
}

/**
 * Обновление данных пользователя
 *  @return - json результат выполнения функции
 */
function updateAction(){
    //> Если пользователь не залогинен то выходим
    if(!isset($_SESSION['user'])){
        redirect("index.php");
    }
    //<
    
    //>Инициализируем переменные
    $resData = array();
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $surname = isset($_REQUEST['surname']) ? $_REQUEST['surname'] : null;
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;
    $curPwd = isset($_REQUEST['curPwd']) ? $_REQUEST['curPwd'] : null;
    //<
    // проверка правильности пароля, введенный и тот под которым залогинились
    $curPwdMD5 = md5($curPwd);
    if(!$curPwd||($_SESSION['user']['pwd']!=$curPwdMD5)){
        $resData['success'] = 0;
        $resData['message'] = "Текущий пароль не верный";
        echo json_encode($resData);
        return false;
    }
    
    // Обновление данных пользователя
    $res = updateUserData($name, $surname, $phone, $adress, $pwd1, $pwd2, $curPwdMD5);
    if($res){
        $resData['success'] = 1;
        $resData['message'] = "Данные сохранены";
        $resData['userName'] = $name;
        
        $newPwd = $_SESSION['user']['pwd'];
        if($pwd1&&($pwd1==$pwd2)){
            $newPwd = md5(trim($pwd1));
        }
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['surname'] = $surname;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['adress'] = $adress;
        $_SESSION['user']['pwd'] = $newPwd;
    }else{
        $resData['success'] = 0;
        $resData['message'] = "Ошибка сохранения данных";  
    }
    echo json_encode($resData);
}






