DELETE FROM product;
DELETE FROM brand;
INSERT INTO brand (id, name) VALUES (1, 'HTC'), (2, 'Alcatel'), (3, 'Asus'), (4, 'Blackberry'), (5, 'Apple'), (6, 'Huawei'), (7, 'Sony'), (8,'Samsung'), (9, 'ZTE');
INSERT INTO product (id, name, price, brand_id, image, image_large) VALUES
    (1, 'One M9 +', '100', 1, 'media/model/htc_one_m9+.jpg', 'media/product_detail/htc-one-m9-plus-1.jpg'),
    (2, 'A3 XL', '200', 2, 'media/model/alcatel-a3-xl.jpg', 'media/product_detail/alcatel-a3-xl.jpg'),
    (3, 'Zenfone Pegasus 3', '400', 3, 'media/model/asus-zenfone-pegasus-3.jpg', 'media/product_detail/asus-zenfone-pegasus-3-1.jpg'),
    (4, 'Aurora', '700', 4, 'media/model/blackberry-aurora.jpg', 'media/product_detail/blackberry-aurora1.jpg'),
    (5, 'Keyone', '470', 4, 'media/model/blackberry-keyone.jpg', 'media/product_detail/blackberry-keyone-mercury-2.jpg'),
    (6, 'P10 lite', '130', 6, 'media/model/huawei_p10_lite.jpg', 'media/product_detail/huawei-p10-lite0.jpg'),
    (7, 'Mate 9 Pro', '200', 6, 'media/model/huawei-mate-9-pro.jpg', 'media/product_detail/huawei-mate9-pro-2-1.jpg'),
    (8, 'Mate 10 Pro', '500', 6, 'media/model/huawei-mate10-pro.jpg', 'media/product_detail/huawei-mate10-pro-1.jpg'),
    (9, 'Xperia M5', '250', 7, 'media/model/sony_xperia_m5.jpg', 'media/product_detail/sony-xperia-m5-3.jpg'),
    (10, 'Xperia V', '320', 7, 'media/model/sony_xperia_v.jpg', 'media/product_detail/sony-xperia-v.jpg'),
    (11, 'Xperia XA', '500', 7, 'media/model/sony_xperia_xa.jpg', 'media/product_detail/sony-xperia-xa-2.jpg'),
    (12, 'Xperia XA1 Ultra', '780', 7, 'media/model/sony_xperia_xa1_ultra_2017.jpg', 'media/product_detail/sony-xperia-xa1-ultra-2017-2.jpg'),
    (13, 'Xperia XZ Premium', '800', 7, 'media/model/sony_xperia_xz_premium_2017.jpg', 'media/product_detail/sony-xperia-xz-premium-2017-0.jpg.jpg'),
    (14, 'Xperia Z3', '400', 7, 'media/model/sony_xperia_z3.jpg', 'media/product_detail/sony-xperia-z3-01.jpg.jpg'),
    (15, 'Axon 7', '100', 9, 'media/model/zte-axon-7.jpg', 'media/product_detail/zte-axon-7-1.jpg');
