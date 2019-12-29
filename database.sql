CREATE TABLE customer(
    customer_id INT(11) NOT NULL AUTO_INCREMENT,
    customer_name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    PRIMARY KEY(customer_id)
);

CREATE TABLE sales_order(
    sales_order_id INT(11) NOT NULL AUTO_INCREMENT,
    customer_id INT(11) NOT NULL,
    order_date DATE NOT NULL,
    order_amount INT(11) NOT NULL,
    PRIMARY KEY(sales_order_id),
    FOREIGN KEY(customer_id) REFERENCES customer(customer_id)
);

CREATE TABLE product(
    product_id INT(11) NOT NULL AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    product_category_id SMALLINT(6) NOT NULL,
    list_price INT(11) NOT NULL,
    stock INT(11) NOT NULL,
    PRIMARY KEY(product_id)
);

CREATE TABLE sales_order_detail(
    sales_order_detail_id INT(11) NOT NULL AUTO_INCREMENT,
    sales_order_id INT(11) NOT NULL,
    product_id INT(11) NOT NULL,
    order_qty SMALLINT(6) NOT NULL,
    unit_price INT(11) NOT NULL,
    PRIMARY KEY(sales_order_detail_id),
    FOREIGN KEY(sales_order_id) REFERENCES sales_order(sales_order_id),
    FOREIGN KEY(product_id) REFERENCES product(product_id)
);

CREATE TABLE pengguna(
    username VARCHAR(30) NOT NULL,
    password VARCHAR(50) NOT NULL,
    PRIMARY KEY(username)
);