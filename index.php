<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require('helpers.php');

$is_auth = rand(0, 1);
$user_name = 'Юрий'; // укажите здесь ваше имя

date_default_timezone_set('Europe/Samara');
setlocale(LC_ALL, 'ru_RU');
$timer = strtotime("tomorrow midnight") - strtotime('now');

$con = mysqli_connect('localhost', 'root', '', 'yeticave');

if ($con == false) {
    print('Ошибка подключения: ' . mysqli_connect_error());
}
   //print("Соединение установлено");
    mysqli_set_charset($con, 'utf8');
    $sql = "SELECT lots.name, price_initial, img, categories.name, IFNULL(MAX(price_user), price_initial), data_end FROM lots
            LEFT JOIN categories ON cat_id = categories.id
            LEFT JOIN rate ON lot_id = lots.id
            WHERE data_end > CURRENT_TIMESTAMP
            GROUP BY categories.id
            ORDER BY date_creation DESC";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $lots = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    $sql = "SELECT name, class FROM categories";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


function formatting_number($price){
    $price = ceil($price);
    if ($price >= 1000){
        $price = number_format($price, 0, ',', ' ');
    }
    $price= $price . " " . '<b class="rub">р</b>';
    return $price;
}
$content = include_template('index.php',   [
    'categories' => $categories,
    'lots' => $lots,
    'timer' => $timer
]);
$layout = include_template('layout.php',   [
    'content' => $content,
    'user_name' => $user_name,
    'title' => 'Главная',
    'is_auth' => $is_auth,
    'categories' => $categories
]);
print ($layout);
?>