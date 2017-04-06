<?php

    $nameError = $emailError = $passwordError = $formName = $formEmail = $formPassword = $result = $query = "";

    if(isset($_POST["submit"])){
        
        function validateFormData($formData){
            $formData = trim(stripslashes(htmlspecialchars($formData)));
            return $formData;
        }
        
        if(!$_POST["name"])
            $nameError = "* Please enter your name <br>";
        else
            $formName = validateFormData($_POST["name"]);
        
        if(!$_POST["email"])
            $emailError = "* Please enter your email <br>";
        else
            $formEmail = validateFormData($_POST["email"]);
        
        if(!$_POST["password"])
            $passwordError = "* Please enter your password <br>";
        else
            $formPassword = validateFormData($_POST["password"]);
        
        include("connection.php");
        
        $query = "INSERT INTO users(id,email,name,password)
                  VALUE(NULL,'$formEmail','$formName','$formPassword')";
        
                    
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>New User Registration</title>

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
                    <a class="navbar-brand" href="index.php">CLIENT<b>MANAGER</b></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../../index.html">Home</a></li>
                    <li><a href="index.php">Log in</a></li>
                </ul>
            </div>
        </nav>
        
        <div class="container">
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >
                <h1 style="text-align: center;">Client Address Book</h1>
                <p class="lead" style="text-align: center;">Register for new account</p>
                <br><br>
                
                <?php
                    
                    if(isset($_POST["submit"])){

                        if($formName != "" && $formEmail != "" && $formPassword != "")
                            $result = mysqli_query($conn, $query);
                        else
                            echo "<div class='alert alert-danger'>Registration Unsuccessful! please fill up all fields and try again<a class='close' data-dismiss='alert'>&times;</a></div>";

                        if($result){
                            echo "<div class='alert alert-success'>Registration Successful!<a class='close' data-dismiss='alert'>&times;</a></div>";
                        }
                        
                    }
                    
        
                ?>
                
                <br><br>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="form-name">Name:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="form-name" name="name" placeholder="Enter your name...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="form-email">Email:</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" id="form-email" name="email" placeholder="Enter your email...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="form-password">Password:</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="form-password" name="password" placeholder="Enter your password...">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 control-label col-sm-offset-4" style="text-align: center;">
                        <button class="btn btn-primary" type="submit" name="submit">Register</button>
                    </div>
                </div>
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