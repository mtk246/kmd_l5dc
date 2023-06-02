CREATE DATABASE IF NOT EXISTS mtk_camping;

USE mtk_camping;

-- Users table
CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    name VARCHAR(100),
    role VARCHAR(100),
    remark VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

-- Camping sites table
CREATE TABLE IF NOT EXISTS camping_sites (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    location VARCHAR(100),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

-- Features table
CREATE TABLE IF NOT EXISTS features (
    id INT(11) NOT NULL AUTO_INCREMENT,
    camping_site_id INT(11) NOT NULL,
    feature_name VARCHAR(100),
    PRIMARY KEY (id),
    FOREIGN KEY (camping_site_id) REFERENCES camping_sites(id) ON DELETE CASCADE
);

-- Local attractions table
CREATE TABLE IF NOT EXISTS local_attractions (
    id INT(11) NOT NULL AUTO_INCREMENT,
    camping_site_id INT(11) NOT NULL,
    attraction_name VARCHAR(100),
    PRIMARY KEY (id),
    FOREIGN KEY (camping_site_id) REFERENCES camping_sites(id) ON DELETE CASCADE
);

-- Reviews table
CREATE TABLE IF NOT EXISTS reviews (
    id INT(11) NOT NULL AUTO_INCREMENT,
    camping_site_id INT(11) NOT NULL,
    user_id INT(11) NOT NULL,
    rating INT(11),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (camping_site_id) REFERENCES camping_sites(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Contacts table
CREATE TABLE IF NOT EXISTS contacts (
    id INT(11) NOT NULL AUTO_INCREMENT,
    camping_site_id INT(11) NOT NULL,
    contact_name VARCHAR(100),
    contact_email VARCHAR(100),
    contact_phone VARCHAR(20),
    PRIMARY KEY (id),
    FOREIGN KEY (camping_site_id) REFERENCES camping_sites(id) ON DELETE CASCADE
);

-- Booking information table
CREATE TABLE IF NOT EXISTS bookings (
    id INT(11) NOT NULL AUTO_INCREMENT,
    camping_site_id INT(11) NOT NULL,
    user_id INT(11) NOT NULL,
    start_date DATE,
    end_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (camping_site_id) REFERENCES camping_sites(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- RSS news feed table
CREATE TABLE IF NOT EXISTS rss_feed (
    id INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR(100),
    description TEXT,
    published_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

-- INSERT DUMMY DATA
INSERT IGNORE INTO users (username, password, name, role) VALUES
    ('admin', 'admin', 'Admin', 'admin');
