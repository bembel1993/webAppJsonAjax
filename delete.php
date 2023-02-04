<?php
session_start();

    require("crud.class.php");

    $crud = new Crud();

    if(($_REQUEST['action_type'] == 'delete') && !empty($_GET['id'])){ 
        $delete = $crud->delete($_GET['id']); 
    } 

    header("Location: account.php"); 
exit();
