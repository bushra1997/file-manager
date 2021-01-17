<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user= $_POST['username'];
    $_SESSION['user'] = $user;
    $root_path = $_SERVER['DOCUMENT_ROOT'] . "/test5" . "/users" . '/'.$_SESSION['user'];
    // create folder
    if($_POST["action"] == "create"){
        if(!file_exists($_POST["folder_name"])){
            mkdir($root_path .'/'. $_POST["folder_name"]);
            echo 'Folder Created';
        }else{
            echo 'Folder Already Created';
        }
    }
    // delete folder
    if($_POST["action"] == "delete"){
        if($_POST["action"] == "delete")
        {
        $files = scandir($_POST["folder_name"]);
        foreach($files as $file){
            if($file === '.' or $file === '..'){
                continue;
            } else{
                unlink($_POST["folder_name"] . '/' . $file);
            }
        }
            if(rmdir($_POST["folder_name"]))
            {
                echo 'Folder Deleted';
            }
        } 
    }

}
    