<?php

//    // Please specify your Mail Server - Example: mail.example.com.
//    ini_set("SMTP","mail.example.com");
//
//    // Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
//    ini_set("smtp_port","80");
//
//    // Please specify the return address to use
//    ini_set('sendmail_from', 'devilyash1995@gmail.com');

    $nameError = $emailError = $messageError = $senderName = $senderEmail = $senderMessage = "";

    if(isset($_REQUEST["form-submit"])){
        //header("Location: contact.php");
        function validateFormData($formData){
            $formData = trim(stripslashes(htmlspecialchars($formData)));
            return $formData;
        }
        
        if(!$_REQUEST["form-name"]){
            $nameError = " (required)";
        }
        else{
            $senderName = validateFormData($_REQUEST["form-name"]);
        }
        if(!$_REQUEST["form-email"]){
            $emailError = " (required)";
        }
        else{
            $senderEmail = validateFormData($_REQUEST["form-email"]);
        }
        if(!$_REQUEST["form-message"]){
            $messageError = " (required)";
        }
        else{
            $senderMessage = validateFormData($_REQUEST["form-message"]);
        }
        
        $receiverEmail = "devilyash1995@gmail.com";
        
        
    }


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Contact Yash Kapoor</title>
        
        <link rel="shortcut icon" type="image/x-icon" href="images/y-icon.ico" >

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        
        <link href="css/normalize.css" rel="stylesheet" type="text/css">
        
        <link href="css/style.css" rel="stylesheet" type="text/css">
        
        <link href="css/navbar_styles.css" rel="stylesheet" type="text/css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-fixed-top navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><h1>Yash Kapoor</h1></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-left navbar-nav">
                        <li><a href="index.html"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
                        <li><a href="projects.php"><span class="glyphicon glyphicon-folder-open"></span> Projects</a></li>
                        <li class="active"><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div id="yo"></div>
        <div id="mail-me">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <h1>Send me an Email</h1>
                            <?php

                                if(isset($_REQUEST["form-submit"])){
                                    if(mail($receiverEmail, "New Message", $senderMessage, "From: $senderName Email: $senderEmail email: $senderEmail")){

                                        echo "<p class='alert alert-success lead' data-dismiss='close'>Email Sent<a class='close' data-dismiss='alert'>&times;</a></p>";
                                    }
                                    else{

                                        echo "<p class='alert alert-danger lead' data-dismiss='close'>Email Not Sent (All Fields are required)<a class='close' data-dismiss='alert'>&times;</a></p>";
                                    }

                                    //$_REQUEST["form-name"] = $_REQUEST["form-email"] = $_REQUEST["form-message"] = "";

                                }


                            ?>
                            <p class="text-danger lead"><big>&#42;</big> All Fields are Required</p>
                            <div class="form-group">
                                <label for="for-name">Your Name<small class="text-danger"><?php echo $nameError; ?></small></label>
                                <input type="text" class="form-control input-lg" placeholder="Enter your name..." name="form-name" id="for-name">
                            </div>
                            <div class="form-group">
                                <label for="for-email">Your Email<small class="text-danger"><?php echo $emailError; ?></small></label>
                                <input type="email" class="form-control input-lg" placeholder="Enter your email..." name="form-email" id="for-email">
                            </div>
                            <div class="form-group">
                                <label for="for-message">Your Message<small class="text-danger"><?php echo $messageError; ?></small></label>
                                <textarea name="form-message" class="form-control input-lg" id="for-message" placeholder="Enter your message..." rows="4"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg" name="form-submit">Send Email</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div id="contact-me">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h1>Contact me</h1>
                        <a href="https://www.facebook.com/yash.kapoor.5055233" id="facebook" class="contact-logo"><img src="images/facebook-icon.png" class="img-circle" width="60" height="60"> Ping me on Facebook</a><br><br>
                        <a href="https://www.instagram.com/yashk_1995/" id="instagram" class="contact-logo"><img src="images/instagram-icon.png" width="60" height="60"> Follow me on Instagram</a><br><br>
                        <a href="https://www.linkedin.com/in/yash-kapoor-182671117?trk=nav_responsive_tab_profile_pic" id="linked-in" class="contact-logo"><img src="images/linkedin-icon.png" width="60" height="60"> Connect me on LinkedIn</a><br><br>
                        <a href="" id="whatsapp" class="contact-logo"><img src="images/WhatsApp-icon.png" width="60" height="60"> <big>&#43;</big>918791331663</a><br><br>
                        <a href="" id="gmail" class="contact-logo"><img src="images/gmail-icon.png" width="60" height="60"> devilyash1995&#64;gmail&#46;com</a><br><br>
                    </div>
                </div>
            </div>
        </div>
            
            
        
        
         
        
        <footer>
            Coded with &hearts; by <a href="index.html">Yash</a>
        </footer>
        
        
             
      
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        
<!--        local javascript-->
        <script src="js/script.js"></script>
        
<!--        CDN version-->
        <script src="js/jquery-3.0.0-min.js"></script>
<!--      if CDN fails then run it-->
        <script>window.jQuery || document.write("<script src='js/jquery-3.0.0.js'><\/script>")</script>
    </body>
</html>