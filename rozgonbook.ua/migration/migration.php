<?php
header('Cache-Control: no-cache, must-revalidate, max-age=0');

require_once '../config.php';

/**
 * Connecting to the database
 *
 * @return mysqli
 * @throws Exception
 */
function connectDB() {
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
 * Get a list of files for migrations
 *
 * @param $conn
 * @return array|false
 */
function getMigrationFiles($conn) {
    // Find the folder with migrations
    $sqlFolder = str_replace('\\', '/', realpath(dirname(__FILE__)) . '/');

    // We get a list of all sql-files
    $allFiles = glob($sqlFolder . '*.sql');

    // Checking if there is a table versions
    // Since versions are created first, this is equivalent to the fact that the base is not empty
    $query = sprintf('show tables from `%s` like "%s"', DB_NAME, DB_TABLE_VERSIONS);
    $data = $conn->query($query);
    $firstMigration = !$data->num_rows;

    // First migration, return all files from the folder migration
    if ($firstMigration) {
        return $allFiles;
    }

    // Looking for existing migrations
    $versionsFiles = array();
    // Select all file names from the versions table
    $query = sprintf('select `name` from `%s`', DB_TABLE_VERSIONS);
    $data = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    // We drive the names into an array $versionsFiles
    // Do not forget to add the full path to the file
    foreach ($data as $row) {
        array_push($versionsFiles, $sqlFolder . $row['name']);
    }

    // Returning files that are not yet in the table versions
    return array_diff($allFiles, $versionsFiles);
}


/**
 * Roll up the file migration
 *
 * @param $conn
 * @param $file
 */
function migrate($conn, $file) {
    // We form a command for executing a mysql query from an external file
    $command = sprintf('mysql -u%s -p%s -h %s -D %s --default-character-set=utf8 < %s', DB_USER, DB_PASSWORD, DB_HOST, DB_NAME, $file);
    // Executing a shell script
    shell_exec($command);

    // We extract the file name, discarding the path
    $baseName = basename($file);
    // We form a query to add migration to the table versions
    $query = sprintf('insert into `%s` (`name`) values("%s")', DB_TABLE_VERSIONS, $baseName);
    // We execute the request
    $conn->query($query);
}

// We connect to the base
$conn = connectDB();

// We get a list of files for migrations, excluding those that are already in the table versions
$files = getMigrationFiles($conn);

// Checking if there are new migrations
if (empty($files)) {
    echo 'Ваша база данных в актуальном состоянии';
} else {
    echo 'Начинаем миграцию<br /><br />';

    // Rolling migration for each file
    foreach ($files as $file) {
        migrate($conn, $file);
        // Display the name of the executed file
        echo basename($file) . '<br />';
    }

    echo '<br />Миграция завершена';
}
