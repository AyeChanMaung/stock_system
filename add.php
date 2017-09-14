<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DATA adding</title>
</head>
<body>
    <?php
        include_once("text/crud.php");
        include_once("text/empty.php");

        if(isset($_POST['submit'])){
            $name = $curd->escape_string($_POST['name']);
            $email = $crud->escape_string($_POST['email']);
            $password = $crud->escape_string($_POST['password']);

            $msg = $validate->check($_POST, array('name', 'email', 'password'));
            $email_valid = $validate->email_valid($_POST['email']);
            $phone_valid = $validate->phone_valid($_POST['phone']);

            if($msg !=null){
                echo $msg;
            }elseif (!$email_valid){
                echo "Please check your Email";
            }elseif (!$phone_valid){
                echo "Pleace check your Phone Number";
            }else{
                $result = $crud->execute("INSERT INTO users(name, email, phone) VALUES ($name, $email, $phone)");
                echo "<font color = 'green'> Data Adding Complete <br/><br/>";
                echo "<a href=index.php>View Result</a>"; 
            }

        }

    ?>
</body>
</html>