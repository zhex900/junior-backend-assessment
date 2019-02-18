CREATE DATABASE mindarc_assessment;
USE mindarc_assessment;

CREATE TABLE IF NOT EXISTS original_data (
    product_id INT AUTO_INCREMENT,
    product_code VARCHAR(50) NOT NULL,
    product_label VARCHAR(255) NOT NULL,
    gender VARCHAR(255),
    PRIMARY KEY (product_id)
)  ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS migrated_data (
    product_id INT AUTO_INCREMENT,
    sku VARCHAR(50) NOT NULL,
    name VARCHAR(255) NOT NULL,
    image_url VARCHAR(255),
    PRIMARY KEY (product_id)
)  ENGINE=INNODB;