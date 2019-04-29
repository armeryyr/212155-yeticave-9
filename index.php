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

$categories = [
    'boards' => "Доски и лыжи",
    'attachment' => "Крепления",
    'boots' => "Ботинки",
    'clothing' => "Одежда",
    'tools' => "Инструменты",
    'other' => "Разное"
];

$lots = [
    [
        'name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'price' => '10999',
        'url_img' => 'img/lot-1.jpg'
    ],
    [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' => '159999',
        'url_img' => 'img/lot-2.jpg'
    ],
    [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' => '8000',
        'url_img' => 'img/lot-3.jpg'
    ],
    [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' => '10999',
        'url_img' => 'img/lot-4.jpg'
    ],
    [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' => '7500',
        'url_img' => 'img/lot-5.jpg'
    ],
    [
        'name' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => '5400',
        'url_img' => 'img/lot-6.jpg'
    ]
];

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

