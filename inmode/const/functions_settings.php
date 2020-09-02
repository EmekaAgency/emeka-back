<?php
    $_SIGNUP = 0;
    $_LOGIN = $_SIGNUP + 1;
    
    $_functions = array();
    require_once("functions/signup.php");
    $_functions[ 'signup' ] = array('index'=> $_SIGNUP, 'function' => function($datas){signup($datas);});
    require_once("functions/login.php");
    $_functions[ 'login' ] = array('index'=> $_LOGIN, 'function' => function($datas){login($datas);});

    $_needs = [];

    $_needs[$_SIGNUP] = array(
        "type" => array("type" => array('string'), "required" => true),
        "firstname" => array("type" => array("string"), "required" => false),
        "lastname" => array("type" => array("string"), "required" => false),
        "email" => array("type" => array("string"), "required" => false),
        "password" => array("type" => array("string", "integer", "double", "float", "number"), "required" => false),
        "first_name" => array("type" => array("string"), "required" => false),
        "last_name" => array("type" => array("string"), "required" => false),
        "picture" => array("type" => array("string"), "required" => false),
        "email" => array("type" => array("string"), "required" => false),
        "types" => array(
            "basic" => array("firstname", "lastname", "email", "password")
        )
    );

    $_needs[$_LOGIN] = array(
        "type" => array("type" => array('string'),"required" => true),
        "email" => array("type" => array('string'),'required' => false),
        "password" => array("type" => array('string', 'integer', 'double', 'float', 'number'),"required" => false),
        "types" => array(
            "basic" => array("email", "password")
        )
    );
?>