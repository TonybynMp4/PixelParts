CREATE DATABASE `serveur-web`;

USE `serveur-web`;

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
  `rate` TINYINT(1) NOT NULL DEFAULT 0 COMMENT 'L\'avis sur le produit, de 1 à 5',
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
INSERT INTO `brand` (`name`) VALUES ('Asus'), ('Acer'), ('HP'), ('Dell'), ('Apple'), ('Samsung'), ('Sony'), ('Lenovo'), ('MSI'), ('Toshiba');

COMMIT;

START TRANSACTION;
/*
    Pixel Parts, vente de matériel informatique
*/
INSERT INTO `category` (`name`, `subtitle`, `picture`, `show_home`) VALUES
('AM4', 'Socket AM4', 'assets/images/categories/am4.jpg', 1), ('Intel 1851', 'Socket Intel 1851', 'assets/images/categories/intel1851.jpg', 1), ('Intel 1200', 'Socket Intel 1200', NULL, 1),
('DDR4', 'Mémoire DDR4', 'assets/images/categories/ddr4.jpg', 1), ('DDR5', 'Mémoire DDR5', 'assets/images/categories/ddr5.jpg', 1),
('SATA', 'Disque Dur SATA', 'assets/images/categories/sata.jpg', 1), ('SSD', 'Disque Dur SSD', 'assets/images/categories/ssd.jpg', 1), ('M.2', 'Disque Dur M.2', 'assets/images/categories/m2.jpg', 1),
('4090', 'Carte Graphique 4090', 'assets/images/categories/4090.jpg', 1), ('4080', 'Carte Graphique 4080', 'assets/images/categories/4080.jpg', 1), ('3070', 'Carte Graphique 3070', 'assets/images/categories/3070.jpg', 1),
('AMD', 'Processeur AMD', 'assets/images/categories/amd.jpg', 1), ('Intel', 'Processeur Intel', 'assets/images/categories/intel.jpg', 1), ('Watercooling', 'Watercooling', 'assets/images/categories/watercooling.jpg', 1);
INSERT INTO `type` (`name`) VALUES ('Carte Graphique'), ('Processeur'), ('Carte Mère'), ('Mémoire'), ('Disque Dur'), ('SSD'), ('Alimentation'), ('Boitier'), ('Ventirad'), ('Watercooling');

COMMIT;


-- -----------------------------------------------------
-- Data for table `product`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `product` (`name`, `description`, `picture`, `price`, `rate`, `status`, `brand_id`, `category_id`, `type_id`) VALUES
('Ryzen 9 5950X', 'Processeur AMD Ryzen 9 5950X', 'assets/images/products/ryzen95950x.jpg', 799.99, 5, 1, 1, 12, 2),
('Ryzen 9 5900X', 'Processeur AMD Ryzen 9 5900X', 'assets/images/products/ryzen95900x.jpg', 699.99, 5, 1, 1, 12, 2),
('Ryzen 7 5800X', 'Processeur AMD Ryzen 7 5800X', 'assets/images/products/ryzen75800x.jpg', 499.99, 5, 1, 1, 12, 2),
('Ryzen 5 5600X', 'Processeur AMD Ryzen 5 5600X', 'assets/images/products/ryzen55600x.jpg', 299.99, 5, 1, 1, 12, 2),
('Core i9-11900K', 'Processeur Intel Core i9-11900K', 'assets/images/products/corei911900k.jpg', 599.99, 5, 1, 2, 12, 2),
('Core i7-11700K', 'Processeur Intel Core i7-11700K', 'assets/images/products/corei711700k.jpg', 399.99, 5, 1, 2, 12, 2),
('Core i5-11600K', 'Processeur Intel Core i5-11600K', 'assets/images/products/corei511600k.jpg', 299.99, 5, 1, 2, 12, 2),
('Core i3-11400', 'Processeur Intel Core i3-11400', 'assets/images/products/corei311400.jpg', 199.99, 5, 1, 2, 12, 2),
('RTX 4090', 'Carte Graphique RTX 4090', 'assets/images/products/rtx4090.jpg', 1999.99, 5, 1, 1, 10, 1),
('RTX 4080', 'Carte Graphique RTX 4080', 'assets/images/products/rtx4080.jpg', 1499.99, 5, 1, 1, 9, 1),
('RTX 3070', 'Carte Graphique RTX 3070', 'assets/images/products/rtx3070.jpg', 699.99, 5, 1, 1, 11, 1),
('DDR4 16Go', 'Mémoire DDR4 16Go', 'assets/images/products/ddr416go.jpg', 79.99, 5, 1, 1, 4, 4),
('DDR4 32Go', 'Mémoire DDR4 32Go', 'assets/images/products/ddr432go.jpg', 149.99, 5, 1, 1, 4, 4),
('DDR5 16Go', 'Mémoire DDR5 16Go', 'assets/images/products/ddr516go.jpg', 99.99, 5, 1, 1, 5, 4),
('DDR5 32Go', 'Mémoire DDR5 32Go', 'assets/images/products/ddr532go.jpg', 199.99, 5, 1, 1, 5, 4),
('SATA 1To', 'Disque Dur SATA 1To', 'assets/images/products/sata1to.jpg', 49.99, 5, 1, 1, 6, 5),
('SATA 2To', 'Disque Dur SATA 2To', 'assets/images/products/sata2to.jpg', 79.99, 5, 1, 1, 6, 5),
('SSD 500Go', 'Disque Dur SSD 500Go', 'assets/images/products/ssd500go.jpg', 59.99, 5, 1, 1, 7, 6),
('SSD 1To', 'Disque Dur SSD 1To', 'assets/images/products/ssd1to.jpg', 99.99, 5, 1, 1, 7, 6),
('M.2 500Go', 'Disque Dur M.2 500Go', 'assets/images/products/m2500go.jpg', 69.99, 5, 1, 1, 8, 6),
('M.2 1To', 'Disque Dur M.2 1To', 'assets/images/products/m21to.jpg', 119.99, 5, 1, 1, 8, 6);
COMMIT;
