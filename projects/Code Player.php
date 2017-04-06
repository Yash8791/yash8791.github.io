<?php 
    $title = "Code Player";
    include 'includes/header.php';
?>
    <body id="codePlayer">
        <?php 
            include 'includes/navbar.php';
        ?>
        
        <br><br><br>
        
        <nav id="codeBar">
            <div class="logo pull-left">Code<b>Player</b></div>
            <ul class="toggle-choices">
                <li class="toggle selected">HTML</li>
                <li class="toggle">CSS</li>
                <li class="toggle">JS</li>
                <li style="border:none" class="toggle selected">RESULT</li>
            </ul>
            <button class="btn btn-success pull-right runButton"><b>RUN</b></button>
        </nav>
        
        <div class="codeContainer" id="htmlContainer">
            <div class="codeLabel">HTML</div>
            <textarea id="htmlCode" placeholder="Enter HTML code"></textarea>
        </div>
        <div class="codeContainer" id="cssContainer">
            <div class="codeLabel">CSS</div>
            <textarea id="cssCode" placeholder="Enter CSS code"></textarea>
        </div>
        <div class="codeContainer" id="jsContainer">
            <div class="codeLabel">JAVASCRIPT</div>
            <textarea id="jsCode" placeholder="Enter JavaScript code"></textarea>
        </div>
        <div class="codeContainer" id="resultContainer">
            <div class="codeLabel">RESULT</div>
            <iframe id="resultFrame">example</iframe>
        </div>

        <footer id="footer">
            Coded with &hearts; by <a href="../index.html">Yash</a>
        </footer> 
                
      
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="../bootstrap/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        
        <!--  Load the CDN first  -->
        <script src="../js/jquery-min.js"></script>

        <!--  If CDN fails to load then serve up the local version  -->
        <script>window.jQuery || document.write("<script src='../js/jquery.js'><\/script>")</script>

        <!--    <script src="JS/jquery-3.0.0.js"></script>-->
        <script src="../js/Code%20Player.js"></script>
    </body>
</html>