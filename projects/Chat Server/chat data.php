<?php

    include("connection.php");

    session_start();
    $loggedInName = $_SESSION["loggedInName"];

    $query = "SELECT * FROM chat ORDER BY date";
    $result = mysqli_query($conn, $query);
                            
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $name = $row["name"];
            $message = $row["message"];
            $date = $row["date"];

            if($name == $loggedInName)
                echo "<span id='person2'><b>$name: </b>$message <span id='time'>".date('M d, h:i a',strtotime($date))."</span></span><br>";
            else
                echo "<span id='person1'><b>$name: </b>$message <span id='time'>".date('M d, h:i a',strtotime($date))."</span></span><br>";

        }
    }
    
    mysqli_close($conn);

?>