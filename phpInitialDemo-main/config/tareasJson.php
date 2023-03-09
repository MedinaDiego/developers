<?php

$tareas= array("tareas" => array(
    array(
        "idTareas" => 1,
        "fechaInicio" => "",
        "fechaFin"=>"",
        "nombreTareas" =>"",
        "descripcion" =>"",
        "observaciones" =>"",
        "idUsuario"=>""
    ),
    array(
        "idTareas" => 2,
        "fechaInicio" => "",
        "fechaFin"=>"",
        "nombreTareas" =>"",
        "descripcion" =>"",
        "observaciones" =>"",
        "isUsuario"=>""
    ),
    array(
        "idTareas" => 3,
        "fechaInicio" => "",
        "fechaFin"=>"",
        "nombreTareas" =>"",
        "descripcion" =>"",
        "observaciones" =>"",
        "idUsuario"=>""
    ),
    array(
        "idTareas" => 4,
        "fechaInicio" => "",
        "fechaFin"=>"",
        "nombreTareas" =>"",
        "descripcion" =>"",
        "observaciones" =>"",
        "idUsuario"=>""
    )
));

$json_tareas = json_encode($tareas);

var_dump($json_tareas);

$handler = fopen("tareas.json", "w+");
fwrite($handler,$json_tareas);
fclose($handler);


