<?php
class Controller_Book extends Controller {

    function __construct($text_search, $book_id) {

        $this->model = new Model_Book($book_id);
        $this->view = new View();
    }

    function action()
    {
        $data = $this->model->get_data();
        $this->view->generate('book-page.php', $data, 0, '');
    }
}