<?php 
    $title = "ToDo List";
    include 'includes/header.php';
?>
    <body>
        <?php 
            include 'includes/navbar.php';
        ?>
        <div class="container" id="toDoListWrapper">
            <h1>ToDo List</h1>
            <div id="toDoList">
                <ul>
                    <li class="listTitle">Monday</li>
                    <li class="addItem"><input type="text" placeholder="Add new text..."></li>
                </ul>
                <ul>
                    <li class="listTitle">Tuesday</li>
                    <li class="addItem"><input type="text" placeholder="Add new text..."></li>
                </ul>
                <ul>
                    <li class="listTitle">Wednesday</li>
                    <li class="addItem"><input type="text" placeholder="Add new text..."></li>
                </ul>
                <ul>
                    <li class="listTitle">Thursday</li>
                    <li class="addItem"><input type="text" placeholder="Add new text..."></li>
                </ul>
                <ul>
                    <li class="listTitle">Friday</li>
                    <li class="addItem"><input type="text" placeholder="Add new text..."></li>
                </ul>
                <ul>
                    <li class="listTitle">Saturday</li>
                    <li class="addItem"><input type="text" placeholder="Add new text..."></li>
                </ul>
                <ul>
                    <li class="listTitle">Sunday</li>
                    <li class="addItem"><input type="text" placeholder="Add new text..."></li>
                </ul>
            </div> 

        </div>

        <div id="trash">Drop here to delete item</div>


        <?php 
            include 'includes/footer.php';
        ?>