<?php

$usuarios = array("usuarios" => array(
    array(
        "idUsuario" => 1,
        "nombre"=> "Roberto",
        "mail" => "roberta@gmail.com",
        "password" => "123456abcd"
    ),
    array(
        "idUsuario" => 2,
        "nombre"=> "Angel",
        "mail" => "angel@gmail.com",
        "password" => "abcd1234"
    ),
    array(
        "idUsuario" => 3,
        "nombre"=> "Diego",
        "mail" => "diego@gmail.com",
        "password" => "loremIpsum2023"
    )

    ));

    

$json_usuarios = json_encode($usuarios);

//var_dump($json_usuarios);

//creamos el archivo JSON
$handler = fopen("usuarios.json", "w+");
fwrite($handler, $json_usuarios);
fclose($handler);


