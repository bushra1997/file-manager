<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $root_path = $_SERVER['DOCUMENT_ROOT'] . "/test5" . "/users" . '/'.$_SESSION['user'];
    // create folder
    if($_POST["action"] == "create"){
        if(!file_exists($_POST["folder_name"])){
            mkdir($root_path .'/'. $_POST["folder_name"] ,0777 , true);
            echo 'Folder Created';
        }else{
            echo 'Folder Already Created';
        }
    }
    
    // delete folder
    if($_POST["action"] == "delete"){
        $root_path = $_SERVER['DOCUMENT_ROOT'] . "/test5" . "/users" . '/'.$_SESSION['user'];
        $folderName = $_POST["folder_name"];
        $files = array_diff(scandir($root_path.'/'.$folderName), array('.', '..'));
        foreach($files as $file)
        {
           unlink(realpath($filename) . '/' . $file);
        }
        rmdir($root_path.'/'.$folderName);
    }
}
    