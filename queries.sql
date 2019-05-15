INSERT INTO categories
(name, class)
VALUES
('Доски и лыжи', 'boards'),
('Крепления', 'attachment'),
('Ботинки', 'boots'),
('Одежда', 'clothing')
('Инструменты', 'tools')
('Разное', 'other');

INSERT INTO lots
(date_creation, name, description, img, price_initial, data_end, step_rate, user_id, cat_id, user_winner_id)
VALUES
  ('2019-05-07','2014 Rossignol District Snowboard', 'Лот №1', 'img/lot-1.jpg', '10999', '2019-05-08', '100', '1', '1'),
  ('2019-05-07', 'DC Ply Mens 2016/2017 Snowboard', 'Лот №2', 'img/lot-2.jpg', '159999', '2019-05-08', '100', '2',  '1', '1'),
  ('2019-05-07', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Лот №3', 'img/lot-3.jpg', '8000', '2019-05-08', '100',
   '3', '2', '1'),
  ('2019-05-07', 'Ботинки для сноуборда DC Mutiny Charocal', 'Лот №4', 'img/lot-4.jpg', '10999', '2019-05-08',  '100',
   '4', '3'),
  ('2019-05-07', 'Куртка для сноуборда DC Mutiny Charocal', 'Лот №5', 'img/lot-5.jpg', '7500', '2019-05-08', '100', '5',
   '4', '1'),
  ('2019-05-07', 'Маска Oakley Canopy', 'Лот №6', 'img/lot-6.jpg', '5400', '2019-05-08', '100', '6', '5');

INSERT INTO rate
(date_creation, price_user, user_id, lot_id)
VALUES
('2019-05-07','11099', '2', '1'),
('2019-05-07','8100', '1', '3');

INSERT INTO user
(date_creation, user_name, email, password, avatar, contact)
VALUES
('2019-05-07','Иван', 'ivan44@mail.ru', 'secret1' 'img/avatar-1.jpg', 'Moscow'),
('2019-05-07','Сергей', 'sergey20@mail.ru', 'secret2' 'img/avatar-2.jpg', 'Moscow');


SELECT * FROM categories;
SELECT name, lots.price_initial, categories.name, img FROM lots JOIN categories;

