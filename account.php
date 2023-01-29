<?php
include('includeForAccount.php');
?>
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
    <div class="pri">
    </div>
    <br>
    <div id="showAddForm"></div>
    
        <button id="addformbtn" name="form" class="btn btn-danger">
            <span class="glyphicon glyphicon-plus" aria-hidden="true">
            </span>
            Create Data
        </button>
    
    &nbsp;&nbsp;&nbsp;&nbsp;

    <span id="hideAndShow" class="glyphicon glyphicon-th-list" aria-hidden="true">
    </span>
    Show Table

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
                                <?php echo $row['id']; ?>" class="glyphicon glyphicon-remove">
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