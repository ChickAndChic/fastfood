-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 18 Mars 2015 à 17:18
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `fastfood`
--

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
`IDCATEGORIE` int(2) NOT NULL,
  `LIBELLECAT` char(255) DEFAULT NULL,
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Categorie`
--

INSERT INTO `Categorie` (`IDCATEGORIE`, `LIBELLECAT`, `image`) VALUES
(1, 'Boisson', ''),
(2, 'Accompagnement', ''),
(3, 'Hamburger', ''),
(4, 'Dessert', ''),
(5, 'Salade', '');

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE `Commande` (
`IDCOMMANDE` int(2) NOT NULL,
  `HEURERECUP` time DEFAULT NULL,
  `ETATCOMMANDE` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `CommandeMenu`
--

CREATE TABLE `CommandeMenu` (
  `IDCOMMANDE` int(2) NOT NULL,
  `IDMENU` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `CommandeProdHorsMenu`
--

CREATE TABLE `CommandeProdHorsMenu` (
  `IDCOMMANDE` int(2) NOT NULL,
  `IdProduit` int(2) NOT NULL,
  `quantiteprod` bigint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Compose`
--

CREATE TABLE `Compose` (
`IdProduit` int(2) NOT NULL,
  `LibelleProd` char(32) NOT NULL,
  `PrixUnitProduit` decimal(10,2) NOT NULL,
  `TypeUnit` char(32) NOT NULL,
  `SeuilPrep` int(2) NOT NULL,
  `TpsConso` time NOT NULL,
  `Image` longblob
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Compose`
--

INSERT INTO `Compose` (`IdProduit`, `LibelleProd`, `PrixUnitProduit`, `TypeUnit`, `SeuilPrep`, `TpsConso`, `Image`) VALUES
(3, 'Big Krac', 4.50, '', 4, '01:00:00', NULL),
(11, 'Fish', 4.00, '', 2, '00:30:00', NULL),
(12, 'Cheese', 4.50, '', 4, '00:30:00', NULL),
(13, 'Farmer', 4.50, '', 3, '00:30:00', NULL),
(14, 'Salade de Fruits', 2.50, '', 3, '10:00:00', NULL),
(18, 'César', 4.50, '', 2, '01:00:00', NULL),
(19, 'Campagnarde', 5.00, '', 1, '02:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Contient`
--

CREATE TABLE `Contient` (
  `IdProduit` int(2) NOT NULL,
  `IdIngredient` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Defini`
--

CREATE TABLE `Defini` (
  `IDMENU` int(2) NOT NULL,
  `IdResto` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `DemandeReappro`
--

CREATE TABLE `DemandeReappro` (
  `IdResto` int(2) NOT NULL,
  `IdProduit` int(2) NOT NULL,
  `IdIngredient` int(2) NOT NULL,
  `quantitereappro` bigint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Formule`
--

CREATE TABLE `Formule` (
  `IDCATEGORIE` int(2) NOT NULL,
  `IDMENU` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Formule`
--

INSERT INTO `Formule` (`IDCATEGORIE`, `IDMENU`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(1, 4),
(5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `Ingredient`
--

CREATE TABLE `Ingredient` (
`IdIngredient` int(2) NOT NULL,
  `LibelleIngr` char(255) NOT NULL,
  `SeuilStock` int(2) NOT NULL,
  `Stock` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Ingredient`
--

INSERT INTO `Ingredient` (`IdIngredient`, `LibelleIngr`, `SeuilStock`, `Stock`) VALUES
(1, 'Pain', 100, 66),
(2, 'Tomate', 30, 46),
(3, 'Steak Haché', 60, 78),
(4, 'Cheddar', 50, 70),
(5, 'Bacon', 49, 66),
(6, 'Salade', 15, 35),
(7, 'Tomate cerise', 45, 78),
(8, 'Oignon', 20, 30);

-- --------------------------------------------------------

--
-- Structure de la table `Manager`
--

CREATE TABLE `Manager` (
`idManager` int(2) NOT NULL,
  `IdResto` int(2) NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Menu`
--

CREATE TABLE `Menu` (
`IDMENU` int(2) NOT NULL,
  `LIBELLEMENU` char(255) DEFAULT NULL,
  `PRIXUNITMENU` decimal(4,2) NOT NULL,
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Menu`
--

INSERT INTO `Menu` (`IDMENU`, `LIBELLEMENU`, `PRIXUNITMENU`, `image`) VALUES
(1, 'Berk Of', 7.00, 'img/menu1.jpg'),
(2, 'Maxi Berk Of', 8.00, 'img/menu1.jpg'),
(4, 'Vegetarien', 6.00, 'saladeceaser.png');

-- --------------------------------------------------------

--
-- Structure de la table `Preparation`
--

CREATE TABLE `Preparation` (
`Idprep` int(2) NOT NULL,
  `IdProduit` int(2) NOT NULL,
  `HeureDebut` time NOT NULL,
  `HeureDispo` time NOT NULL,
  `Dispo` tinyint(1) NOT NULL,
  `HeureFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ProdAuxChoixDansMenu`
--

CREATE TABLE `ProdAuxChoixDansMenu` (
  `IDMENU` int(2) NOT NULL,
  `IdProduit` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Produit`
--

CREATE TABLE `Produit` (
`IdProduit` int(2) NOT NULL,
  `IDCATEGORIE` int(2) NOT NULL,
  `LibelleProd` char(32) NOT NULL,
  `PrixUnitProduit` decimal(10,2) NOT NULL,
  `TypeUnit` char(32) NOT NULL,
  `SeuilPrep` int(2) NOT NULL,
  `TpsConso` time NOT NULL,
  `Image` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Produit`
--

INSERT INTO `Produit` (`IdProduit`, `IDCATEGORIE`, `LibelleProd`, `PrixUnitProduit`, `TypeUnit`, `SeuilPrep`, `TpsConso`, `Image`) VALUES
(1, 1, 'Coca-Cola', 2.50, 'ml', 0, '00:30:00', 'img/coca.jpg'),
(2, 2, 'Petite Frite', 3.00, 'g', 6, '00:30:00', 'img/frite.jpg'),
(3, 3, 'Big Krac', 4.50, '', 4, '01:00:00', 'img/bigkrac.jpg'),
(4, 1, 'Coca-Cola light', 2.50, 'ml', 0, '00:30:00', 'img/cocal.jpg'),
(5, 1, 'Coca-Cola zero', 2.50, 'ml', 0, '00:30:00', 'img/cocaz.jpg'),
(6, 1, 'Jus d''orange', 2.50, 'ml', 0, '00:30:00', 'img/orange.jpg'),
(7, 1, 'Perrier', 2.50, 'ml', 0, '00:30:00', 'img/per.png'),
(8, 2, 'Moyenne Frite', 4.00, 'g', 6, '00:30:00', 'img/frite.jpg'),
(9, 2, 'Grande Frite', 5.00, 'g', 5, '00:30:00', 'img/frite.jpg'),
(10, 2, 'Salade Verte', 3.50, 'g', 0, '00:30:00', 'img/salade.jpg'),
(11, 3, 'Fish', 4.00, '', 2, '00:30:00', 'img/fish.jpg'),
(12, 3, 'Cheese', 4.50, '', 4, '00:30:00', 'img/Cheese.jpg'),
(13, 3, 'Farmer', 4.50, '', 3, '00:30:00', 'img/Farmer.jpg'),
(14, 4, 'Salade de Fruits', 2.50, '', 3, '10:00:00', 'img/fruit.png'),
(15, 4, 'Glace Chocolat', 3.00, '', 0, '00:05:00', 'img/cho.jpg'),
(16, 4, 'Glace Vanille', 3.00, '', 0, '00:05:00', 'img/van.jpg'),
(17, 4, 'Brownie', 3.50, '', 5, '15:00:00', 'img/brow.png'),
(18, 5, 'César', 4.50, '', 2, '01:00:00', 'img/saladecesar.jpg'),
(19, 5, 'Campagnarde', 5.00, '', 1, '02:00:00', 'img/saladecampagnarde.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Restaurant`
--

CREATE TABLE `Restaurant` (
`IdResto` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Restaurant`
--

INSERT INTO `Restaurant` (`IdResto`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `Simple`
--

CREATE TABLE `Simple` (
`IdProduit` int(2) NOT NULL,
  `SeuilStock` int(2) NOT NULL,
  `Stock` int(2) NOT NULL,
  `LibelleProd` char(32) NOT NULL,
  `PrixUnitProduit` decimal(10,2) NOT NULL,
  `TypeUnit` char(32) NOT NULL,
  `SeuilPrep` int(2) NOT NULL,
  `TpsConso` time NOT NULL,
  `Image` longblob
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Simple`
--

INSERT INTO `Simple` (`IdProduit`, `SeuilStock`, `Stock`, `LibelleProd`, `PrixUnitProduit`, `TypeUnit`, `SeuilPrep`, `TpsConso`, `Image`) VALUES
(1, 30, 47, 'Coca-Cola', 2.50, 'ml', 0, '00:30:00', NULL),
(2, 0, 0, 'Petite Frite', 3.00, 'g', 6, '00:30:00', NULL),
(4, 30, 46, 'Coca-Cola light', 2.50, 'ml', 0, '00:30:00', NULL),
(5, 30, 47, 'Coca-Cola zero', 2.50, 'ml', 0, '00:30:00', NULL),
(6, 39, 65, 'Jus d''orange', 2.50, 'ml', 0, '00:30:00', NULL),
(7, 20, 35, 'Perrier', 2.50, 'ml', 0, '00:30:00', NULL),
(8, 0, 0, 'Moyenne Frite', 4.00, 'g', 6, '00:30:00', NULL),
(9, 68, 145, 'Grande Frite', 5.00, 'g', 5, '00:30:00', NULL),
(10, 34, 56, 'Salade Verte', 3.50, 'g', 0, '00:30:00', NULL),
(15, 37, 56, 'Glace Chocolat', 3.00, '', 0, '00:05:00', NULL),
(16, 36, 45, 'Glace Vanille', 3.00, '', 0, '00:05:00', NULL),
(17, 35, 45, 'Brownie', 3.50, '', 5, '15:00:00', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
 ADD PRIMARY KEY (`IDCATEGORIE`);

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
 ADD PRIMARY KEY (`IDCOMMANDE`);

--
-- Index pour la table `CommandeMenu`
--
ALTER TABLE `CommandeMenu`
 ADD PRIMARY KEY (`IDCOMMANDE`,`IDMENU`), ADD KEY `FK_CommandeMenu_Menu` (`IDMENU`);

--
-- Index pour la table `CommandeProdHorsMenu`
--
ALTER TABLE `CommandeProdHorsMenu`
 ADD PRIMARY KEY (`IDCOMMANDE`,`IdProduit`), ADD KEY `FK_CommandeProdHorsMenu_Produit` (`IdProduit`);

--
-- Index pour la table `Compose`
--
ALTER TABLE `Compose`
 ADD PRIMARY KEY (`IdProduit`);

--
-- Index pour la table `Contient`
--
ALTER TABLE `Contient`
 ADD PRIMARY KEY (`IdProduit`,`IdIngredient`), ADD KEY `FK_contient_Ingredient` (`IdIngredient`);

--
-- Index pour la table `Defini`
--
ALTER TABLE `Defini`
 ADD PRIMARY KEY (`IDMENU`,`IdResto`), ADD KEY `FK_defini_restaurant` (`IdResto`);

--
-- Index pour la table `DemandeReappro`
--
ALTER TABLE `DemandeReappro`
 ADD PRIMARY KEY (`IdResto`,`IdProduit`,`IdIngredient`), ADD KEY `FK_DemandeReappro_Simple` (`IdProduit`), ADD KEY `FK_DemandeReappro_Ingredient` (`IdIngredient`);

--
-- Index pour la table `Formule`
--
ALTER TABLE `Formule`
 ADD PRIMARY KEY (`IDCATEGORIE`,`IDMENU`), ADD KEY `FK_Formule_Menu` (`IDMENU`);

--
-- Index pour la table `Ingredient`
--
ALTER TABLE `Ingredient`
 ADD PRIMARY KEY (`IdIngredient`);

--
-- Index pour la table `Manager`
--
ALTER TABLE `Manager`
 ADD PRIMARY KEY (`idManager`), ADD KEY `Restaurant` (`IdResto`);

--
-- Index pour la table `Menu`
--
ALTER TABLE `Menu`
 ADD PRIMARY KEY (`IDMENU`);

--
-- Index pour la table `Preparation`
--
ALTER TABLE `Preparation`
 ADD PRIMARY KEY (`Idprep`), ADD KEY `FK_Preparation_Produit` (`IdProduit`);

--
-- Index pour la table `ProdAuxChoixDansMenu`
--
ALTER TABLE `ProdAuxChoixDansMenu`
 ADD PRIMARY KEY (`IDMENU`,`IdProduit`), ADD KEY `FK_ProdAuxChoixDansMenu_Produit` (`IdProduit`);

--
-- Index pour la table `Produit`
--
ALTER TABLE `Produit`
 ADD PRIMARY KEY (`IdProduit`), ADD KEY `FK_Produit_Categorie` (`IDCATEGORIE`);

--
-- Index pour la table `Restaurant`
--
ALTER TABLE `Restaurant`
 ADD PRIMARY KEY (`IdResto`);

--
-- Index pour la table `Simple`
--
ALTER TABLE `Simple`
 ADD PRIMARY KEY (`IdProduit`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Categorie`
--
ALTER TABLE `Categorie`
MODIFY `IDCATEGORIE` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Commande`
--
ALTER TABLE `Commande`
MODIFY `IDCOMMANDE` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Compose`
--
ALTER TABLE `Compose`
MODIFY `IdProduit` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `Ingredient`
--
ALTER TABLE `Ingredient`
MODIFY `IdIngredient` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `Manager`
--
ALTER TABLE `Manager`
MODIFY `idManager` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Menu`
--
ALTER TABLE `Menu`
MODIFY `IDMENU` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Preparation`
--
ALTER TABLE `Preparation`
MODIFY `Idprep` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Produit`
--
ALTER TABLE `Produit`
MODIFY `IdProduit` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `Restaurant`
--
ALTER TABLE `Restaurant`
MODIFY `IdResto` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Simple`
--
ALTER TABLE `Simple`
MODIFY `IdProduit` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `CommandeMenu`
--
ALTER TABLE `CommandeMenu`
ADD CONSTRAINT `commandemenu_ibfk_1` FOREIGN KEY (`IDCOMMANDE`) REFERENCES `Commande` (`IDCOMMANDE`),
ADD CONSTRAINT `commandemenu_ibfk_2` FOREIGN KEY (`IDMENU`) REFERENCES `Menu` (`IDMENU`);

--
-- Contraintes pour la table `CommandeProdHorsMenu`
--
ALTER TABLE `CommandeProdHorsMenu`
ADD CONSTRAINT `commandeprodhorsmenu_ibfk_1` FOREIGN KEY (`IDCOMMANDE`) REFERENCES `Commande` (`IDCOMMANDE`),
ADD CONSTRAINT `commandeprodhorsmenu_ibfk_2` FOREIGN KEY (`IdProduit`) REFERENCES `Produit` (`IdProduit`);

--
-- Contraintes pour la table `Compose`
--
ALTER TABLE `Compose`
ADD CONSTRAINT `compose_ibfk_1` FOREIGN KEY (`IdProduit`) REFERENCES `Produit` (`IdProduit`);

--
-- Contraintes pour la table `Contient`
--
ALTER TABLE `Contient`
ADD CONSTRAINT `contient_ibfk_1` FOREIGN KEY (`IdProduit`) REFERENCES `Compose` (`IdProduit`),
ADD CONSTRAINT `contient_ibfk_2` FOREIGN KEY (`IdIngredient`) REFERENCES `Ingredient` (`IdIngredient`);

--
-- Contraintes pour la table `Defini`
--
ALTER TABLE `Defini`
ADD CONSTRAINT `defini_ibfk_1` FOREIGN KEY (`IDMENU`) REFERENCES `Menu` (`IDMENU`),
ADD CONSTRAINT `defini_ibfk_2` FOREIGN KEY (`IdResto`) REFERENCES `restaurant` (`IdResto`);

--
-- Contraintes pour la table `DemandeReappro`
--
ALTER TABLE `DemandeReappro`
ADD CONSTRAINT `demandereappro_ibfk_1` FOREIGN KEY (`IdResto`) REFERENCES `restaurant` (`IdResto`),
ADD CONSTRAINT `demandereappro_ibfk_2` FOREIGN KEY (`IdProduit`) REFERENCES `Simple` (`IdProduit`),
ADD CONSTRAINT `demandereappro_ibfk_3` FOREIGN KEY (`IdIngredient`) REFERENCES `Ingredient` (`IdIngredient`);

--
-- Contraintes pour la table `Formule`
--
ALTER TABLE `Formule`
ADD CONSTRAINT `formule_ibfk_1` FOREIGN KEY (`IDCATEGORIE`) REFERENCES `Categorie` (`IDCATEGORIE`),
ADD CONSTRAINT `formule_ibfk_2` FOREIGN KEY (`IDMENU`) REFERENCES `Menu` (`IDMENU`);

--
-- Contraintes pour la table `Preparation`
--
ALTER TABLE `Preparation`
ADD CONSTRAINT `preparation_ibfk_1` FOREIGN KEY (`IdProduit`) REFERENCES `Produit` (`IdProduit`);

--
-- Contraintes pour la table `ProdAuxChoixDansMenu`
--
ALTER TABLE `ProdAuxChoixDansMenu`
ADD CONSTRAINT `prodauxchoixdansmenu_ibfk_1` FOREIGN KEY (`IDMENU`) REFERENCES `Menu` (`IDMENU`),
ADD CONSTRAINT `prodauxchoixdansmenu_ibfk_2` FOREIGN KEY (`IdProduit`) REFERENCES `Produit` (`IdProduit`);

--
-- Contraintes pour la table `Produit`
--
ALTER TABLE `Produit`
ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`IDCATEGORIE`) REFERENCES `Categorie` (`IDCATEGORIE`);

--
-- Contraintes pour la table `Simple`
--
ALTER TABLE `Simple`
ADD CONSTRAINT `simple_ibfk_1` FOREIGN KEY (`IdProduit`) REFERENCES `Produit` (`IdProduit`);
