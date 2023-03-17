<?php

/**
 * Base controller for the application.
 * Add general things in this controller.
 */
class ApplicationController extends Controller 
{
    public function headerAction()
	{
        $tailwindcss ="https://cdn.tailwindcss.com?plugins=forms";
        $jquery= "https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js";

        $this->view->appendScript($tailwindcss);
        $this->view->appendScript($jquery);

        $this->view->printScripts(); 
	}
	
}
