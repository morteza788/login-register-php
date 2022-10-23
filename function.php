<?php


function connect()
{
    $dsn = "mysql:host=".HOST. '; dbname='.DB_NAME ;
    try{
        $connect = new PDO($dsn, USER_DB,PASS_DB);
        return $connect;
    }catch(PDOException $error){
      $log = 'error: '.$error->getMessage() . '|time:' . time(). PHP_EOL;
      file_put_contents('log.txt', $log , FILE_APPEND);
        header('location:https://google.com' );
        exit();
    }
}


function getUser($username)
{
    $connect = connect();
    $query = "SELECT * FROM 'users'   WHERE   'email'  = ?  LIMIT 1";
    $result = $connect->prepare($query);
    $result->bindValue(1, $username);
    $result->execute();
    $found_user = $result->fetch(PDO::FETCH_OBJ);
    return $found_user;
}

function login(array $user_info)
{
    $get_user = getUser($user_info['email']);
    if(!$get_user){
        return 'user not found';
    }
    if($get_user->password != $user_info['password']){
        return 'password error';
    }
    $_SESSION['login_user'] = [
        'login' => true,
        'userInfo' => $get_user
    ];
    header('location:http://dashboard.php');
    exit();
}


function getmessage($message)
{
    $all_message = include __DIR__.DIRECTORY_SEPARATOR .'message.php';
    return (isset($all_message[$message]) ? $all_message[$message] : false);
}

function isLogin()
{
    return isset( $_SESSION['login_user']['login']);
}