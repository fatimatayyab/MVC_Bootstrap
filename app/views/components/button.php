<?php
// button.php component
function renderButton($text, $type = 'button', $class = 'btn btn-primary', $attributes = '') {
    echo "<button type=\"$type\" class=\"$class\" $attributes>$text</button>";
}
?>
