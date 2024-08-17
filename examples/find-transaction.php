<?php
include_once '../vendor/autoload.php';

$fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\IEXBase\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}

// get transaction by tx id
$detail = $tron->getTransaction('TxId');
var_dump($detail);

// get all transaction by address
$address = 'this is you address';
$detail = $tron->getTransactions($address, 100);
var_dump($detail);

// TRC20 All transactions
$contractAddress = 'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t'; //mainnet usdt contract address
$trc20Contract = new \IEXBase\TronAPI\TRC20Contract($tron, $contractAddress);
$detail = $trc20Contract->getTransactions($address, 100);
var_dump($detail);