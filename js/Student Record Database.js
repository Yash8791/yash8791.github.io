function loadAjax(req,id){
    var xhr = new XMLHttpRequest();
    
    var name = $("#form-name").val();
    var subject = $("#form-subject").val();
    var fee = $("#form-fee").val();
    
    if(req == undefined){
        req = "";
    }
    
    if(name == ""){
        name = "";
    }
    if(subject == ""){
        subject = "";
    }
    if(fee == ""){
        fee = "";
    }
    
    if((name == "" || subject == "" || fee == "") && req == "add"){
        alert("Enter all fields to get this baby up and running!");
    }
    else{
        xhr.open('GET','student_record_data.php?req='+req+'&name='+name+'&subject='+subject+'&fee='+fee+"&id="+id, true);
        xhr.send();
    }
    
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            document.getElementById("data").innerHTML = xhr.responseText;
        }
    }


    $("#form-name").val("");
    $("#form-subject").val("");
    $("#form-fee").val("");
    
    
}


function editData(req,id){
    
    if(req == "cancel"){
        document.getElementById("form-data").innerHTML = "<div class='form-group'><label class='control-label col-sm-2' for='form-name'>Student Name</label><div class='col-sm-8'><input type='text' class='form-control' id='form-name'></div></div><div class='form-group'><label class='control-label col-sm-2' for='form-subject'>Student Subject</label><div class='col-sm-3'><select class='form-control' id='form-subject'><option default value=''>Select your subject</option><option value='Computer Science'>Computer Science</option><option value='Phychology'>Phychology</option><option value='Mechanical'>Mechanical</option><option value='Electrical'>Electrical</option><option value='Biology'>Biology</option></select></div><label class='control-label col-sm-2' for='form-fee'>Student Fee</label><div class='col-sm-3'><input type='number' class='form-control' id='form-fee'></div></div><br><div class='form-group'><div class='col-sm-8 col-sm-offset-2'><button class='btn btn-danger btn-block' onclick="+"loadAjax('add');"+" id='add-button'><span class='glyphicon glyphicon-plus'></span> Add Student</button></div></div>";
    }
    else{
        var xhr = new XMLHttpRequest();
    
        if(req == undefined){
            req = "";
        }

        if(req == "edit"){
            var name = $("#form-name").val();
            var subject = $("#form-subject").val();
            var fee = $("#form-fee").val();

            if(req == undefined){
                req = "";
            }

            if(name == ""){
                name = "";
            }
            if(subject == ""){
                subject = "";
            }
            if(fee == ""){
                fee = "";
            }

            if((name == "" || subject == "" || fee == "") && req == "edit"){
                alert("Enter all fields to get this baby up and running!");
            }
            else{
                xhr.open('GET','student_record_data.php?req='+req+'&name='+name+'&subject='+subject+'&fee='+fee+"&id="+id, true);
                xhr.send();
            }



            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    document.getElementById("data").innerHTML = xhr.responseText;
                    document.getElementById("form-data").innerHTML = "<div class='form-group'><label class='control-label col-sm-2' for='form-name'>Student Name</label><div class='col-sm-8'><input type='text' class='form-control' id='form-name'></div></div><div class='form-group'><label class='control-label col-sm-2' for='form-subject'>Student Subject</label><div class='col-sm-3'><select class='form-control' id='form-subject'><option default value=''>Select your subject</option><option value='Computer Science'>Computer Science</option><option value='Phychology'>Phychology</option><option value='Mechanical'>Mechanical</option><option value='Electrical'>Electrical</option><option value='Biology'>Biology</option></select></div><label class='control-label col-sm-2' for='form-fee'>Student Fee</label><div class='col-sm-3'><input type='number' class='form-control' id='form-fee'></div></div><br><div class='form-group'><div class='col-sm-8 col-sm-offset-2'><button class='btn btn-danger btn-block' onclick="+"loadAjax('add');"+" id='add-button'><span class='glyphicon glyphicon-plus'></span> Add Student</button></div></div>";

                }
            }
    }
    
        
}  
    
    if(req == "editprocess"){
        
        var name = $("#form-name").val();
        var subject = $("#form-subject").val();
        var fee = $("#form-fee").val();

        if(req == undefined){
            req = "";
        }

        if(name == ""){
            name = "";
        }
        if(subject == ""){
            subject = "";
        }
        if(fee == ""){
            fee = "";
        }
        
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                document.getElementById("form-data").innerHTML = xhr.responseText;
            }
        }
        xhr.open('GET','student_record_data.php?req='+req+'&name='+name+'&subject='+subject+'&fee='+fee+"&id="+id, true);
        xhr.send();
    }
}
//document.getElementById("add-button").onclick = loadAjax("add");

