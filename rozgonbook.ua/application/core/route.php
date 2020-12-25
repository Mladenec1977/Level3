<?php
include './application/core/check_string.php';
class Route
{
    static function start()
    {
        // controller and default action
        $controller_name = 'Books';
        $action = 'action';
        $book_id = 0;
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        $text_search = '';
        if (isset($_GET['search'])) {
            $text_search = $_GET['search'];
            $text_search = check_string_html($text_search);
        }

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (isset($_GET['click']) && $_GET['click'] > 0) {
            include 'addclick.php';
            $book_id_cl = $_GET['click'];
            $click = getBookId($book_id_cl);
            $click += 1;
            addClik($book_id_cl, $click);
            exit();
        }

        // get controller name
        if (!empty($routes[1])) {
            $arr_text_del = explode("?", $routes[1]);
            $controller_name = $arr_text_del[0];
        }

        // get the number book
        if (!empty($routes[2])) {
            $text_book_id = $routes[2];
            $arr_text_book_id = explode("?", $text_book_id);
            $book_id = $arr_text_book_id[0];
        }

        if ($controller_name == 'delete') {
            include 'delete.php';
            $del_book_id = $routes[3];
            deleteBook($del_book_id, 1);
            header('Location:' . $host . "admin/" . $book_id ."?search=" . $text_search);
        }

        if ($controller_name == 'notdelete') {
            include 'delete.php';
            $del_book_id = $routes[3];
            deleteBook($del_book_id, 0);
            header('Location:' . $host . "admin/" . $book_id ."?search=" . $text_search);
        }

        if (isset($_GET['search'])) {
            if ($controller_name == 'book') {
                header('Location:' . $host . "?search=" . $text_search);
            }
            if ($controller_name != 'admin') {
                $controller_name = 'Books';
            }
        }
        if (isset($_POST['namepost'])) {
            include 'addbook.php';
            $int_check = addAdminBook();
            if ($int_check == 1) {
                header('Location:' . $host . "admin/" . $book_id ."?search=" . $text_search);
            }
        }

        // add prefixes
        $model_name = 'Model_' . $controller_name;
        $controller_name = 'Controller_' . $controller_name;

        // we pick up the file with the model class (the model file may not exist)
        $model_file = strtolower($model_name) . '.php';
        $model_path = "application/models/" . $model_file;
        if (file_exists($model_path)) {
            include "./application/models/" . $model_file;
        }

        // we hook up the file with the controller class
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "application/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            include "./application/controllers/" . $controller_file;
        } else {
            Route::ErrorPage404();
        }

        // create a controller
        $controller = new $controller_name($text_search, $book_id);
        if (method_exists($controller, $action)) {
            if ($controller_name == 'Controller_book' && $book_id > 0) {
                include 'addclick.php';
                $click = getLookBook($book_id);
                $click += 1;
                addLook($book_id, $click);
            }
            $controller->$action();
        } else {
            Route::ErrorPage404();
        }

    }

    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }

}