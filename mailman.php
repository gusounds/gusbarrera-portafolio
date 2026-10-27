<?php

$error = 'http://www.andresbarrera.com/error.html';
$thanks = 'http://www.andresbarrera.com/mensajeenviado.html';
// Check for empty fields
if(empty($_POST['nombre'])          ||
   empty($_POST['email'])       ||
   empty($_POST['comentario'])  ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
    echo ("<script>location.href='$error'</script>");
    return false;
   }
    
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$comentario = $_POST['comentario'];
    
// Create the email and send the message
$to = 'yosoy@andresbarrera.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Nuevo mensaje de ANDRESBARRERA.COM";
$email_body = "$nombre te ha enviado un mensaje.\n\n"."$comentario\n\nPara ponerte en contacto con $nombre puedes hacerlo a través del email $email";
$headers = "From: noreply@andresbarrera.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email"; 
mail($to,$email_subject,$email_body,$headers);
Header ("Location: $thanks")        
?>