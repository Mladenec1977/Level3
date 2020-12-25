<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>shpp-library</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="library Sh++">

    <link rel="stylesheet" href="../book-page_files/libs.min.css">
    <link rel="stylesheet" href="../book-page_files/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
          crossorigin="anonymous"/>
</head>

<body data-gr-c-s-loaded="true" class="">

<section id="main" class="main-wrapper">
    <div class="logo"><a href="/" class="navbar-brand"><span class="plus">главная</span></a></div>
    <div class="container">
        <div id="content" class="book_block col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <script id="pattern" type="text/template">
                <div data-book-id=<?php echo $data[0]['id'] ?> class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="../book/<?php echo $data[0]['id'] ?>"><img src="../img/<?php echo $data[0]['img'] ?>"
                                                                        alt="<?php echo $data[0]['name'] ?>">
                        <div data-title="<?php echo $data[0]['name'] ?>" class="blockI">
                            <div data-book-title="<?php echo $data[0]['name'] ?>"
                                 class="title size_text"><?php echo $data[0]['name'] ?></div>
                            <div data-book-author="<?php echo $data[0]['name_author'] ?>"
                                 class="author"><?php echo $data[0]['name_author'] ?></div>
                        </div>
                    </a>
                </div>
                </div>
            </script>
            <div id="id" book-id="<?php echo $data[0]['id'] ?>">
                <div id="bookImg" class="col-xs-12 col-sm-3 col-md-3 item" style="
    margin:;
"><img src="../img/<?php echo $data[0]['img'] ?>" alt="Responsive image" class="img-responsive">
                    <hr>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 info">
                    <div class="bookInfo col-md-12">
                        <div id="title" class="titleBook"><?php echo $data[0]['name'] ?></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="bookLastInfo">
                            <div class="bookRow"><span class="properties">автор:</span><span
                                        id="author"><?php echo $data[0]['name_author'] ?></span></div>
                            <div class="bookRow"><span class="properties">год:</span><span
                                        id=<?php echo $data[0]['year'] ?>><?php echo $data[0]['year'] ?></span></div>
                            <div class="bookRow"><span class="properties">страниц:</span><span id="pages">351</span>
                            </div>
                            <div class="bookRow"><span class="properties">isbn:</span><span id="isbn"></span></div>
                        </div>
                    </div>
                    <div class="btnBlock col-xs-12 col-sm-12 col-md-12">
                        <button type="button" class="btnBookID btn-lg btn btn-success">Хочу читать!</button>
                    </div>
                    <div class="bookDescription col-xs-12 col-sm-12 col-md-12 hidden-xs hidden-sm">
                        <h4>О книге</h4>
                        <hr>
                        <p id="description">Комментарий: <?php echo $data[0]['name'] ?></p>
                    </div>
                </div>
            </div>
            <script src="../book-page_files/book.js" defer=""></script>
        </div>
    </div>
</section>
</body>

</html>