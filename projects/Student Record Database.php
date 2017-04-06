<?php 
    $title = "Student Record Database";
    include 'includes/header.php';
?>
    <body id="main" onload="loadAjax();">
        <?php 
            include 'includes/navbar.php';
        ?>
        <div class="container">
            <div class="jumbotron">
                <h2>Student Record</h2>
            </div>
            
            <div class="form-horizontal" id="form-data">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="form-name">Student Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="form-name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="form-subject">Student Subject</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="form-subject">
                            <option default value="">Select your subject</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Phychology">Phychology</option>
                            <option value="Mechanical">Mechanical</option>
                            <option value="Electrical">Electrical</option>
                            <option value="Biology">Biology</option>
                        </select>
                    </div>
                    <label class="control-label col-sm-2" for="form-fee">Student Fee</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" id="form-fee">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <button class="btn btn-danger btn-block" onclick="loadAjax('add');" id="add-button"><span class="glyphicon glyphicon-plus"></span> Add Student</button>
                    </div>
                </div>
            </div>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="success">
                        <th>S.no</th>
                        <th>Student Name</th>
                        <th>Student Subject</th>
                        <th>Student Fee</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody id="data"></tbody>
            </table>
            
        </div>
        

        <?php 
            include 'includes/footer.php';
        ?>

