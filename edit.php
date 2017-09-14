<?php
include_once 'text/crud.php';

$crud = new crud();

$id = $crud->escape_string($_GET['id']);

$result = $crud->getData("SELECT * FROM users WHERE id = $id");

foreach ($result as $res){
    $name = $res['name'];
    $email = $res['email'];
    $phone = $res['phone'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editing Data</title>
</head>
<body>
<a href="index.php">Home</a> 
<br/> 
<br/>
<br/>
    <form name = "edit" method ="post" action = "editcontroller.php">
        <table border="0">
            <tr>    
                <td>Name</td>
                <td><input type="test" name="name" value="<?php echo $name ?>"</td> 
            </tr> 
            <tr> 
                <td>Email</td> 
                <td><input type="text" name="email" value="<?php echo $eamil ?>"></td>
            </tr> 
            <tr> 
                <td>Phone</td> 
                <td><input type="text" name="phone" value="<?php echo $phone ?>"></td>
            </tr> 
            <tr> 
                <td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td> 
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
         </table>
    </form>
</body>
</html>