<?php
    include_once 'text/crud.php';
    include_once 'text/empty.php';

    $crud = new crud();
    $validate = new validate();

    if (isset($_POST['update']))
    {
         $id = $crud->escape_string($_POST['id']);
         $name = $crud->escape_string($_POST['name']);
         $email = $crud->escape_string($_POST['email']);
         $phone = $crud->escape_string($_POST['phone']);

         $msg = $validate->check($_POST, array('name', 'email', 'phone'));
         $email_valid = $validate->email_valid($_POST['email']);
         $phone_valid = $validate->phone_valid($_POST['phone']);
         
         if($msg){
             echo $msg;
         }elseif (!$email_valid){
             echo 'Please check your Email';
         }elseif (!$phone_valid){
             echo 'Please check your Phone';
         }else{
             $result = $crud->execute ("UPDATE users SET name=$name, email=$email, phone=$phone WHERE id=$id");
             header("Location: index.php");
         }

    }


?>