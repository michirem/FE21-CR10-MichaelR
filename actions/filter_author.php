<?php

function showRows($image, $title, $isbn, $name) {
    return "<tr>
        <td><img class='img-thumbnail' style='height: 150px;' src='".$image."'</td>
        <td>".$title."</td>
        <td>".$isbn."</td>
        <td>".$name."</td>
    </tr>";
}

?>