<?php
    session_start();
    $root_path = $_SERVER['DOCUMENT_ROOT'] . "/test5" . "/users" . '/'.$_SESSION['user'];
    if (isset($_FILES ['uploaded'])) {
        $file_Uploaded = $_FILES ['uploaded'];
        $file_Uploaded_temp =  $_FILES ['uploaded']['tmp_name'];
        $file_Namee = $_FILES ['uploaded']['name'];
        move_uploaded_file($file_Uploaded_temp,  $root_path .'/'. $file_Namee);
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
        <link rel="stylesheet" href="./css/footer.css">
        <link rel="stylesheet" href="./css/fileManager.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        <title>File Manager</title>
    </head>

    <body>
        <header class="bg-dark d-flex justify-content-around">
            <div class="left"><h4>File Manager System</h4></div>
            <div class="right">
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> <p>Log out</p> </a>
                <a href=""><i class="fas fa-user"></i><p><?php echo $_SESSION['user']; ?></p></a>
            </div>
        </header>
        <section class="bg-white d-flex justify-content-around">
            <div class="left"> 
                <i class="fas fa-folder-open"></i>
                <h3> File Manager</h3>
            </div>
            <div class="buttons">
                <button type="button" class="btn btn-info" name="create_folder" id="create_folder" data-toggle="modal" data-target="#folderModal">Create folder</button>
                <button type="button" class="btn btn-info" name="upload" id="upload_file" data-toggle="modal" data-target="#uploadModal2">Upload file</button>
            </div>
        </section>
        <div id="folderModal" class="modal fade text-left " role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display:block">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title" ><span id="change_title">Create Folder</span></h5>
                    </div>
                    <div class="modal-body">
                        <p style="color:black;">Enter Folder Name</p>
                        <input type="text" name="folder_name" id="folder_name" class="form-control" />
                        <br>
                        <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="old_name" id="old_name" />
                        <input type="button" name="folder_button" id="folder_button" class="btn btn-info" value="Create"/>
                    </div>
                </div>
            </div>
        </div>
        <div id="uploadModal" class="modal fade text-left" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display:block">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Upload File</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="upload_form" enctype='multipart/form-data'>
                        <input type="file" name="upload_file" style="margin-bottom: 15px;"/>
                        <br />
                        <input type="hidden" name="hidden_folder_name" id="hidden_folder_name" />
                        <input type="submit" name="upload_button" class="btn btn-info" value="Upload" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="uploadModal2" class="modal fade text-left" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display:block">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Upload File</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="upload_form" enctype='multipart/form-data' action="<?php $_SERVER['PHP_SELF'] ?>">
                        <input type="file" name="uploaded" style="margin-bottom: 15px;"/>
                        <br />
                        <input type="hidden" name="hidden_folder_name" id="hidden_folder_name" />
                        <input type="submit" name="upload_button" class="btn btn-info" value="Upload" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- upload files -->
        <section class="light">
            <div class="container text-center">
                <div class="table-responsive text-center" id="folder_table">
                    <?php
                        $root_path = $_SERVER['DOCUMENT_ROOT'] . "/test5" . "/users" . '/'.$_SESSION['user'];
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
                        if(count ($folder_file) == 2){
                            $output.="  <tbody>
                                            <tr>
                                                <td colspan ='6'>This folder is empty</td>
                                            </tr>
                                        </tbody>";
                        } else{
                            foreach ($folder_file as $file){
                                if (is_file($root_path . '/' . $file)){
                                    $output .= '<th><a>'.basename($file).'</a></th>
                                                <td>' . pathinfo($file, PATHINFO_EXTENSION) . '</td>';
                                    $output .= '<td>'. date("d M Y H:i:s", filemtime($root_path . "/" . $file))  .'</td>
                                        <td>
                                            <ul>
                                                <li><button type="button" name="open_file" data-name="'.$file.'" class="open_file"><i class="far fa-eye" id="green"></i></button></li>
                                                <li><button type="button" name="delete" data-name="'.$file.'" class="delete"><i class="fas fa-trash-alt" id="red"></i></button></li>
                                            </ul>
                                        </td>
                                        <td>
                                            <button type="button" style="border:transparent ; background-color:transparent;"><input type="checkbox" style="width: 20px; height: 20px;display: inline-block;
                                            vertical-align: middle;" ></button>    
                                        </td>
                                    </tr>
                                ';
                                } elseif (is_dir($root_path . '/' . $file)){
                                    $output .= '<tr><th><i class="far fa-folder-open"></i><a style="margin-left:5px">'.basename($file).'</a></th>
                                                <td>Folder</td>';
                                    $output .= '<td>'. date("d M Y H:i:s", filemtime($root_path . "/" . $file))  .'</td>
                                        <td>
                                            <ul>
                                                <li><button type="button" name="view_files" data-name="'.$file.'" class="view_files" data-toggle="modal" data-target="#filelistModal"><a href ="openDir.php"><i class="far fa-eye" id="green"></i></a></button></li>
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
                    ?>
                </div>
            </div>
        </section>
        <div id="filelistModal" class="modal fade text-left" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="display:block">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">File List</h5>
                    </div>
                    <div class="modal-body" id="file_list">
                        
                    </div>
                </div>
            </div>
        </div>

        <footer class="bg-dark d-flex justify-content-center">
            <div>
                <p>Crafted at training in Sprintive</p>
            </div>
        </footer>
    </body>
    <script src="js/main.js"></script>
</html>
