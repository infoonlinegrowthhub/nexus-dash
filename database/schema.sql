-- =========================================================
-- NexusDash Database Schema
-- Engineered by: Online Growth Hub (https://onlinegrowthhub.in | +91 9032666855)
-- =========================================================

CREATE DATABASE IF NOT EXISTS `nexus_dash` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `nexus_dash`;

-- 1. Users Table
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(150) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `role` VARCHAR(50) DEFAULT 'admin',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Default Admin User: admin@onlinegrowthhub.in / admin123
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Online Growth Hub Admin', 'admin@onlinegrowthhub.in', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'super_admin')
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`);

-- 2. Sample Business Records / Projects Table
CREATE TABLE IF NOT EXISTS `records` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(200) NOT NULL,
    `client_name` VARCHAR(120) NOT NULL,
    `client_phone` VARCHAR(30) DEFAULT NULL,
    `category` VARCHAR(80) DEFAULT 'Web Development',
    `budget` DECIMAL(10,2) DEFAULT 0.00,
    `status` ENUM('active', 'completed', 'pending', 'cancelled') DEFAULT 'active',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Sample Records for Immediate Demonstration
INSERT INTO `records` (`title`, `client_name`, `client_phone`, `category`, `budget`, `status`) VALUES
('E-commerce Multi-Vendor Portal', 'Rahul Sharma', '+91 9876543210', 'Web Application', 45000.00, 'active'),
('Doctor Appointment & Telehealth App', 'Dr. Priya Mehta', '+91 9123456789', 'Custom Software', 60000.00, 'completed'),
('School Management & Fee ERP', 'DPS Academy', '+91 9988776655', 'Enterprise ERP', 85000.00, 'active'),
('Real Estate Lead CRM & WhatsApp Bot', 'Apex Realty Group', '+91 9871122334', 'CRM & Automation', 35000.00, 'pending'),
('Hostinger Automated Cloud Deployment', 'TechSpark Labs', '+91 9011223344', 'DevOps & Cloud', 25000.00, 'completed');

