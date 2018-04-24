<?php
$json = file_get_contents("../goods.json");
$json = json_decode($json, true);

$message = '';
$message .= '<h1>Order/Заказ</h1>';
$message .= '<p>Client/Клиент: '.$_POST["cname"].'</p>';
$message .= '<p>Email/Почта: '.$_POST["cemail"].'</p>';
$message .= '<p>Phone/Телефон: '.$_POST["cphone"].'</p>';

$cart = $_POST["cart"];
$summ = 0;
foreach ($cart as $id=>$count) {
    $message .= $json[$id]["name"].' --- ';
    $message .= $count.' pcs/шт'.' --- ';
    $message .= $count * $json[$id]['cost'].' hrn/грн';
    $message .= '<br>';
    $summ = $summ + $count * $json[$id]['cost'];
}
$message .= 'Total/Всего: '.$summ.' hrn/грн';
//print_r($message);

$to = 'pnzqp@one2mail.info'.',';
$to .= $_POST['cemail'];
$spectext = '<!DOCTYPE html><html lang="ru"><head><meta charset="utf-8"><title>Shop</title></head><body>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

$m = mail($to, 'Заказ в магазине', $spectext.$message.'</body></html>', $headers);

if ($m) {echo 1;} else {echo 0;}