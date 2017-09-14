<?php
    include_once 'text/crud.php';

    $crud= new crud();
    $query = "SELECT * FROM users ORDER BY id DESC";
    $result = $crud->getData($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
</head>
<body>
    <a href="add.php">Adding Data</a> 
    <table width='70%' border=0>
        <tr bgcolor="light green"> 
            <td>Name</td> 
            <td>Email</td> 
            <td>Phone</td> 
        </tr>
        <?php 
            foreach ($result as $key=>$res){
                echo "<tr>";
                echo "<td>".$res['name']."</td>";
                echo "<td>".$res['email']."</td>";
                echo "<td>".$res['phone']."</td>";
                echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a>
                 <a href=\"delete.php?id=$res[id]\" 
                 onClick=\"return confirm('Are you sure, you want to DELET?')\">
                 Delete</a></td>";
            }
        ?>

    </table>

</body>
</html>