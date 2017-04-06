// script for tip calculator

function calculateTip() {
    
    //store the data of inputs
    var billAmount = document.getElementById("billAmount").value;
    var serviceQuality = document.getElementById("serviceQuality").value;
    var totalPeople = document.getElementById("totalPeople").value;
    var tip;
    
    //Quick Validation
    if (billAmount === "" || serviceQuality == 0) {
        window.alert("Please enter some values to get this baby up and running!");
        return; //this will prevent the function from continuing
    }
    //check if total number of people is none or less than or equal to 1
    if (totalPeople === "" || totalPeople <= 1) {
        totalPeople = 1;
        document.getElementById("each").style.display = "none";
        
    } else {
        document.getElementById("each").style.display = "block";
    }
    
    //Do some maths
    tip = (billAmount * serviceQuality) / totalPeople;
    tip = Math.round(tip * 100) / 100;
    tip = tip.toFixed(2);
    
    //Display the tip
    document.getElementById("totalTip").style.display = "block";
    document.getElementById("tip").innerHTML = tip;
}

// hiding elements
document.getElementById("totalTip").style.display = "none";
//document.getElementbyId("each").style.display = "none";


//function call on button click
document.getElementById("calculate").onclick = function() { calculateTip(); };

