<?php
function showItem($img, $title, $type, $author, $id, $author_id)
    {
    return "<div class=\"col-6 col-md-4 col-lg-3 my-3\">
        <div class=\"card\">
            <div style='background-image: url(".$img."); background-repeat: no-repeat; background-size: contain; height: 350px; background-position: center;'>
            </div>
            <div class=\"card-body\">
                <h5 class=\"card-title\">".$title."</h5>
                <p class=\"card-text\">".$type."</p>
            </div>
            <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item\">Author / Creator: <a href='author.php?id=".$author_id."' class='text-decoration-none'>".$author."</a></li>
            </ul>
            <div class=\"card-body\">
                <a href='details.php?id=".$id."' class='btn btn-primary btn-sm'>Details</a>
            </div>
        </div>
    </div>";
    }

function showItemAdmin($img, $title, $type, $author, $id)
    {
    return "<div class=\"col-6 col-md-4 col-lg-3 my-3\">
        <div class=\"card\">
            <div style='background-image: url(".$img."); background-repeat: no-repeat; background-size: contain; height: 350px; background-position: center;'>
            </div>
            <div class=\"card-body\">
                <h5 class=\"card-title\">".$title."</h5>
                <p class=\"card-text\">".$type."</p>
            </div>
            <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item\">Author/Creator: ".$author."</li>
            </ul>
            <div class=\"card-body\">
                <a href='update.php?id=".$id."' class='btn btn-primary btn-sm'>Edit</a>
                <a href='delete.php?id=".$id."' class='btn btn-danger btn-sm'>Delete</a>
            </div>
        </div>
    </div>";
    }

?>