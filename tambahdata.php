<?php

require_once 'src/autoload.php';

$pdo = new PDO('mysql:host=localhost;dbname=tokojersey99', 'root', '');

$sql = "INSERT INTO transaksi(nip, tanggal, kode_barang, jumlah_barang, harga_total) VALUES (?,?,?,?,?)";
$stmt = $pdo->prepare($sql);

function rand_date($min_date, $max_date)
{

    $min_epoch = strtotime($min_date);
    $max_epoch = strtotime($max_date);

    $rand_epoch = rand($min_epoch, $max_epoch);

    return date('Y-m-d H:i:s', $rand_epoch);
}

$barang = array(
    "ENG001H" => 1, 
    "ENG002H" => 2, 
    "ENG003H" => 3, 
    "ENG004H" => 4, 
    "ENG005H" => 5, 
    "ESP001H" => 6, 
    "ESP002H" => 7,
    "ITA001H" => 8,
    "ITA002H" => 9,
    "ITA003H" => 10);
$key = array_rand($barang);

for($i=0; $i<1; $i++){
    $induk = rand('1908231232', '1908231231');
    $jumlah = rand('1','2');
    if ($jumlah == 2) {
        $harga =  200000;
    }else{
        $harga =  100000;
    };
    
    $stmt->bindValue(1, $induk);
    $stmt->bindValue(2, rand_date('2020-01-01', '2020-04-01'));
    $stmt->bindValue(3, $key);
    $stmt->bindValue(4, $jumlah);
    $stmt->bindValue(5, $harga);
    $stmt->execute();  
}
