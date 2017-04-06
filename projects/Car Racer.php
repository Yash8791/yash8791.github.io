<?php 
    $title = "Car Racer";
    include 'includes/header.php';
?>
    
    <body id="race">
        <?php 
            include 'includes/navbar.php';
        ?>
        <h1>JQuery Car Racer</h1>
        <input type="button" class="btn btn-success btn-lg" value="Race!" id="go">
        <input type="button" class="btn btn-warning btn-lg" value="Reset" id="reset">

        <div id="raceTrack">
            <img src="../images/Car-1.png" alt="Blue car" id="car1" class="car" width="200px">
            <img src="../images/Car-2.png" alt="Orange car" id="car2" class="car" width="200px">
        </div>
        <div id="raceInfoContainer" class="clearfix">
            <h2>Results</h2>
            <div id="raceInfo1" class="raceInfo">Car 1<span class="result"></span><span class="position"></span></div>
            <div id="raceInfo2" class="raceInfo">Car 2<span class="result"></span><span class="position"></span></div>
        </div>

        <?php 
    
            include 'includes/footer.php';
        ?>

        

        