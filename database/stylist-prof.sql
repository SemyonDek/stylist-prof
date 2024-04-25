-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 25 2024 г., 00:06
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `stylist-prof`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `ID` int NOT NULL,
  `PARENT` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `SRC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`ID`, `PARENT`, `NAME`, `SRC`) VALUES
(1, 0, 'Товары для парикмахеров', 'img/category/65ffaa4d3a491.svg'),
(2, 0, 'Товары для барберов', 'img/category/65ffa45b816b8.svg'),
(3, 1, 'Техника', 'img/category/65ffa55b35310.png'),
(8, 2, 'Техника', 'img/category/6600680cc525a.png');

-- --------------------------------------------------------

--
-- Структура таблицы `category_index`
--

CREATE TABLE `category_index` (
  `ID` int NOT NULL,
  `CATID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category_index`
--

INSERT INTO `category_index` (`ID`, `CATID`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `coupon`
--

CREATE TABLE `coupon` (
  `ID` int NOT NULL,
  `CODE` varchar(255) NOT NULL,
  `SALE` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `coupon`
--

INSERT INTO `coupon` (`ID`, `CODE`, `SALE`) VALUES
(1, 'qwerty', 50);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `ID` int NOT NULL,
  `USERID` int NOT NULL,
  `VALUE` int NOT NULL,
  `SALE` int NOT NULL,
  `AMOUNT` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `COMM` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `NUMBER` varchar(255) NOT NULL,
  `STATUS` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`ID`, `USERID`, `VALUE`, `SALE`, `AMOUNT`, `NAME`, `COMM`, `EMAIL`, `NUMBER`, `STATUS`) VALUES
(2, 1, 1, 50, 14495, 'Николаев Николай Николаевич', 'До Москвы', 'nikola@mail.ru', '+7 (999) 288-65-78', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `order_item`
--

CREATE TABLE `order_item` (
  `ID` int NOT NULL,
  `ORDERID` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `PRICE` int NOT NULL,
  `VALUE` int NOT NULL,
  `AMOUNT` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `order_item`
--

INSERT INTO `order_item` (`ID`, `ORDERID`, `NAME`, `PRICE`, `VALUE`, `AMOUNT`) VALUES
(2, 2, 'Электрофен Ga.Ma IQ2 Perfetto Обновленная топовая модель, черный, 1600 Вт', 28990, 1, 28990);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `ID` int NOT NULL,
  `CATID` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `CODE` varchar(255) NOT NULL,
  `PRICE` varchar(255) NOT NULL,
  `BRAND` varchar(255) NOT NULL,
  `PRODUCER` varchar(255) NOT NULL,
  `TEXT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`ID`, `CATID`, `NAME`, `CODE`, `PRICE`, `BRAND`, `PRODUCER`, `TEXT`) VALUES
