<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

require 'vendor/autoload.php';
@$fname = stripslashes(htmlentities($_POST['FirstName']));
@$lname = stripslashes(htmlentities($_POST['LastName']));
@$email = stripslashes(htmlentities($_POST['Email']));
@$subject = stripslashes(htmlentities($_POST['Subject']));
@$phone = stripslashes(htmlentities($_POST['Phone']));
@$message = stripslashes(htmlentities($_POST['Message']));
@$fields = [$fname, $lname, $mail, $subject, $phone, $message];
@$send = $_POST['Submit'];
/* Expression régulière permettant de vérifier si le
* format d'une adresse e-mail est correct */
$regex_mail = '/^[-+.\w]{1,64}@[-.\w]{1,64}\.[-.\w]{2,6}$/i';
/* Expression régulière permettant de vérifier qu'aucun
* en-tête n'est inséré dans nos champs */
$regex_head = '/[\n\r]/';
@$entete .= "Today : ". date("D, j M Y") . " at " . date(" H:i ");
@$fnerror = " ";
@$lnerror = " ";
@$mlerror = " ";
@$sberror = " ";
@$pnerror = " ";
@$mserror = " ";
@$messent = " ";
//var_dump($fields);
if(isset($send))
{
    if(empty($fname)) $fnerror = 'Please enter a First name!';
    if(empty($lname)) $lnerror = 'Please enter a Last name!';
    if(empty($email)) $mlerror = 'Please enter an e-mail adress!';
    if(empty($subject)) $sberror = 'Please enter a Subject!';
    if(empty($phone)) $pnerror = 'Please enter a Phone number!';
    if(empty($message)) $mserror = 'Please enter a message!';
    foreach($fields as $field)
    {
        if (empty($field)) 
        {
            $messent = '<span style="color:crimson;text-shadow: 1px 1px 1px #222;">Please look below, you forgot some fields</span>';
        }
        else
        {
            $messent = '<span>Thank you for your message,'. ' ' . htmlentities(strtolower($fname)) . ' ' . 'we will contact you soon. have a nice day !</span>';
        }
    };
    $mail = new PHPMailer(true);
    try 
    {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'SSL0.OVH.NET';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'contact@sastrelondon.com';                     // SMTP username
        $mail->Password   = 'Youngfolk37!';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom( $email, $email);
        $mail->addAddress('contact@sastrelondon.com', 'Frank Tchakounte');
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 
        ' Message of ' . $fname . ' from Sastrelondon.com ' ;
        $mail->Body    = 
        '<span><strong>Hi Franc</strong>! ' . $entete . ', <br>  <strong>' . $fname . ' '. '</strong> ' . ' Sent these following informations : </span> <br><br>' 
        .'<div style="width:100%; height:auto; border: none; text-shadow: 3px 3px 3px 3px black; padding: 25px; text-transform:uppercase; text-align:justify;">'
        .'<strong>First Name</strong> : ' . $fname . '<br><br>' . ' '
        . '<strong>Last Name</strong> : ' . $lname . '<br><br>'
        . '<strong>Email</strong> : ' . '<span style="text-decoration:none;">' . $email . '</span>' . '<br><br>'
        . '<strong>Phone</strong> : ' . $phone . '<br><br>'
        . '<strong>Subject</strong> : <br> ' . $subject . '<br><br>'
        . '<strong>Message</strong> : <br>' . $message . '<br><br>'
        . '</div><br>'
        . '<strong>Have a nice day</strong>';
        
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 
        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {" . $mail->ErrorInfo . "}";
    }
    
};
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="/assets/css/book.css">
        <link rel="stylesheet" href="/assets/css/responsive-tablettes.css">
        <link rel="stylesheet" href="/assets/css/responsive-smartphones.css">
        <link rel="stylesheet" href="/assets/css/responsive-laptop-padpro.css">
        <link rel="stylesheet" href="/assets/css/reset.css">
        <link rel="stylesheet" href="/assets/css/navbar.css">
        <link rel="stylesheet" href="/node_modules/animate.css/animate.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
        <title>Document</title>
    </head>
    <body>
        <div class="container-fluid">
        <header class="header-top">
                <div class="Header-inner-top">
                    <div class="hamburger-content">
                        <nav class="Header-nav-primary">       
                            <div class="Header-nav-inner">
                                <a href="index.html" class="Header-nav-item">Home</a>
                                <a href="service.html" class="Header-nav-item" data-test="template-nav">Our Service</a>
                            </div>
                        </nav>
                    </div>
                    <div class="top-center">
                        <a href="index.html" class="Header-branding">
                            <span class="sastre-logo">SASTRÉ</span>
                            <span class="london-logo">LONDON</span>
                        </a>
                    </div>
                    <div class="hamburger-content">
                        <nav class="Header-nav-secondary">  
                            <div class="Header-nav-inner">
                                <a href="lifestyle.html" class="Header-nav-item" alt="nav-item">
                                    Lifestyle
                                </a>
                                <a href="book.php" class="Header-nav-item" alt="nav-item">
                                    Book Now
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
                
                    <!--le bouton hamburger avec son entité html-->
                    <span class="round-button" id="toggle-button"> <h2>...</h2></span>
                <div class="contenu-bouton-responsive">
                    <!--le menu qui se dépliera à partir du côté que l'on nomme sidebar-->
                    <div id="hamburger-sidebar">
                        <div id="hamburger-sidebar-body"></div>
                    </div>
                    <!--Notre masque qui viendra en fond, nommé overlay
                    l'idée principale est de venir remplir automatiquement 
                    la sidebar du contenu du menu. quand la taille de notre
                    document est convenablement réduite, on impacte sur ces 
                    deux éléments pour afficher notre menu hamburger-->
                    <div id="hamburger-overlay"> 
                        <p>
                            X
                        </p>
                    </div>
                </div>
            </header>
        </div>
        <section id="pageContent">
            <span class="messent"><?php echo $messent ?></span>
            <div class="row" id="firstRow">
                <div class="col-md-1 col-sm-0" id="separator-left-right"></div>
                <div class="col-md-12 col-lg-6" id="costumeBook">
                    <img src="/assets/images/booknow/costume-book-now.jpg" alt="">
                </div>
                <div class="col-lg-4 col-md-12" id="costumeTextBook">
                    <div class="getInTouchWord">
                        <img src="/assets/images/mots-en-images/getintouch-booknow.jpg" alt="">
                    </div>
                    <div class="write-left-right">
                        <p class="write-left">
                            The Sastré experience begins with a consultation at our Shoreditch Studio. Here you will begin your sartorial journey, where we will guide you through our bespoke service.
                        </p>

                        <p class="write-space"></p>
                        <p class="write-space"></p>

                        <p class="write-right">
                            Send an email to contact@sastrelondon.com;<br> 
                            or give a call to Franc on +44 7531 310197.
                        </p>
                    </div>
                    <div class="getInTouchWord2">
                        <img src="/assets/images/mots-en-images/we'dlovetohear-booknow.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-1 col-sm-0" id="separator-left-right"></div>
            </div>

            <div class="row" id="secondRow">
                <div class="col-lg-4 col-md-12" id="planning">
                    <p style="font-size: 12px;font-family: 'Dosis'; color:#222222;">Please use our contact form to book an appointment and one of tailoring experts will get in touch to plan your initial consultation.</p>
                    <br>
                    <div id="mycalendar" >
                        <img src="/assets/images/booknow/sketch.jpg" width="100%" height="auto" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12" id="contactform">
                    <form action="book.php" id="ajaxform" method="post">
                        <div class="form-group" id="names">
                            <div class="form-row">
                                <div class="col-lg-6 col-md-12 ">
                                    <label class="labels" for="FirstName">First Name</label>
                                    <input type="text" title="Only uppercase or lowercase letters please" name="FirstName" class="form-control" id="exampleInputFirstName" aria-describedby="first-name-help" value="" required pattern="[A-Za-z]{3,}">
                                    <span class="error-message" name="error"><?php echo $fnerror ?></span>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label class="labels" for="LastName">Last Name</label>
                                    <input type="text" title="Only uppercase or lowercase letters please" name="LastName" class="form-control" id="exampleInputLastName" aria-describedby="last-name-help" required pattern="[A-Za-z]{3,}">
                                    <span class="error-message" name="error"><?php echo $lnerror ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="labels" for="Email">Email</label>
                            <input type="email" name="Email" class="form-control labels" id="exampleInputEmail1" aria-describedby="email-help" required>
                            <span class="error-message" name="error"><?php echo $mlerror ?></span>
                        </div>
                        <div class="form-group">
                            <label class="labels" for="Subject">Subject</label>
                            <input type="text" name="Subject" class="form-control" id="exampleInputSubject" aria-describedby="email-name-help" required pattern="[A-Za-z]{3,}">
                            <span class="error-message" name="error"><?php echo $sberror ?></span>
                        </div>
                        <div class="form-group">
                            <label class="labels" for="Phone">Phone</label>
                            <input class="form-control" title="example : +446663..." name="Phone" type="tel" id="tel-input-help" required pattern="[+]{1}[0-9]{8,}">
                            <span class="error-message" name="error"><?php echo $pnerror ?></span>
                        </div>
                        <div class="form-group">
                            <label class="labels" for="Message">Enter Your Message</label>
                            <textarea class="form-control" name="Message" id="message-help" rows="6" required></textarea>
                            <span class="error-message" name="error"><?php echo $mserror ?></span>
                        </div>
                        <button type="submit" name="Submit" id="submit">Submit</button>
                    </form>
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="/node_modules/jquery/dist/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="/assets/js/calendar.js"></script>
        <script src="/assets/js/navbar.js"></script>
        <script src="/node_modules/animate/index.js"></script>
        <script src="/assets/js/btnfoot.js"></script>
        <script type="text/javascript">
        </script>
    </body>
    <footer>
        <div class="footer-content3">
            <span id="social-media3">
                <a href="https://www.instagram.com/sastrelondon/"><img style="width: 100px;height: 80px;" src="/assets/images/gifs/insta.gif" alt=""></a>
                <p><a href="https://www.instagram.com/sastrelondon/">Follow us on Instagram</a></p>
            </span>
            <span id="rights3">
                <strong>SASTRÉLONDON</strong> all rights reserved.
            </span>
            <span id="madeby3">
                Websmaster : <a href="https://www.noonxpand.tech/engversion.html"> noonxpand.tech</a>
            </span>
        </div>
        <div class="getbacktop">
            <button class="btn">
                <img class="heartBeat" src="/node_modules/bootstrap-icons/icons/chevron-up.svg" alt=""><br>
                go back up
            </button>
        </div>
    </footer>
</html>