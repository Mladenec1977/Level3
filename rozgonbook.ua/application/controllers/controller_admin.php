<?php
class Controller_Admin extends Controller
{
    public $text_search = '';
    public $page = 0;

    function __construct($text_search, $book_id)
    {
        if ($book_id == 0) {
            $book_id = 1;
        }
        $this->page = $book_id - 1;
        $this->text_search = $text_search;
        $this->model = new Model_Admin($text_search, $this->page);
        $this->view = new View();
    }

    function action()
    {
        //header('HTTP/1.1 401 Authorization Required');
        require_once './application/core/require_auth.php';
        require_auth();
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        $search = $this->text_search;
        $data = $this->model->get_data();
        $count = $this->model->get_cound();
        $this->view->generate('admin.php', $data, $count, $search);
    }
}