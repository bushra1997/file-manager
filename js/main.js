$(document).ready (function(){
            
    $(document).on('click', '#create_folder', function(){
        $('#action').val("create");/* value to be sent to the server*/
        $('#folder_name').val('');  /* value entered by user */
        $('#folder_button').val('Create'); /* value of the button */
        $('#old_name').val(''); 
        $('#change_title').text("Create Folder"); /* title of the modal */
    });

    $(document).on('click', '#folder_button', function(){
        var folder_name = $('#folder_name').val(); /* value entered by user */
        var old_name = $('#old_name').val(); /* rename */
        var action = $('#action').val(); /* send the action value 'create' to the server to execute block of code */
        if(folder_name != '') /* force user to enter folder name */
        {
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{folder_name:folder_name, old_name:old_name, action:action}, /* values to be send to server */
                success:function(data){
                // if success execte the load folder list function to print out the new folder to table
                alert(data);
                }
            });
        } else {
            alert("Enter Folder Name");
        }
    });
    
    $(".delete").on("click", function(){
        var folder_name = $(this).attr("data-name");
        var action = "delete";
        console.log(folder_name);
        if(confirm("Are you sure you want to delete this folder/file?")){
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{folder_name:folder_name, action:action},
                success:function(data){
                }
            });
        }
    });
    // $(document).on('click', '.view_files', function(){
    //     var folder_name = $(this).data("file");
    //     var action = "fetch_files";
    //     $.ajax ({
    //         url:"openDir.php",
    //         method:"POST",
    //         data:{action:action, folder_name:folder_name},
    //         success:function(data){
    //             $('#file_list').html(data);
    //         }
    //     });
    // });
});