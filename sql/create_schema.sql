DROP TABLE IF EXISTS product;
DROP TABLE IF EXISTS brand;
DROP TABLE IF EXISTS cart_item;
DROP TABLE IF EXISTS cart;


CREATE TABLE brand (
  id int auto_increment primary key,
  name varchar(50) not null
);

CREATE TABLE product (
  id int auto_increment primary key,
  name varchar(50) not null,
  price decimal(6,2) not null,
  brand_id int not null,
  image varchar(255) not null, 
  constraint FOREIGN KEY (brand_id) REFERENCES `brand` (`id`)
);

CREATE TABLE cart (
  id int auto_increment primary key,
  session_id varchar(255) not null unique
);

CREATE TABLE cart_item (
  id int auto_increment primary key,
  cart_id int not null,
  product_id int not null,
  quantity int not null,
  constraint FOREIGN KEY(cart_id) REFERENCES `cart`(`id`),
  constraint FOREIGN KEY(product_id) REFERENCES `product`(`id`)
);
