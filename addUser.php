<?php
include('includeForAddUser.php');
?>
<!-- DISPLAY ERROR STATUS -->
<?php if (!empty($statusMsg) && ($statusMsgType == 'error')) { ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
    </div>
<?php } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Update</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="script.js"></script>
</head>

<body>
       <!-- <header>
            <div>
                <p>
                    <button type="button" class="btn btn-info btn-lg" style="float: right">
                        <span class="glyphicon glyphicon-log-out"></span>

                        <a href="logout.php">Log out</a>
                    </button>
                </p>
            </div>
           <h2>Hello <?php //echo $_SESSION['user']; ?><h2>
        </header>-->
    
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4 text-bg-dark p-3">
                    <div id="showresult"><div>
                        <div class="col-md-12">
                            <h2>
                                <?php echo $actionLabel; ?> Member
                            </h2>
                        </div>
                        <div class="col-md-6">
                            <form id = "addupdateForm" method="" action="">
                                <div class="form-group">
                                    <label>Login</label>
                                    <input type="text" class="form-control" name="f[login]" value="<?php echo !empty($userData['login']) ? $userData['login'] : ''; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="f[email]" value="<?php echo !empty($userData['email']) ? $userData['email'] : ''; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="f[password]" value="<?php echo !empty($userData['password']) ? $userData['password'] : ''; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" name="f[confirm_password]" value="<?php echo !empty($userData['confirm_password']) ? $userData['confirm_password'] : ''; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="f[name]" value="<?php echo !empty($userData['name']) ? $userData['name'] : ''; ?>" required="">
                                </div>

                                <a href="" id="backbtn" class="btn btn-secondary">Back</a>
                                <input type="hidden" id="update" name="f[id]" value="<?php echo !empty($memberData['id']) ? $memberData['id'] : ''; ?>">
                                <input id="addbtn" type="submit" name="userSubmit" class="btn btn-primary" value="Submit">
                                
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</body>

</html>