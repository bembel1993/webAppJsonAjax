<?php
if (!isset($_POST['f']['login'])) exit('No direct script access allowed');
if (!isset($_POST['f']['password'])) exit('No direct script access allowed');
if (!isset($_POST['f']['confirm_password'])) exit('No direct script access allowed');
if (!isset($_POST['f']['email'])) exit('No direct script access allowed');
if (!isset($_POST['f']['name'])) exit('No direct script access allowed');

$login = strip_tags($_POST['f']['login']);
$password = strip_tags($_POST['f']['password']);
$confirmPassword = strip_tags($_POST['f']['confirm_password']);
$email = trim(strip_tags($_POST['f']['email']));
$name = trim(strip_tags($_POST['f']['name']));

$user = new RegUser($login, $password, $confirmPassword, $email, $name);

class RegUser
{
    private $login;
    private $password;
    private $confirmPassword;
    private $email;
    private $name;

    private $id;

    private $encryptedPassword;
    private $containerDataRegUser = "userData.json";
    private $saveUserArray;
    private $newUserArray;
    //error message
    public $successMessage;
    public $errorMessage;
    public $errorLogin;
    public $error;

    public $data = 0;

    public function __construct($login, $password, $confirmPassword, $email, $name)
    {
        $this->login = $login;
        $this->password = $password;
        $this->encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->confirmPassword = $confirmPassword;
        $this->email = $email;
        $this->name = $name;

        $this->saveUserArray = json_decode(file_get_contents($this->containerDataRegUser), true);

        $this->id = time();

        $this->newUserArray = [
            "id" => $this->id,
            "login" => $this->login,
            "password" => $this->encryptedPassword,
            //  "confirm_password" => $this->confirmPassword,
            "email" => $this->email,
            "name" => $this->name,
        ];

        if ($this->validationField() == false) {
        };
    }

    private function validationField()
    {
        if (empty($this->login)) {
          //  echo '<p style="color: red">Field Login is empty</p>';
            $this->error = 'Field Login is empty';
            echo json_encode($this->error);
        } elseif (empty($this->password)) {
           // echo '<p style="color: red">Field Password is empty</p>';
           // return $this->errorMessage = "Field Password is empty";
           $this->error = 'Field Password is empty';
            echo json_encode($this->error);
        } elseif (empty($this->confirmPassword)) {
            $this->error = 'Field Confirm Password is empty';
            echo json_encode($this->error);
            //echo '<p style="color: red">Field Confirm Password is empty</p>';
            //return $this->errorMessage = "Field Confirm Password is empty";
        } elseif (empty($this->email)) {
            $this->error = 'Field Email is empty';
            echo json_encode($this->error);
            // echo '<p style="color: red">Field Email is empty</p>';
           // return $this->errorMessage = "Field Email is empty";
        } elseif (empty($this->name)) {
            $this->error = 'Field Name is empty';
            echo json_encode($this->error);
            // echo '<p style="color: red">Field Name is empty</p>';
           // return $this->errorMessage = "Field Name is empty";
        } elseif ($this->password != $this->confirmPassword) {
            $this->error = 'Confirmed password is not equal to your password';
            echo json_encode($this->error);
            // echo '<p style="color: red">Confirmed password is not equal to your password</p>';
           // return $this->errorMessage = "Confirmed password is not equal to your password";
        } elseif (strlen($this->password) < 6) {
            $this->error = 'Password should be at least 6 characters long';
            echo json_encode($this->error);
//            echo '<p style="color: red">Password should be at least 6 characters long</p>';
  //          return $this->errorMessage = "Password should be at least 6 characters long";
        } elseif (!preg_match("#[0-9]+#", $this->password)) {
            $this->error = 'Password should be have numbers';
            echo json_encode($this->error);
//            echo '<p style="color: red">Password should be have numbers</p>';
  //          return $this->errorMessage = "Password should be have numbers";
        } elseif (!preg_match("#[a-z]+#", $this->password)) {
            $this->error = 'Password should be have letters';
            echo json_encode($this->error);
//            echo '<p style="color: red">Password should be have letters</p>';
  //          return $this->errorMessage = "Password should be have letters";
        } elseif (strlen($this->login) < 6) {
            $this->error = 'Login should be at least 6 characters long';
            echo json_encode($this->error);
//            echo '<p style="color: red">Login should be at least 6 characters long</p>';
  //          return $this->errorMessage = "Login should be at least 6 characters long";;
        } elseif (strlen($this->name) < 2) {
            $this->error = 'Name should be at least 2 characters long and only contain letters';
            echo json_encode($this->error);
            //        echo '<p style="color: red">Name should be at least 2 characters long and only contain letters</p>';
      //      return $this->errorMessage = "Name should be at least 2 characters long and only contain letters";
        } elseif (!ctype_alpha($this->name)) {
            $this->error = 'Name should be only containt letters';
            echo json_encode($this->error);
            //       echo '<p style="color: red">Name should be only containt letters</p>';
      //      return $this->errorMessage = "Name should be only containt letters";;
        } elseif (preg_match('/\s/', $this->login)) {
            $this->error = 'Login must not contain spaces';
            echo json_encode($this->error);
//            echo '<p style="color: red">Login must not contain spaces</p>';
        } elseif (preg_match('/\s/', $this->password)) {
            $this->error = 'Password must not contain spaces';
            echo json_encode($this->error);
//            echo '<p style="color: red">Password must not contain spaces</p>';
        } elseif (preg_match('/[@_!#$%^&*()<>?\/\|\}{~:]/', $this->password)) {
            $this->error = 'Password cannot contain special characters';
            echo json_encode($this->error);
//            echo '<p style="color: red">Password cannot contain special characters</p>';
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->error = 'Not correct valid Email format';
            echo json_encode($this->error);
            //          echo '<p style="color: red">Not correct valid Email format</p>';
        } else {
            $this->insertUser();
        }
    }

    private function usernameExists()
    {
        foreach ($this->saveUserArray as $user) {
            if ($this->email === $user['email']) {
                $this->error = 'Email is already taken';
                echo json_encode($this->error);
                // echo '<p style="color: red">Email is already taken</p>';
               // return $this->errorMessage = "Login or email is already taken.";
            } elseif ($this->login === $user['login']) {
                $this->error = 'Login is already taken';
                echo json_encode($this->error);
                //echo '<p style="color: red">Login is already taken</p>';
                //return $this->errorMessage = "Email is already taken.";
            }
        }
        return false;
    }

    private function insertUser()
    {
        if ($this->usernameExists() == false) {
            array_push($this->saveUserArray, $this->newUserArray);
            if (file_put_contents($this->containerDataRegUser, json_encode($this->saveUserArray))) {
                $this->error = 'Successfully registered '. $this->login;
                echo json_encode($this->error);
                // echo '<p style="color: green">Successfully registered ' . $this->login . '</p>';
               // return $this->successMessage = "Successfully registered";
            } else {
                $this->error = 'Error registered '. $this->login;
                echo json_encode($this->error);
                //echo '<p style="color: red">Error registered</p>';
                //return $this->errorMessage = "Error registering";
            }
        }
    }
}
