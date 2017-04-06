<?php 
    $title = "CSS Universe Animation";
    include 'includes/header.php';
?>
    <body>
        <?php 
            include 'includes/navbar.php';
        ?>
        <div id="universe">
            <div id="stars"></div>
            <div id="sun"></div>
            <div id="earthOrbit">
                <img src="../images/earth.png" alt="Earth" id="earth" width="100" height="100">
                <div id="moonOrbit">
                    <div id="moon"></div>
                </div>
            </div>
        </div>
        <footer>
            Coded with &hearts; by <a href="../index.html">Yash</a>
        </footer>     
      
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="../bootstrap/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        
    </body>
</html>