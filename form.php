<?php
    session_start();
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
        <title>Form</title>
    </head>
    <body>
        <section>
            <div class="container d-flex align-content-center flex-wrap">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 info">
                        <div class="info">
                            <h1>Sign Up</h1>
                            <p>Sign up with your simple details. It will not be cross checked by the administration. </p> <br><br>
                            <h1>Sign In</h1>
                            <p>Sign in with your username and password.</p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-12 ">
                        <form action="signUp.php" method="POST" id="form" class="form ">
                            <div class="form-container">
                                <label for="username" class="label">Username</label>
                                <input class="input" id="username" type="text" name="username" placeholder="Username" required>
                            </div> <br>
                            <div class="form-container ">
                                <label for="phone" class="label">Phone Number</label>
                                <input class="input" id="phone" placeholder="07 0000 0000" name="phone">
                            </div> <br>
                            <div class="form-container ">
                                <label for="email" class="label">EMAIL</label>
                                <input class="input" id="email" placeholder="example@fx.com" name="email">
                            </div> <br>
                            <div class="form-container ">
                                <label for="password" class="label">PASSWORD</label>
                                <input class="input" id="password" type="password" placeholder="Password" name="password" required>
                            </div> <br>
                            <div class="form-container ">
                                <input id="checkbox" type="checkbox" required>
                                <label for="checkbox"> I agree with the terms and conditinos.</label>
                                <br>
                            </div>
                            <br>
                            <button class="btn btn-success">Sign Up</button>
                        </form>
                        <div class="button d-flex flex-row">
                            <h6>Already have an account?</h6>
                            <button class="btn btn-primary"><a href="login.php"> Login </a></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>