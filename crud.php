<?PHP
if (!isset($_POST['f']['login'])) exit('No direct script access allowed');
if (!isset($_POST['f']['password'])) exit('No direct script access allowed');
if (!isset($_POST['f']['confirm_password'])) exit('No direct script access allowed');
if (!isset($_POST['f']['email'])) exit('No direct script access allowed');
if (!isset($_POST['f']['name'])) exit('No direct script access allowed');
if (!isset($_POST['f']['name'])) exit('No direct script access allowed');

$id = $_POST['f']['id'];
$login = trim(strip_tags($_POST['f']['login']));
$password = trim(strip_tags($_POST['f']['password']));
$confirmPassword = trim(strip_tags($_POST['f']['confirm_password']));
$email = trim(strip_tags($_POST['f']['email']));
$name = trim(strip_tags($_POST['f']['name']));

$user = new CrudClass($login, $password, $confirmPassword, $email, $name);

class CrudClass
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
            "confirm_password" => $this->confirmPassword,
            "email" => $this->email,
            "name" => $this->name,
        ];

        if($this->validationField() == false){};
    }
    ///////////////////////////////////////////////
    private function update($upData, $id){ 
        if(!empty($upData) && is_array($upData) && !empty($this->id)){
         //   $this->saveUserArray = json_decode(file_get_contents($this->containerDataRegUser), true); 
            
            $jsonData = file_get_contents($this->containerDataRegUser); 
            $data = json_decode($jsonData, true); 


            foreach ($data as $key => $value) { 
                if ($value['id'] == $id) { 
                    if(isset($upData['login'])){ 
                        $data[$key]['login'] = $upData['login']; 
                    } 
                    if(isset($upData['email'])){ 
                        $data[$key]['email'] = $upData['email']; 
                    } 
                    if(isset($upData['password'])){ 
                        $data[$key]['password'] = $upData['password']; 
                    } 
                    if(isset($upData['confirm_password'])){ 
                        $data[$key]['confirm_password'] = $upData['confirm_password']; 
                    }
                    if(isset($upData['name'])){ 
                        $data[$key]['name'] = $upData['name']; 
                    }  
                } 
            } 
            $update = file_put_contents($this->containerDataRegUser, json_encode($data)); 
            echo '<p style="color: green">User is add</p>';
            return $update?true:false; 
        }else{ 
            return false; 
        } 
    } 
    ///////////////////////////////////////////////
    private function insert()
    {
        if ($this->usernameExists() == false) {
            array_push($this->saveUserArray, $this->newUserArray);
            if (file_put_contents($this->containerDataRegUser, json_encode($this->saveUserArray))) {
                echo '<p style="color: green">Successfully registered ' . $this->login . '</p>';
                return $this->successMessage = "Successfully registered";
            } else {
                echo '<p style="color: red">Error registered</p>';
                return $this->errorMessage = "Error registering";
            }
        }
    }
    //////////////////////////////////////////////
    private function usernameExists()
    {
        foreach ($this->saveUserArray as $user) {
            if ($this->email === $user['email']) {
                echo '<p style="color: red">Email is already taken</p>';
                return $this->errorMessage = "Login or email is already taken.";
            } elseif ($this->login === $user['login']) {
                echo '<p style="color: red">Login is already taken</p>';
                return $this->errorMessage = "Email is already taken.";
            }
        }
        return false;
    }

    private function validationField()
    {
        if(empty($this->login)){
            echo '<p style="color: red">Field Login is empty</p>';
            return $this->error = "Field Login is empty";
        } elseif (empty($this->password)) {
            echo '<p style="color: red">Field Password is empty</p>';
            return $this->errorMessage = "Field Password is empty";
        } elseif (empty($this->confirmPassword)) {
            echo '<p style="color: red">Field Confirm Password is empty</p>';
            return $this->errorMessage = "Field Confirm Password is empty";
        } elseif (empty($this->email)) { 
            echo '<p style="color: red">Field Email is empty</p>';
            return $this->errorMessage = "Field Email is empty";
        } elseif (empty($this->name)) {
            echo '<p style="color: red">Field Name is empty</p>';
            return $this->errorMessage = "Field Name is empty";
        } elseif ($this->password != $this->confirmPassword) {
            echo '<p style="color: red">Confirmed password is not equal to your password</p>';
            return $this->errorMessage = "Confirmed password is not equal to your password";
        } elseif (strlen($this->password) < 6) {
            echo '<p style="color: red">Password should be at least 6 characters long</p>';
            return $this->errorMessage = "Password should be at least 6 characters long";
        } elseif(!preg_match("#[0-9]+#",$this->password)){
            echo '<p style="color: red">Password should be have numbers</p>';
            return $this->errorMessage = "Password should be have numbers";
        } elseif(!preg_match("#[a-z]+#",$this->password)){
            echo '<p style="color: red">Password should be have letters</p>';
            return $this->errorMessage = "Password should be have letters";
        }elseif (strlen($this->login) < 6) {
            echo '<p style="color: red">Login should be at least 6 characters long</p>';
            return $this->errorMessage = "Login should be at least 6 characters long";;
        } elseif (strlen($this->name) < 2) {
            echo '<p style="color: red">Name should be at least 2 characters long and only contain letters</p>';
            return $this->errorMessage = "Name should be at least 2 characters long and only contain letters";
        } elseif (!ctype_alpha($this->name)) {
            echo '<p style="color: red">Name should be only containt letters</p>';
            return $this->errorMessage = "Name should be only containt letters";;
        } elseif (!empty($_POST['f']['id'])) {
            $this->update($this->newUserArray, $this->id);
        } else {
            $this->insert($this->newUserArray);
        }
    }
}
