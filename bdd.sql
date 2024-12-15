CREATE DATABASE `pixelparts`;

USE `pixelparts`;

DROP TABLE IF EXISTS `brand` ;

CREATE TABLE IF NOT EXISTS `brand` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL COMMENT 'Le nom de la marque',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date de création de la marque',
  `updated_at` TIMESTAMP NULL COMMENT 'La date de la dernière mise à jour de la marque',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


DROP TABLE IF EXISTS `category` ;

CREATE TABLE IF NOT EXISTS `category` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) NOT NULL COMMENT 'Le nom de la catégorie',
  `subtitle` VARCHAR(64) NULL,
  `picture` VARCHAR(128) NULL COMMENT 'L\'URL de l\'image de la catégorie (utilisée en home, par exemple)',
  `show_home` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '(0=pas affichée en home)',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date de création de la catégorie',
  `updated_at` TIMESTAMP NULL COMMENT 'La date de la dernière mise à jour de la catégorie',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


DROP TABLE IF EXISTS `type` ;

CREATE TABLE IF NOT EXISTS `type` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) NOT NULL COMMENT 'Le nom du type',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date de création de la catégorie',
  `updated_at` TIMESTAMP NULL COMMENT 'La date de la dernière mise à jour de la catégorie',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


DROP TABLE IF EXISTS `product` ;

CREATE TABLE IF NOT EXISTS `product` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL COMMENT 'Le nom du produit',
  `description` TEXT NULL COMMENT 'La description du produit',
  `picture` VARCHAR(128) NULL COMMENT 'L\'URL de l\'image du produit',
  `price` DECIMAL(10,2) NOT NULL DEFAULT 0 COMMENT 'Le prix du produit',
  `rate` DECIMAL(2,1) NOT NULL DEFAULT 0 COMMENT 'L\'avis sur le produit, de 1 à 5',
  `status` TINYINT(1) NOT NULL DEFAULT 0 COMMENT 'Le statut du produit (0=non renseignée, 1=dispo, 2=pas dispo)',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date de création du produit',
  `updated_at` TIMESTAMP NULL COMMENT 'La date de la dernière mise à jour du produit',
  `brand_id` INT UNSIGNED NOT NULL,
  `category_id` INT UNSIGNED NULL,
  `type_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_product_brand_idx` (`brand_id` ASC),
  INDEX `fk_product_category1_idx` (`category_id` ASC),
  INDEX `fk_product_type1_idx` (`type_id` ASC)
) ENGINE = InnoDB;

START TRANSACTION;
INSERT INTO `brand` (`name`) VALUES ('AMD'), ('Intel'), ('Asus'), ('Acer'), ('HP'), ('Dell'), ('Apple'), ('Samsung'), ('Sony'), ('Lenovo'), ('MSI'), ('Toshiba');

COMMIT;

/*
    Pixel Parts, vente de matériel informatique
*/
INSERT INTO `type` (`name`) VALUES
('AM4'), ('Intel 1851'), ('Intel 1200'),
('DDR4'), ('DDR5'),
('SATA'), ('SSD'), ('M.2'),
('4090'), ('4060'), ('4070 Ti Super'),
('AMD'), ('Intel'), ('Watercooling');

