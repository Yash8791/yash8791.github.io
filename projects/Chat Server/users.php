<?php
    include("connection.php");
    session_start();

    if(!$_SESSION["loggedInName"]){
        header("Location: ../Chat%20Server.php");
    }
    $loggedInName = $_SESSION['loggedInName'];
    $loggedInId = $_SESSION['loggedInId'];

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php echo $loggedInName; ?></title>

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
                    <a class="navbar-brand" href="../Chat%20Server.php">CHAT<b>SERVER</b></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="">Hi,<?php echo $_SESSION['loggedInName']; ?></a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </nav>
        
        <div class="container">
            <h1 class="text-center" style="text-shadow: 2px 2px 5px #777;">List of Users</h1>
            
            <?php
            
                $query = "SELECT * FROM chat_users WHERE id != '$loggedInId'";
                $result = mysqli_query($conn, $query);
            
                echo "<table class='table table-bordered table-striped'><tr><td colspan='7' class='text-center'><a href='chat.php' class='btn btn-primary btn-lg'><span class='glyphicon glyphicon-comment'></span> Go To The Chat Zone</a></td></tr>";
                
                echo "<tr><th>Name</th><th>Email</th><th>Phone</th><th>Gender</th><th>Chat</th></tr>";
            
                if(mysqli_num_rows($result) > 0){
                    
                    while($row = mysqli_fetch_assoc($result)){
                        
                        echo "<tr><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone'] . "</td><td>" . $row['gender'] . "</td>" . "<td><a href='chat.php?id=" . $row['id'] . "' class='btn btn-primary'><span class='glyphicon glyphicon-comment'></span></a>" . "</td></tr>"; 
                    }                    
                }
                else
                    echo "<div class='alert alert-danger'>No Users Registered Yet!</div><br>";
            
                echo "<tr><td colspan='7' class='text-center'><a href='delete.php' class='btn btn-danger btn-lg'><span class='glyphicon glyphicon-remove'></span> Delete Your Account</a></td></tr>";
            
                echo "</table>";
            
                
            
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