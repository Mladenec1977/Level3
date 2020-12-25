-- Дамп существующей базы --

--
-- Структура таблицы `book`
--
CREATE TABLE `book` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `img` varchar(20) DEFAULT NULL,
  `book_delete` int(1) NOT NULL DEFAULT 0,
  `data_delet` date DEFAULT NULL,
  `look` int(10) NOT NULL DEFAULT 0,
  `click` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;


-- Таблица versions --
create table if not exists `versions` (
    `id` int(10) unsigned not null auto_increment,
    `name` varchar(255) not null,
    `created` timestamp default current_timestamp,
    primary key (id)
)
engine = innodb
auto_increment = 1
character set utf8
collate utf8_general_ci;