-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 09 sep. 2021 à 22:20
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `enseignement`
--
CREATE DATABASE IF NOT EXISTS `enseignement` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `enseignement`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
                         `id` int(11) NOT NULL,
                         `login` varchar(100) NOT NULL,
                         `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
    (1, 'admin', '$2y$10$W.HRKHeRf7q48.Mefpj8bOJ..wm0aZGwVeErX5RbTgHSrjGI9gQWO');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
                              `id` int(11) NOT NULL,
                              `name` varchar(100) DEFAULT NULL,
                              `description` varchar(255) DEFAULT NULL,
                              `site` varchar(100) DEFAULT NULL,
                              `ecole` varchar(255) DEFAULT NULL,
                              `degree` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `site`, `ecole`, `degree`) VALUES
                                                                                      (1, 'Infographie', 'Section infographie pour découvrir l\'univers de l\'infographie', 'https://www.epse.be', 'EPSE', 1),
                                                                                      (3, 'Musique', 'Section de l\'enseignement destinée à apprendre la musique', 'https://www.ursulines-mons.be', 'Ursulines de Mons', 2),
                                                                                      (4, 'Webmaster', 'Section de l \'enseignement destinée à apprendre le développement web', 'https://www.epse.be', 'EPSE', 3),
                                                                                      (5, 'Infirmière', 'Section de l\'enseignement destinée à apprendre le métier d\'infirmière', 'https://www.epse.be', 'Ursulines de Mons', 2),
                                                                                      (6, 'Cuisine', 'Cuisine de plats variés', 'http://www.cuisine.be', 'Ecole de Cuisine', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;