(1, 3, 'Электрофен Ga.Ma IQ2 Perfetto Обновленная топовая модель, розовый, 1600 Вт', '304387', '28990', 'Ga.Ma', 'Китай', 'Фен GA.MA IQ2 Perfetto – самый лёгкий профессиональный фен, он весит всего 294 грамма, сушит волосы на 30% быстрее и имеет более длительный срок службы. Это прибор, о котором всегда мечтали стилисты.\r\n\r\niQ2 является топовой обновленной версией фена в линейке фенов iQ Perfetto.\r\n\r\nФУНКЦИИ И ТЕХНОЛОГИИ:\r\nЭФФЕКТ ВЕНТУРИ\r\nОсобая конструкция сопла многократно увеличивает воздушный поток, подаваемый двигателем благодаря вакуумному эффекту.\r\n\r\nТУРБО-РЕЖИМ\r\nУсиливает воздушный поток, доводя скорость мотора до максимальных 120 000 оборотов в минуту на 30 секунд.\r\n\r\nТЕХНОЛОГИЯ OXY-ACTIVE\r\nМощный антибактериальный и антистатический эффект, защита окрашенных волос, оздоровление от корней до кончиков.\r\nБлагодаря выделению активного кислорода с антибактериальными свойствами и отрицательными ионами, технология способствует блеску, эластичности и глубокому очищению кожи головы. Она специально разработана для защиты окрашенных волос, нейтрализует негативное воздействие химических веществ, входящих в состав средств для окрашивания, запечатывает кутикулу волоса и защищает волосы и кожу головы от повреждений, вызванных свободными радикалами и воздействием внешних факторов.\r\n\r\nФУНКЦИЯ eSYSTEM-C\r\nНепрерывный контроль температуры выходного потока. При загрязнении фильтров, прибор отключается автоматически, защищая фен от перегрева и поломок.\r\n\r\nSTAND - BY РЕЖИМ\r\nФен автоматически отключается и переходит в режим ожидания, когда вы кладете его на Smart коврик (входит в комплект) или размещаете его в поясном или настольном Smart держателях/подставке (приобретаются отдельно, артикулы: PT9915.WH, PT9915.BR, PT9915.BK). Позволяет эффективно управлять временем использования и снижает электропотребление.\r\n\r\nФУНКЦИЯ САМООЧИСТКИ\r\nЭта технология вращает турбину в обратном направлении, глубоко очищая фильтр. Рекомендуется производить самоочистку ежедневно.\r\n\r\nФУНКЦИЯ LOCK SYSTEM\r\nПосле включения фен заработает с теми настройками температуры и скорости, которые были использованы последний раз.\r\n\r\nИНФОРМАЦИЯ О ФИЛЬТРЕ:\r\nДвойной микроперфорированный фильтр с возможностью промывки его под водой. Он предотвращает попадание волос, пыли и мельчайших частиц в мотор, тем самым продлевая срок его службы.\r\n\r\nИНФОРМАЦИЯ ОБ ОБНОВЛЕННЫХ НАСАДКАХ И АКСЕССУАРАХ:\r\n2 узких насадки-концентратора с ненагреваемой зоной на концах (Cool Zone) и вращением на 360 ° для сушки, укладки на брашинг и выпрямления прядей. Ширина насадок 108 мм и 81 мм.\r\n\r\nКонцентратор «Звезда» диаметром 6,5 см и вращением на 360 ° создает равномерный поток воздуха, идеально подходящий для тонких или ослабленных волос.\r\n\r\nОбновленный диффузор диаметром 13,3 см, вращением на 360 ° и глубокой чашей распределяет поток горячего воздуха по большой площади, позволяя избежать повреждения волосяной кутикулы. Используется для сушки вьющихся волос и для создания объемных причесок.\r\n\r\nНовый комплект поставки: 9 внутренних микроперфорированных фильтров, набор для ухода за прибором (щеточка для очистки, мягкая салфетка), Smart коврик со Stand-By режимом, съемная петля для подвешивания.'),
(2, 3, 'Электрофен Ga.Ma IQ2 Perfetto Обновленная топовая модель, черный, 1600 Вт', '304386', '28990', 'Ga.Ma', 'Китай', 'Фен GA.MA IQ2 Perfetto – самый лёгкий профессиональный фен, он весит всего 294 грамма, сушит волосы на 30% быстрее и имеет более длительный срок службы. Это прибор, о котором всегда мечтали стилисты.\r\n\r\niQ2 является топовой обновленной версией фена в линейке фенов iQ Perfetto.\r\n\r\nФУНКЦИИ И ТЕХНОЛОГИИ:\r\nЭФФЕКТ ВЕНТУРИ\r\nОсобая конструкция сопла многократно увеличивает воздушный поток, подаваемый двигателем благодаря вакуумному эффекту.\r\n\r\nТУРБО-РЕЖИМ\r\nУсиливает воздушный поток, доводя скорость мотора до максимальных 120 000 оборотов в минуту на 30 секунд.\r\n\r\nТЕХНОЛОГИЯ OXY-ACTIVE\r\nМощный антибактериальный и антистатический эффект, защита окрашенных волос, оздоровление от корней до кончиков.\r\nБлагодаря выделению активного кислорода с антибактериальными свойствами и отрицательными ионами, технология способствует блеску, эластичности и глубокому очищению кожи головы. Она специально разработана для защиты окрашенных волос, нейтрализует негативное воздействие химических веществ, входящих в состав средств для окрашивания, запечатывает кутикулу волоса и защищает волосы и кожу головы от повреждений, вызванных свободными радикалами и воздействием внешних факторов.\r\n\r\nФУНКЦИЯ eSYSTEM-C\r\nНепрерывный контроль температуры выходного потока. При загрязнении фильтров, прибор отключается автоматически, защищая фен от перегрева и поломок.\r\n\r\nSTAND - BY РЕЖИМ\r\nФен автоматически отключается и переходит в режим ожидания, когда вы кладете его на Smart коврик (входит в комплект) или размещаете его в поясном или настольном Smart держателях/подставке (приобретаются отдельно, артикулы: PT9915.WH, PT9915.BR, PT9915.BK). Позволяет эффективно управлять временем использования и снижает электропотребление.\r\n\r\nФУНКЦИЯ САМООЧИСТКИ\r\nЭта технология вращает турбину в обратном направлении, глубоко очищая фильтр. Рекомендуется производить самоочистку ежедневно.\r\n\r\nФУНКЦИЯ LOCK SYSTEM\r\nПосле включения фен заработает с теми настройками температуры и скорости, которые были использованы последний раз.\r\n\r\nИНФОРМАЦИЯ О ФИЛЬТРЕ:\r\nДвойной микроперфорированный фильтр с возможностью промывки его под водой. Он предотвращает попадание волос, пыли и мельчайших частиц в мотор, тем самым продлевая срок его службы.\r\n\r\nИНФОРМАЦИЯ ОБ ОБНОВЛЕННЫХ НАСАДКАХ И АКСЕССУАРАХ:\r\n2 узких насадки-концентратора с ненагреваемой зоной на концах (Cool Zone) и вращением на 360 ° для сушки, укладки на брашинг и выпрямления прядей. Ширина насадок 108 мм и 81 мм.\r\n\r\nКонцентратор «Звезда» диаметром 6,5 см и вращением на 360 ° создает равномерный поток воздуха, идеально подходящий для тонких или ослабленных волос.\r\n\r\nОбновленный диффузор диаметром 13,3 см, вращением на 360 ° и глубокой чашей распределяет поток горячего воздуха по большой площади, позволяя избежать повреждения волосяной кутикулы. Используется для сушки вьющихся волос и для создания объемных причесок.\r\n\r\nНовый комплект поставки: 9 внутренних микроперфорированных фильтров, набор для ухода за прибором (щеточка для очистки, мягкая салфетка), Smart коврик со Stand-By режимом, съемная петля для подвешивания.'),
(5, 8, 'LD-966 Машинка для стрижки DEWAL PRO LEGACY, аккумсет', '966', '9410', 'DEWAL', 'Китай', 'Машинка для стрижки волос DEWAL PRO LEGACY LD-966\r\n\r\n1. Уникальный мощный векторный магнитный мотор прекрасно справляется со стрижкой жестких, курчавых и очень густых волос.\r\n2. Скорость 11000 оборотов в минуту\r\n3. Продолжительное рабочее время (4 часа рабочего времени), время зарядки составляет 1,5 часа.\r\n4. Самая легкая машинка для стрижки волос, вес всего 220 грамм\r\n5. Нож для стрижки волос из японской стали с фиксированным лезвием, глубокими зубчиками, титановым покрытием и подвижными лезвиями с алмазоподобным углеродным покрытием DLC.\r\n6. Насадки в комплекте :    1,5; 3; 4.5; 6; 10; 13 мм\r\n7. Регулировка высоты среза    От 0,5 до 3,5 мм');

