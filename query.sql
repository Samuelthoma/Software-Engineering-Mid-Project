CREATE TABLE product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price INT NOT NULL
);

INSERT INTO product VALUES (DEFAULT, 'Charger', 100000);
INSERT INTO product VALUES (DEFAULT, 'Headphones', 150000);
INSERT INTO product VALUES (DEFAULT, 'Bluetooth Speaker', 250000);
INSERT INTO product VALUES (DEFAULT, 'Smartphone Case', 75000);
INSERT INTO product VALUES (DEFAULT, 'USB Cable', 30000);
INSERT INTO product VALUES (DEFAULT, 'Power Bank', 200000);
INSERT INTO product VALUES (DEFAULT, 'Wireless Mouse', 120000);
INSERT INTO product VALUES (DEFAULT, 'Laptop Stand', 180000);
INSERT INTO product VALUES (DEFAULT, 'Webcam', 300000);
INSERT INTO product VALUES (DEFAULT, 'HDMI Cable', 50000);

CREATE TABLE materials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    material_name VARCHAR(255) NOT NULL,
    days INT NOT NULL
);

INSERT INTO materials (material_name, days) VALUES 
('Cable', 2),
('Bolt', 1),
('Cap', 3),
('Screw', 2),
('Nut', 1),
('Washer', 1),
('Pipe', 5),
('Connector', 3),
('Bracket', 4),
('Sealant', 2),
('Adhesive', 1),
('Insulation', 3),
('Joint', 2),
('Gasket', 3),
('Fastener', 2),
('Stud', 1),
('Clamp', 2),
('Tape', 1),
('Filter', 4),
('Relay', 3);
