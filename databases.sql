CREATE DATABASE dej_24;

CREATE TABLE foods
(
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    price DOUBLE NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE orders
(
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    city VARCHAR(50) NOT NULL,
    address VARCHAR(255) NOT NULL,
    food_id INT(11) NOT NULL,
    FOREIGN KEY (food_id) REFERENCES foods (id),
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)