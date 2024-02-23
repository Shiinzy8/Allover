CREATE TABLE cars (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    model VARCHAR(32)
);

CREATE TABLE auctions (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    car_id INT(11) NOT NULL,
    active INT(1) UNSIGNED NOT NULL,
    type ENUM('24h', 'instant'),
    FOREIGN KEY (car_id) REFERENCES cars (id) ON DELETE CASCADE
);

INSERT INTO cars (id, model) VALUES
(1, "Ford Econovan 2012"),
(2, "BMW X3 2.5 2011"),
(3, "Mercedes B-Klasse 170 2011"),
(4, "Porsche Panamera 4s 2009"),
(5, "Mercedes Citan 112 2017"),
(6, "Volkswagen Golf VII 1.4 2013"),
(7, "Volkswagen Passat 1.6 1997"),
(8, "HONDA CR-V 2.0 2003"),
(9, "Mazda RX-7 1996"),
(10, "Land Rover Discovery 3.5 2008")
;

INSERT INTO auctions (car_id, type, active) VALUES
(1,'instant',1),(1,'instant',0),(2,'instant',0),(1,'instant',1),(1,'instant',0),(3,'instant',0),(5,'instant',0),(6,'instant',0),(3,'instant',0),(10,'instant',0),(8,'instant',0),(3,'instant',0),(2,'instant',0),(3,'instant',0),(1,'instant',1),(4,'instant',0),(1,'instant',1),(6,'instant',1),
(1,'24h',1),(1,'24h',1),(3,'24h',1),(1,'24h',1),(2,'24h',1),(5,'24h',1),(4,'24h',1),(6,'24h',1),(1,'24h',1),(9,'24h',1),(10,'24h',1),(1,'24h',1),(9,'24h',1),(1,'24h',0),(9,'24h',0),(7,'24h',0),(5,'24h',1),(4,'24h',1),(6,'24h',1),(1,'24h',1),(9,'24h',1),(10,'24h',1),(1,'24h',1),(9,'24h',1),(1,'24h',0),(9,'24h',0),(7,'24h',0),(9,'24h',0),(4,'24h',0),(9,'24h',0),(5,'24h',0),(9,'24h',0),(4,'24h',0),(9,'24h',0),(5,'24h',0),(9,'24h',0),(3,'24h',0),(5,'24h',0),(1,'24h',1)
;

-- Please write query to return all cars with more than 3 active auctions of type '24h'

SELECT cars.id, cars.model FROM cars
    LEFT JOIN auctions ON cars.id = auctions.car_id AND auctions.active = 1 AND auctions.type = '24h'
    GROUP BY cars.id, cars.model
    HAVING COUNT(auctions.active) >= 3;