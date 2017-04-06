<?php

    include("connection.php");
    session_start();

    //check if user is not logged in
    if(!$_SESSION["loggedInName"]){
        //send them to login page
        header("Location: index.php");
    }
    
    $clientId = $_GET["id"];

    $query = "SELECT * FROM clients WHERE id='$clientId'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $name = $row["name"];
            $phone = $row["phone"];
            $company = $row["company"];
            $email = $row["email"];
            $address = $row["address"];
            $notes = $row["notes"];
        }
    }

    $nameError = $emailError = "";
    
    if(isset($_POST["update"])){
        
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
        
        $query = "UPDATE clients
                  SET name='$name',
                      email='$email',
                      phone='$phone',
                      address='$address',
                      notes='$notes',
                      company='$company' WHERE id='$clientId'";
        
        $result = mysqli_query($conn, $query);
        
        if($result){
            header("Location: clients.php?alert=updatesuccess");
        }
        else
            echo "<div class='alert alert-danger'>Error: " . $query . "<br>" . mysqli_error($conn) . "</div>";
    }

    $alertMessage = "";

    if(isset($_POST["delete"])){
        $alertMessage = "<div class='alert alert-danger'>
                  <p>Are you sure you want to delete this client? No take backs!</p><br>
                  <form action='". htmlspecialchars($_SERVER['PHP_SELF']) ."?id=$clientId' method='post'>
                      <button type='submit' class='btn btn-danger btn-sm' name='confirm-delete'>Yes, Delete!</button>
                      <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Oops, No thanks!</a>
                  </form>
        
              </div>";
    }

    if(isset($_POST["confirm-delete"])){
        $query = "DELETE from clients WHERE id='$clientId'";
        $result = mysqli_query($conn, $query);
        
        if($result){
            header("Location: clients.php?alert=deleted");
        }
        else
            echo "<div class='alert alert-danger'>Error: " . $query . "<br>" . mysqli_error($conn) . "</div>";
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
            <?php echo $alertMessage; ?>
            <div class="row">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?id=<?php echo $clientId; ?>" method="post">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for='form-name'>Name * </label>
                            <small class="text-danger"><?php echo $nameError; ?></small>
                            <input type="text" class="form-control" id="form-name" name="name" value="<?php echo $name; ?>">
                        </div>
                        <div class="form-group">
                            <label for='form-phone'>Phone</label>
                            <input type="tel" class="form-control" id="form-phone" name="phone" value="<?php echo $phone; ?>">
                        </div>
                        <div class="form-group">
                            <label for='form-company'>Company</label>
                            <input type="text" class="form-control" id="form-company" name="company" value="<?php echo $company; ?>">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-danger btn-lg" name="delete">Delete</button>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for='form-email'>Email * </label>
                            <small class="text-danger"><?php echo $emailError; ?></small>
                            <input type="email" class="form-control" id="form-email" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group">
                            <label for='form-address'>Address</label>
                            <input type="text" class="form-control" id="form-address" name="address" value="<?php echo $address; ?>">
                        </div>
                        <div class="form-group">
                            <label for='form-notes'>Notes</label>
                            <textarea class="form-control" id="form-name" name="notes"><?php echo $notes; ?></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-lg pull-right" name="update">Update</button> 
                        <a href="clients.php" type="button" class="btn btn-default btn-lg pull-right">CANCEL</a>
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