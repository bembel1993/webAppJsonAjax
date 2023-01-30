<?php
include('includeForAccount.php');
?>
<?php
include('includeForAddUser.php');
?>
<!-- DISPLAY ERROR STATUS -->
<?php if (!empty($statusMsg) && ($statusMsgType == 'error')) { ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
    </div>
<?php } ?>
<!-- DISPLAY STATUS MSG -->
<?php if (!empty($statusMsg) && ($statusMsgType == 'success')) { ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $statusMsg; ?></div>
    </div>
<?php } elseif (!empty($statusMsg) && ($statusMsgType == 'error')) { ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
    </div>
<?php } ?>

<html>

<head>
    <title>Account</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <style>
        .hiddenreg {
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <div>
            <p>
                <button type="button" class="btn btn-info btn-lg" style="float: right">
                    <span class="glyphicon glyphicon-log-out"></span>
                    <!--<a href="?logout">Log out</a>-->
                    <a href="logout.php">Log out</a>
                </button>
            </p>
        </div>
        <h2>Hello <?php echo $_SESSION['user']; ?><h2>
    </header>
    <div id="showreuslt"></div>
    <br>
    <div class="hiddenreg" id="showAddForm">
        <div id="addUserWrapp" class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4 text-bg-dark p-3">

                        <div class="col-md-12">
                            <h2>
                                <?php echo $actionLabel; ?> Member
                            </h2>
                        </div>
                        <div class="col-md-6">
                            <form id="addupdateForm" method="" action="">

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

                                <button id="backbtn" class="btn btn-secondary">Back</button>
                                <input type="hidden" name="f[id]" value="<?php echo !empty($memberData['id']) ? $memberData['id'] : ''; ?>">
                                <input id="addupdate" type="submit" name="f[userSubmit]" class="btn btn-primary" value="Submit">

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <button id="addformbtn" name="form" class="btn btn-danger">
        <span class="glyphicon glyphicon-plus" aria-hidden="true">
        </span>
        Create Data
    </button>

    &nbsp;&nbsp;&nbsp;&nbsp;

    <span id="hideAndShow" class="glyphicon glyphicon-th-list" aria-hidden="true">
    </span>
    Show Table
    &nbsp;&nbsp;&nbsp;&nbsp;

    <a href="account.php"><span id="zoom" class="glyphicon glyphicon-zoom-in" aria-hidden="true">
        </span>
        Zoom in
    </a>
    <script>

    </script>
    <table id="tbl" class="table table-dark table-striped">
        <thead class="thead-dark">
            <tr>
                <th>№</th>
                <th>Login</th>
                <th>Email</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)) {
                $count = 0;
                foreach ($users as $row) {
                    $count++;
            ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['login']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>
                            <a href="addUser.php?id=
                                <?php echo $row['id']; ?>" class="glyphicon glyphicon-pencil">
                            </a>
                            &nbsp;&nbsp;

                            <a href="delete.php?action_type=delete&id=
                                <?php echo $row['id']; ?>" class="glyphicon glyphicon-remove" id="delet">
                            </a>
                            <!--     &nbsp;&nbsp;
                            <a href="add.html" class="glyphicon glyphicon-plus">
                            </a>-->
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">No member(s) found...</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>