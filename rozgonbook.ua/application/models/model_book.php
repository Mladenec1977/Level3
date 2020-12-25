<?php
use application\core\DB;
class Model_Book extends Model
{
    public $book_id = 0;
    function __construct($id) {
        $this->book_id = $id;
    }

    /**
     * @return mixed
     */
    public function get_data()
    {
        $pdoDB = new DB;
        $pdo = $pdoDB->getDB();
        $sql = $pdo->prepare("SELECT B.id, B.name, B.year, B.img, B.look, B.click, GROUP_CONCAT( A.name_author SEPARATOR ', ') AS name_author 
                FROM book B 
                JOIN author_book C ON B.id = C.book_id 
                JOIN author A ON C.author_id = A.id
                WHERE B.id = :id 
                GROUP BY C.book_id");

        $sql->bindValue(':id', $this->book_id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetchAll();

        return $result;
    }

    /**
     * @return int
     */
    public function get_cound()
    {
        return 0;
    }
}