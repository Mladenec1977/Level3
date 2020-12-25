<?php
function check_string_html($string) {
    $vowels = array("<", ">", "alert", "script", "<?php", "?>", "echo", "stile", "{", "}");
    $string = str_replace($vowels, "", $string);
    $string = strip_tags($string);
    $string = htmlspecialchars($string);
    return $string;
}