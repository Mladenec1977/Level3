<section id="main" class="main-wrapper">
    <div class="logo"><a href="/" class="navbar-brand"><span class="plus">главная</span></a></div>
    <div class="container">
        <div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <?php for ($j = 0; $j < count($data); $j++) {
                ?>
                <div data-book-id="<?php echo $data[$j]['id'] ?>" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                    <div class="book">
                        <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/book/<?php echo $data[$j]['id'] ?>"><img
                                    src="../img/<?php echo $data[$j]['img'] ?>" alt="<?php echo $data[$j]['name'] ?>">
                            <div data-title="<?php echo $data[$j]['name'] ?>" class="blockI" style="height: 46px;">
                                <div data-book-title="<?php echo $data[$j]['name'] ?>"
                                     class="title size_text"><?php $data[$j]['name'] ?></div>
                                <div data-book-author="<?php echo $data[$j]['name_author'] ?>"
                                     class="author"><?php echo $data[$j]['name_author'] ?></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
            } ?>
        </div>
    </div>
    <center>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="<?php echo '/books/1' . '?search=' . $search; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                $index_row = ceil($count / 12);
                for ($i = 1; $i <= $index_row; $i++) {
                    ?>
                    <li class="page-item"><a class="page-link"
                                             href="<?php echo '/books/' . $i . '?search=' . $search; ?>"><?php echo $i; ?></a></li>
                    <?php
                } ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo '/books/' . $index_row . '?search=' . $search; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </center>
</section>
