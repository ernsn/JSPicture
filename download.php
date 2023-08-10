<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['image_id'])) {
    $imageId = $_GET['image_id'];

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'photo_capture';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $sql = 'SELECT file_data FROM image_files WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $imageId);

    if ($stmt->execute() === true) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imageData = $row['file_data'];

            // Create a PNG image from the retrieved data
            $image = imagecreatefromstring($imageData);

            // Output the image as PNG
            header('Content-Type: image/png');
            header('Content-Disposition: attachment; filename="downloaded_image.png"');
            imagepng($image);

            // Clean up
            imagedestroy($image);
        } else {
            echo 'Image not found';
        }
    } else {
        echo 'Error fetching image data';
    }

    $stmt->close();
    $conn->close();
}
?>
