<?php

    include("connection.php");
    session_start();


    //check if user is not logged in
    if(!$_SESSION["loggedInName"]){
        //send them to login page
        header("Location: ../Chat%20Server.php");
    }
    $loggedInName = $_SESSION["loggedInName"];
    $loggedInId = $_SESSION["loggedInId"];


    $alertMessage = "";

    if(isset($_POST["send"])){

        $formMessage = $result2 = "";

        function validateFormData($formData){
            $formData = trim(stripslashes(htmlspecialchars($formData)));
            return $formData;
        }

        if($_POST["message"]){
            $formMessage = validateFormData($_POST["message"]);
        }

        $sendQuery = "INSERT INTO chat(msg_id,name,message)
                      VALUES(NULL,'$loggedInName','$formMessage')";

        if($formMessage)
            $result2 = mysqli_query($conn, $sendQuery);
//        if(!$result2)
//            echo "<div class='alert alert-danger'>Error: " . $query . "<br>" . mysqli_error($conn) . "</div>";
    }

    if(isset($_POST["delete"])){
        $alertMessage = "<div class='alert alert-danger'>
                  <p>Are you sure you want to delete all your chats? No take backs!</p><br>
                  <form action='' method='post'>
                      <button type='submit' class='btn btn-danger btn-sm' name='confirm-delete'>Yes, Delete!</button>
                      <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Oops, No thanks!</a>
                  </form>
              </div>";
    }
    
    if(isset($_POST["confirm-delete"])){
        $deleteQuery = "DELETE FROM chat WHERE name='$loggedInName'";
        mysqli_query($conn,$deleteQuery);
    }

    mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Let's Start Chatting</title>

        <!-- Bootstrap -->
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css" rel="stylesheet">
            
            .container .row h1{
                text-shadow: 2px 2px 5px #777;
                
            }
            
            #chat-box{
                border: solid 2px #999;
                overflow: auto;
                height: 300px;
                padding: 8px;
                border-radius: 4px;
                box-shadow: 5px 5px 20px #000;
            }
            #chat-box span#person1{
                width: 60%;
                margin-bottom: 2px;
                float: left;
                color: #006600;
                padding: 2px 0px 2px 8px;
                border-radius: 12px;
                background-color: #ccffcc;
                border: solid 1px #006600;
                word-wrap: break-word;
                box-shadow: 1px 1px 2px #000;
            }
            #chat-box span#person2{
                width: 60%;
                margin-bottom: 2px;
                float: right;
                color: #006680;
                padding: 2px 0px 2px 8px;
                border-radius: 12px;
                background-color: #ccf5ff;
                border: solid 1px #006680;
                word-wrap: break-word; 
                box-shadow: 1px 1px 2px #000;
            }
            #chat-box span#person1 b{
                color: #006600;
            }
            #chat-box span#person2 b{
                color: #006680;
            }
            #chat-box #time{
                color: #000;
                padding : 2px 8px 2px 8px;
                font-weight: 600;
                border-radius: 12px;
                float: right;
            }
        </style>
        

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body onload="loadAjax();">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="users.php">CHAT<b>SERVER</b></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="">Hi,<?php echo $_SESSION['loggedInName']; ?></a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </nav>
        
        <div class="container">
            
            <a href="users.php" type="button" class="btn btn-default btn-lg">Back to Users List</a>
            
            <div class="row">
                
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    
                    <div class="col-sm-6 col-sm-offset-3">
                        <h1 style="text-align:center;"><b>Let's Have a Chat Together!</b></h1><br>
                        
                        <div id="chat-box"></div>
                        
                        <div class="form-group">
                            <label for='form-message'></label>
                            <textarea class="form-control" id="form-message" name="message" placeholder="Send a message..." rows="2" autofocus></textarea>
                        </div>
                        <?php echo $alertMessage; ?>
                        
                        <button type="submit" class="btn btn-danger btn-md" name="delete" id="delete">Delete Chat</button>
                        <button type="submit" class="btn btn-success btn-md pull-right" name="send" id="submit">Send Message</button>
                    </div>
                    
                </form>
            </div>
        </div>
        

        <hr>
        
        <footer style="text-align: center; font-family: Georgia, Times, serif;">
            Coded with &hearts; by <a href="">Yash</a>
        </footer><br>
        
        
        <script type="text/javascript">
            
            var chatBox = document.getElementById("chat-box");
            //chatBox.scrollTop = chatBox.scrollHeight - chatBox.clientHeight;
            
            document.getElementById("form-message").onkeypress = function(e){
                
                if(e.keyCode == 13){
                    e.preventDefault();
                    document.getElementById("submit").click();
                    
                }
            };
            
            setInterval(function(){ loadAjax() },1000);
            var currentText = "";
            
            function loadAjax(){
                

                var xhr = new XMLHttpRequest();
                
                xhr.open('GET','chat%20data.php', true);
                xhr.send();
                
                xhr.onreadystatechange = function(){
                    if(xhr.readyState == 4 && xhr.status == 200){
                        
                        if(currentText != xhr.responseText){
                            currentText = xhr.responseText;
                            document.getElementById("chat-box").innerHTML = currentText;
                            chatBox.scrollTop = chatBox.scrollHeight - chatBox.clientHeight;
                            
                        }
                        
                    }
                };

            }
            
            
 
            
            
            
        </script>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="../../bootstrap/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>