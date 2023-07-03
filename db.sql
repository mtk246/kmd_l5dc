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
    id VARCHAR(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    location VARCHAR(100),
    description TEXT,
    image TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

-- Features table
CREATE TABLE IF NOT EXISTS features (
    id VARCHAR(100) NOT NULL,
    camping_site_id VARCHAR(100) NOT NULL,
    feature_name VARCHAR(100),
    PRIMARY KEY (id)
);

-- Local attractions table
CREATE TABLE IF NOT EXISTS local_attractions (
    id VARCHAR(100) NOT NULL,
    camping_site_id VARCHAR(100) NOT NULL,
    attraction_name VARCHAR(100),
    PRIMARY KEY (id)
);

-- Reviews table
CREATE TABLE IF NOT EXISTS reviews (
    id VARCHAR(100) NOT NULL,
    camping_site_id VARCHAR(100) NOT NULL,
    user_id VARCHAR(100) NOT NULL,
    rating INT(11),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

-- Contacts table
CREATE TABLE IF NOT EXISTS contacts (
    id VARCHAR(100) NOT NULL,
    camping_site_id VARCHAR(100) NOT NULL,
    contact_name VARCHAR(100),
    contact_email VARCHAR(100),
    contact_phone VARCHAR(20),
    PRIMARY KEY (id)
);

-- Booking information table
CREATE TABLE IF NOT EXISTS bookings (
    id VARCHAR(100) NOT NULL,
    camping_site_id VARCHAR(100) NOT NULL,
    user_id VARCHAR(100) NOT NULL,
    start_date TEXT NOT NULL,
    end_date TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

-- RSS news feed table
CREATE TABLE IF NOT EXISTS rss_feed (
    id VARCHAR(100) NOT NULL,
    title VARCHAR(100),
    description TEXT,
    published_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

-- Visit Counter Table
CREATE TABLE IF NOT EXISTS visit_counter (
    id INT(11) NOT NULL AUTO_INCREMENT,
    ip_address VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

-- INSERT DUMMY DATA
INSERT IGNORE INTO users (id, username, password, name, role) VALUES
    ('1', 'admin', 'admin', 'Admin', 'admin');
