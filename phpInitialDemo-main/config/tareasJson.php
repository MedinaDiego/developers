<?php

$tareas= array("tareas" => array(
    array(
        "idTareas" => 1,
        "horaInicio" => "",
        "horaFin"=>"",
        "nombreTareas" =>"",
        "descripcion" =>"",
        "observaciones" =>"",
        "usuario"=>""
    ),
    array(
        "idTareas" => 2,
        "horaInicio" => "",
        "horaFin"=>"",
        "nombreTareas" =>"",
        "descripcion" =>"",
        "observaciones" =>"",
        "usuario"=>""
    ),
    array(
        "idTareas" => 3,
        "horaInicio" => "",
        "horaFin"=>"",
        "nombreTareas" =>"",
        "descripcion" =>"",
        "observaciones" =>"",
        "usuario"=>""
    ),
    array(
        "idTareas" => 4,
        "horaInicio" => "",
        "horaFin"=>"",
        "nombreTareas" =>"",
        "descripcion" =>"",
        "observaciones" =>"",
        "usuario"=>""
    )
));

$json_tareas = json_encode($tareas);

var_dump($json_tareas);

$handler = fopen("tareas.json", "w+");
fwrite($handler,$json_tareas);
fclose($handler);


