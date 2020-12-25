<?php

use application\core\DB;

/**
 * @param $book_id
 * @param $index
 */
function deleteBook($book_id, $index)
{
    $array = explode("?", $book_id);
    $book_id = (int)$array[0];

    $array_data = getdate();
    $mday = $array_data['mday'] + 10;
    $mon = $array_data['mon'];
    if ($mday > 28) {
        $mday = $mday - 28;
        $mon = $mon + 1;
    }
    $year = $array_data['year'];
    if ($mon > 12) {
        $mon = 1;
        $year = $year + 1;
    }
    $text_data = '' . $year . '-' . $mon . '-' . $mday;

    $pdoDB = new DB;
    $pdo = $pdoDB->getDB();
    $sql = "UPDATE book SET book_delete='$index', data_delet='$text_data' WHERE id='$book_id'";
    $result = $pdo->exec($sql);
}