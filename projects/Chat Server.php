<?php
    
    session_start();

    if(isset($_SESSION["loggedInName"])){
        header("Location: Chat%20Server/users.php");
    };

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Chat Server</title>

        <!-- Bootstrap -->
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="Chat%20Server.php">CHAT<b>SERVER</b></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="Chat%20Server/registration.php">Register now</a></li>
                </ul>
            </div>
        </nav>
        
        <div class="container">
            
            <?php
            
                $formEmail = "";

                if(isset($_POST["login"])){
                    
                    function validateFormData($formData){
                        $formData = trim(stripslashes(htmlspecialchars($formData)));
                        return $formData;
                    }

                    $formEmail = validateFormData($_POST["email"]);
                    $formPass = validateFormData($_POST["password"]);

                    include("Chat Server/connection.php");

                    $query = "SELECT * from chat_users WHERE email='$formEmail'";
                    $result = mysqli_query($conn, $query);

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            
                            $id = $row['id'];
                            $email = $row['email'];
                            $name = $row['name'];
                            $password = $row['password'];
                        }
                        if($formPass == $password){
                            session_start();

                            $_SESSION['loggedInId'] = $id;
                            $_SESSION['loggedInEmail'] = $email;
                            $_SESSION['loggedInName'] = $name;
                            $_SESSION['loggedInPassword'] = $password;
                             if($_SESSION['loggedInId'])
                            header("Location: Chat Server/users.php");
                        }
                        else 
                            echo "<div class='alert-danger alert'>Wrong User/ Password Combination, Try Again!<a class='close' data-dismiss='alert'>&times;</a></div><br>";
                    }
                    else{
                        echo "<div class='alert-danger alert'>No such user in database, Try Again!<a class='close' data-dismiss='alert'>&times;</a></div><br>";
                    }
                    
        
                    mysqli_close($conn);
                }
            

            ?>
            
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <h1 style="text-align: center;">Chat Server</h1>
            <p class="lead" style="text-align: center;">Log in to your account</p>
                <div class="form-group">
                    
                    <label class="col-sm-4 control-label" for="login-email">Email</label>
                    
            
                    <div class="col-sm-5">
                        <input type="email" class="form-control" id="login-email" placeholder="Enter your email..." name="email" value="<?php echo $formEmail; ?>" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="login-password">Password</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="login-password" placeholder="Enter your password..." name="password"><br>
                        <button type="submit" class="btn btn-primary" name="login">Log in!</button>
                        <a href="Chat%20Server/registration.php" class="btn btn-success pull-right" name="register">Not a User yet,Register Now!</a>
                    </div>
                </div>
                
            </form>
        </div>

        <hr>
        
        <footer style="text-align: center; font-family: Georgia, Times, serif;">
            Coded with &hearts; by <a href="../index.html">Yash</a>
        </footer>
        
      
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="../../bootstrap/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>