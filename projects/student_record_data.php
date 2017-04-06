<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "yash";

    $conn = mysqli_connect($server, $username, $password, $db);

    if(!$conn){
        die("Connection Error: " . mysqli_connect_error());
    }

    if($_REQUEST['req'] == "add"){
        
        $name = $_REQUEST['name'];
        $subject = $_REQUEST['subject'];
        $fee = $_REQUEST['fee'];
        
        $query2 = "INSERT INTO students_record (id,name,subject,fee)
                   VALUES (NULL,'$name','$subject','$fee')";
        $result2 = mysqli_query($conn, $query2);
        
//        if(!$result2){
//            echo "<div class='alert alert-danger'>Enter some fields to add up the records!</div><br>";
//        }
        
    }

    if($_REQUEST['req'] == "delete"){
        
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $subject = $_REQUEST['subject'];
        $fee = $_REQUEST['fee'];
        
        
        $query2 = "DELETE from students_record where id='$id'";
        $result2 = mysqli_query($conn, $query2);
        
        if(!$result2){
            echo "<div class='alert alert-danger'>connection error</div><br>";
        }
        
    }
  

if($_REQUEST['req'] == 'editprocess'){
        $id = $_REQUEST['id'];
        
        $query = "SELECT * FROM students_record WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result)){
            while($row = mysqli_fetch_assoc($result)){
                
                $name = $row['name'];
                $subject = $row['subject'];
                $fee = $row['fee'];
                
                ?>


        <div class="form-group">
            <label class="control-label col-sm-2" for="form-name">Employee Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="form-name" value="<?php echo $name; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="form-subject">Employee Subject</label>
            <div class="col-sm-3">
                <select class="form-control" id="form-subject">
                    <option default value="">Select your subject</option>
                    <?php  
                    
                        if($subject == "Computer Science"){
                            echo "<option value='Computer Science' selected>Computer Science</option>
                                    <option value='Phychology'>Phychology</option>
                                    <option value='Mechanical'>Mechanical</option>
                                    <option value='Electrical'>Electrical</option>
                                    <option value='Biology'>Biology</option>";
                        }
                        if($subject == "Phychology"){
                            echo "<option value='Computer Science'>Computer Science</option>
                                    <option value='Phychology' selected>Phychology</option>
                                    <option value='Mechanical'>Mechanical</option>
                                    <option value='Electrical'>Electrical</option>
                                    <option value='Biology'>Biology</option>";
                        }
                        if($subject == "Mechanical"){
                            echo "<option value='Computer Science'>Computer Science</option>
                                    <option value='Phychology'>Phychology</option>
                                    <option value='Mechanical' selected>Mechanical</option>
                                    <option value='Electrical'>Electrical</option>
                                    <option value='Biology'>Biology</option>";
                        }
                        if($subject == "Electricale"){
                            echo "<option value='Computer Science'>Computer Science</option>
                                    <option value='Phychology'>Phychology</option>
                                    <option value='Mechanical'>Mechanical</option>
                                    <option value='Electrical' selected>Electrical</option>
                                    <option value='Biology'>Biology</option>";
                        }
                        if($subject == "Biology"){
                            echo "<option value='Computer Science'>Computer Science</option>
                                    <option value='Phychology'>Phychology</option>
                                    <option value='Mechanical'>Mechanical</option>
                                    <option value='Electrical'>Electrical</option>
                                    <option value='Biology' selected>Biology</option>";
                        }
                    
                    ?>
                    
                </select>
            </div>
            <label class="control-label col-sm-2" for="form-fee">Employee Fee</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="form-fee" value="<?php echo $fee; ?>">
            </div>
            <br><br><br>
            <div class="form-group">
                <div class="col-sm-3">
                    
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-default btn-block" onclick="editData('cancel');"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-danger btn-block" onclick="editData('edit',<?php echo $id; ?>);"><span class="glyphicon glyphicon-edit"></span> Edit Record</button>
                </div>
            </div>
        </div>
        
<?php

            }
        }
    }
        if($_REQUEST['req'] == 'edit'){
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $subject = $_REQUEST['subject'];
            $fee = $_REQUEST['fee'];
            
            $query = "UPDATE students_record
                      SET name='$name',
                          subject='$subject',
                          fee='$fee'
                          WHERE id='$id'";
            
            $result = mysqli_query($conn, $query);
            
        }

    if($_REQUEST['req'] == "" || $_REQUEST['req'] == "edit" || $_REQUEST['req'] == "add" || $_REQUEST['req'] == "delete"){
    $query = "SELECT * FROM students_record ORDER BY id ASC";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $i = 0;
        while($rows = mysqli_fetch_assoc($result)){
            
    ?>

    <tr>
        <td><?php echo ++$i; ?></td>
        <td><?php echo $rows['name']; ?></td>
        <td><?php echo $rows['subject']; ?></td>
        <td><?php echo $rows['fee']; ?>/-</td>
        <td>
            <div class='dropdown'>
                <button class='btn btn-primary' data-toggle='dropdown'>Actions <span class='caret'></span></button>
                <ul class='dropdown-menu'>
                    <li><a href='javascript:void(0);' onclick="editData('editprocess',<?php echo $rows['id']; ?>);">Edit</a></li>
                    <li><a href='javascript:void(0);' onclick="loadAjax('delete',<?php echo $rows['id']; ?>);">Delete</a></li>
                </ul>
            </div>
        </td>
    </tr>


    <?php 
        
        }
    }
    
    }
    //mysqli_close($conn);

?>