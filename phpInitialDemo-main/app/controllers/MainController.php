<?php

class MainController extends ApplicationController
{
    public function uimainAction()
    {
        $ctrlTask = new TaskController();
        $tasks = $ctrlTask->obtenerTasks();
        print_r($tasks);
    }  

    
}