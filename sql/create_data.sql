DELETE FROM product;
DELETE FROM brand;
INSERT INTO brand (id, name) VALUES (1, 'HTC'), (2, 'Alcatel'), (3, 'Asus');
INSERT INTO product (id, name, price, brand_id) VALUES
    (1, 'U11', '100', 1),
    (2, 'Pixi', '200', 2),
    (3, 'Idol', '400', 2);
