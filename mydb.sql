-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 18 jan. 2025 à 20:23
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `idActivité` int(11) NOT NULL,
  `nom1` varchar(100) NOT NULL,
  `durée1` time NOT NULL,
  `date` date NOT NULL,
  `descriptionA1` mediumtext NOT NULL,
  `idDestination` int(11) NOT NULL,
  `descriptionA2` mediumtext NOT NULL,
  `descriptionA3` mediumtext NOT NULL,
  `prix1` decimal(10,0) NOT NULL,
  `image0` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `prix2` decimal(10,0) NOT NULL,
  `prix3` decimal(10,0) NOT NULL,
  `guide1` varchar(255) NOT NULL,
  `guide2` varchar(255) NOT NULL,
  `guide3` varchar(255) NOT NULL,
  `durée2` time NOT NULL,
  `durée3` time NOT NULL,
  `nom2` varchar(100) NOT NULL,
  `nom3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`idActivité`, `nom1`, `durée1`, `date`, `descriptionA1`, `idDestination`, `descriptionA2`, `descriptionA3`, `prix1`, `image0`, `image1`, `image2`, `image3`, `prix2`, `prix3`, `guide1`, `guide2`, `guide3`, `durée2`, `durée3`, `nom2`, `nom3`) VALUES
(1, 'Croisière au coucher de soleil avec dîner', '05:00:00', '2025-01-18', 'Profitez d\'une croisière en catamaran autour de Santorin, avec une vue imprenable sur la caldeira et un coucher de soleil à couper le souffle. La croisière inclut un dîner de spécialités grecques préparées à bord par l\'équipage.', 61, 'Parcourez l\'un des sentiers les plus célèbres de Santorin, reliant les charmants villages de Fira et Oia.', 'Explorez les villages pittoresques de Pyrgos et Megalochori avant une dégustation des célèbres vins de Santorin.', 120, 'santorini-view-hotel-3.jpg', 'Croisiere_Saumur_Loire-AnjouTourisme-(c)David_DARRAULT-1920px_2.jpeg', 'rando-oia-fira.webp', '148.jpg', 30, 50, 'Nikos Papadakis', 'Maria Kallistratos', 'Giorgos Anagnostou', '03:00:00', '04:00:00', 'Randonnée de Fira à Oia', 'Visite des villages traditionnels et dégustion de vins'),
(2, 'Visite guidée du Colisée et du Forum Romain', '03:00:00', '2025-01-18', 'Explorez le célèbre Colisée, symbole emblématique de Rome, et découvrez les ruines du Forum Romain avec un guide local qui vous plongera dans l\'histoire fascinante de l\'Empire romain.', 62, 'Découvrez la magnifique Cité du Vatican, incluant la Basilique Saint-Pierre, la Chapelle Sixtine et les musées du Vatican.', 'Profitez d\'une balade culinaire à travers les ruelles de Rome pour savourer des spécialités locales comme les pâtes carbonara, le tiramisu et la pizza romaine.', 50, 'a1.webp', 'a2.jpg', 'a3.jpeg', 'a4.jpg', 60, 45, 'Luca Rossi', 'Francesca Bianchi', 'Giulia Moretti', '04:00:00', '02:30:00', 'Visite de la Cité du Vatican', 'Balade culinaire dans les ruelles de Rome'),
(3, 'Visite des pyramides de Gizeh et du Sphinx', '03:00:00', '2025-01-18', 'Découvrez les merveilles antiques des pyramides de Gizeh et du majestueux Sphinx avec un guide expert, qui partagera des histoires fascinantes sur l\'Égypte ancienne.', 63, 'Explorez le Musée égyptien pour admirer des trésors antiques, y compris le masque funéraire de Toutankhamon.', 'Promenez-vous dans le vieux Caire et découvrez ses marchés traditionnels, mosquées historiques et le quartier copte.', 40, 'b0.jpg', 'b1.jpg', 'b2.jpg', 'b3.jpg', 25, 30, 'Ahmed Hassan', 'Salma Khaled', 'Omar Ali', '02:30:00', '03:00:00', 'Visite du Musée égyptien', 'Balade dans le vieux Caire'),
(4, 'Randonnée sur la Mer de Glace', '04:00:00', '2025-01-18', 'Partez pour une randonnée inoubliable sur la célèbre Mer de Glace avec un guide de montagne expérimenté, découvrant les paysages alpins spectaculaires de Chamonix.', 64, 'Explorez le Montenvers avec un trajet en train à crémaillère et admirez la vue sur les glaciers.', 'Découvrez les spécialités savoyardes, comme la fondue et la raclette, lors d\'une promenade culinaire en ville.', 50, 'c0.jpg', 'c1.jpg', 'c2.jpg', 'c3.jpg', 30, 45, 'Jean-Pierre Durand', 'Élise Morel', 'Lucien Perrin', '01:30:00', '02:00:00', 'Visite du Montenvers et glaciers', 'Promenade culinaire à Chamonix'),
(5, 'Safari au lever du soleil dans le Serengeti', '05:00:00', '2025-01-18', 'Observez la faune spectaculaire du Serengeti lors d\'un safari au lever du soleil, accompagné d\'un guide local expert qui vous fera découvrir les lions, éléphants, et bien d\'autres animaux.', 65, 'Explorez la migration annuelle des gnous, un spectacle naturel unique et impressionnant.', 'Découvrez la culture des Masaï lors d\'une visite guidée de leurs villages traditionnels.', 200, 'd0.webp', 'd1.jpg', 'd2.avif', 'd3.avif', 180, 150, 'Joseph Mollel', 'Anna Njoroge', 'Moses Kimaro', '06:00:00', '03:00:00', 'Migration des gnous', 'Visite culturelle des Masaï'),
(30, 'Excursion en bateau à fond de verre', '01:00:00', '2025-01-18', 'Embarquez pour une aventure sous-marine en bateau à fond de verre. Explorez les récifs coralliens vibrants et découvrez la vie marine des Maldives sans avoir à vous mouiller.', 56, 'Profitez d\'une plongée sous-marine inoubliable et explorez les récifs coralliens et la vie marine exotique autour de l\'île, accompagné d\'instructeurs professionnels.', 'Détendez-vous avec un massage traditionnel maldivien dans un cadre tranquille. Profitez des bienfaits des huiles essentielles locales pour une expérience de relaxation complète.', 55, '4881260-10-18-19-sud-male-atoll-maldives-vue-aerienne-ile-maldives-luxury-water-villas-resort-wooden-pier-stunning-sky-ocean-lagoon-beach-summer-vacations-holiday-paradis-aerien-paysage-panorama-photo.jpg', '145.png', 'th.jpeg', 'image059.jpg', 140, 110, 'Ahmed Ali', 'Sarah Nasheed', 'Mariam Fathimath', '02:00:00', '01:00:00', 'Plongée sous-marine avec certification PAD', 'Spa et massage traditionnel maldivien'),
(31, 'Excursion au temple de Tanah Lot', '03:00:00', '2025-01-18', 'Visitez le célèbre temple de Tanah Lot, situé sur une roche au bord de la mer, et admirez la vue imprenable au coucher du soleil.', 57, 'Grimpez jusqu\'au sommet du mont Batur pour admirer le lever du soleil avec une vue spectaculaire sur le lac Batur et les montagnes environnantes.', 'Passez une journée relaxante à la plage de Jimbaran avec votre guide local, qui vous guidera vers les meilleurs spots pour apprécier le sable doré et savourer des fruits de mer frais dans les restaurants en bord de mer.', 40, 'shutterstock-1865185231-vue-panoramique-tanah-lot-temple-dans-locean-bali-indonesie-scaled.jpg', '99.jpg', 'z.jpg', '1707348064506-azure-home-4.jpg', 55, 30, 'Putu Arya', 'Komang Eka', 'Nyoman Wayan', '04:00:00', '05:00:00', 'Randonnée au mont Batur', 'Détente à la plage de Jimbaran'),
(32, 'Visite guidée de Central Park à vélo', '02:00:00', '2025-01-18', 'Explorez Central Park en vélo lors d\'une visite guidée avec un local. Découvrez les endroits les plus emblématiques du parc, tels que Bethesda Terrace, Strawberry Fields et le Great Lawn.\r\n', 58, 'Profitez d\'une croisière guidée autour de Manhattan. Appréciez des vues imprenables sur la Statue de la Liberté, l\'Empire State Building et le pont de Brooklyn, tout en étant accompagné par un guide local expert.', 'Découvrez les œuvres d\'art incroyables au Metropolitan Museum of Art (Met) et au Museum of Modern Art (MoMA) avec un guide local. Vous explorerez les collections célèbres de ces musées incontournables.', 40, '10-plus-beaux-panoramas-vue-manhattan-une-1600x500.jpg', 'promenade-velo-central-park.avif', 'fe1fea02-7dbc-4f5a-ab42-408df09ef79b_Statue+of+Liberty+Ferry.avif', 'met-exterieur.webp', 50, 60, 'Michael Johnson', 'Sarah Roberts', 'Emily Thompson', '01:30:00', '04:00:00', 'Croisière autour de Manhattan et Statue de', 'Visite des musées du Met et du MoMA'),
(33, 'Vol en montgolfière au lever du soleil', '01:00:00', '2025-01-18', 'Volez au-dessus des formations rocheuses spectaculaires de la Cappadoce au lever du soleil. Un guide local vous accompagnera pour vous offrir une vue imprenable sur les paysages uniques de la région.', 59, 'Partez en excursion pour découvrir les célèbres cheminées de fées, ces formations rocheuses uniques, et explorez les vallées pittoresques de la Cappadoce avec un guide local qui vous expliquera l\'histoire de cette région magique.', 'Explorez la ville souterraine de Derinkuyu, un impressionnant complexe de tunnels et de chambres creusés dans la roche. Accompagné d\'un guide local, vous découvrirez l\'histoire fascinante de ce lieu unique..', 150, 'Göreme_1_11_2004.jpg', 'montgolfiere-cappadoce-850x500.jpg', 'Les-Orgues-Ille-sur-Tet-21E-Fondecave-1200x800.jpg', 'derinkuyu.jpg', 45, 35, 'Hasan Yılmaz', 'Selim Korkmaz', 'Ahmet Demir', '04:00:00', '03:00:00', 'Visite des cheminées de fées et des vallée', 'Visite souterraine de Derinkuyu'),
(34, 'Randonnée sur la Grande Muraille de Chine (se', '05:00:00', '2025-01-18', 'Explorez l\'une des sections les mieux préservées de la Grande Muraille de Chine. Votre guide local vous racontera l\'histoire fascinante de cette merveille mondiale tout en profitant de vues panoramiques spectaculaires sur les montagnes environnantes.', 60, 'Découvrez la majestueuse Cité Interdite, ancien palais impérial, et marchez sur la célèbre Place Tian\'anmen. Votre guide local vous plongera dans l\'histoire impériale et contemporaine de la Chine.', 'Visitez le Palais d\'Été, un chef-d\'œuvre de l\'architecture impériale chinoise entouré de lacs et de collines. Votre guide vous montrera les lieux emblématiques comme le Long Corridor et la Colline de la Longévité. unique..', 50, 'vue-pekin.jpg', 'it-was-an-amazing-experience.jpg', '15.jpg', 'yuanmingyuan-20.jpg', 40, 35, 'Li Wei', 'Selim Korkmaz', 'Wang Yu', '04:00:00', '03:00:00', 'Visite de la Cité Interdite et de la Place', 'Découverte du Palais d\'Été'),
(35, 'Randonnée au Mont Fitz Roy', '05:00:00', '2025-01-18', 'Une randonnée à travers la beauté naturelle de la Patagonie, en passant par des paysages époustouflants avec vue sur le Mont Fitz Roy.', 66, 'Explorez des sentiers pittoresques autour de la montagne et profitez d\'une vue incroyable.', 'Marchez au cœur de la nature sauvage de la région d\'El Chaltén.', 120, 'e0.png', 'e1.jpg', 'e2.webp', 'e3.webp', 100, 150, 'Carlos López', 'Ana Maria Fernández', 'Javier Pérez', '05:00:00', '06:00:00', 'Randonnée dans le Parc Los Glaciares', 'Exploration des lacs de la région'),
(36, 'Escalade sur les falaises de Kalymnos', '04:00:00', '2025-01-18', 'Escalade sur les célèbres falaises de Kalymnos, avec un guide local expérimenté pour tous niveaux.', 67, 'Profitez d\'une vue imprenable sur la mer Égée depuis le sommet des falaises.', 'Une expérience inoubliable avec un guide pour vous aider à franchir les différents niveaux de difficulté.', 80, 'f0.jpg', 'f1.jpg', 'f2.jpg', 'f3.webp', 60, 100, 'Nikos Papadopoulos', 'Sofia Alexandri', 'Dimitris Vassilis', '04:00:00', '05:00:00', 'Visite des villages de Kalymnos', 'Plongée en mer Égée'),
(37, 'Visite de la côte d\'Amalfi en bateau', '06:00:00', '2025-01-18', 'Explorez la magnifique côte d\'Amalfi à bord d\'un bateau, avec un guide local pour découvrir les villages pittoresques et les vues incroyables.', 68, 'Admirez la beauté de Positano et Ravello depuis la mer, en profitant d\'un panorama unique.', 'Découvrez des criques cachées et plongez dans les eaux cristallines de la Méditerranée.', 150, 'g0.jpg', 'g1.jpg', 'g2.webp', 'g3.jpeg', 120, 180, 'Giuseppe Russo', 'Claudia Ricci', 'Marco Giordano', '06:00:00', '07:00:00', 'Visite des grottes marines', 'Dégustation de vin sur la côte'),
(38, 'Excursion en 4x4 dans le désert de Wadi Rum', '04:00:00', '2025-01-18', 'Explorez les paysages spectaculaires du désert de Wadi Rum à bord d\'un véhicule 4x4. Un guide local vous montrera les formations rocheuses, les canyons et les oasis de cette région emblématique.', 69, 'Arrêtez-vous pour admirer les paysages et découvrir les légendes du désert racontées par votre guide.', 'Profitez d\'un coucher de soleil spectaculaire sur les dunes de sable rouge.', 80, 'h0.jpg', 'h1.jpg', 'h2.jpg', 'h3.jpg', 100, 120, 'Faisal Al-Majali', 'Muna Khamis', 'Tariq Jaber', '02:30:00', '03:00:00', 'Randonnée à pied dans Wadi Rum', 'Visite de la ville de Petra'),
(39, 'Ascension du Mont Fuji', '08:00:00', '2025-01-18', 'Venez conquérir le Mont Fuji, le plus haut sommet du Japon. Accompagné d\'un guide local expérimenté, vous gravirez ce mont sacré, symbole du pays du soleil levant.', 70, 'Profitez de vues imprenables sur les lacs autour du Mont Fuji tout au long de l\'ascension.', 'À l\'arrivée au sommet, admirez le panorama spectaculaire sur le Japon et prenez des photos mémorables.', 100, 'i0.jpg', 'i1.jpg', 'i2.webp', 'i3.jpeg', 120, 140, 'Hiroshi Takahashi', 'Yuki Nakamura', 'Kenji Sato', '01:30:00', '02:00:00', 'Visite du Lac Kawaguchi', 'Dégustation de cuisine japonaise'),
(40, 'Visite des temples de Kyoto', '05:00:00', '2025-01-18', 'Plongez dans l\'histoire et la culture de Kyoto avec une visite guidée des temples emblématiques de la ville, dont le Kinkaku-ji (Temple d\'or) et le Fushimi Inari-taisha.', 71, 'Promenez-vous dans les jardins zen et apprenez-en plus sur le bouddhisme zen et la culture japonaise traditionnelle.', 'Dégustez des plats typiques de Kyoto, comme le tofu yudofu, dans un restaurant local.', 75, 'j0.jpg', 'j1.jpeg', 'j2.jpg', 'j3.jpg', 90, 110, 'Satoshi Yamada', 'Haruko Watanabe', 'Tomoaki Suzuki', '00:00:00', '00:00:00', 'Visite du marché Nishiki', 'Découverte du quartier de Gion'),
(41, 'Safari dans le Parc Kruger', '08:00:00', '2025-01-18', 'Découvrez la faune spectaculaire du Parc Kruger en Afrique du Sud lors d\'un safari guidé. Vous aurez l\'occasion d\'observer les \"Big Five\" (lion, léopard, éléphant, buffle et rhinocéros).', 72, 'Avec un guide expérimenté, apprenez-en plus sur les comportements des animaux et les écosystèmes de la savane.', 'Profitez d\'un déjeuner pique-nique en plein cœur de la réserve avant de reprendre votre aventure.', 150, 'k0.jpeg', 'k1.jpg', 'k2.webp', 'k3.jpg', 180, 210, 'Thabo Mokoena', 'Zanele Dlamini', 'Sipho Khumalo', '00:00:00', '00:00:00', 'Visite du village traditionnel Shangana', 'Excursion au Blyde River Canyon'),
(42, 'Visite guidée de la Tour Eiffel et croisière sur la seine', '04:00:00', '2025-01-18', 'Découvrez l\'emblématique Tour Eiffel avec un guide local qui vous expliquera son histoire. Profitez ensuite d\'une croisière sur la Seine pour admirer les monuments parisiens.', 73, 'Explorez les quartiers historiques autour de la Tour Eiffel et découvrez la ville depuis le fleuve.', 'Dégustez un déjeuner ou un dîner croisière avec des vues spectaculaires sur les monuments emblématiques de Paris.', 50, 'l0.jpg', 'l1.webp', 'l2.jpg', 'l3.webp', 65, 80, 'Jean Dupont', 'Marie Lefevre', 'Sophie Martin', '02:00:00', '01:30:00', 'Visite du Musée d\'Orsay', 'Balade à Montmartre'),
(43, 'Randonnée dans la Vallée de Yosemite', '06:00:00', '2025-01-18', 'Accompagné d\'un guide local, partez pour une randonnée à travers les forêts et les prairies de Yosemite, en admirant les majestueux chutes d\'eau et les formations rocheuses.', 74, 'Découvrez des points de vue panoramiques, comme Glacier Point, et apprenez-en plus sur la faune et la flore locales.', 'Explorez le parc en toute sécurité avec un guide expérimenté et profitez de la tranquillité de la nature.', 120, 'm0.webp', 'm1.jpg', 'm2.jpg', 'm3.jpg', 140, 160, 'John Walker', 'Emily Smith', 'Samuel Brown', '03:30:00', '02:30:00', 'Visite de Mariposa Grove', 'Exploration du Half Dome'),
(44, 'Excursion dans le désert d\'Agafay', '04:00:00', '2025-01-18', 'Explorez les paysages arides du désert d\'Agafay à dos de chameau. Un guide local vous accompagnera à travers les dunes et les montagnes environnantes.', 75, 'Passez une nuit sous les étoiles dans un camp berbère traditionnel et découvrez la culture locale.', 'Profitez d\'un déjeuner marocain dans un cadre pittoresque au cœur du désert.', 60, 'n0.jpg', 'n1.jpg', 'n2.jpg', 'n3.jpg', 80, 100, 'Rachid El Amrani', 'Zahra El Idrissi', 'Mustafa Ben Ali', '01:00:00', '02:00:00', 'Visite des jardins Majorelle', 'Tour de la Médina de Marrakech'),
(45, 'Plongée dans la Grande Barrière de Corail', '04:30:00', '2025-01-18', 'Partez pour une expérience de plongée inoubliable dans la Grande Barrière de Corail. Un guide local vous guidera parmi les coraux colorés et la vie marine fascinante.', 76, 'Admirez des poissons tropicaux, des tortues marines et des requins tout en explorant les eaux cristallines.', 'Si vous préférez rester au sec, une excursion en bateau à fond de verre est également disponible.', 130, 'o0.jpg', 'o1.jpg', 'o2.jpg', 'o3.jpg', 150, 180, 'Bruce Johnson', 'Leila Thompson', 'Joshua Lee', '02:00:00', '01:30:00', 'Croisière sur la rivière Daintree', 'Randonnée dans le parc national de Lamington'),
(46, 'Tour en bateau autour de l\'île de Koh Samui', '03:30:00', '2025-01-18', 'Explorez les magnifiques plages et lagons de Koh Samui lors d\'un tour en bateau avec un guide local, qui vous montrera les lieux les plus cachés de l\'île.', 77, 'Plongez dans les eaux cristallines pour faire du snorkeling et découvrir la vie marine de Koh Samui.', 'Détendez-vous sur des plages privées et profitez d\'un déjeuner thaïlandais en bord de mer.', 50, 'p0.webp', 'p1.jpg', 'p2.jpg', 'p3.jpg', 60, 70, 'Somchai Naing', 'Kanya Panya', 'Sakda Arun', '00:45:00', '01:00:00', 'Visite du temple Big Buddha', 'Découverte des cascades de Na Muang');

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `idAdmin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cgu`
--

CREATE TABLE `cgu` (
  `idCgu` int(11) NOT NULL,
  `règles` mediumtext NOT NULL,
  `datePublication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `destinations`
