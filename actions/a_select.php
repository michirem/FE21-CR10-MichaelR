<?php 
if ($_GET['id']) {
    $id = $_GET['id'];
    $query = "SELECT * FROM media LEFT JOIN author ON media.author_id = author.author_id WHERE media.id = {$id}";
    $result = mysqli_query($connect, $query);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $imagename = ''; //if image is stored as file
        $imagelink = ''; //if image is stored as URL
        if(strlen($data['image']) < 18) // check if image is stored as file or as URL
            {
                $imagename = $data['image'];
                $image = 'pictures/'.$data['image'];
                } else {
                $image = $data['image'];
                $imagelink = $data['image'];
            }
        $title = $data["title"];
        $author_id = $data["author_id"];
        $isbn = $data["ISBN"];
        $short_desc = $data["short_desc"];
        $publish_date = $data["publish_date"];
        $publisher_id = $data["publisher_id"];
        $type = $data["type"];
        $status = $data["status"];
    } else {
        header("location: error.php");
    }
    $connect->close();
} else {
    header("location: error.php");
}
?>