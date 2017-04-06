<?php 
    $title = "Tip Calculator";
    include 'includes/header.php';
?>
    <body id="main">
        <?php 
            include 'includes/navbar.php';
        ?>
        <div id="container">
            <h1>Tip Calculator</h1>
            <div id="calculator">
                <form>
                    <label>How much was your bill?<br>&#36;
                    <input type="text" id="billAmount">
                    </label><br>
                    <label>How was your service?<br>
                    <select id="serviceQuality">
                        <option disabled selected value="0">--choose an option--</option>
                        <option value="0.3">30%--outstanding</option>
                        <option value="0.2">20%--good</option>
                        <option value="0.15">15%--it was okay</option>
                        <option value="0.1">10%--bad</option>
                        <option value="0.05">5%--terrible</option>
                    </select>
                    </label><br>
                    <label>How many people are sharing the bill?<br>
                    <input type="text" id="totalPeople"> people
                    </label><br>
                </form>
                <button type="button" id="calculate">Calculate!</button>
                
                <div id="totalTip">
                    
                    <sup>$</sup><span id="tip">0.00</span>
                    <small id="each">each</small>
                </div>
            </div>
        </div>

        <?php 
            include 'includes/footer.php';
        ?>

