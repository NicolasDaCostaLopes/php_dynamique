CREATE table if not exists users(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR (200) NOT NULL,
    role VARCHAR(100) NOT NULL
);

CREATE table if not exists products(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    photo TEXT,
    price INT NOT NULL CHECK (price>0),
    quantity INT NOT NULL CHECK (quantity>0),
    user_id INT,
    is_flagged TINYINT(1) DEFAULT 0,
    FOREIGN KEY (user_id) 
        REFERENCES users (id)
        ON DELETE CASCADE
);

CREATE TABLE if not exists cart(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    is_active TINYINT(1) DEFAULT 1,
    user_id INT,
    FOREIGN KEY (user_id) 
        REFERENCES users (id)
        ON DELETE CASCADE
);

CREATE TABLE if not exists cart_products(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    cart_id INT,
    product_id INT,
    FOREIGN KEY (cart_id) REFERENCES cart (id),
    FOREIGN KEY (product_id) REFERENCES products (id)
);
