$(function(){
    
    var windowHeight = $(window).height();
    var navbarHeight = $(".navbar").height();
    var codeBarHeight = $("#codeBar").height();
    var footerHeight = $("#footer").height();
    var codeContainerHeight = windowHeight - (navbarHeight + codeBarHeight + footerHeight);
    
    $(".codeContainer").height(codeContainerHeight);
    
    $(".toggle").click(function(){
        
        var selectedToggle = $(this).html().toLowerCase();
        
        $(this).toggleClass("selected");
        $("#" + selectedToggle + "Container").toggle();
        
        var showingContainers = $(".codeContainer").filter(function(){
            return($(this).css("display") != "none");
        }).length;
        
        $(".codeContainer").width((100/showingContainers) + "%");
        
    });
    
    $(".runButton").click(function(){
        
        var htmlContent = $("#htmlCode").val();
        var cssContent = $("#cssCode").val();
        var jsContent = $("#jsCode").val();
        
        $("iframe").contents().find("html").html('<style>' + cssContent + '</style>' + htmlContent);
        
        document.getElementById("resultFrame").contentWindow.eval(jsContent);
        
    });
    
});