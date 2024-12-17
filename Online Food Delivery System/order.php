<?php
// Database configuration
$host = 'localhost';
$dbname = 'food_delivery';
$username = 'root'; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password

// Connect to MySQL database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $payment = $_POST['payment'];
    $cardNumber = isset($_POST['cardNumber']) ? $_POST['cardNumber'] : '';
    $expiryDate = isset($_POST['expiryDate']) ? $_POST['expiryDate'] : '';
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';
    $orderItems = json_encode($_POST['orderItems']);
    $totalAmount = $_POST['totalAmount'];

    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO orders (name, phone, address, payment, card_number, expiry_date, cvv, order_items, total_amount) 
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    try {
        $stmt->execute([$name, $phone, $address, $payment, $cardNumber, $expiryDate, $cvv, $orderItems, $totalAmount]);
        $orderId = $pdo->lastInsertId(); // Get the ID of the inserted order
        echo "Order placed successfully. Order ID: $orderId";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
