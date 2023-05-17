-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: db_shareGames
-- ------------------------------------------------------
-- Server version	5.5.5-10.3.34-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `avis`
--

DROP TABLE IF EXISTS `avis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `note` tinyint(1) NOT NULL,
  `utilisateurs_id` int(11) NOT NULL,
  `jeux_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `avis_FK` (`jeux_id`),
  KEY `avis_FK_1` (`utilisateurs_id`),
  CONSTRAINT `avis_FK` FOREIGN KEY (`jeux_id`) REFERENCES `jeux` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `avis_FK_1` FOREIGN KEY (`utilisateurs_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avis`
--

LOCK TABLES `avis` WRITE;
/*!40000 ALTER TABLE `avis` DISABLE KEYS */;
INSERT INTO `avis` VALUES (33,'2023-05-10','FIFA 23 : Une expérience de football immersive','FIFA 23 offre une expérience de football immersive qui plaira aux amateurs du sport le plus populaire au monde. Avec des graphismes améliorés, des mouvements de joueurs réalistes et une variété de modes de jeu, le jeu vous permet de plonger dans l\'action sur le terrain. Affrontez vos adversaires en ligne, créez votre équipe ultime ou revivez des moments historiques dans ce titre captivant qui repousse les limites de la simulation de football.',9,8,29),(34,'2023-05-10','Clash Royale : Un jeu de stratégie captivant','Clash Royale est un jeu de stratégie en temps réel qui captive les joueurs grâce à ses batailles rapides et compétitives. Avec ses cartes uniques et son gameplay addictif, il offre une expérience de jeu palpitante qui ne manquera pas de vous tenir en haleine. Préparez-vous à affronter des adversaires du monde entier dans ce titre captivant.',8,8,30),(35,'2023-05-10',' Call of Duty: Black Ops 2 - Une expérience de tir intense et palpitante','Plongez au cœur d\'un scénario captivant, mêlant guerre froide, conspirations et missions secrètes. Avec son mode multijoueur compétitif et son mode zombie addictif, Black Ops 2 offre une grande variété de gameplay et des heures de divertissement. Préparez-vous à l\'action et à l\'adrénaline avec ce titre emblématique de la franchise Call of Duty.',10,8,32),(36,'2023-05-10',' GTA 5 - Une immersion totale dans un monde ouvert époustouflant','GTA 5 offre une expérience de jeu sans pareil dans un monde ouvert dynamique et époustouflant. Plongez dans les rues animées de Los Santos, explorez un vaste territoire et vivez une histoire captivante remplie d\'intrigues et de personnages mémorables. Avec son gameplay riche en possibilités, que ce soit dans les missions principales, les activités annexes ou le mode en ligne, GTA 5 offre une liberté totale et un divertissement sans fin. Préparez-vous à une aventure inoubliable dans l\'un des meilleurs jeux de la franchise.',10,8,36),(37,'2023-05-10','Une aventure épique et cinématographique','Uncharted 4: A Thief\'s End transporte les joueurs dans une aventure épique digne d\'un film hollywoodien. Avec des graphismes à couper le souffle, une narration captivante et des séquences d\'action palpitantes, le jeu offre une immersion totale dans l\'univers de Nathan Drake. Les paysages exotiques, les énigmes stimulantes et les personnages charismatiques font de cette dernière itération de la série Uncharted une expérience inoubliable.',7,8,40),(38,'2023-05-10','Hogwarts Legacy - Plongez dans une aventure magique extraordinaire','Hogwarts Legacy offre aux joueurs la possibilité de vivre une aventure magique extraordinaire dans l\'univers emblématique de Harry Potter. En tant qu\'étudiant à Poudlard, vous pourrez explorer les salles mystérieuses du château, apprendre des sorts puissants, interagir avec des personnages emblématiques et découvrir des secrets enfouis depuis longtemps. Avec des graphismes époustouflants et une immersion totale, Hogwarts Legacy promet une expérience de jeu fascinante et captivante pour les fans de la franchise. Préparez-vous à vous laisser ensorceler par ce titre magique.',7,8,38),(39,'2023-05-10','Clash Royale : Un jeu addictif mais avec des frustrations','Bien que Clash Royale ait réussi à captiver de nombreux joueurs, il présente également certains aspects qui peuvent être décevants. Le système de progression du jeu peut parfois sembler lent, nécessitant soit un investissement considérable en temps, soit des dépenses d\'argent réel pour progresser plus rapidement. Cela peut créer une sensation de déséquilibre entre les joueurs, favorisant ceux qui sont prêts à dépenser davantage. De plus, certaines stratégies dominantes peuvent rendre le jeu répétitif et prévisible, diminuant ainsi la diversité des expériences de jeu. En fin de compte, malgré son attrait initial, Clash Royale peut frustrer les joueurs qui recherchent une progression équitable et une variété de stratégies plus dynamiques.',2,9,30),(40,'2023-05-10','Une épopée épique et immersive','God of War est un chef-d\'œuvre qui plonge les joueurs dans une épopée épique et immersive. Avec des graphismes à couper le souffle, une histoire captivante et des combats d\'une intensité incroyable, le jeu repousse les limites de l\'action-aventure. Le nouvel aspect narratif et émotionnel ajouté à la série offre une profondeur inégalée, tandis que les énigmes stimulantes et les rencontres épiques avec des dieux et des créatures mythologiques rendent chaque instant mémorable. God of War est une véritable démonstration de l\'excellence du jeu vidéo et un incontournable pour tous les amateurs de jeux d\'action-aventure.',9,9,39),(41,'2023-05-10','Un pas arrière dans la francise','Malheureusement, Resident Evil 4 marque un pas en arrière dans la franchise qui avait réussi à captiver les joueurs avec ses précédents opus. Bien que le jeu ait introduit des éléments de gameplay innovants à l\'époque, tels que la caméra par-dessus l\'épaule, il a également abandonné certains aspects clés qui ont fait le charme des jeux précédents. L\'atmosphère effrayante et oppressante qui caractérisait les premiers jeux de la série a été diluée au profit d\'une approche plus axée sur l\'action. De plus, le scénario et les personnages ne parviennent pas à captiver autant que dans les titres antérieurs. Resident Evil 4 peut satisfaire les fans de jeux d\'action, mais il déçoit ceux qui recherchent l\'expérience classique de survival-horror offerte par les premiers jeux de la franchise.',4,9,41),(42,'2023-05-10','Black Ops 3 : Une expérience de tir futuriste intense','Black Ops 3 offre une expérience de tir futuriste intense, plongeant les joueurs dans un monde rempli de technologies avancées et de combats frénétiques. Les graphismes modernes et les mécaniques de jeu fluides contribuent à l\'immersion, tandis que le mode multijoueur compétitif et le mode zombies addictif ajoutent une grande variété de gameplay. Cependant, le scénario de la campagne solo peut sembler confus et la progression peut sembler un peu lente dans certains aspects. Malgré cela, Black Ops 3 reste un titre solide pour les fans de la série Call of Duty et les amateurs de jeux de tir futuristes.',8,9,34),(43,'2023-05-10','Black Ops 4 : Une évolution en demi-teinte de la franchise','Black Ops 4 propose une évolution intéressante de la franchise avec l\'introduction de nouveaux modes de jeu et la suppression de la campagne solo au profit d\'un mode Battle Royale, intitulé \"Blackout\". Les mécaniques de jeu restent solides, offrant des combats intenses et rapides, notamment dans le mode multijoueur classique. Cependant, la suppression de la campagne solo déçoit ceux qui appréciaient l\'expérience scénaristique de la franchise. De plus, le mode Blackout peut souffrir de problèmes d\'équilibrage et de stabilité, ce qui peut affecter l\'expérience de jeu globale. Malgré ses nouvelles idées, Black Ops 4 n\'a pas réussi à surpasser les attentes élevées des fans de la série et se positionne comme un épisode en demi-teinte.',7,9,35),(44,'2023-05-10','Black Ops 2 : Une réussite incontournable de la franchise','Black Ops 2 est un incontournable de la franchise Call of Duty, offrant une expérience de tir captivante et une histoire qui se déroule dans deux périodes temporelles différentes. Le scénario bien construit, combiné à des personnages mémorables, ajoute une profondeur significative à la campagne solo. Le mode multijoueur compétitif reste addictif et offre une variété de modes de jeu pour satisfaire tous les types de joueurs. De plus, le mode zombie propose des défis stimulants et une rejouabilité infinie. Bien que certains pourraient critiquer le manque d\'innovation en termes de mécaniques de jeu, Black Ops 2 reste un titre solide qui a su captiver les fans de la franchise grâce à son gameplay solide et à son immersion dans un univers militaire intense.',10,9,32);
/*!40000 ALTER TABLE `avis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jeux`
--

DROP TABLE IF EXISTS `jeux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jeux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `description` text DEFAULT NULL,
  `titre` varchar(45) NOT NULL,
  `vignette` varchar(125) NOT NULL,
  `plateforme` enum('PS','PC','XBOX','Mobile','autre') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jeux`
--

LOCK TABLES `jeux` WRITE;
/*!40000 ALTER TABLE `jeux` DISABLE KEYS */;
INSERT INTO `jeux` VALUES (28,'2023-05-10','Fortnite (Battle Royale) est un jeu de survie en ligne gratuit dans un style de dessin cartoonesque, où vous devez être le dernier à rester sur une île. Vous pouvez y jouer seul, à deux ou en équipe de quatre. Le jeu est très populaire auprès des enfants et est connu pour ses nombreuses emotes (danses) amusantes.','Fortnite','645b37c0a80de.jpg','XBOX'),(29,'2023-05-10','FIFA 23 est un jeu vidéo de simulation de football développé par EA Vancouver et édité par Electronic Arts. Il s\'agit du 30e volet de la série FIFA. Il est sorti sur Microsoft Windows, Nintendo Switch, PlayStation 4, PlayStation 5, Xbox One, Xbox Series et Google Stadia le 30 septembre 2022.','Fifa 23','645b37eaf169f.jpg','PC'),(30,'2023-05-11','Clash Royale est un jeu vidéo développé et édité par Supercell, sorti le 2 mars 2016 sur iOS et Android. Il s\'agit d\'un jeu se basant sur des duels multijoueurs temps réel et mêlant des éléments de tower defense et MOBA, avec un système de cartes à collectionner. Il est inspiré de l\'univers du jeu Clash of Clans.','Clash royale','645b3818aaf87.jpg','PC'),(31,'2023-05-10','Rocket League est un jeu vidéo développé et édité par Psyonix3. Il sort en juillet 2015 sur Windows et sur PlayStation 4, en février 2016 sur Xbox One, en septembre 2016 sur Linux et Mac et en novembre 2017 sur Nintendo Switch','Rocket league','645b3847efa5d.jpg','XBOX'),(32,'2023-05-10','Avec son intrique qui se déroule sur plusieurs générations, Call of Duty®: Black Ops 2 propulse le joueur dans un face à face décisif avec Raul Menendez, un terroriste déséquilibré qui s\'est emparé de l\'infrastructure militaire des États-Unis.','Call of Duty Black Ops II','645b3869444f0.jpg','PS'),(33,'2023-05-10','Tom Clancy\'s Rainbow Six Siege est un jeu vidéo de tir tactique développé par Ubisoft Montréal et édité par Ubisoft, sorti le 1ᵉʳ décembre 2015 sur PlayStation 4, Xbox One et Windows. Le jeu sort également sur Google Stadia le 30 juin 2021','Rainbow Six Siege','645b38aeec73e.jpg','XBOX'),(34,'2023-05-10','Call of Duty: Black Ops III est un jeu vidéo de tir à la première personne développé par le studio Treyarch édité par Activision, sorti le 6 novembre 2015 sur Microsoft Windows, Xbox One et PlayStation 4, PlayStation 3 et Xbox 360','Call Of Duty Black Ops III','645b3e0f2beb6.jpg','PS'),(35,'2023-05-10','Call of Duty: Black Ops III est un jeu vidéo de tir à la première personne développé par le studio Treyarch édité par Activision, sorti le 6 novembre 2015 sur Microsoft Windows, Xbox One et PlayStation 4, PlayStation 3 et Xbox 360','Call Of Duty Black Ops IIII','645b3e3854c47.jpg','autre'),(36,'2023-05-10','Grand Theft Auto V est un jeu vidéo d\'action-aventure, développé par Rockstar North et édité par Rockstar Games. Il est sorti en 2013 sur PlayStation 3 et Xbox 360, en 2014 sur PlayStation 4 et Xbox One, en 2015 sur PC puis en 2022 sur PlayStation 5 et Xbox Series.','GTA V','645b3e80c3d47.jpg','PS'),(38,'2023-05-10','Hogwarts Legacy : L\'Héritage de Poudlard est un jeu vidéo de rôle développé par Avalanche Software et édité par Warner Bros. Interactive Entertainment en collaboration avec Portkey Games. ','Hogwarts Legacy','645b3f501a1d9.jpg','PS'),(39,'2023-05-10','God of War Ragnarök est un jeu vidéo d\'action-aventure développé par SIE Santa Monica Studio et édité par Sony Interactive Entertainment, sorti le 9 novembre 2022 sur PlayStation 4 et PlayStation 5.','God of war','645b3f9631e7b.jpg','XBOX'),(40,'2023-05-11','Uncharted 4: A Thief\'s End est un jeu vidéo d\'action-aventure développé par Naughty Dog et édité par Sony. Il s\'agit du quatrième opus de la série de jeux vidéo Uncharted.','Uncharted 4: A Thief\'s End','645b3fdf33721.jpg','autre'),(41,'2023-05-10','Resident Evil 4, sorti au Japon sous le nom Biohazard 4, est un jeu vidéo de tir à la troisième personne de type survival horror, développé par Capcom Production Studio 4 et édité par l\'entreprise japonaise Capcom.','Resident Evil 4','645b4008a5f9b.jpg','XBOX');
/*!40000 ALTER TABLE `jeux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jeux_has_types`
--

DROP TABLE IF EXISTS `jeux_has_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jeux_has_types` (
  `jeux_id` int(11) NOT NULL,
  `types_id` int(11) NOT NULL,
  KEY `jeux_has_types_FK` (`jeux_id`),
  KEY `jeux_has_types_FK_1` (`types_id`),
  CONSTRAINT `jeux_has_types_FK` FOREIGN KEY (`jeux_id`) REFERENCES `jeux` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jeux_has_types_FK_1` FOREIGN KEY (`types_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jeux_has_types`
--

LOCK TABLES `jeux_has_types` WRITE;
/*!40000 ALTER TABLE `jeux_has_types` DISABLE KEYS */;
INSERT INTO `jeux_has_types` VALUES (28,1),(28,2),(29,3),(31,2),(31,3),(32,1),(32,2),(33,1),(33,3),(34,1),(34,4),(34,7),(35,1),(35,4),(35,7),(36,1),(36,2),(36,3),(36,4),(38,3),(38,4),(38,5),(38,7),(39,1),(39,4),(40,4),(40,5),(41,4),(41,3),(41,2),(30,6),(30,7),(40,7);
/*!40000 ALTER TABLE `jeux_has_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'RPG'),(2,'FPS'),(3,'MMO'),(4,'Action'),(5,'Aventure'),(6,'Strategie'),(7,'Combat');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(125) DEFAULT NULL,
  `est_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (5,'ShareGamesAdmin','$2y$10$7fypXgole8L6qDZ8xNDeneWsOt1MWRdzL50MnpH6bFaJ9nNdA7Hri','ShareGamesAdmin.png',1),(8,'username','$2y$10$FhTrocMPf9bLd.3c2a3Ow.QyAjoEtLiBXJZCJGGChy2DVFwWSdF.O','',0),(9,'user2','$2y$10$HToD900aVG4mEECx7YNw2uJzczyR8oSdBxNAf7Pmlho.KYr0NtuOy','user2.png',0);
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_shareGames'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-17  7:38:49
