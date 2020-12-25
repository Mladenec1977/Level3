<?php
use application\core\DB;

/**
 * @param $book_id
 * @return mixed
 */
function getBookId($book_id)
{
    $pdoDB = new DB;
    $pdo = $pdoDB->getDB();
    $sql = "SELECT * FROM book WHERE id = '$book_id'";
    $result = $pdo->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    $book_click = $rows[0]['click'];
    return $book_click;
}

/**
 * @param $book_id
 * @param $click
 */
function addClik($book_id, $click)
{
    $pdoDB = new DB;
    $pdo = $pdoDB->getDB();
    $sql = "UPDATE book SET click='$click' WHERE id='$book_id'";
    $result = $pdo->exec($sql);
}

/**
 * @param $book_id
 * @return mixed
 */
function getLookBook($book_id)
{
    $pdoDB = new DB;
    $pdo = $pdoDB->getDB();
    $sql = "SELECT * FROM book WHERE id = '$book_id'";
    $result = $pdo->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    $book_click = $rows[0]['look'];
    return $book_click;
}

/**
 * @param $book_id
 * @param $click
 */
function addLook($book_id, $click)
{
    $pdoDB = new DB;
    $pdo = $pdoDB->getDB();
    $sql = "UPDATE book SET look='$click' WHERE id='$book_id'";
    $result = $pdo->exec($sql);
}