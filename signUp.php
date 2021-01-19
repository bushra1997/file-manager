<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function getData() {
        $_SERVER['QUERY_STRING'] = http_build_query("?users");
        $_GET['path'] = "?users";
        $user= $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        session_start();
        $_SESSION['user'] = $user;
        $_SESSION['password'] = $password;

        $jsonData = file_get_contents('data.json');
        $data = json_decode($jsonData);
        $userData =  [
            'Username' => $user,
            'Phone' => $phone,
            'Email' => $email,
            'Password' => $password
    ];
        if(!file_exists('/var/www/html/test5/users/'.$user)) {
            mkdir('/var/www/html/test5/users/'.$user,0777, true);
            chmod('/var/www/html/test5/users/'.$user, 0777);
        }
        $data[] = $userData;
        return json_encode($data);    
    }
    if (file_put_contents('data.json', getData(), true)) {
        header('Location: home.php'.$_GET["path"].'/'.$_SESSION['user']);
        exit();
    } else {
        echo "ERROR!";
    }
}
