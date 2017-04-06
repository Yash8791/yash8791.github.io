<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Login</title>

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
                    <a class="navbar-brand" href="Client%20Manager.php">CLIENT<b>MANAGER</b></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="addressbook/registration.php">Register now</a></li>
                </ul>
            </div>
        </nav>
        
        <div class="container">
            <h1>Client Address Book</h1>
            <p class="lead">Log in to your account</p>
            
            <?php
            
                $formEmail = "";

                if(isset($_POST["login"])){
                    function validateFormData($formData){
                        $formData = trim(stripslashes(htmlspecialchars($formData)));
                        return $formData;
                    }

                    $formEmail = validateFormData($_POST["email"]);
                    $formPass = validateFormData($_POST["password"]);

                    include("addressbook/connection.php");

                    $query = "SELECT email,name,password from users WHERE email='$formEmail'";
                    $result = mysqli_query($conn, $query);

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $email = $row['email'];
                            $name = $row['name'];
                            $hashedPass = $row['password'];
                        }
                        if($formPass == $hashedPass){
                            session_start();

                            $_SESSION['loggedInEmail'] = $email;
                            $_SESSION['loggedInName'] = $name;
                            $_SESSION['loggedInPassword'] = $password;

                            header("Location: addressbook/clients.php");
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
            
            <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-group">
                    <label for="login-email" class="sr-only">Email</label>
                    <input type="email" class="form-control" id="login-email" placeholder="Enter your email..." name="email" value="<?php echo $formEmail; ?>">
                </div>
                <div class="form-group">
                    <label for="login-password" class="sr-only">Password</label>
                    <input type="password" class="form-control" id="login-password" placeholder="Enter your password..." name="password">
                </div>
                <button type="submit" class="btn btn-primary" name="login">Log in!</button>
            </form>
        </div>

        <hr>
        
        <footer style="text-align: center; font-family: Georgia, Times, serif;">
            Coded with &hearts; by <a href="">Yash</a>
        </footer>
        
      
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="../../bootstrap/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>