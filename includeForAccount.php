<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit();
}

if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header("location: login.php");
    exit();
}
//////////////--CRUD CLASS TO SHOW DATA--///////////////////
?>

<?php require("crud.class.php");

$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

$crud = new Crud();

$users = $crud->getRows();

// Get status message from session 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
} 
/////////////--DELETE--/////////////
?>

<?php
if (isset($_POST['delete'])) {
    $users = $crud->delete($row['id']);
}

//elseif (isset($_POST['update'])) {
  //  $users = $crud->update($users, $row['id']);
//}
?>