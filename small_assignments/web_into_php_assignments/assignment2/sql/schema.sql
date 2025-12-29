-- Create pizza_delivery table
CREATE TABLE IF NOT EXISTS pizza_delivery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    address  VARCHAR(200) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    delivery_type VARCHAR(50) NOT NULL,
    textbox TEXT NOT NULL,
    pizza_size VARCHAR(255) DEFAULT NULL,
    pizza_sauce VARCHAR(255) DEFAULT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);