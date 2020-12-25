<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Admin Books</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../js/stilesjs.js">
</head>
<body>
<section class="section">
    <div class="container">
        <h2>Библиотека ++</h2>
        <div class="logo"><a href="/" class="navbar-brand"><span class="plus">главная</span></a></div>
    </div>
    <div class="container">
        <div class="row" id="row-imj-1">
            <div class="col my-md-2">
                <div class="row">
                    <table class="table table-bordered">
                        <thead class="thead-inverse text-center">
                        <tr>
                            <th>№</th>
                            <th>Название книги</th>
                            <th>Авторы</th>
                            <th>год</th>
                            <th>Действие</th>
                            <th>Просмотров</th>
                            <th>Кликов</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $array = explode("admin/", $_SERVER['REQUEST_URI']);
                        $array = explode('?', $array[1]);
                        $numbering = $array[0];
                        $page = $numbering;
                        if ($numbering == 0) {
                            $numbering = 1;
                        } else {
                            $numbering = ($numbering * 5) - 4;
                        }

                        for ($j = 0; $j < count($data); $j++) {
                            ?>
                            <tr>
                                <th scope="row " class="text-center"><?php echo ($j + $numbering) ?></th>
                                <td> <img class="winbok" src="../img/<?php echo $data[$j]['img'] ?>"> <?php echo $data[$j]['name'] ?></td>
                                <td><?php echo $data[$j]['name_author'] ?></td>
                                <td class="text-center"><?php echo $data[$j]['year'] ?></td>
                                <td class="text-center"><a href="<?php
                                    if ($data[$j]['book_delete'] == 0) {
                                        $text_delet = '/delete/'. $page . '/' . $data[$j]['id'] . '?search=' . $search;
                                        $text_view = 'удалить';
                                    } else {
                                        $text_delet = '/notdelete/'. $page . '/' . $data[$j]['id'] . '?search=' . $search;
                                        $text_view = 'отмена (del): ' . $data[$j]['data_delet'];
                                    }
                                    echo $text_delet; ?>" class="navbar-brand"><span class="plus"><?php echo $text_view; ?></span></a></td>
                                <td class="text-center"><?php echo $data[$j]['look'] ?></td>
                                <td class="text-center"><?php echo $data[$j]['click'] ?></td>
                            </tr>
                            <?php
                        } ?>
                    </table>
                    <center>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo '/admin/1' . '?search=' . $search; ?>" aria-label="Previous">
                                        <span aria-hidden="true">Начало</span>
                                    </a>
                                </li>
                                <?php
                                $index_row = ceil($count / 5);
                                for ($i = 1; $i <= $index_row; $i++) {
                                    ?>
                                    <li class="page-item"><a class="page-link"
                                                             href="<?php echo '/admin/' . $i . '?search=' . $search; ?>"><?php echo $i; ?></a></li>
                                    <?php
                                } ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo '/admin/' . $index_row . '?search=' . $search; ?>" aria-label="Next">
                                        <span aria-hidden="true">Конец</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </center>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container border border-primary">
        <?php
        $error_add = array();
        $name_book = '';
        $year_book = '';
        $author1_book = '';
        $author2_book = '';
        $author3_book = '';

        if (isset($_POST['namepost'])) {

            if ($_POST['name_book'] != '') {
                $name_book = check_string_html($_POST['name_book']);
            } else {
                $error_add[] = 'Нет названия книги';
            }
            if ($_POST['year'] != '') {
                $year_book = check_string_html($_POST['year']);
            } else {
                $error_add[] = 'Укажите дату выпуска книги';
            }
            if ($_POST['author1'] != '') {
                $author1_book = check_string_html($_POST['author1']);
            } else {
                $error_add[] = 'Укажите автора книги';
            }
            if ($_POST['author2'] != '') {
                $author2_book = check_string_html($_POST['author2']);
            }
            if ($_POST['author3'] != '') {
                $author3_book = check_string_html($_POST['author3']);
            }
            if (empty($_FILES)) {
                $error_add[] = 'Добавте фото';
            }
            if (!empty($error_add)) {
                echo $error_add[0];
            }
        }
        ?>
        <div class="col my-md-2">
            <form name="add-book" method="POST" action="/admin" enctype="multipart/form-data">
                <div class="row my-md-2">
                    <div class="col my-md-2">
                        <div class="col">
                            <input type="text" class="form-control" name="name_book" placeholder="Название книги" value="<?php echo $name_book; ?>">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="year" placeholder="год" value="<?php echo $year_book; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Добавить фото</label>
                            <input type="file" class="form-control-file" name="name_img" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <div class="col my-md-2">
                        <div class="col">
                            <input type="text" class="form-control" name="author1" placeholder="Автор 1" value="<?php echo $author1_book; ?>">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="author2" placeholder="Автор 2" value="<?php echo $author2_book; ?>">
                        </div>
                        <div class="col my-md-2">
                            <input type="text" class="form-control" name="author3" placeholder="Автор 3" value="<?php echo $author3_book; ?>">
                        </div>
                    </div>
                </div>
                <input class="btn btn-primary" type="submit" name="namepost" value="Добавить книгу">
            </form>

        </div>
    </div>

</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="./js/bootstrap.min.js"><\/script>')</script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>