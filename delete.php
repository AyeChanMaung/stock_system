<?php
 include_once 'text/crud.php';
    $crud = new crud();
    $id = $crud->escape_string($_GET['id']);
    $result = $crud->delete($id, 'user');
    if ($result){
        header ("Location: index.php");
    }

?>