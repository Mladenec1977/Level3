<?php
use application\core\DB;
class Model_Books extends Model
{
    public $text_search = '';
    public $count  = 0;
    public $page = 0;

    /**
     * Model_Books constructor.
     * @param $text_search
     * @param $page
     */
    function __construct($text_search, $page)
    {
        $this->text_search = $text_search;
        $this->page = $page;
    }

    /**
     * @return mixed|void
     */
    public function get_data()
    {
        $search = '%' . $this->text_search . '%';
        $page = $this->page;
        $pdoDB = new DB;
        $pdo = $pdoDB->getDB();
        $sql_book = $pdo->prepare("SELECT B.id, B.name, B.year, B.img, B.click, GROUP_CONCAT( A.name_author SEPARATOR ', ') AS name_author 
                     FROM book B 
                     JOIN author_book C 
                       ON B.id = C.book_id 
                     JOIN author A 
                       ON C.author_id = A.id 
                     WHERE B.book_delete 
                     NOT IN (1) 
                     AND (B.name LIKE :search 
                     OR A.name_author LIKE :search 
                     OR B.year LIKE :search) 
                     GROUP BY C.book_id");

        $sql_book->bindValue(':search', $search, PDO::PARAM_STR);
        $sql_book->execute();
        $result_book = $sql_book->fetchAll();

        $this->count = count($result_book);
        $array = array_chunk($result_book, 12);
        if ($page >= count($array)) {
            $page = 0;
        }

        if (empty($array[$page])) {
            $array = [0 => ['id' => 0, 'name' => 'Нет данных']];
            return $array;
        }

        return $array[$page];
    }

    /**
     * @return int|void
     */
    public function get_cound()
    {
        return $this->count;
    }
}