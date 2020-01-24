SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conversormoedas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cotacoes`
--

CREATE TABLE `cotacoes` (
  `id` int(7) NOT NULL,
  `moeda` varchar(10) NOT NULL,
  `cotacao` float(10,6) NOT NULL,
  `data` date NOT NULL,
  `hora` tinyint(2) DEFAULT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cotacoes`
--
ALTER TABLE `cotacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moeda` (`moeda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cotacoes`
--
ALTER TABLE `cotacoes`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
