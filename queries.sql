INSERT INTO categories
(name, class)
VALUES
  ('Доски и лыжи', 'boards'),
  ('Крепления', 'attachment'),
  ('Ботинки', 'boots'),
  ('Одежда', 'clothing'),
  ('Инструменты', 'tools'),
  ('Разное', 'other');

INSERT INTO user
(date_creation, user_name, email, password, avatar, contact)
VALUES
('2019-05-07','Иван', 'ivan44@mail.ru', 'secret1', 'img/avatar-1.jpg', 'Moscow'),
('2019-05-07','Сергей', 'sergey20@mail.ru', 'secret2', 'img/avatar-2.jpg', 'Moscow');

INSERT INTO lots
(date_creation, name, description, img, price_initial, data_end, step_rate, user_id, cat_id, user_winner_id)
VALUES
  ('2019-05-07','2014 Rossignol District Snowboard', 'Лот №1', 'img/lot-1.jpg', '10999', '2019-05-08', '100', '1', '1', '1'),
  ('2019-05-07', 'DC Ply Mens 2016/2017 Snowboard', 'Лот №2', 'img/lot-2.jpg', '159999', '2019-05-08', '100', '2',  '1', '2'),
  ('2019-05-07', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Лот №3', 'img/lot-3.jpg', '8000', '2019-05-18', '100',
   '1', '2', '1'),
  ('2019-05-07', 'Ботинки для сноуборда DC Mutiny Charocal', 'Лот №4', 'img/lot-4.jpg', '10999', '2019-05-08',  '100',
   '2', '3', '2'),
  ('2019-05-07', 'Куртка для сноуборда DC Mutiny Charocal', 'Лот №5', 'img/lot-5.jpg', '7500', '2019-05-08', '100', '1',
   '4', '1'),
  ('2019-05-07', 'Маска Oakley Canopy', 'Лот №6', 'img/lot-6.jpg', '5400', '2019-05-08', '100', '2', '5', '2');

INSERT INTO rate
(date_creation, price_user, user_id, lot_id)
VALUES
  ('2019-05-07','159999', '2', '2'),
  ('2019-05-07','8200', '1', '3');


SELECT * FROM categories;

SELECT lots.name, price_initial, img, categories.name, IFNULL(MAX(price_user), price_initial), data_end FROM lots
LEFT JOIN categories ON cat_id = categories.id
LEFT JOIN rate ON lot_id = lots.id
WHERE data_end > CURRENT_TIMESTAMP
GROUP BY categories.id
ORDER BY date_creation DESC;

SELECT lots.* ,categories.name FROM lots
LEFT JOIN categories ON cat_id = categories.id
WHERE lots.id = "1";

UPDATE lots SET name = '2015 Rossignol District Snowboard'  
WHERE id = '1';

SELECT price_user FROM rate
WHERE id = '1'
ORDER BY date_creation DESC;