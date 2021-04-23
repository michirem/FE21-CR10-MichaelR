<?php
function showItem($img, $title, $type, $author, $id)
    {
    return "<div class=\"col-6 col-md-4 col-lg-3 my-3\">
        <div class=\"card\">
            <div class='border border-primary border-2'>
                <img src=\"".$img."\" class=\"card-img-top\" alt=\"#\">
            </div>
            <div class=\"card-body\">
                <h5 class=\"card-title\">".$title."</h5>
                <p class=\"card-text\">".$type."</p>
            </div>
            <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item\">Author/Creator: ".$author."</li>
            </ul>
            <div class=\"card-body\">
                <a href='details.php?id=" .$id."' class='btn btn-primary btn-sm'>Details</a>
            </div>
        </div>
    </div>";
    }

function showItemAdmin($img, $title, $type, $author, $id)
    {
    return "<div class=\"col-6 col-md-4 col-lg-3 my-3\">
        <div class=\"card\">
            <div class='border border-primary border-2'>
                <img src=\"".$img."\" class=\"card-img-top\" alt=\"#\">
            </div>
            <div class=\"card-body\">
                <h5 class=\"card-title\">".$title."</h5>
                <p class=\"card-text\">".$type."</p>
            </div>
            <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item\">Author/Creator: ".$author."</li>
            </ul>
            <div class=\"card-body\">
                <a href='update.php?id=" .$id."'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
                <a href='delete.php?id=" .$id."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a>
            </div>
        </div>
    </div>";
    }

?>