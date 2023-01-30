

<?php
// Retrieve session data 
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';
// Get member data 
$memberData = $userData = array();

if (!empty($_GET['id'])) {
    // Include and initialize JSON class 
    include 'crud.class.php';
    $db = new Crud();

    // Fetch the member data 
    $memberData = $db->getSingle($_GET['id']);
}
$userData = !empty($sessData['userData']) ? $sessData['userData'] : $memberData;
unset($_SESSION['sessData']['userData']);

$actionLabel = !empty($_GET['id']) ? 'Edit' : 'Add';

// Get status message from session 
if (!empty($sessData['status']['msg'])) {
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>