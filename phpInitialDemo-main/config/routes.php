<?php 

/**
 * Used to define the routes in the system.
 * 
 * A route should be defined with a key matching the URL and an
 * controller#action-to-call method. E.g.:
 * 
 * '/' => 'index#index',
 * '/calendar' => 'calendar#index'
 */
$routes = array(
	'/'				=>	'login#index',
	'/validar'		=>	'login#validar',
	'/registrar'    =>  'login#registro',
	'/main' 		=>	'task#iutask',
	'/cerrar'   	=>  'login#cerrar',
	'/frmnewtask'	=>	'task#uinewtask',
	'/newtask' 		=> 	'task#nuevoTask',
	'/frmedittask'	=> 	'task#uiedittask',
	'/updatetask' 	=> 	'task#editarTask',
	'/deletetask' 	=> 	'task#deletetask'
	//'/test' 		=> 	'test#index'
);
