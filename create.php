<?php
// Start session 
session_start();
//
if (!isset($_POST['f']['login'])) exit('No direct script access allowed');
if (!isset($_POST['f']['password'])) exit('No direct script access allowed');
if (!isset($_POST['f']['confirm_password'])) exit('No direct script access allowed');
if (!isset($_POST['f']['email'])) exit('No direct script access allowed');
if (!isset($_POST['f']['name'])) exit('No direct script access allowed');
if (!isset($_POST['f']['userSubmit'])) exit('No direct script access allowed');

$login = trim(strip_tags($_POST['f']['login']));
$password = trim(strip_tags($_POST['f']['password']));
$confirmPassword = trim(strip_tags($_POST['f']['confirm_password']));
$email = trim(strip_tags($_POST['f']['email']));
$name = trim(strip_tags($_POST['f']['name']));

$userSubmit = $_POST['f']['userSubmit'];
// Include and initialize DB class 
require_once 'crud.class.php';
$db = new Crud();

// Set default redirect url 
$redirectURL = 'account.php';

if (isset($_POST['f']['userSubmit'])) {
    // Get form fields value 
    $id = $_POST['f']['id'];
    $login = $_POST['f']['login'];
    $email = $_POST['f']['email'];
    $password = $_POST['f']['password'];
    $confirmPassword = $_POST['f[confirm_password]'];
    $name = $_POST['f']['name'];

    $id_str = '';
    if (!empty($id)) {
        $id_str = '?id=' . $id;
    }

    $errorMsg = '';
    // Fields validation 
    if (empty($login)) {
        $errorMsg = '<p>Field Login is empty.</p>';
    } elseif (empty($email)) {
        $errorMsg = '<p>Field Email is empty.</p>';
    } elseif (empty($password)) {
        $errorMsg = '<p>Field Password is empty.</p>';
    } elseif (empty($confirmPassword)) {
        $errorMsg = '<p>Field Confirm password is empty.</p>';
    } elseif (empty($name)) {
        $errorMsg = '<p>Field Login is empty.</p>';
    } elseif ($_POST['password'] != $_POST['confirm_password']) {
        $errorMsg = '<p>Not confirm password.</p>';
    } elseif (strlen($_POST['password']) < 6) {
        $errorMsg = '<p>Password should be at least 6 characters long.</p>';
    } elseif (!preg_match("#[0-9]+#", $_POST["password"])) {
        $errorMsg = '<p>Password should be have numbers.</p>';
    } elseif (!preg_match("#[a-z]+#", $_POST["password"])) {
        $errorMsg = '<p>Password should be have letters.</p>';
    } elseif (strlen($_POST['login']) < 6) {
        $errorMsg = "<p>Login should be at least 6 characters long</p>";
    } elseif (strlen($_POST['name']) < 2) {
        $errorMsg = '<p>Name should be at least 2 characters long and only contain letters</p>';
    } elseif (!ctype_alpha($_POST['name'])) {
        $errorMsg = '<p>Name should be only containt letters';
    } 

    $login = $_POST['login'];
    $password = $_POST['password'];
    $encryptedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $confirmPassword = $_POST['confirm_password'];
    $email = $_POST['email'];
    $name = $_POST['name'];

    $saveUserArray = json_decode(file_get_contents($containerDataRegUser), true);

    $id = count((array)$saveUserArray) + 1;

    $userData = array(
        "id" => $id,
        "login" => $login,
        "password" => $encryptedPassword,
        "confirm_password" => $confirmPassword,
        "email" => $email,
        "name" => $name,
    );
    // Store the submitted field value in the session 
    $sessData['userData'] = $userData;

    // Submit the form data 
    if (empty($errorMsg)) {
        if (!empty($_POST['id'])) {
            // Update user data 
            $update = $db->update($userData, $_POST['id']);

            if ($update) {
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'User updated successfully.';

                // Remove submitted fields value from session 
                unset($sessData['userData']);
            } else {
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Please try again.';

                // Set redirect url 
                $redirectURL = 'addUser.php' . $id_str;
            }
        } else {
            // Insert user data 
            $insert = $db->insert($userData);

            if ($insert) {
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'User added successfully.';

                // Remove submitted fields value from session 
                unset($sessData['userData']);
            } else {
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Please try again.';

                // Set redirect url 
                $redirectURL = 'addUser.php' . $id_str;
            }
        }
    } else {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = '<p>Please fill all the mandatory fields.</p>' . $errorMsg;

        // Set redirect url 
        $redirectURL = 'addUser.php' . $id_str;
    }

    // Store status into the session 
    $_SESSION['sessData'] = $sessData;
} elseif (($_REQUEST['action_type'] == 'delete') && !empty($_GET['id'])) {
    // Delete data 
    $delete = $db->delete($_GET['id']);

    if ($delete) {
        $sessData['status']['type'] = 'success';
        $sessData['status']['msg'] = 'Member data has been deleted successfully.';
    } else {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Some problem occurred, please try again.';
    }

    // Store status into the session 
    $_SESSION['sessData'] = $sessData;
}

// Redirect to the respective page 
header("Location:" . $redirectURL);
exit();