-- --------------------------------------------------------

--
-- Структура таблицы `products_img`
--

CREATE TABLE `products_img` (
  `ID` int NOT NULL,
  `PRODID` int NOT NULL,
  `SRC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products_img`
--

INSERT INTO `products_img` (`ID`, `PRODID`, `SRC`) VALUES
(1, 2, 'img/products/66004bbca08a1.jpg'),
(2, 2, 'img/products/66004becabccb.jpg'),
(8, 1, 'img/products/660058cd7bf80.jpg'),
(9, 1, 'img/products/660058d18be54.jpg'),
(10, 5, 'img/products/660068c5adc90.jpg'),
(11, 5, 'img/products/660068c9b679b.jpg'),
(12, 5, 'img/products/660068cd20758.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `products_popular`
--

CREATE TABLE `products_popular` (
  `ID` int NOT NULL,
  `PRODID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products_popular`
--

INSERT INTO `products_popular` (`ID`, `PRODID`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `products_profitable`
--

CREATE TABLE `products_profitable` (
  `ID` int NOT NULL,
  `PRODID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products_profitable`
--

INSERT INTO `products_profitable` (`ID`, `PRODID`) VALUES
(5, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `ID` int NOT NULL,
  `PRODID` int NOT NULL,
  `USER` varchar(255) NOT NULL,
  `DATE` varchar(255) NOT NULL,
  `COMM` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`ID`, `PRODID`, `USER`, `DATE`, `COMM`) VALUES
(1, 5, 'Олег', '24.03.2024 г.', 'Лучшая машинка!!! Всегда использую в работе');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int NOT NULL,
  `LOGIN` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `MAIL` varchar(255) NOT NULL,
  `NUMBER` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `LOGIN`, `PASSWORD`, `NAME`, `MAIL`, `NUMBER`) VALUES
(1, 'user', 'u', 'Николаев Николай Николаевич', 'nikola@mail.ru', '+7 (999) 288-65-78');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `category_index`
--
ALTER TABLE `category_index`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products_img`
--
ALTER TABLE `products_img`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products_popular`
--
ALTER TABLE `products_popular`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products_profitable`
--
ALTER TABLE `products_profitable`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `category_index`
--
ALTER TABLE `category_index`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `coupon`
--
ALTER TABLE `coupon`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `order_item`
--
ALTER TABLE `order_item`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `products_img`
--
ALTER TABLE `products_img`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `products_popular`
--
ALTER TABLE `products_popular`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `products_profitable`
--
ALTER TABLE `products_profitable`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
