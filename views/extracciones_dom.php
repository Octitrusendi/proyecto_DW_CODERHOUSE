<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function restructureArray(array $arr)   
{
    $result = array();
    foreach ($arr as $key => $value)   {
        for ($i = 0; $i < count($value); $i++) {
            $result[$i][$key] = $value[$i];
        }
    }
    return $result;
}

$files = [];
    if (!empty($_FILES['userfile']))   {
        $files =restructureArray($_FILES['userfile']);
    }


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$tel = $_POST['tel'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];



if (isset ($_POST['tipoDeAtencion'])) {
    $tipoDeAtencion = $_POST ['tipoDeAtencion'];
} 
if (isset ($_POST['sede'])) {
    $sede = $_POST ['sede'];
}
$message = "<html>
    <head>
    <title></title>
    </head>
    <body style='background-color: #f1f1f2;'>                
    <div style='width:500px;background:#fff;border-style:groove; margin: 30px auto;'>
    <div style='display: flex; justify-content: flex-start; align-items: center;'>
    <div style='padding: 10px;'><a href='https://laboratorio.net.ar'> <img src='https://laboratorio.net.ar/img/logo.png' height=70 width=70'></a></div>
    <h2 style='margin-left: 20px; color:#425e3f;'>Solicitud de Extracción a Domicilio</h2>
    </div>  
    <hr width='100%' size='2' color='#425e3f'>
    <div style=''>
    <table  cellspacing='0' width='100%' >
    <tr>  
            <td style='padding: 5px; text-align: center;'><strong>Nombre</strong></td>
            <td style='padding: 5px; text-align: center;'><strong>" . $nombre ."</strong></td>    
    </tr>
    <tr>  
        <td style='padding: 5px; text-align: center;'><strong>Apellido</strong></td>
        <td style='padding: 5px; text-align: center;'><strong>" . $apellido ."</strong></td>    
    </tr>
    <tr>  
        <td style='padding: 5px; text-align: center;'><strong>DNI</strong></td>
        <td style='padding: 5px; text-align: center;'><strong>" . $dni ."</strong></td>    
    </tr>
    <tr>  
        <td style='padding: 5px; text-align: center;'><strong>Telefono</strong></td>
        <td style='padding: 5px; text-align: center;'><strong>" . $tel ."</strong></td>    
    </tr>
    <tr>  
    <td style='padding: 5px; text-align: center;'><strong>Dirección</strong></td>
    <td style='padding: 5px; text-align: center;'><strong>" . $direccion ."</strong></td>    
</tr>
    <tr>  
        <td style='padding: 5px; text-align: center;'><strong>email</strong></td>
        <td style='padding: 5px; text-align: center;'><strong>" . $email ."</strong></td>    
    </tr>
    <tr>  
        <td style='padding: 5px; text-align: center;'><strong>Ciudad</strong></td>
        <td style='padding: 5px; text-align: center;'><strong>" . $sede ."</strong></td>    
    </tr>
    <tr>  
        <td style='padding: 5px; text-align: center;'><strong>Se atiende por</strong></td>
        <td style='padding: 5px; text-align: center;'><strong>" . $tipoDeAtencion ."</strong></td>    
    </tr>
    <tr>  
        <td style='padding: 5px; text-align: center;'><strong>Solicito un turno para la extracción el día</strong></td>
        <td style='padding: 5px; text-align: center;'><strong>" . $fecha ."</strong></td>    
    </tr>
    <tr>  
        <td style='padding: 5px; text-align: center;'><strong>Horario</strong></td>
        <td style='padding: 5px; text-align: center;'><strong>" . $hora ."</strong></td>    
    </tr>
    <tr>  
        <td style='padding: 5px; text-align: center;'><strong>Mensaje enviado el día</strong></td>
        <td style='padding: 5px; text-align: center;'><strong>" . date('d/m/Y', time()) ."</strong></td>    
    </tr>
    
    
    </table>                               
    </div> 
    </div>              
    </body>
    </html>";


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@laboratorio.net.ar';                     //SMTP username
    $mail->Password   = 'passs';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    

    //Recipients
    $mail->setFrom('info@laboratorio.net.ar', 'Laboratorio');
    $mail->addAddress('octaviotrusendi@gmail.com');     //Add a recipient
    $mail->addReplyTo('info@laboratorio.net.ar', 'Laboratorio');

    if (!empty($files))   {
        foreach ($files as $key => $file )   {
            $mail->addAttachment(
                $file['tmp_name'],
                $file['name']
            );
        }
    }

    //Content
    $mail->isHTML(true);   
    $mail->Subject = 'Solicitud de extracción a domicilio';
    $mail->Body    = $message;
    

    $mail->send();
    echo  header("Location: https://laboratorio.net.ar/views/gracias_por_contactarnos.html"); 
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
