<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['imageFile'])) {
        $imageData = file_get_contents($_FILES['imageFile']['tmp_name']);

        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'photo_capture';

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        $sql = 'INSERT INTO image_files (file_data) VALUES (?)';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $imageData);

        if ($stmt->execute() === true) {
            echo 'Image uploaded successfully';
        } else {
            echo 'Image upload failed';
        }
        $stmt->close();
        $conn->close();
    } else {
        echo 'No image data received';
    }
}

?>
