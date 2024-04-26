<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $number = $_POST['number'];
    $place = $_POST['place'];
    $neighborhood = $_POST['neighborhood'];
    $city = $_POST['city'];
    $state = $_POST['state'];

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'tests');
    // Check connection
    if ($conn->connect_error) {
        die('Connection Failed : ' . $conn->connect_error);
    } else {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO info (Name, Last_Name, CPF, Email, CEP, Number, Place, Neighborhood, City, State) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die('Error in preparing statement: ' . $conn->error);
        }
        // Bind parameters and execute the statement
        $result = $stmt->bind_param("ssssssssss", $name, $last_name, $cpf, $email, $cep, $number, $place, $neighborhood, $city, $state);
        if ($result === false) {
            die('Error in binding parameters: ' . $stmt->error);
        }
        $execute_result = $stmt->execute();
        if ($execute_result === false) {
            die('Error in executing statement: ' . $stmt->error);
        }
        // Close statement and connection
        $stmt->close();
        $conn->close();
    }

    // Send email (example code, replace with your email sending logic)
    $to = "your@example.com";
    $subject = "New order received";
    $message = "Name: $name $last_name\n";
    $message .= "CPF: $cpf\n";
    $message .= "Email: $email\n";
    $message .= "CEP: $cep\n";
    $message .= "Number: $number\n";
    $message .= "Place: $place\n";
    $message .= "Neighborhood: $neighborhood\n";
    $message .= "City: $city\n";
    $message .= "State: $state\n";
    // Send email using mail() function (replace this with your email sending logic)
    mail($to, $subject, $message);

    // Redirect to thank you page after processing
    header('Location: ordered.html');
    exit;
} 
?>
