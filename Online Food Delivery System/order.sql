CREATE DATABASE food_delivery;
CREATE TABLE food_delivery.orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    payment VARCHAR(50) NOT NULL,
    card_number VARCHAR(20),
    expiry_date VARCHAR(10),
    cvv VARCHAR(4),
    order_items TEXT NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
