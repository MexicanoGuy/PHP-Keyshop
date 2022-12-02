-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Lis 2022, 09:37
-- Wersja serwera: 10.1.40-MariaDB
-- Wersja PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `keyshop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cart`
--

CREATE TABLE `cart` (
  `cartId` bigint(255) NOT NULL,
  `productNo` bigint(255) NOT NULL,
  `userNo` bigint(255) NOT NULL,
  `quantity` bigint(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `cart`
--

INSERT INTO `cart` (`cartId`, `productNo`, `userNo`, `quantity`) VALUES
(1, 2, 1, 1),
(2, 2, 1, 4),
(3, 2, 2, 1),
(4, 2, 3, 3),
(5, 1, 4, 5),
(6, 3, 1, 4),
(7, 5, 2, 1),
(8, 4, 3, 3),
(9, 1, 4, 5),
(10, 2, 1, 5),
(11, 4, 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product`
--

CREATE TABLE `product` (
  `productId` bigint(255) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `description` text,
  `imageURL` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `product`
--

INSERT INTO `product` (`productId`, `name`, `description`, `imageURL`, `price`) VALUES
(1, 'gta V', 'Grand Theft Auto V (also known as Grand Theft Auto Five) \nis a video game developed by Rockstar North. It is the fifteenth instalment in the Grand Theft Auto series and the fifth game title in the \nHD Universe of the series.', 'productImg/gta5.png', '100.75'),
(2, 'Kirby Forgotten Land', 'Kirby and the Forgotten Land is a 3D platformer \nKirby game developed by HAL Laboratory and published by Nintendo for the Nintendo Switch. \nThe game was announced in a Nintendo Direct on September 23, 2021 and released worldwide on March 25, 2022.', 'productImg/KirbyForgottenLand.jpg', '289.99'),
(3, 'Overwatch 2', 'Overwatch 2 is the next iteration, and sequel of Overwatch. It took over after the first game`s servers were closed down.', 'productImg/overwatch2.png', '200.20'),
(4, 'The Legend of Zelda: Breath Of The Wild', 'The Legend of Zelda: Breath of the Wild is the nineteenth main installment of The Legend of Zelda series. \nIt was released simultaneously worldwide for the Wii U and Nintendo Switch on March 3, 2017.', 'productImg/TLOZ.jpg', '289.10'),
(5, 'Mario Kart 8', 'Mario Kart 8 is a racing game developed primarily by Nintendo EAD, with Namco Bandai Holdings assisting, for the Wii U. It is the eighth console installment in the Mario Kart series (hence the game`s name).\n', 'productImg/marioKart8.jpg', '299.50');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `userId` bigint(255) NOT NULL,
  `nickname` varchar(80) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pwd` varchar(255) NOT NULL,
  `accountType` varchar(30) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`userId`, `nickname`, `email`, `pwd`, `accountType`) VALUES
(1, 'admin', 'admin@gmail.com', '10c4981bb793e1698a83aea43030a388', 'admin'),
(2, 'marian', 'marian@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(3, 'stanoski', 'krzysia@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(4, 'Amogo', 'fa@gmail.rd', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indeksy dla tabeli `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `product`
--
ALTER TABLE `product`
  MODIFY `productId` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `userId` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
