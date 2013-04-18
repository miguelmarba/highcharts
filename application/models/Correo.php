<?php

class Application_Model_correo
{
    
    public function enviar($destinatario, $correo, $proyecto, $motivo, $evento, $fecha, $lugar)
    {
        try{
        $mail = new Application_Model_Mailer ( );
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->Host = "accesoi.interacceso.com.mx";//host
        $mail->Port = 5026; // set the SMTP port for the GMAIL server//puerto salida
        $mail->CharSet = "UTF-8"; // set the Character set
        $mail->Username = "pvmiguel1"; // SMTP account username//usuario origen
        $mail->Password = "astaryeh"; // SMTP account password//password origen
        $mail->From = $destinatario;//es como el nombre de la cuenta pero no existe el que existe es el usuario origen
        $mail->FromName = $destinatario ;//nombre del origen
        $mail->Subject = $motivo;//asunto
        $mail->AddAddress($correo,$correo);
        //$mail->AddAddress("israel.pacheco@proventel.com.mx","israel.pacheco@proventel.com.mx");
        //$mail->AddAddress("eluengo@proventel.com.mx","eluengo@proventel.com.mx");
        $body = "<h1>Buen dia!<h1><br><br>";
        $body .= "<p>Usted tiene una cita:<p><br>";
        $body .= "<p>Fecha: ". $fecha . "<p><br>";
        $body .= "<p>Lugar: ". $lugar . "<p><br>";
        $body .= "<p>Motivo: ". $motivo . "<p><br><br><br>";
        $body .= "<h2>Saludos!<h2><br>";
        
        // Cuerpo del mensaje
        $mensaje = "---------------------------------- <br>";
        $mensaje.= "        NUEVO EVENTO               <br>";
        $mensaje.= "---------------------------------- <br>";
        $mensaje.= "EVENTO:   <br>";
        $mensaje.= "MOTIVO:   ".$motivo."<br>";
        $mensaje.= "LUGAR:  ".$lugar."<br>";
        $mensaje.= "EMAIL:    ".$destinatario."<br>";
        //$mensaje.= "TELEFONO: 5529373338\n";
        $mensaje.= "FECHA:    ".$fecha."<br>";
        //$mensaje.= "IP:       NUMERO DE IP\n\n";
        $mensaje.= "---------------------------------- <br><br>";
        $mensaje.= "SALUDOS<br>";
        $mensaje.= "---------------------------------- <br>";
        
        //$body = "Buen dia! Usted tiene una cita el " . $fecha . " en " . $lugar . " por " . $motivo;
        $mail->Body = $mensaje;
        $mail->AltBody = $evento;//asunto
        if (! $mail->Send ()) {
            //echo "Mailer Error: " . $mail->ErrorInfo;
            return 1;
        } else {
            return 0;
            //echo "Mensaje Enviado!!";
        }
        exit();
        }catch(Zend_Exception $e){
            // Sucedio un error inexperado
            die("Error email: " . $e->getMessage()); 
        }
    }


}

