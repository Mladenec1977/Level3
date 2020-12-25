<?php
require_once '../config.php';
$fileName = 'rozgonbook_dump_' . date("Y-m-d_H-i") . ".sql";
$folderName = $_SERVER['DOCUMENT_ROOT']."/dump_mysql/";
$command = 'mysqldump --user=root --password=root --host=' . DB_HOST . ' ' . DB_NAME .' > ' . $folderName . $fileName;
exec($command);