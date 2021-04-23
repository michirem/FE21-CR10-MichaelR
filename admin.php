<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS bundle  -->
    <?php include_once 'components/bootcss.php';?>
    <title>Admin</title>
</head>
<body>
    <header>
        <?php
            include_once 'components/navigation.php';
        ?>
    </header>
    <div class="d-flex justify-content-center align-items-center" style="background-image: url(https://images.unsplash.com/photo-1519074069444-1ba4fff66d16?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2134&q=80); height: 50vh; background-size: cover; background-repeat: no-repeat; background-position: 50% 60%;">
        <h1 class="text-center text-light">Admin Area</h1>
    </div>
    <div class="container">
        <div class='d-flex justify-content-center mt-3'>
            <a href= "create.php" class='btn btn-primary'>Add Media</a>
        </div>
        <div class="row justify-content-evenly py-5">
            <?php
            include_once 'actions/db_connect.php';
            include_once 'actions/showitems.php';

            $query = "SELECT media.id, media.image, media.title, media.type, author.f_name AS f_name, author.l_name AS l_name
                        FROM media LEFT JOIN author ON media.author_id = author.author_id";
            $result = mysqli_query($connect, $query);
            for ($set = array(); $row = $result->fetch_assoc(); $set[] = $row);

            foreach($set as $value)
            {
                $image = '';
                if(strlen($value['image']) < 18)
                {
                    $image = 'pictures/'.$value['image'];
                } else
                $image = $value['image'];
                echo showItemAdmin($image, $value['title'], $value['type'], $value['f_name'].' '.$value['l_name'], $value['id']);
            }
            ?>
        </div>
    </div>
    <?php
        include_once 'components/footer.php';
    ?>
<!-- Bootstrap 5 JS bundle  -->
<?php include_once 'components/bootjs.php';?>
</body>
</html>