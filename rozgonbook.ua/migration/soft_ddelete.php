<?php
header('Cache-Control: no-cache, must-revalidate, max-age=0');

require_once '../config.php';

/**
 * Connecting to the database
 *
 * @return mysqli
 * @throws Exception
 */
function connectDB()
{
    $errorMessage = 'Невозможно подключиться к серверу базы данных';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn)
        throw new Exception($errorMessage);
    else {
        $query = $conn->query('set names utf8');
        if (!$query)
            throw new Exception($errorMessage);
        else
            return $conn;
    }
}

/**
 * @param $conn
 * @return mixed
 */
function getArrayDelete($conn)
{
    $sql = "SELECT * FROM book WHERE book_delete NOT IN (0)";
    $data = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
    return $data;
}

/**
 * @param $conn
 * @param $id
 */
function deleteBook($conn, $id)
{
    $sql = "DELETE FROM book WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
}

/**
 * @param $conn
 * @param $book_id
 */
function deleteBookAuthor($conn, $book_id)
{
    $sql = "DELETE FROM author_book WHERE book_id = '$book_id'";
    $result = mysqli_query($conn, $sql);
}

// We connect to the base
$conn = connectDB();

$array_book = getArrayDelete($conn);
if (count($array_book) < 1) {
    echo "Нет записей для удаления";
    exit();
}
$array_data = getdate();
$mday = $array_data['mday'];
$mon = $array_data['mon'];
$year = $array_data['year'];
$text_data = '' . $year . '-' . $mon . '-' . $mday;
$to_day = strtotime($text_data);

$check = 0;
foreach ($array_book as $item) {
    $item_day = strtotime($item['data_delet']);
    if ($item_day < $to_day) {
        deleteBook($conn, $item['id']);
        deleteBookAuthor($conn, $item['id']);
        $check++;
    }
}
echo 'Удалено книг - ' . $check . 'шт.';
