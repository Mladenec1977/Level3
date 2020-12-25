--
-- Структура таблицы `author_book`
--

CREATE TABLE `author_book` (
  `id` int(10) NOT NULL,
  `book_id` int(10) DEFAULT NULL,
  `author_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы таблицы `author_book`
--
ALTER TABLE `author_book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для таблицы `author_book`
--
ALTER TABLE `author_book`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
