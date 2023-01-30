<?php
if (!isset($_POST['f']['login'])) exit('No direct script access allowed');
if (!isset($_POST['f']['password'])) exit('No direct script access allowed');

$login = trim(strip_tags($_POST['f']['login']));
$password = trim(strip_tags($_POST['f']['password']));

$user = new Login($login, $password);
/*if (!$login)
{
	print_r('No login specified! Refresh site (F5) and specify your name');
} elseif (!$password){
	print_r('No password specified! Refresh site (F5) and specify your password');
}elseif($login && $password){
	echo ($login);
	echo '<br>';
	echo ($password);
}
 else{
	$user = new Login($login, $password);
}*/
?>
<?php

/*if (isset($_POST['submit'])) {
    $user = new Login($_POST['login'], $_POST['password']);
}*/

class Login
{
	private $login;
	private $password;

	public $errorLogin;
	public $errorPassword;
	public $error;
	public $success;
	private $containerDataRegUser = "userData.json";
	private $saveUserArray;

	public function __construct($login, $password)
	{
		$this->login = $login;
		$this->password = $password;
		$this->saveUserArray = json_decode(file_get_contents($this->containerDataRegUser), true);

		if($this->validationFieldLogin() == false){
			//$this->error = "Field Login is empty";
		};
	}

	private function validationFieldLogin()
	{
		if (empty($this->login)) {
			echo '<p style="color: red">Field Login is empty</p>';
		return false;
			//	return $this->errorLogin = "Field Login is empty";
		} elseif (empty($this->password)) {
			echo '<p style="color: red">Field Password is empty</p>';
			return $this->errorPassword = "Field Password is empty";
		} else {
			$this->login();
		}
	}

	private function login()
	{
		foreach ($this->saveUserArray as $user) {
			if ($user['login'] == $this->login) {
				if (password_verify($this->password, $user['password'])) {
					session_start();
					echo "Successfully loged";
					$_SESSION['user'] = $this->login;
					header("location: account.php");
					exit();
				//	return true;
				}
			} elseif (empty($_POST['login'])) {
				//$this->err['login'] = 'Name is required.';
			}
		}
		echo '<p style="color: red">Wrong username or password</p>';
		return $this->error = "Wrong username or password";
	}
}
