<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Yash's Projects</title>
        
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
    <body id="project-background">
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
                        <li class="active"><a href="projects.php"><span class="glyphicon glyphicon-folder-open"></span> Projects</a></li>
                        <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div id="project-container" class="container">

            <div class='row'>
            <?php 
                
                include 'projects list.php';
                
                for($i = count($projects["project-title"]) ; $i >=1 ; $i--){
                    

                    
                    echo "  <div class='col-sm-4'>
                                <li style='list-style: none;'>
                                    <a href='projects/".$projects['project-title'][$i-1].".".$projects['project-extension'][$i-1]."' class='thumbnail project'>
                                        <img src='images/".$projects['project-title'][$i-1].".png' alt='".$projects['project-title'][$i-1]."' title='".$projects['project-title'][$i-1]."' width='320' height='0'>
                                        <div class='caption'>
                                            <h3>".$projects['project-title'][$i-1]."</h3>
                                            <p class='lead'>".$projects['project-detail'][$i-1]."<span class='glyphicon glyphicon-menu-right pull-right'></span></p>
                                        </div>
                                    </a>
                                </li>
                            </div>";

                }
            
            ?>
            </div></div>        
        
        
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