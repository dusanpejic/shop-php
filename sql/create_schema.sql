DROP TABLE IF EXISTS product;
DROP TABLE IF EXISTS brand;

CREATE TABLE brand (
  id int auto_increment primary key,
  name varchar(50) not null
);

CREATE TABLE product (
  id int auto_increment primary key,
  name varchar(50) not null,
  price decimal(6,2) not null,
  brand_id int not null,
  constraint FOREIGN KEY (brand_id) REFERENCES `brand` (`id`)
);
