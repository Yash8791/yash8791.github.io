//----JQuery script for ToDoList----

$(function(){
    
    $("#toDoList ul").sortable({
        items: "li:not('.listTitle, .addItem')",
        connectWith: "ul",
        placeholder: "emptySpace",
        dropOnEmpty: true
    });
    
    $('input').keydown(function(e){
        if(e.keyCode === 13){
            var item = $(this).val();
            $(this).parent().parent().append("<li class='lead'>" + item + "</li>");
            $(this).val("");
        }
    });
    
    $("#trash").droppable({
        accept: "li",
        drop: function(event,ui){
            ui.draggable.remove();  
        }
    });
    
});