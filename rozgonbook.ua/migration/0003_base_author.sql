--
-- Структура таблицы `author`
--
CREATE TABLE `author` (
  `id` int(10) NOT NULL,
  `name_author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для таблицы `avtor`
--
ALTER TABLE `author`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;