<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $root_path = $_SERVER['DOCUMENT_ROOT'] . "/test5" . "/users" . '/'.$_SESSION['user'];
    if($_POST["action"] == "fetch"){
        $folder_file = scandir ($root_path);
        $folder_file = array_diff ($folder_file, array('.','..'));
        $output = '<table class="table table-striped">
                        <thead>                
                                <tr>
                                    <th scope="col">Title/Name <i class="fas fa-chevron-down"></i></th>
                                    <th scope="col">Type <i class="fas fa-chevron-down"></i></th>
                                    <th scope="col">Date Added <i class="fas fa-chevron-down"></i></th>
                                    <th scope="col">Manage</th>
                                    <th scope="col"></th>
                                </tr>
                        </thead>
                    ';
    }
    if(count ($folder_file) == 0){
        $output.="  <tbody>
                        <tr>
                            <td colspan ='6'>This folder is empty</td>
                        </tr>
                    </tbody>";
    } else{
        foreach ($folder_file as $file){
            if (is_file($root_path . '/' . $file)){
                $output .= '<th><a>'.$file.'</a></th>
                            <td>' . pathinfo($file, PATHINFO_EXTENSION) . '</td>';
                $output .= '<td>'. date("d M Y H:i:s", filemtime($root_path . "/" . $file))  .'</td>
                    <td>
                        <ul>
                            <li><button type="button" name="open_file" data-name="'.$file.'" class="open_file"><i class="far fa-eye" id="green"></i></button></li>
                            <li><button type="button" name="remove" data-name="'.$file.'" class="remove"><i class="fas fa-trash-alt" id="red"></i></button></li>
                        </ul>
                    </td>
                    <td>
                        <button type="button" style="border:transparent ; background-color:transparent;"><input type="checkbox" style="width: 20px; height: 20px;display: inline-block;
                        vertical-align: middle;" ></button>    
                    </td>
                </tr>
            ';
            } elseif (is_dir($root_path . '/' . $file)){
                $output .= '<tr><th><i style="margin-right:5px" class="far fa-folder-open"></i><a href="'.$home."?".$query. $file.'">'.basename($file).'</a></th>
                            <td>Folder</td>';
                $output .= '<td>'. date("d M Y H:i:s", filemtime($root_path . "/" . $file))  .'</td>
                    <td>
                        <ul>
                            <li><button type="button" name="view_files" data-name="'.$file.'" class="view_files" data-toggle="modal" data-target="#filelistModal"><a><i class="far fa-eye" id="green"></i></a></button></li>
                            <li><button type="button" name="delete" data-name="'.$file.'" class="delete"><i class="fas fa-trash-alt" id="red"></i></button></li>
                        </ul>
                    </td>
                    <td>
                        <button type="button" style="border:transparent ; background-color:transparent;"><input type="checkbox" style="width: 20px; height: 20px;display: inline-block;
                        vertical-align: middle;" ></button>    
                    </td>
                </tr>
            ';
            }
        }
    }
    $output.= "</table>";
    echo $output;
    // create folder
    if($_POST["action"] == "create"){
        if(!file_exists($_POST["folder_name"])){
            mkdir($root_path .'/'. $_POST["folder_name"] ,0777 , true);
            //echo 'Folder Created';
        }else{
            //echo 'Folder Already Created';
        }
    }
    
    // delete folder
    if($_POST["action"] == "delete"){
        $folderName = $_POST["folder_name"];
        $files = array_diff(scandir($root_path.'/'.$folderName), array('.', '..'));
        foreach($files as $name){
           unlink(realpath($folderName) . '/' . $name);
        }
        rmdir($root_path.'/'.$folderName);
    }  
    // delete file
    if($_POST["action"] == "remove"){
        $folderName = $_POST["folder_name"];
        unlink($root_path . '/' . $folderName);
    } 
     

    
}
    