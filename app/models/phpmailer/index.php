
    //Server settings
//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$this->mail->isSMTP();                                            //Send using SMTP
$this->mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
$this->mail->SMTPAuth = true;                                   //Enable SMTP authentication
$this->mail->Username = 'symphonyuscs@gmail.com';                     //SMTP username
$this->mail->Password = 'wmoe qbsp fxcl bwqp';                               //SMTP password
$this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
$this->mail->Port = 587;                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$this->mail->setFrom('symphonyucsc@gmail.com', 'Symphony');
$this->mail->addAddress('dinirubhanuka2001@gmail.com',  'diniru');     //Add a recipient

//Content
$this->mail->isHTML(true);                                  //Set email format to HTML
$this->mail->Subject = 'Here is the subject';
$verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
$this->mail->Body = 'This is the HTML message body'.$verification_code .' <b>in bold!</b>';
$this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$this->mail->send();
echo 'Message has been sent';
