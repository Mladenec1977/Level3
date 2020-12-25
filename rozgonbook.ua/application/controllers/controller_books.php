<?php
class Controller_Books extends Controller
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
        $this->model = new Model_Books($text_search, $this->page);
        $this->view = new View();
    }

    function action()
    {
        $search = $this->text_search;
        $data = $this->model->get_data();
        $count = $this->model->get_cound();
        $this->view->generate('books-page.php', $data, $count, $search);
    }
}