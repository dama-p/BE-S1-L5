-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Apr 15, 2024 alle 16:52
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestione_libreria`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `libri`
--

CREATE TABLE `libri` (
  `id` int(11) UNSIGNED NOT NULL,
  `titolo` varchar(200) NOT NULL,
  `autore` varchar(100) NOT NULL,
  `anno_pubblicazione` int(4) NOT NULL,
  `genere` varchar(50) NOT NULL,
  `cover` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `libri`
--

INSERT INTO `libri` (`id`, `titolo`, `autore`, `anno_pubblicazione`, `genere`, `cover`) VALUES
(1, 'The Hobbit', 'J. R. R. Tolkien', 1937, 'Fantasy', 'https://v4m9y9w9.rocketcdn.me/wp-content/uploads/2019/12/Image-via-Amazon-1.jpg.webp'),
(2, 'The Fellowship of the Ring', 'J. R. R. Tolkien', 1954, 'Fantasy', 'https://m.media-amazon.com/images/I/61PQNxRVagL._AC_UF1000,1000_QL80_.jpg'),
(3, 'The Two Towers', 'J. R. R. Tolkien', 1954, 'Fantasy', 'https://upload.wikimedia.org/wikipedia/en/thumb/a/a1/The_Two_Towers_cover.gif/220px-The_Two_Towers_cover.gif'),
(4, 'The Return of the King', 'J. R. R. Tolkien', 1955, 'Fantasy', 'https://m.media-amazon.com/images/I/71tDovoHA+L._AC_UF1000,1000_QL80_.jpg'),
(5, 'The Silmarillion', 'J. R. R. Tolkien', 1977, 'Fantasy', 'https://m.media-amazon.com/images/I/71+CbTrP+PL._AC_UF1000,1000_QL80_.jpg'),
(6, 'Unfinished Tales', 'J. R. R. Tolkien', 1980, 'Fantasy', 'https://m.media-amazon.com/images/I/41fT+zcqgFL._AC_UF1000,1000_QL80_.jpg'),
(7, 'A Game of Thrones', 'G. R. R. Martin', 1996, 'Fantasy', 'https://qph.cf2.quoracdn.net/main-qimg-2329712bad0fd92cf1ca59225012dff5.webp'),
(8, 'A Clash of Kings', 'G. R. R. Martin', 1999, 'Fantasy', 'https://georgerrmartin.com/gallery/art/kings10.jpg'),
(9, 'A Storm of Swords', 'G. R. R. Martin', 2000, 'Fantasy', 'https://pictures.abebooks.com/inventory/md/md31620756584.jpg'),
(10, 'A Feast for Crows', 'G. R. R. Martin', 2005, 'Fantasy', 'https://georgerrmartin.com/gallery/art/crows05.jpg'),
(11, 'A Dance with Dragons', 'G. R. R. Martin', 2011, 'Fantasy', 'https://pics.livejournal.com/grrm/pic/000095xs/s640x480'),
(12, 'Circe', 'Madeline Miller', 2018, 'Fantasy', 'https://m.media-amazon.com/images/I/91bktKmGTZL._AC_UF1000,1000_QL80_.jpg'),
(13, 'Galatea', 'Madeline Miller ', 2013, 'Fantasy', 'https://m.media-amazon.com/images/I/713JNP1W5uL._AC_UF1000,1000_QL80_.jpg'),
(14, 'A Song of Achilles', 'Madeline Miller', 2011, 'Fantasy', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRW6opR-ENBfNJnm-zlH7E0Z4yFzzctvRMJUPd0n5ovUw&s');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `libri`
--
ALTER TABLE `libri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `libri`
--
ALTER TABLE `libri`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
