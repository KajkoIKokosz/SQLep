-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Lis 2016, 23:23
-- Wersja serwera: 10.1.10-MariaDB
-- Wersja PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sqlep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `items_id` binary(1) NOT NULL,
  `cart_id` binary(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `Category_name` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `Item_name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Description` text COLLATE utf8_polish_ci,
  `Price` float NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `items`
--

INSERT INTO `items` (`id`, `Item_name`, `Description`, `Price`, `Quantity`) VALUES
(1, 'celofan', 'wypasiony kalafior', 16, 10),
(2, 'brątowąsik', 'wypasiony kalafior', 16, 10),
(3, 'Mortadela', 'wypasiony trelur', 160, 0),
(4, 'DydÅ‚oÅ„', 'wypasiony trelur', 160, 10),
(5, 'Koziówka', 'Niezbędna zawsze podczasz koziowania', 100.23, 7),
(6, 'Kapadastron Wiśniowy', 'Jest to kompletnie niepotrzebna rzecz', 234.41, 1234),
(7, 'Elektrokapuściocha', 'nigdy tego nie kupuj', 1010, 11),
(8, 'Mortadela', 'wypasiony trelur', 160, 10),
(9, 'fds', 'hgjfgjh', 5, 53),
(10, 'Patefon', 'Zagraj nam jak patefon', 23, 199),
(11, 'Krokodyl', 'Pyszny krokodyl w miodzie', 4, 999),
(12, 'Krokodyl', 'Pyszny krokodyl w miodzie', 4, 999),
(13, 'aaa234243', 'fddsf', 30, 34324),
(14, 'aaa234243', 'fddsf', 30, 34324),
(15, 'tye', 'hgf', 55, 4456),
(16, 'tye', 'hgf', 55, 4456),
(17, 'tye', 'hgf', 55, 4456),
(18, 'tye', 'hgf', 55, 4456),
(19, 'tye', 'hgf', 55, 4456),
(20, 'tye', 'hgf', 55, 4456),
(21, 'JÃ³zef', 'Bardzo wydajny JÃ³zef', 10, 12),
(22, 'JÃ³zef', 'Bardzo wydajny JÃ³zef', 10, 12),
(23, 'JÃ³zef', 'Bardzo wydajny JÃ³zef', 10, 12),
(24, 'JÃ³zef', 'Bardzo wydajny JÃ³zef', 10, 12),
(25, 'JÃ³zef', 'Bardzo wydajny JÃ³zef', 10, 12),
(26, 'JÃ³zef', 'Bardzo wydajny JÃ³zef', 10, 12);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `item_categories`
--

CREATE TABLE `item_categories` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `src_path` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Surname` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `shipping_addres` text COLLATE utf8_polish_ci NOT NULL,
  `hashed_password` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `Name`, `Surname`, `email`, `shipping_addres`, `hashed_password`) VALUES
(1, 'Jan', 'Papuga', 'jan@papuga.pl', 'AmazoÅ„ska 70, Manaus', '$2y$10$rBTEibT54Zz7jsPFnjRhiuJ5XcAOt62lHp4FfUkz47lA3YWXBAq1W'),
(2, 'Adam', 'MorÅ›win', 'adam@morswin.pl', 'Arktyczna 70, Longeberen', '$2y$10$xwAcjYRiQ1Hp9uBnNWVfCeK4Y5VMq7/.3kskpYysKm2r30PTAwtCy');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cart_fk0` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Category_name` (`Category_name`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Pictures_fk0` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT dla tabeli `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `Cart_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `Pictures_fk0` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
