<?php
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "di.disegno@gmail.com";
 
    $email_subject = "Contacto Diana Fields";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "Algo va mal, por favor inténtalo nuevamente.";
 
        echo "";
 
        echo $error."<br /><br />";
 
        echo "";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['comments']))
 
        
      died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $first_name = $_POST['name']; // required
 
    $email = $_POST['email']; // required
 
    $comments = $_POST['comments']; // required
 
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(!preg_match($string_exp,$comments)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Diana somebody saw your work!\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($first_name)."\n";
 
    $email_message .= "E-mail: ".clean_string($email)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 <html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style type="text/css">
 @font-face{
  font-family: my-Fontsem;
  src:url(fonts/TheSans-4-SemiLight.otf);
}
  body{
    font-family: my-Fontsem;
    width: 100%;
    margin:0 auto;
    color:#f44f7e;
    text-align: center;
  }
  section{
    width: 90%;
    text-align: center;
    margin: 4% auto;
  }
  h3{
    font-size: 18px;
    
  }
    .imgThanks img{
      text-align: center;
      margin: 0 auto;
    }
    button{
      width: 90%;
      height: 50px;
      background: black;
      font-size: 17px;
      color: white;
      border-radius: 4px;
    }
  </style>
 </head>
 <body>
  <section>
    <h3>Thank you for sending your comments, I will contact you as soon as possible.</h3>
      <div class="imgThanks">
   </div>
   <button type="button" onclick="location.href='index.html'">
    Regresar
   </button>
 </section>
 </body>
 </html>
 
 
 
