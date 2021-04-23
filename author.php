<?php

include_once 'actions/db_connect.php';
include_once 'actions/filter_author.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS bundle  -->
    <?php include_once 'components/bootcss.php';?>
    <title>Author Details</title>
</head>
<body>
    <header>
        <?php
            include_once 'components/navigation.php';
        ?>
    </header>
    <div class="d-flex justify-content-center align-items-center" style="background-image: url(https://images.unsplash.com/photo-1551127481-43279ba6dec4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2250&q=80); height: 60vh; background-size: cover; background-repeat: no-repeat; background-position: center;">
    <h1 class="text-light">About the Author</h1>
    </div>
    <div class="container">
        <div class="class=d-flex flex-column align-items-center py-2">
            <table class='table table-striped'>
                <thead class='table-primary'>
                    <tr>
                        <th>Picture</th>
                        <th>Title</th>
                        <th>ISBN</th>
                        <th>Publisher</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($_GET['id']) {
                        $id = $_GET['id'];
                        $query = "SELECT * FROM media LEFT JOIN author ON media.author_id = author.author_id LEFT JOIN publisher ON media.publisher_id = publisher.publisher_id WHERE author.author_id = {$id}";
                        $result = mysqli_query($connect, $query);
                        if(mysqli_num_rows($result)  > 0){
                            for ($set = array(); $row = $result->fetch_assoc(); $set[] = $row);
                            $author = $set[0]['f_name']." ".$set[0]['l_name'];
                            foreach($set as $data){
                                if(strlen($data['image']) < 18)
                                    {
                                        $image = 'pictures/'.$data['image'];
                                    } else
                                    {
                                        $image = $data['image'];
                                    }
                                
                                $title = $data['title'];
                                $isbn = $data['ISBN'];
                                $name = $data['name'];
                    
                                echo showRows($image, $title, $isbn, $name);
                                
                                }
                        } else {
                            echo "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
                        }
                        $connect->close();
                        } else {
                        header("location: error.php");
                        }
                    ?>
                </tbody>
            </table>
            <a href="main.php" class='btn btn-primary my-3'>Back</a></td>
        </div>
    </div>
    <?php
        include_once 'components/footer.php';
    ?>
    <!-- Bootstrap 5 JS bundle  -->
    <?php include_once 'components/bootjs.php';?>
</body>
</html>