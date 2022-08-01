CREATE TABLE `userdetails` (
    `customer_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `username` VARCHAR(20) UNIQUE NOT NULL,
    `password` VARCHAR(25) NOT NULL,
    `contact` VARCHAR(11) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`customer_id`)
);

CREATE TABLE `cardetails` (
    `car_id` INT NOT NULL AUTO_INCREMENT,
    `brand_name` VARCHAR(100) NOT NULL,
    `model_name` VARCHAR(100) NOT NULL,
    `manufacturer_year` VARCHAR(4) NOT NULL,
    PRIMARY KEY (`car_id`)
);