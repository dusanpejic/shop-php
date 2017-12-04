DROP TABLE IF EXISTS product;
DROP TABLE IF EXISTS brand;
DROP TABLE IF EXISTS cart_item;
DROP TABLE IF EXISTS cart;
DROP TABLE IF EXISTS order_item;
DROP TABLE IF EXISTS `order`;


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
  image_large varchar(255) not null,
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

CREATE TABLE `order` (
  id int auto_increment primary key,
  first_name varchar(50) not null,
  last_name varchar(50) not null,
  email varchar(50) not null,
  street varchar(50) not null,
  city varchar(50) not null,
  zipcode varchar(50) not null,
  order_date int not null,
  status varchar(50)
);

CREATE TABLE order_item (
  id int auto_increment primary key,
  order_id int not null,
  product_id int not null,
  quantity int not null,
  price decimal (6,2) not null,
  constraint FOREIGN KEY(order_id) REFERENCES `order`(`id`),
  constraint FOREIGN KEY(product_id) REFERENCES `product`(`id`)
);
