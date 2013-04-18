<?php

class MundoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        echo "hola mundo";exit;
    }
    
    public function holaAction()
    {
        // action body
        echo "hola mundo action Hola";exit;
    }


}

