<?php

class MailController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        /*
         * Configuracion HOTMAIL
         *  Servidor POP: pop3.live.com
         *  Puerto POP: 995.
         *  POP SSL: Si.
         *  Usuario: Tu Windows Live ID (nombre@hotmail.com).
         *  Contraseña: Tu palabra clave habitual.
         *  Servidor SMTP: smtp.live.com
         *  Puerto SMTP: 25.
         */
        
        // action body
        echo "Enviando E-Mail . . . ";
        //Configuración SMTP GMAIL
        /*
        $host = 'smtp.gmail.com';
        $param = array(
            'auth' => 'login',
            'ssl' => 'ssl',
            'port' => '465',
            'username' => 'miguelitoflak@gmail.com',
            'password' => 'bautista6132'
        );
        */
        /*
         * Configuración SMTP HOTMAIL
        $host = 'smtp.live.com';
        $param = array(
            'auth' => 'login',
            'tls' => 'ssl',
            'port' => '25',
            'username' => 'miguel_marba@hotmail.com',
            'password' => 'mabm870525'
        );
         */
        $host = 'mail.tiprotec.com';
        $param = array(
            'auth' => 'login',
            'tls' => 'ssl',
            'port' => '587',
            'username' => 'mmartinez@tiprotec.com',
            'password' => 'mm4rt1n3z5'
        );
        $tr = new Zend_Mail_Transport_Smtp($host, $param);
        Zend_Mail::setDefaultTransport($tr);
        //Creamos email
        $mail = new Zend_Mail();
        $mail->setFrom('miguelitoflak@gmail.com', 'Miguel GMAIL'); //De
        $mail->addTo('miguel_marba@hotmail.com', 'Miguel Angel Mar Ba'); //Para
        $mail->setSubject('Prueba Zend_Mail');
        $mail->setBodyText('Este es el contenido del email enviado por Zend_Mail.');
        $mail->setBodyHtml('Este es el contenido del <b>email enviado por Zend_Mail</b>.');
        $sent = true;
        try {
            $mail->send();
        }
        catch (Exception $e) {
            $sent = false;
            die("Error al envir emal: " . $e -> getMessage());
        }
        //Devolvemos si hemos tenido éxito
        //return $sent;
        var_dump($sent);exit;
    }


}

