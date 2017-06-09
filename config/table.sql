DROP TABLE IF EXISTS user;
CREATE TABLE user (
   user_id          INT(11)         UNSIGNED    NOT NULL    AUTO_INCREMENT
  ,user_first_name  VARCHAR(100)                NOT NULL
  ,user_last_name   VARCHAR(100)                NOT NULL
  ,user_password    VARCHAR(255)                NOT NULL
  ,email            VARCHAR(255)                NOT NULL
  ,address          VARCHAR(255)
  ,suburb           VARCHAR(50)
  ,state            VARCHAR(50)
  ,zipcode          CHAR(4) 
  ,PRIMARY KEY (user_id)
  ,UNIQUE (email)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO user (user_first_name, user_last_name, user_password, email) VALUES ('JISEONG','OH','1234','4887@ait.nsw.edu.au');


DROP TABLE IF EXISTS product;
CREATE TABLE category (
   category_id          INT(11)         UNSIGNED    NOT NULL    AUTO_INCREMENT
  ,category_name        VARCHAR(100)
  ,sort_order           INT(3)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

DROP TABLE IF EXISTS product;
CREATE TABLE product (
   product_id           INT(11)         UNSIGNED    NOT NULL    AUTO_INCREMENT
  ,category_id          INT(11)                     NOT NULL
  ,product_name         VARCHAR(255)                NOT NULL
  ,status               VARCHAR(10)   -- ??
  ,brand                VARCHAR(100)
  ,color                VARCHAR(100)
  ,weight               VARCHAR(50)
  ,price                DECIMAL(12,2)               NOT NULL
  ,sale_price           DECIMAL(12,2)
  ,stock                INT(11)                     NOT NULL
  ,image1               VARCHAR(255)
  ,image2               VARCHAR(255)
  ,image3               VARCHAR(255)
  ,image4               VARCHAR(255)
  ,sale_yn              CHAR(1)         DEFAULT 'N'
  ,offer_yn             CHAR(1)         DEFAULT 'N'
  ,sold_count           INT(11)         DEFAULT 0
  ,show_yn              CHAR(1)         DEFAULT 'Y'
  ,short_description    TEXT
  ,description          TEXT
  ,date_created         DATETIME
  ,date_modified        DATETIME
  ,PRIMARY KEY (product_id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;



INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  1, 'MOVING VIBRATING ALARM CLOCK', '', '', '', '194 g', 14.99, 0, 20, 'moving-vibrating-alarm-clock-1.jpg', 'moving-vibrating-alarm-clock-2.jpg', '', '', 'short description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  1, 'MAGNETIC POLAFRAMES', '', '', '', '130 g', 9.99, 0, 20, 'polaroid-fridge-magnets_1.jpg', 'polaroid-fridge-magnets_2.jpg', 'polaroid-fridge-magnets_3.jpg', 'polaroid-fridge-magnets_4.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  1, 'SMARTER IKETTLE 2.0', '', '', '', '1500 g', 99.99, 0, 15, 'smarter-ikettle-2.0_1.jpg', 'smarter-ikettle-2.0_2.jpg', 'smarter-ikettle-2.0_3.jpg', 'smarter-ikettle-2.0_4.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  1, 'SMARTER COFFEE (BLACK)', '', '', 'black', '6000 g', 179.99, 169.99, 30, 'smarter-coffee-machine_1.jpg', 'smarter-coffee-machine_2.jpg', 'smarter-coffee-machine_3.jpg', 'smarter-coffee-machine_4.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  1, 'CARDBOARD SMARTPHONE PROJECTOR', '', '', '', '330 g', 16.99, 13.99, 40, 'smartphone-projector_1.jpg', 'smartphone-projector_2.jpg', 'smartphone-projector_3.jpg', 'smartphone-projector_4.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  1, 'DIGITAL COIN COUNTING MONEY BOX', '', '', '', '208 g', 7.99, 0, 80, 'coin-counting-jar_1.jpg', 'coin-counting-jar_2.jpg', '', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  2, 'RECHARGEABLE BOTTLE LIGHT', '', '', '', '10 g', 9.99, 0, 50, 'rechargeable-bottle-light_1.jpg', 'rechargeable-bottle-light_2.jpg', 'rechargeable-bottle-light_3.jpg', 'rechargeable-bottle-light_4.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  2, 'CINEMA LIGHT BOX', '', '', '', '', 14.99, 0, 50, 'cinema-light-box_1.jpg', 'cinema-light-box_2.jpg', 'cinema-light-box_3.jpg', 'cinema-light-box_4.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  2, 'TETRIS LIGHT', '', '', '', '', 29.99, 0, 50, 'tetris-light_1.jpg', 'tetris-light_2.jpg', '', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  2, 'SCRABBLE TILE LIGHTS', '', '', '', '', 19.99, 0, 0, 'scrabble-light-set_1.jpg', 'scrabble-light-set_2.jpg', 'scrabble-light-set_3.jpg', 'scrabble-light-set_4.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  2, 'ORION FLOOR LAMP', '', '', '', '900 g', 66.99, 39.99, 200, 'unusual-floor-lamps_1.jpg', 'unusual-floor-lamps_2.jpg', 'unusual-floor-lamps_3.jpg', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  2, 'NOVA LAVA LAMP (RED)', '', '', 'red', '', 24.99 , 0, 50, 'retro-lava-lamp-red_1.jpg', 'retro-lava-lamp-red_2.jpg', '', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  2, 'TEDDY BEAR LAMP', '', '', '', '740 g', 89.99, 0, 0, 'teddy-bear-lamp_1.jpg', 'teddy-bear-lamp_2.jpg', 'teddy-bear-lamp_3.jpg', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  2, 'TINY TIM CLIP ON BOOK LIGHT', '', 'brand', 'black', '88 g', 7.99, 5.99, 200, 'clip-on-booklight_1.jpg', 'clip-on-booklight_2.jpg', 'clip-on-booklight_3.jpg', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  2, 'DEATH STAR MOOD LIGHT', '', 'brand', 'color', 'weight', 19.99, 17.99, 200, 'death-star-mood-light_1.jpg', 'death-star-mood-light_2.jpg', '', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  2, 'PAC-MAN GHOST LAMP', '', 'brand', 'color', 'weight', 29.99, 25.99, 200, 'pac-man-lamp_1.jpg', 'pac-man-lamp_2.jpg', 'pac-man-lamp_3.jpg', 'pac-man-lamp_4.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  4, 'COLIDO 3D PRINTING PEN', '', '', '', '67 g', 79.99, 69.99, 10, '3d-pen_1.jpg', '3d-pen_2.jpg', '3d-pen_3.jpg', '3d-pen_4.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  4, 'Walnut Speakers by Grovemade x Joey Roth', '', 'grovemade.com', '', '1.75 lbs', 599, 0, 10, 'Walnut-Speakers-by-Grovemade-x-Joey-Roth_1.jpg', 'Walnut-Speakers-by-Grovemade-x-Joey-Roth_2.jpg', 'Walnut-Speakers-by-Grovemade-x-Joey-Roth_3.jpg', 'Walnut-Speakers-by-Grovemade-x-Joey-Roth_4.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  3, 'TURBO CHARGER', '', '', '', '', 8.99, 5.99, 40, 'turbo-charger-01.jpg', 'turbo-charger-02.jpg', 'turbo-charger-03.jpg', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  3, 'Ginkgo Solar Tree – Eco-friendly Solar Charger', '', '', '', '', 141, 0, 50, 'Ginkgo-Solar-Tree-01.jpg', 'Ginkgo-Solar-Tree-02.jpg', 'Ginkgo-Solar-Tree-03.jpg', 'Ginkgo-Solar-Tree-04.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  6, 'MONITOR REAR-VIEW MIRROR', '', '', '', '', 6.99, 0, 50, 'MIRR-2287__10216.1426537372.1280.1280.jpg', '', '', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  5, 'Pick Up the Cent Bank', '', '', '', '', 39.99 , 0, 50, 'PickUptheCentBank-01.jpg', 'PickUptheCentBank-02.jpg', 'PickUptheCentBank-03.jpg', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  4, 'KOSMOS – The World’s Best Pen In 2016', '', '', 'Star Silver', '', 50, 0, 50, 'KOSMOS_1.jpg', 'KOSMOS_2.jpg', 'KOSMOS_3.jpg', 'KOSMOS_4.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  4, 'The Desk Tile – Cable Management Tool', '', '', 'Classic Mirror Chrome', '', 29, 0, 50, 'The-Desk-Tile-01.jpg', 'The-Desk-Tile-02.jpg', 'The-Desk-Tile-03.jpg', 'The-Desk-Tile-04.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  5, 'SALT WATER ENGINE CAR KIT', '', '', '', '', 14.99, 0, 0, 'salt-water-car-engine-kit-01.jpg', 'salt-water-car-engine-kit-02.jpg', 'salt-water-car-engine-kit-03.jpg', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  6, 'Self Stirring Mug ', '', '', '', '', 49.99, 0, 50, 'selfStirringMug.jpg', '', '', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  3, 'Romoss – The Powerful Charger Station for Sharing Batteries', '', '', '', '', 169, 0, 50, 'Romoss-01.jpg', 'Romoss-02.jpg', 'Romoss-03.jpg', 'Romoss-04.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  3, 'XVIDA Will Keep Your Smartphone Charged Anywhere!', '', '', '', '', 40, 0, 50, 'XVIDA-01.jpg', 'XVIDA-02.jpg', 'XVIDA-03.jpg', 'XVIDA-04.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  5, 'Darkside Ollie', '', '', '', '', 129.99, 0, 50, 'iprj_darkside_ollie_al2-01.jpg', 'iprj_darkside_ollie_al2-02.jpg', 'iprj_darkside_ollie_al2-03.jpg', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  4, 'PocketScan Wireless Scanner by Dacuda', '', 'Dacuda', 'Black', '', 149, 0, 10, 'PocketScan-Wireless-Scanner-by-Dacuda-01.jpg', 'PocketScan-Wireless-Scanner-by-Dacuda-02.jpg', 'PocketScan-Wireless-Scanner-by-Dacuda-03.jpg', 'PocketScan-Wireless-Scanner-by-Dacuda-04.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  4, 'Hand-Crafted Bolt Action Steampunk Pen', '', '', '', '', 79.99, 0, 20, 'HandCrafted-Bolt-Action-Steampunk-Pen-01.jpg', 'HandCrafted-Bolt-Action-Steampunk-Pen-02.jpg', 'HandCrafted-Bolt-Action-Steampunk-Pen-03.jpg', 'HandCrafted-Bolt-Action-Steampunk-Pen-04.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  6, 'USB Universal E-mail/Webmail/IM Notifier', '', '', '', '', 10.70, 9.16, 50, 'sku_27062_01.jpg', 'sku_27062_02.jpg', '', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  3, 'Bento 4-Port USB Charger by emie', '', '', '', '', 42.05, 0, 50, 'Bento-4Port-USB-Charger-by-emie-01.jpg', 'Bento-4Port-USB-Charger-by-emie-02.jpg', 'Bento-4Port-USB-Charger-by-emie-03.jpg', 'Bento-4Port-USB-Charger-by-emie-04.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  3, 'HUDWAY Glass – Keep Your Eyes On the Road', '', '', '', '', 49, 0, 50, 'HUDWAY-Glass-----Keep-Your-Eyes-On-the-Road-01.jpg', 'HUDWAY-Glass-----Keep-Your-Eyes-On-the-Road-02.jpg', 'HUDWAY-Glass-----Keep-Your-Eyes-On-the-Road-03.jpg', 'HUDWAY-Glass-----Keep-Your-Eyes-On-the-Road-04.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  3, 'Qi Wireless Charging Solid Wooden Pad by Wasserstein', '', '', '', '', 17.49, 0, 50, 'Qi-Wireless-Charging-Solid-Wooden-Pad-by-Wasserstein-01.jpg', 'Qi-Wireless-Charging-Solid-Wooden-Pad-by-Wasserstein-02.jpg', 'Qi-Wireless-Charging-Solid-Wooden-Pad-by-Wasserstein-03.jpg', 'Qi-Wireless-Charging-Solid-Wooden-Pad-by-Wasserstein-04.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  4, 'Portiko – Power Within Reach By Bluelounge', '', '', 'Blue,', '', 21.48, 0, 50, 'Portico-By-Bluelounge-01.jpg', 'Portico-By-Bluelounge-02.jpg', 'Portico-By-Bluelounge-03.jpg', 'Portico-By-Bluelounge-04.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  4, 'Logitech K310 Washable Keyboard', '', 'Logitech', 'white', '', 79.99, 0, 20, 'Logitech-K310-Washable-Keyboard-01.jpg', 'Logitech-K310-Washable-Keyboard-02.jpg', 'Logitech-K310-Washable-Keyboard-03.jpg', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  4, 'GAZE DESK – The Smartest Standing Desk Ever', '', '', 'Oak', '', 359, 0, 10, 'GAZE-DESK-01.jpg', 'GAZE-DESK-02.jpg', 'GAZE-DESK-03.jpg', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  5, 'SPHERO BB-8', '', '', '', '', 129.99, 119.99, 50, 'sphero-bb-8-01.jpg', 'sphero-bb-8-02.jpg', 'sphero-bb-8-03.jpg', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  4, 'Charlie the ChargeBear', '', '', '', '', 24, 0, 0, 'Charlie-the-ChargeBear-01.jpg', 'Charlie-the-ChargeBear-02.jpg', 'Charlie-the-ChargeBear-03.jpg', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  4, 'Empty Memory USB Drive 8 GB', '', '', '', '', 50, 0, 20, 'Empty-Memory-USB-Drives-NEW-01.jpg', 'Empty-Memory-USB-Drives-NEW-02.jpg', 'Empty-Memory-USB-Drives-NEW-03.jpg', 'Empty-Memory-USB-Drives-NEW-04.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  6, 'USB Mini-Cool Aroma / Humidifier', '', '', '', '', 59.99, 0, 50, 'ULIFE012800_01.jpg', 'ULIFE012800_02.jpg', 'ULIFE012800_03.jpg', 'ULIFE012800_04.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  4, 'MOS – The Original Magnetic Organization System', '', '', 'Aluminum', '', 25, 0, 100, 'MOS-The-Original-Magnetic-Organization-System-1.jpg', 'MOS-The-Original-Magnetic-Organization-System-2.jpg', 'MOS-The-Original-Magnetic-Organization-System-3.jpg', 'MOS-The-Original-Magnetic-Organization-System-4.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  3, 'Torras Aluminum Magnet Center Console', '', '', '', '', 20, 0, 50, 'Torras-Aluminum-Magnet-Center-Console-01.jpg', 'Torras-Aluminum-Magnet-Center-Console-02.jpg', 'Torras-Aluminum-Magnet-Center-Console-03.jpg', 'Torras-Aluminum-Magnet-Center-Console-4.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  4, 'TableAir Interactive Desk', '', '', '', '', 2700, 0, 5, 'TableAir-Interactive-Desk-01.jpg', 'TableAir-Interactive-Desk-02.jpg', 'TableAir-Interactive-Desk-03.jpg', 'TableAir-Interactive-Desk-04.jpg', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  4, '9 USB-Port Superspeed Hub', '', '', '', '', 119.99, 0, 30, '9-USB-Port-Superspeed-Hu-01.jpg', '', '', '', 'short_description', 'description', NOW(), NOW()
);
INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  5, 'MiP Personal Robot - White', '', '', '', '', 69.99, 0, 50, 'Black--pTRU1-18174926dt.jpg', '', '', '', 'short_description', 'description', NOW(), NOW()
);





--  =================================================================================================      아직 insert 안한것





UPDATE product SET
   sold_count = sold_count + ?
  ,stock      = stock - ?
WHERE product_id = ?





DROP TABLE IF EXISTS product_order;
CREATE TABLE product_order (
   order_id           INT(11)         UNSIGNED    NOT NULL    AUTO_INCREMENT
  ,user_id            INT(11)
  ,status             VARCHAR(10)     -- ordered, canceled, packing, packed, shipping, shipped
  ,date_ordered       DATETIME
  ,PRIMARY KEY (order_id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;


INSERT INTO product_order (
  user_id, status, date_ordered
) VALUES (
  ?, 'ordered', NOW()
)




DROP TABLE IF EXISTS product_order_detail;
CREATE TABLE product_order_detail (
   order_id           INT(11)
  ,product_id         INT(11)
  ,quantity           INT(11)
  ,price              DECIMAL(12,2)
  ,PRIMARY KEY (order_id, product_id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;


INSERT INTO product_order_detail (
  order_id, product_id, quantity, price
) VALUES (
  ?, ?, ?, ?
)




DROP TABLE IF EXISTS wishlist;
CREATE TABLE wishlist (
   user_id            INT(11)
  ,product_id         INT(11)
  ,date_created       DATETIME
  ,PRIMARY KEY (user_id, product_id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;


INSERT INTO wishlist (
  user_id, product_id, date_created
) VALUES (
  ?, ?, NOW()
)


DROP TABLE IF EXISTS cart;
CREATE TABLE cart (
   user_id            INT(11)
  ,product_id         INT(11)
  ,quantity           INT(11)
  ,date_created       DATETIME
  ,date_modified      DATETIME
  ,PRIMARY KEY (user_id, product_id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;


SELECT CASE WHEN SUM(c.price * c.quantity) IS NULL
             THEN 0
             ELSE SUM(c.price * c.quantity)
             END                                     AS total
      ,COUNT(c.product_id)                           AS cnt
FROM (
  SELECT  a.product_id
         ,CASE WHEN a.sale_yn = 'Y' 
                THEN a.sale_price 
                ELSE price 
          END AS price 
         ,m.quantity
  FROM cart AS m
    LEFT JOIN product AS a ON m.product_id = a.product_id
  WHERE user_id = 1
) AS c



SELECT a.product_id
      ,a.product_name
      ,a.price
      ,a.sale_price
      ,a.image1
      ,a.sale_yn
      ,m.quantity
FROM cart AS m
  LEFT JOIN product AS a ON m.product_id = a.product_id
WHERE user_id = 1


DELETE FROM cart
WHERE user_id    = $user_id
  AND product_id = $product_id


INSERT INTO 



데이터 인서트 후 아래 쿼래 실행해서 세일 상품이 아닌것은 세일여부를 N 으로 저장하고 세일가격을 정상가격과 동일하게 저장해줘야 함
그래야 가격별 정렬이 정상적으로 이루어짐 (가격별 정렬은 세일가격 기준으로 정렬됨)


select *
from product
WHERE sale_yn = 'N'
  AND sale_price > 0
  AND sale_price <> price
limit 50


UPDATE product SET
  sale_yn = 'Y'
WHERE sale_yn = 'N'
  AND sale_price > 0



select *
from product
WHERE sale_yn    = 'N'
  and sale_price = 0
limit 50

UPDATE product SET
  sale_price = price
WHERE sale_yn    = 'N'
  and sale_price = 0




select *
from product
where product_id in (31, 37, 41, 45)















































INSERT INTO product (
  category_id, product_name, status, brand, color, weight, price, sale_price, stock, image1, image2, image3, image4, short_description, description, date_created, date_modified
) VALUES (
  category_id, 'product_name', '', 'brand', 'color', 'weight', price, sale_price, stock, 'image1', 'image2', 'image3', 'image4', 'short_description', 'description', NOW(), NOW()
);








DROP TABLE IF EXISTS category;
CREATE TABLE category (
   category_id      INT(11)         UNSIGNED    NOT NULL    AUTO_INCREMENT
  ,category_name    VARCHAR(255)
  ,sort_order       INT(3)
  ,PRIMARY KEY (category_id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;


INSERT INTO category (category_name, sort_order) VALUES ('Home Decor', 1);
INSERT INTO category (category_name, sort_order) VALUES ('Lights', 2);
INSERT INTO category (category_name, sort_order) VALUES ('Mobile Accessories', 3);
INSERT INTO category (category_name, sort_order) VALUES ('Office Gadgets', 4);
INSERT INTO category (category_name, sort_order) VALUES ('Kids Toy', 5);
INSERT INTO category (category_name, sort_order) VALUES ('Adults Toy', 6);




DROP TABLE IF EXISTS cart;
CREATE TABLE cart (
   user_id          INT(11)                     NOT NULL
  ,product_id       INT(11)                     NOT NULL
  ,quantity         INT(11)
  ,status           CHAR(1)     -- in cart: '1' , ordered : '2'
  ,date_created     DATE            DEFAULT GETDATE()
  ,date_modified    DATE            DEFAULT GETDATE()
  ,PRIMARY KEY (user_id, product_id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;




DROP TABLE IF EXISTS wishlist;
CREATE TABLE wishlist (
   user_id          INT(11)                     NOT NULL
  ,product_id       INT(11)                     NOT NULL
  ,date_created     DATE            DEFAULT GETDATE()
  ,date_modified    DATE            DEFAULT GETDATE()
  ,PRIMARY KEY (user_id, product_id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;






DROP TABLE IF EXISTS product_order;
CREATE TABLE product_order (
   order_id         INT(11)         UNSIGNED    NOT NULL    AUTO_INCREMENT
  ,user_id          INT(11)                     NOT NULL
  ,product_id       INT(11)                     NOT NULL
  ,status           VARCHAR(10)                 NOT NULL
  ,date_ordered     DATE
  ,PRIMARY KEY (order_id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;



DROP TABLE IF EXISTS product_order_detail;
CREATE TABLE product_order_detail (
   order_id         INT(11)                     NOT NULL
  ,product_id       INT(11)                     NOT NULL
  ,quantity         INT(11)                     NOT NULL
  ,price            DECIMAL(12,2)               NOT NULL
  ,date_created     DATE
  ,PRIMARY KEY (order_id, product_id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
