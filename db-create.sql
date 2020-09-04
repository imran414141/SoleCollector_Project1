CREATE DATABASE sole_collector;

use sole_collector;

CREATE TABLE Shoes (
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	brand VARCHAR(30) NOT NULL,
	colour VARCHAR(50) NOT NULL,
	size VARCHAR(30),
    	date TIMESTAMP
);