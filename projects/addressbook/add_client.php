<?php

    include("connection.php");
    session_start();

    if(!$_SESSION["loggedInName"]){
        header("Location: index.php");
    }

    $nameError = $emailError = "";

    if(isset($_POST["submit"])){
                    
        $name = $email = "";
        

        function validateFormData($formData){
            $formData = trim(stripslashes(htmlspecialchars($formData)));
            return $formData;
        }

        if(!$_POST["name"]){
            $nameError = "(Required)";
        }
        else{
            $name = validateFormData($_POST["name"]);
        }
        if(!$_POST["email"]){
            $emailError = "(Required)";
        }
        else{
            $email = validateFormData($_POST["email"]);
        }


        $phone = validateFormData($_POST["phone"]);
        $company = validateFormData($_POST["company"]);
        $address = validateFormData($_POST["address"]);
        $notes = validateFormData($_POST["notes"]);

        if($name && $email){
            $query2 = "INSERT INTO clients(id,name,email,phone,address,company,notes,date)
                      VALUE(NULL,'$name','$email','$phone','$address','$company','$notes',CURRENT_TIMESTAMP)";
            
            $result = mysqli_query($conn, $query2);

            //$_SESSION["query2"] = $query2;
            if($result)
                header("Location: clients.php?alert=success");
            else
                echo "<div class='alert alert-danger'>Error: " . $query2 . "<br>" . mysqli_error($conn) . "</div>";

        }

    }

?>


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
                    <a class="navbar-brand" href="index.php">CLIENT<b>MANAGER</b></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="">Hi,<?php echo $_SESSION['loggedInName']; ?></a></li>
                    <li><a href="index.php">Log Out</a></li>
                </ul>
            </div>
        </nav>
        
        <div class="container">
            <h1><b>Add Client</b></h1>
            <div class="row">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for='form-name'>Name * </label>
                            <small class="text-danger"><?php echo $nameError; ?></small>
                            <input type="text" class="form-control" id="form-name" name="name">
                        </div>
                        <div class="form-group">
                            <label for='form-phone'>Phone</label>
                            <input type="tel" class="form-control" id="form-phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for='form-company'>Company</label>
                            <input type="text" class="form-control" id="form-company" name="company">
                        </div>
                        <br>
                        <a href="clients.php" class="btn btn-default btn-lg">Cancel</a>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for='form-email'>Email * </label>
                            <small class="text-danger"><?php echo $emailError; ?></small>
                            <input type="email" class="form-control" id="form-email" name="email">
                        </div>
                        <div class="form-group">
                            <label for='form-address'>Address</label>
                            <input type="text" class="form-control" id="form-address" name="address">
                        </div>
                        <div class="form-group">
                            <label for='form-notes'>Notes</label>
                            <textarea class="form-control" id="form-name" name="notes"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg pull-right" name="submit">Add Client</button>
                    </div>
                </form>
            </div><br>
            <?php
            
                

            
            ?>
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