-- Criação do banco de dados users_system
CREATE DATABASE IF NOT EXISTS users_system;

-- Use o banco de dados users_system
USE users_system;

-- Criação da tabela users
CREATE TABLE IF NOT EXISTS users (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `RG` varchar(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_index` (`username`),
  UNIQUE KEY `CPF_index` (`CPF`),
  UNIQUE KEY `RG_index` (`RG`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Criação da tabela users_addresses
CREATE TABLE IF NOT EXISTS users_addresses (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `CEP` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CEP_unique` (`CEP`),
  KEY `user_owns_address` (`user_id`),
  CONSTRAINT `user_owns_address` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
