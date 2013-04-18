<?php

class GraficasController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->initView();
        $this->view->baseUrl = $this->_request->getBaseUrl();
    }

    public function indexAction()
    {
        // action body
    }
    
    public function liveAction()
    {
        // action body
    }
    
    /*
     * Respuestas del servidor por Ajax
     */
    public function serverAction()
    {
        // action body
         //Desabilitamos el LAYOUT
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        
        // Set the JSON header
        header("Content-type: text/json");

        // The x value is the current JavaScript time, which is the Unix time multiplied by 1000.
        $x = time() * 1000;
        // The y value is a random number
        $y = rand(0, 100);

        // Create a PHP array and echo it as JSON
        $ret = array($x, $y);
        echo json_encode($ret);
    }


}

