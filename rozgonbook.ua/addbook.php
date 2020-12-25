<?php

use application\core\DB;

/**
 * @return int
 */
function addAdminBook()
{
    if (!isset($_POST['name_book']) || $_POST['name_book'] == '') {
        return 0;
    }
    $name_book = check_string_html($_POST['name_book']);

    if (!isset($_POST['year']) || $_POST['year'] == '') {
        return 0;
    }
    $year = check_string_html($_POST['year']);

    $author_arr = array();
    if (isset($_POST['author1'])) {
        $author1 = check_string_html($_POST['author1']);
        if ($author1 != '') {
            $author_arr[] = $author1;
        }
    }
    if (isset($_POST['author2'])) {
        $author2 = check_string_html($_POST['author2']);
        if ($author2 != '') {
            $author_arr[] = $author2;
        }
    }
    if (isset($_POST['author3'])) {
        $author3 = check_string_html($_POST['author3']);
        if ($author3 != '') {
            $author_arr[] = $author3;
        }
    }
    if (empty($author_arr)) {
        return 0;
    }
    if (!isset($_FILES['name_img']['name'])) {
        return 0;
    }
    $name_img = mb_strtolower(trim($_FILES['name_img']['name']));
    if (!file_exists('img')) {
        mkdir('img');
    }
    $save_dir = "img";
    $sqlFolder = $_FILES['name_img']['tmp_name'];
    move_uploaded_file($sqlFolder, "$save_dir/$name_img");

    $pdoDB = new DB;
    $pdo = $pdoDB->getDB();


    $sql = $pdo->prepare("SELECT * FROM book WHERE name = :name_book");
    $sql->bindValue(':name_book', $name_book, PDO::PARAM_STR);
    $sql->execute();
    $result = $sql->fetchAll();
    if (count($result) > 0) {
        return 0;
    }

    $sql = $pdo->prepare("INSERT INTO `book`(`name`, `year`, `img`) VALUES (:name_book, :year, :name_img)");
    $sql->bindValue(':name_book', $name_book, \PDO::PARAM_STR);
    $sql->bindValue(':year', $year, \PDO::PARAM_INT);
    $sql->bindValue(':name_img', $name_img, \PDO::PARAM_STR);
    $sql->execute();

    $add_book_id = $pdo->lastInsertId();
    for ($i = 0; $i < count($author_arr); $i++) {
        $author = $author_arr[$i];
        $sql = "INSERT INTO `author`(`name_author`) VALUES ('$author')";
        $result = $pdo->exec($sql);
        $author_id = $pdo->lastInsertId();
        $sql = "INSERT INTO `author_book`(`book_id`, `author_id`) VALUES ('$add_book_id', $author_id)";
        $result = $pdo->exec($sql);
    }
    return 1;
}
