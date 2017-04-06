//----JQuery For Car Racer-----

$(function(){
    
    $("#go").click(function(){
        
        //---Getting the width of Cars-----
        var carWidth1 = $("#car1").width();
        var carWidth2 = $("#car2").width();
        //alert(carWidth1);
        
        
        //---Getting the width of Race Track------
        var raceTrackWidth = $(window).width();
        //alert(raceTrackWidth);
        
        //---Distance Car have to covered----
        var coveredDistance1 = raceTrackWidth - carWidth1;
        var coveredDistance2 = raceTrackWidth - carWidth2;
        
        //----Generate the random no. between 1 & 5000
        var raceTime1 = Math.floor((Math.random() * 10000) + 3000);
        var raceTime2 = Math.floor((Math.random() * 10000) + 3000);
        
        //----Animate Cars-----
        //----Car 1-----
        $("#car1").animate({
            left: coveredDistance1
        }, raceTime1, function(){
            //----Car 1 Result----
            $("#raceInfo1 .result").text("Car 1 has finished race in " + raceTime1/1000 + " seconds");
            
            //checkIfComplete();
            
            if(raceTime1 < raceTime2){
                $("#raceInfo1 .position").text("first");
                $("#raceInfo2 .position").text("second");
        }
        });
        
        //----Car 2-----
        $("#car2").animate({
            left: coveredDistance2
        }, raceTime2, function(){
            //----Car 2 Result----
            $("#raceInfo2 .result").text("Car 2 has finished race in " + raceTime2/1000 + " seconds");
            
            
            if(raceTime1 > raceTime2){
                $("#raceInfo1 .position").text("second");
                $("#raceInfo2 .position").text("first");
        }
        });
        
        
    });
    
    $("#reset").click(function(){        
        
        $(".car").stop().css("left","0");
        $(".raceInfo span").text("");
        
    });
    
    
});






