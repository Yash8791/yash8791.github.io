$(function(){


    
    $(".click-me").click(function(){
        $("#my-bio h1,#my-bio h2,#my-bio h3,#my-bio h4,#my-bio h5,#my-bio h6").delay().slideDown(2000);
    });
    
//    $("#project-container").mouseenter(function(e){
//        
//        //$(".col-sm-4").not(e.mouseover).stop().css("opacity", ".6");
//        
//
//        
//        $(".col-sm-4").stop().hover(function(){
//            
//            $(".col-sm-4").stop().not(this).animate({
//                opacity: ".5"
//            },function(){
//                //animation is complete
//            });
//            
//            
//            
//            //$(".col-sm-4").stop().not(this).css("opacity", ".5");
//            $(this).stop().css("opacity", "1");
//            $(this).find("span").stop().css("display", "block");
//            
//            $(this).find("span").stop().animate({
//                right: "15px"
//            },300,function(){
//                //animation is complete
//            });
//            
//        },function(){
//            $(this).stop().css("opacity", ".5");
//            
//            
//            $(this).find("span").stop().css("display", "none");
//            $(this).find("span").stop().css("right", "0");
//            
//        });
//        
//
//    }).mouseleave(function(){
//        $(".col-sm-4").stop().animate({
//            opacity: "1"
//        },function(){
//            //animation is complete
//        });
//    });
    
    $(".col-sm-4").hover(function(){
        
        $(".col-sm-4").not(this).stop().animate({
            opacity: ".5"
        },function(){});
        
        $(this).stop().css("opacity", "1");
        $(this).find("span").stop().css("display", "block");

        $(this).find("span").stop().animate({
            right: "15px"
        },300,function(){
            //animation is complete
        });
        
    },function(){
        
        $(this).stop().css("opacity",".5");


        $(this).find("span").stop().css("display", "none");
        $(this).find("span").stop().css("right", "0");
        
        $(".col-sm-4").stop().animate({
            opacity: "1"
        },function(){
            //animation is complete
        });
    });
    
    
});

		