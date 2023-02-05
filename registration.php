
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

</head>

<body>

    <div id="RegForm" class="wrapper">
        <?PHP /*if (!defined('MyConst')) {

            die('direct access denied');
        }*/
        ?>
        <h2>Create an account</h2>
        <form id="regform" action="" method="" enctype="multipart/form-data" autocomplete="off">
            <div id="my_messagereg"></div>
           <!-- <div id="my_messagelog1" style="background-color: red;"></div>-->
            <p class="error"><?php echo @$user->errorMessage ?></p>
            <p class="success"><?php echo @$user->successMessage ?></p>

            <div id="my_messagelog1"></div>
            <input type="text" id="login" name="f[login]" class="form-control form-control-lg" />
            <label class="form-label" for="form3Example4cg">Login</label>

            <div id="my_messagepass"></div>
            <input type="password" id="password" name="f[password]" class="form-control form-control-lg" />
            <label class="form-label" for="form3Example4cg">Password</label>

            <div id="my_messageconpass" style="background-color: red;"></div>
            <input type="password" id="confirm_password" name="f[confirm_password]" class="form-control form-control-lg" />
            <label class="form-label" for="form3Example4cdg">Confirm Password</label>

            <div id="my_messagemail"></div>
            <input type="email" id="email" name="f[email]" class="form-control form-control-lg" />
            <label class="form-label" for="form3Example3cg">Email</label>

            <div id="my_messagename"></div>
            <input type="text" id="name" name="f[name]" class="form-control form-control-lg" />
            <label class="form-label" for="form3Example1cg">Name</label>

            <div class="input-box button">
                <input type="submit" id="submit" name="submit" value="Register">
            </div>
            <center>
                <p>Have already an account?
                    <a href="" id="loginbtn" class="fw-bold text-body login-link">
                        <u>Login here</u>
                    </a>
                </p>
            </center>

        </form>
    </div>

    <div class="loginFormShow">
    </div>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>