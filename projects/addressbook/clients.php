<?php
    include("connection.php");
    session_start();

    if(!$_SESSION["loggedInName"]){
        header("Location: index.php");
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
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </nav>
        
        <div class="container">
            <h1>Client Address Book</h1>
            <?php

                //adding clients
                if(isset($_GET['alert'])){
                    if($_GET['alert'] == 'success')
                        echo "<div class='alert alert-success'>New client added!<a class='close' data-dismiss='alert'>&times;</a></div>";
                }
            
                if(isset($_GET['alert'])){
                    if($_GET['alert'] == 'updatesuccess')
                        echo "<div class='alert alert-success'>Client Updated!<a class='close' data-dismiss='alert'>&times;</a></div>";
                }
                if(isset($_GET['alert'])){
                    if($_GET['alert'] == 'deleted')
                        echo "<div class='alert alert-success'>Client Deleted!<a class='close' data-dismiss='alert'>&times;</a></div>";
                }

            
            
                $query = "SELECT * FROM clients";
                $result = mysqli_query($conn, $query);
                
                echo "<table class='table table-bordered table-striped'><tr><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Company</th><th>Notes</th><th>Edit</th></tr>";
            
                if(mysqli_num_rows($result) > 0){
                    
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone'] . "</td><td>" . $row['address'] . "</td><td>" . $row['company'] . "</td><td>" . $row['notes'] . "</td><td><a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span></a>" . "</td></tr>"; 
                    }                    
                }
                else
                    echo "<div class='alert alert-danger'>No entries in the database</div><br>";
            
                echo "<tr><td colspan='7' class='text-center'><a href='add_client.php' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus'></span> Add Client</a></td></tr></table>";
            
                
            
            
                mysqli_close($conn);
            
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