INSERT INTO `category` (`name`, `subtitle`, `picture`, `show_home`) VALUES
('Carte Graphique', 'Les meilleures cartes graphiques', 'carte-graphique.jpg', 1),
('Processeur', 'Les meilleurs processeurs', 'processeur.jpg', 1),
('Carte Mère', 'Les meilleures cartes mères', 'carte-mere.jpg', 1),
('Mémoire', 'Les meilleures mémoires', 'memoire.jpg', 1),
('Disque Dur', 'Les meilleurs disques durs', 'disque-dur.jpg', 1),
('SSD', 'Les meilleurs SSD', 'ssd.jpg', 1),
('Alimentation', 'Les meilleures alimentations', 'alimentation.jpg', 1),
('Boitier', 'Les meilleurs boitiers', 'boitier.jpg', 1),
('Ventirad', 'Les meilleurs ventirads', 'ventirad.jpg', 1),
('Watercooling', 'Les meilleurs watercooling', 'watercooling.jpg', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `product`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `product` (`name`, `description`, `picture`, `price`, `rate`, `status`, `brand_id`, `category_id`, `type_id`) VALUES
('Ryzen 9 5950X', 'Processeur AMD Ryzen 9 5950X', 'r9_5950x.jpg', 799.99, 4.5, 1, 1, 2, 2),
('Ryzen 9 5900X', 'Processeur AMD Ryzen 9 5900X', 'r9_5900x.jpg', 699.99, 4.3, 1, 1, 2, 2),
('Ryzen 7 5800X', 'Processeur AMD Ryzen 7 5800X', 'r7_5800x.jpg', 499.99, 4.2, 1, 1, 2, 2),
('Ryzen 5 5600X', 'Processeur AMD Ryzen 5 5600X', 'r5_5600x.jpg', 299.99, 4.0, 1, 1, 2, 2),
('Core i9-14900KS', 'Processeur Intel Core i9-14900KS', 'i9_14900ks.jpg', 599.99, 4.7, 1, 2, 2, 2),
('Core i7-14700', 'Processeur Intel Core i7-14700', 'i7_14700.jpg', 399.99, 4.5, 1, 2, 2, 2),
('Core i5-14600K', 'Processeur Intel Core i5-14600K', 'i5_14600k.jpg', 299.99, 4.3, 1, 2, 2, 2),
('Core i3-10100', 'Processeur Intel Core i3-10100', 'i3_10100.jpg', 199.99, 4.1, 1, 2, 2, 2),
('RTX 4090', 'Carte Graphique RTX 4090', 'rtx4090.jpg', 1999.99, 4.8, 1, 1, 1, 1),
('Gigabyte GeForce RTX 4060 WINDFORCE OC', 'Carte Graphique RTX 4060 de la marque Gigabyte', 'rtx4060_windforce_oc.jpg', 329.99, 4.6, 1, 1, 1, 1),
('RTX 4070 Ti SUPER', 'Carte Graphique RTX 4070 Ti SUPER de la marque MSI ', 'msi_4070tisuper.jpg', 1129.99, 4.7, 1, 1, 1, 1),
('DDR4 16Go', 'Mémoire DDR4 16Go', 'ddr416go.jpg', 79.99, 4.5, 1, 1, 4, 4),
('DDR4 32Go', 'Mémoire DDR4 32Go', 'ddr432go.jpg', 149.99, 4.6, 1, 1, 4, 4),
('DDR5 16Go', 'Mémoire DDR5 16Go', 'ddr516go.jpg', 99.99, 4.7, 1, 1, 4, 4),
('DDR5 32Go', 'Mémoire DDR5 32Go', 'ddr532go.jpg', 199.99, 4.8, 1, 1, 4, 4),
('SATA 1To', 'Disque Dur SATA 1To', 'sata1to.jpg', 49.99, 4.2, 1, 1, 5, 5),
('SATA 2To', 'Disque Dur SATA 2To', 'sata2to.jpg', 79.99, 4.3, 1, 1, 5, 5),
('SSD 500Go', 'Disque Dur SSD 500Go', 'ssd500go.jpg', 59.99, 4.5, 1, 1, 6, 6),
('SSD 1To', 'Disque Dur SSD 1To', 'ssd1to.jpg', 99.99, 4.6, 1, 1, 6, 6),
('M.2 500Go', 'Disque Dur M.2 500Go', 'm2500go.jpg', 69.99, 4.7, 1, 1, 6, 6),
('M.2 1To', 'Disque Dur M.2 1To', 'm21to.jpg', 119.99, 4.8, 1, 1, 6, 6);
COMMIT;

DROP USER IF EXISTS 'pixelparts'@'localhost';

CREATE USER 'pixelparts'@'localhost' IDENTIFIED BY 'test';
GRANT ALL PRIVILEGES ON pixelparts.* TO 'pixelparts'@'localhost';