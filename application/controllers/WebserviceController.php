<?php

class WebserviceController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        //$this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        if ($_SERVER['QUERY_STRING'] == 'wsdl') {
            try{
                $auto = new Zend_Soap_AutoDiscover();
                $auto->setClass('Application_Model_MyWebService');
                $auto->handle();
                exit();
            }catch(Zend_Exception $e){
                // Sucedio un error inexperado
                die("Error Webservice: " . $e->getMessage()); 
            }
        }else{
            // Action body
            $wsdl = sprintf(
                'http://%s%s?wsdl',
                $_SERVER['HTTP_HOST'],
                $_SERVER['SCRIPT_NAME']
            );
            $wsdl = "http://192.168.1.3/zendframework/public/webservice/index?wsdl";
            $soapServer = new Zend_Soap_Server($wsdl);
            $soapServer->setClass('Application_Model_MyWebService');
            $soapServer->handle();
            exit();
        } 
    }
    
    public function clienteAction()
    {
        //echo "Hola miguel, como estas?";exit;
        $url = 'http://192.168.1.3/zendframework/public/webservice/index?wsdl';
        try{
            $client = new Zend_Soap_Client($url);
            echo sprintf('Fecha del servidor: %s', $client->getDate());
            echo "<br />\n";
            echo $client->getAgeString('Miguel Angel', 25);
            exit;
        }catch(Zend_Exception $e){
            // Sucedio un error inexperado
            die("Error Webservice: " . $e->getMessage()); 
        }
    }

}

