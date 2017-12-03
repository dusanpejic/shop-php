DELETE FROM product;
DELETE FROM brand;
INSERT INTO brand (id, name) VALUES (1, 'HTC'), (2, 'Alcatel'), (3, 'Asus'), (4, 'Blackberry');
INSERT INTO product (id, name, price, brand_id, image) VALUES
    (1, 'One M9 +', '100', 1, 'media/model/htc_one_m9+.jpg'),
    (2, 'A3 XL', '200', 2, 'media/model/alcatel-a3-xl.jpg'),
    (3, 'Zenfone Pegasus 3', '400', 3, 'media/model/asus-zenfone-pegasus-3.jpg'),
    (4, 'Aurora', '700', 4, 'media/model/blackberry-aurora.jpg'),
    (5, 'Keyone', '470', 4, 'media/model/blackberry-keyone.jpg');
