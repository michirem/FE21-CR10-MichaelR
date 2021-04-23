<?php
    include_once 'db_connect.php';
    include_once 'file_upload.php';
    include_once 'showitems.php';

    if($_POST) { // if the input that has the type submit has a value (when clicked)
        $img = '';
        $imgname = '';

        if($_POST["imagelink"] === "") { //check if URL was provided, if not do a file upload
            $img = file_upload($_FILES["imagename"]);
            $imgname = '../pictures/'.$img->fileName; //for immediate showcase
            $imgupload = $img->fileName; //for upload to database
        } else if ($_FILES["imagename"]["name"] === "" || $_FILES["imagename"]["size"] === 0 && $_POST["imagelink"] !== "") // if URL provided, post image URL and upload URL to database
        {
            $img = $_POST["imagelink"];
            $imgname = $img;
            $imgupload = $img;
        } else if ($_FILES["imagename"]["name"] !== "" && $_FILES["imagename"]["size"] !== 0 && $_POST["imagelink"] !== "") // if both URL and Upload are provided, an error message will show - doesn't work - can't figure why database accepts empty entry for image if set to "NOT NULL"
        {
            $class = "danger";
            $message = "Please choose only one method of adding a picture<br>";
        }
        else // if neither URL or Upload were provided, proceed with default picture from $result
        {
            $img = file_upload($_FILES["picture"]);
            $imgname = '../pictures/'.$img->fileName;
            $imgupload = $img->fileName;
        }
    
    $id = $_POST["id"];
    $title = $_POST["title"];
    $author_id = $_POST["author_id"];
    $isbn = $_POST["ISBN"];
    $short_desc = $_POST["short_desc"];
    $publish_date = $_POST["publish_date"];
    $publisher_id = $_POST["publisher_id"];
    $type = $_POST["type"];
    $status = $_POST["status"];
    $uploadError = '';
    
    if ($_FILES["imagename"]["name"] === "" && $_FILES["imagename"]["size"] === 0 && $_POST["imagelink"] === "") // if no new picture was uploaded or a new link was provided, just update other fields
        {
            $query = "UPDATE media SET author_id = '$author_id', ISBN = '$isbn', short_desc = '$short_desc', publish_date = '$publish_date', publisher_id = '$publisher_id', type = '$type', status = '$status', title = '$title' WHERE id = {$id}";
        } else { // if a new picture was uploaded or a new link was provided, also update image
            $query = "UPDATE media SET image = '$imgupload', author_id = '$author_id', ISBN = '$isbn', short_desc = '$short_desc', publish_date = '$publish_date', publisher_id = '$publisher_id', type = '$type', status = '$status', title = '$title' WHERE id = {$id}"; 
        }
        if(mysqli_query($connect, $query) == true){
        $class = "success";
        $query2 = "SELECT id, image, f_name, l_name FROM media LEFT JOIN author ON media.author_id = author.author_id WHERE id = {$id}"; // query to fetch the current image
        $queryresult = mysqli_query($connect, $query2); // connect query to database
        $query2data = $queryresult->fetch_assoc(); // put result in associative array
        if(strlen($query2data['image']) < 18) // check if URL or uploaded file
            {
                $currentimage = '../pictures/'.$query2data['image']; // uploaded file
                } else {
                $currentimage = $query2data['image']; // URL
            }
        $message = "The entry below was successfully updated:<br><br>".showitem($currentimage, $title, $type, $query2data['f_name']." ".$query2data['f_name'], '', $author_id /* id left empty for practicality reasons */); // Preview of updated item
            if($_POST["imagelink"] === ""){ // only apply if no URL was provided and an image was uploaded
            $uploadError = ($img->error !=0)? $img->ErrorMessage :'';
            }
        } else {
        $class = "danger";
        $message = "Error while updating record. Try again: <br>" . $connect->error;
            if($_POST["imagelink"] === ""){ // only apply if no URL was provided and an image was uploaded
            $uploadError = ($img->error !=0)? $img->ErrorMessage :'';
            }
        }
        $connect->close();
    } else {
        header("location: ../error.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS bundle  -->
    <?php include_once '../components/bootcss.php';?>
    <title>Update</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-evenly py-5">
            <div class="d-flex flex-column align-items-center mt-3 mb-3">
                <h1>Update Request Response</h1>
            </div>
            <div class="alert alert-<?=$class;?> d-flex flex-column align-items-center" role="alert">
                <span><?php echo ($message) ?? ''; ?></span>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../admin.php' class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <?php
        include_once '../components/footer.php';
    ?>
    <!-- Bootstrap 5 JS bundle  -->
    <?php include_once '../components/bootjs.php';?>
</body>
</html>