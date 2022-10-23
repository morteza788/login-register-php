<?php

require_once __DIR__.DIRECTORY_SEPARATOR.'init.php';

if(!isLogin()){
    header('location:http://localhost/login-register/');
    exit();
}
