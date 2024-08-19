<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['data'])) {
    $conn = new mysqli(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_NAME'));

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO requests (data) VALUES (?)");
    $stmt->bind_param("s", $_POST['data']);

    if ($stmt->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Send a POST request with 'data' parameter.";
}