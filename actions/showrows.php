<?php

function showRows($image, $title, $isbn, $name, $name2) {
    return "<tr>
        <td><img class='img-thumbnail' style='height: 150px;' src='".$image."'</td>
        <td>".$title."</td>
        <td>".$isbn."</td>
        <td>".$name."</td>
        <td>".$name2."</td>
    </tr>";
}

?>