--

CREATE TABLE `destinations` (
  `idDestination` int(11) NOT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `description` varchar(127) DEFAULT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `prix` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `destinations`
--

INSERT INTO `destinations` (`idDestination`, `pays`, `ville`, `description`, `categorie`, `image`, `prix`) VALUES
(56, 'Maldives', 'Sun Siyam Iru Veli', 'Un havre de paix avec des villas sur pilotis, des eaux cristallines et des plages paradisiaques', 'mer circuit-détente plongée', 'maldives.webp', 55),
(57, 'Indonésie', 'Bali', 'Embarquez pour une aventure unique entre volcans fascinants, forêts luxuriantes et temples sacrés', 'mer artisanat circuit-détente plongée randonnée', 'bali.jpg', 30),
(58, 'États-Unis', 'New York City', 'Une ville où les gratte-ciels imposants, les rues animées et les monuments emblématiques vous attendent', 'musée randonnée ville', 'NYC.jpg', 40),
(59, 'Turquie', 'Cappadoce', 'Un lieu magique avec des cheminées de fées, paysages féériques et montgolfières offrant un spectacle unique', 'randonnée désert artisanat', 'turquie.jpg', 35),
(60, 'Chine', 'Pékin', 'Une ville où les trésors historiques, les temples majestueux et l\'effervescence urbaine s\'entrelacent', 'ville musée randonnée', 'chine.jpg', 35),
(61, 'Grèce', 'Santorin', 'Une île où paysages volcaniques, villages pittoresques et mer turquoise forment un décor inoubliable', 'ville mer circuit-détente', 'grece.webp', 30),
(62, 'Italie', 'Rome', 'Une ville où les vestiges impériaux, les fontaines emblématiques et l\'âme de la capitale vous accueillent', 'ville musée randonnée', 'rome.jpg', 45),
(63, 'Égypte', 'Le Caire', 'Une ville où les pyramides majestueuses, les trésors antiques et les souks offrent une expérience unique', 'ville musée désert', 'egypte.webp', 25),
(64, 'France', 'Chamomix', 'Un mélange parfait de panoramas époustouflants, d\'aventures en montagne et d\'une ambiance dynamique', 'escalade randonnée circuit-détente', 'chamomix.jpg', 30),
(65, 'Tanzanie', 'Serengeti', 'Un endroit où la savane infinie, les animaux sauvages et le ciel ouvert forment un tableau spectaculaire', 'safari randonnée circuit-détente', 'serengeti.jpg', 150),
(66, 'Argentine', 'El Chaltén', 'Un village au cœur des Andes, entouré de sommets majestueux et de sentiers vers des merveilles naturelles', 'randonnée escalade circuit-détente', 'elchalten.jpg', 100),
(67, 'Grèce', 'Kalymnos', 'Une île grecque authentique, célèbre pour ses falaises spectaculaires, ses eaux cristallines et sa paix', 'escalade mer artisanat randonnée circuit-détente', 'kalymnos.jpg', 60),
(68, 'Italie', 'Amalfi', 'Profitez des eaux turquoise et des falaises majestueuses de la côte amalfitaine', 'mer plongée circuit-détente', 'amalfi.jpg', 120),
(69, 'Jordanie', 'Wadi Rum', 'Traversez des paysages lunaires et découvrez la magie du désert jordanien, un lieu hors du temps', 'désert randonnée circuit-détente', 'wadi_rum.jpg', 80),
(70, 'Japon', 'Mont Fuji', 'Grimpez le sommet emblématique du Japon et admirez ses vues spectaculaires au lever du soleil', 'randonnée escalade circuit-détente', 'mont_fuji.jpg', 100),
(71, 'Japon', 'Kyoto', 'Explorez les temples anciens, les jardins paisibles et l\'artisanat traditionnel de cette ville historique', 'ville musée artisanat', 'kyoto.jpg', 75),
(72, 'Afrique du Sud', 'Parc Kruger', 'Vivez l\'aventure d\'un safari exceptionnel et observez les Big Five dans leur habitat naturel', 'safari circuit-détente', 'parc_kruger.webp', 150),
(73, 'France', 'Paris', 'Admirez les trésors artistiques dans le plus célèbre musée du monde', 'musée ville artisanat', 'paris.jpg', 50),
(74, 'États-Unis', 'Yosemite', 'Grimpez les parois vertigineuses de ce parc légendaire et profitez de ses vues spectaculaires', 'escalade randonnée circuit-détente', 'yosemite.jpg', 120),
(75, 'Maroc', 'Marrakech', 'Découvrez les souks animés et l\'artisanat traditionnel dans cette ville vibrante', 'artisanat ville musée', 'marrakech.jpg', 60),
(76, 'Australie', 'Queensland', 'Explorez le plus grand récif corallien du monde, un joyau naturel à couper le souffle', 'plongée mer randonnée circuit-détente', 'queensland.jpg', 130),
(77, 'Thaïlande', 'Koh Samui', 'Détendez-vous sur des plages paradisiaques et explorez les marchés locaux exotiques', 'circuit-détente mer artisanat', 'thailande.jpg', 50);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `idFaq` int(11) NOT NULL,
  `questionF` mediumtext NOT NULL,
  `réponseF` mediumtext NOT NULL,
  `dateCréationF` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `idFavori` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `guide_activite`
--

CREATE TABLE `guide_activite` (
  `Utilisateur_idUtilisateur` int(11) NOT NULL,
  `Activité_idActivité` int(11) NOT NULL,
  `Activité_Destination_idDestination` int(11) NOT NULL,
  `prix` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `idMessagerie` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `corps_texte` mediumtext NOT NULL,
  `envoye_a` timestamp NULL DEFAULT current_timestamp(),
  `lu_ou_non_lu` tinyint(4) DEFAULT 0,
  `Utilisateur_idExpediteur` int(11) NOT NULL,
  `Utilisateur_idRecepteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `emailU` varchar(255) NOT NULL,
  `passwordU` varchar(255) NOT NULL,
  `nomU` varchar(45) NOT NULL,
  `prénomU` varchar(45) NOT NULL,
  `dateNaissanceU` varchar(45) NOT NULL,
  `adressePostalU` varchar(45) NOT NULL,
  `role` enum('guide','voyageur') NOT NULL,
  `cree_a` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `emailU`, `passwordU`, `nomU`, `prénomU`, `dateNaissanceU`, `adressePostalU`, `role`, `cree_a`) VALUES
(4, 'renedjiva@gmail.com', '$2y$10$2kskgPMaVVOdcF1ugXHywu8WEEGHjLsQ5ewGCtWMXTR2btWB9Sl1O', 'RENE', 'Djiva', '', '', 'voyageur', '2025-01-15 20:26:03');

-- --------------------------------------------------------

--
-- Structure de la table `voyageur_activité`
--

CREATE TABLE `voyageur_activité` (
  `Activité_idActivité` int(11) NOT NULL,
  `Activité_Destination_idDestination` int(11) NOT NULL,
  `Utilisateur_idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`idActivité`) USING BTREE,
  ADD KEY `idDestination` (`idDestination`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Index pour la table `cgu`
--
ALTER TABLE `cgu`
  ADD PRIMARY KEY (`idCgu`);

--
-- Index pour la table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`idDestination`) USING BTREE;

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idFaq`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`idFavori`) USING BTREE,
  ADD KEY `idUtilisateur` (`user_id`);

--
-- Index pour la table `guide_activite`
--
ALTER TABLE `guide_activite`
  ADD PRIMARY KEY (`Utilisateur_idUtilisateur`,`Activité_idActivité`,`Activité_Destination_idDestination`),
  ADD KEY `Activité_idActivité` (`Activité_idActivité`,`Activité_Destination_idDestination`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`idMessagerie`),
  ADD KEY `Utilisateur_idExpediteur` (`Utilisateur_idExpediteur`),
  ADD KEY `Utilisateur_idRecepteur` (`Utilisateur_idRecepteur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `emailV_UNIQUE` (`emailU`);

--
-- Index pour la table `voyageur_activité`
--
ALTER TABLE `voyageur_activité`
  ADD PRIMARY KEY (`Activité_idActivité`,`Activité_Destination_idDestination`,`Utilisateur_idUtilisateur`) USING BTREE,
  ADD KEY `Utilisateur_idUtilisateur` (`Utilisateur_idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activite`
--
ALTER TABLE `activite`
  MODIFY `idActivité` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cgu`
--
ALTER TABLE `cgu`
  MODIFY `idCgu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `idDestination` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `idFaq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `idFavori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `idMessagerie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `fk_idDestination` FOREIGN KEY (`idDestination`) REFERENCES `destinations` (`idDestination`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `guide_activite`
--
ALTER TABLE `guide_activite`
  ADD CONSTRAINT `guide_activite_ibfk_1` FOREIGN KEY (`Utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE,
  ADD CONSTRAINT `guide_activite_ibfk_2` FOREIGN KEY (`Activité_idActivité`,`Activité_Destination_idDestination`) REFERENCES `activité` (`idActivité`, `idDestination`) ON DELETE CASCADE;

--
-- Contraintes pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD CONSTRAINT `messagerie_ibfk_1` FOREIGN KEY (`Utilisateur_idExpediteur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE,
  ADD CONSTRAINT `messagerie_ibfk_2` FOREIGN KEY (`Utilisateur_idRecepteur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE;

--
-- Contraintes pour la table `voyageur_activité`
--
ALTER TABLE `voyageur_activité`
  ADD CONSTRAINT `voyageur_activité_ibfk_1` FOREIGN KEY (`Activité_idActivité`,`Activité_Destination_idDestination`) REFERENCES `activité` (`idActivité`, `idDestination`) ON DELETE CASCADE,
  ADD CONSTRAINT `voyageur_activité_ibfk_2` FOREIGN KEY (`Utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
