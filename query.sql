CREATE TABLE product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price INT NOT NULL,
    day INT NOT NULL
);

INSERT INTO product VALUES (DEFAULT, 'Charger', 100000, 3);
INSERT INTO product VALUES (DEFAULT, 'Headphones', 150000, 5);
INSERT INTO product VALUES (DEFAULT, 'Bluetooth Speaker', 250000, 7);
INSERT INTO product VALUES (DEFAULT, 'Smartphone Case', 75000, 2);
INSERT INTO product VALUES (DEFAULT, 'USB Cable', 30000, 1);
INSERT INTO product VALUES (DEFAULT, 'Power Bank', 200000, 4);
INSERT INTO product VALUES (DEFAULT, 'Wireless Mouse', 120000, 3);
INSERT INTO product VALUES (DEFAULT, 'Laptop Stand', 180000, 6);
INSERT INTO product VALUES (DEFAULT, 'Webcam', 300000, 8);
INSERT INTO product VALUES (DEFAULT, 'HDMI Cable', 50000, 2);

CREATE TABLE order_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_number VARCHAR(255) NOT NULL,
    customer_ref VARCHAR(255) NOT NULL,
    order_date DATE NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price INT NOT NULL,
    discount DECIMAL(5, 2) NOT NULL,
    subtotal DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
