<?php
    echo $_SERVER['REQUEST_METHOD'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = $_POST['username'];
        $password = $_POST['password'];
        $_GET['path'] = "?users";
        if (file_exists('data.json')) {
            $jsonData = file_get_contents('data.json');
            $data = json_decode($jsonData, true);
            foreach ($data as $userData) {
                if ($userData["Username"] == $user && $userData["Password"] == $password) {
                    session_start();
                    $_SESSION['user'] = $user;
                    $_SESSION['password'] = $password;
                    header('Location: home.php'.$_GET["path"].'/'.$_SESSION['user']);
                    exit();
                } else {
                    echo '
                    <div class="alert alert-danger" role="alert">
                    ERROR in login !
                    </div>';
                }
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./css/fileUpload.css">
        <link rel="stylesheet" href="./css/formStyle.css">
        <title>Login page</title>
    </head>

    <body>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="info">
                            <h1>Sign Up</h1>
                            <p>Sign up with your simple details. It will not be cross checked by the administration. </p> <br><br>
                            <h1>Sign In</h1>
                            <p>Sign in with your username and password.</p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" class="form" id="form">
                            <div class="form-container">
                                <label class="label">Username</label>
                                <input type="text" class="input" id="username" name="username" placeholder="Username" required>
                            </div> <br>
                            <div class="form-container">
                                <label class="label">Password</label>
                                <input type="password" class="input" id="password" name="password" placeholder="Password" required>
                            </div> <br>
                            <button type="submit" class="btn btn-success">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>