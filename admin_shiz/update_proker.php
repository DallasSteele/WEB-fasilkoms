<?php
include 'koneksi.php';



$postData = json_decode(file_get_contents('php://input'), true);

// Debugging statement
file_put_contents('debug.txt', print_r($postData, true));

$rowNumber = $postData['rowNumber'];
$data = $postData['data'];


$postData = json_decode(file_get_contents('php://input'), true);
$rowNumber = $postData['rowNumber'];
$data = $postData['data'];

// Update the database with the new data
$title = mysqli_real_escape_string($db, $data['title']);
$subhead = mysqli_real_escape_string($db, $data['subhead']);
$theme = mysqli_real_escape_string($db, $data['theme']);

$query = "UPDATE proker SET title = '$title', subhead = '$subhead', theme = '$theme' WHERE id = $rowNumber";

if ($db->query($query) === TRUE) {
    echo json_encode(['success' => 'Data updated successfully']);
} else {
    echo json_encode(['error' => 'Error updating data: ' . $db->error]);
}

$db->close();
?>
