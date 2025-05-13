<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Access-Control-Allow-Origin: https://new-jkh.web.app/');
header("Access-Control-Allow-Headers: *");

include 'DbConnect.php';
$objDb = new DbConnect;
$conn = $objDb->connect();

$method = $_SERVER['REQUEST_METHOD'];
switch($method) {
    case "POST":
        $exchangeInfo = json_decode(file_get_contents('php://input'));
        $sql = "INSERT INTO Exchange(id, count, total_price, wallet, email, created_at) VALUES(null, :count, :total_price, :wallet, :email, :created_at)";
        $stmt = $conn->prepare($sql);
        $created_at = date('Y-m-d');
        $stmt->bindParam(':count', $exchangeInfo->count);
        $stmt->bindParam(':total_price', $exchangeInfo->total_price);
        $stmt->bindParam(':wallet', $exchangeInfo->wallet);
        $stmt->bindParam(':email', $exchangeInfo->email);
        $stmt->bindParam(':created_at', $created_at);
        if($stmt->execute()) {
            $response = ['status' => 1, 'message' => 'Record created successfully.'];
        } else {
            $response = ['status' => 0, 'message' => 'Failed to create record.'];
        }
        echo json_encode($response);
        break;
}