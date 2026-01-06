-- Maak database aan
CREATE DATABASE IF NOT EXISTS user_system CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE user_system;

-- Drop bestaande tabellen (voor testen)
DROP TABLE IF EXISTS passwords;
DROP TABLE IF EXISTS users;

-- Users tabel met twee SQL users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP NULL,
    is_active BOOLEAN DEFAULT TRUE
);

-- Passwords tabel voor wachtwoorden opslaan
CREATE TABLE passwords (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    service_name VARCHAR(100) NOT NULL,
    username VARCHAR(100),
    encrypted_password TEXT NOT NULL,
    url VARCHAR(255),
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_user_id (user_id)
);

-- Maak Admin user aan (wachtwoord: Admin123!)
INSERT INTO users (username, email, password_hash, role) VALUES 
('admin', 'admin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

-- Maak gewone User aan (wachtwoord: User123!)
INSERT INTO users (username, email, password_hash, role) VALUES 
('testuser', 'user@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user');

-- Database commando's die beschikbaar zijn:
-- SELECT - Admin en User kunnen lezen
-- INSERT - Admin en User kunnen toevoegen (eigen data)
-- UPDATE - Admin kan alles, User kan eigen data
-- DELETE - Admin kan alles, User kan eigen data
-- DROP - Alleen Admin

-- Laat zien wat er is aangemaakt
SELECT 'Users aangemaakt:' as Status;
SELECT id, username, email, role, created_at FROM users;

SELECT 'Database setup voltooid!' as Status;
