<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Mensage = $_POST['Mensage'];

    $conn = new mysqli('localhost', 'root', '', 'contact');
    if ($conn->connect_error) {
        die('Connection Failed : ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO contactin (Name, Email, Mensage) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $Name, $Email, $Mensage);
        $stmt->execute();
        echo "order placed.order will delivered soon within 2-3 working days";
        $stmt->close();
        $conn->close();
    }
} else {
    header('Location: ./contact.html');
    exit;
}
?>
