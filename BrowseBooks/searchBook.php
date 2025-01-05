<?php
session_start();
include '../includes/connection.php';

// Get the query from the URL
$query = $_GET['query'] ?? '';

if (empty($query)) {
    echo json_encode(['error' => 'Query cannot be empty.']);
    exit();
}

// Search in the database
$stmt = $conn->prepare("SELECT * FROM books WHERE Name LIKE ?");
$searchTerm = "%$query%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

// If found in the database, return the results
if ($result->num_rows > 0) {
    $books = [];
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
    echo json_encode(['books' => $books]);
    exit();
}

// If not found, call an external API 
$apiUrl = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($query);
$apiResponse = file_get_contents($apiUrl);

if ($apiResponse === FALSE) {
    echo json_encode(['error' => 'Error fetching data from external API.']);
    exit();
}

$apiData = json_decode($apiResponse, true);

if (isset($apiData['items']) && count($apiData['items']) > 0) {
    $books = [];
    foreach ($apiData['items'] as $item) {
        $volumeInfo = $item['volumeInfo'];
        $title = $volumeInfo['title'] ?? 'No title';
        $description = $volumeInfo['description'] ?? 'No description';
        $imageLinks = $volumeInfo['imageLinks'] ?? [];
        $image = $imageLinks['thumbnail'] ?? $imageLinks['smallThumbnail'] ?? 'No image';
        $rating = $volumeInfo['averageRating'] ?? 0;

        // Filter out books that do not match the query
        if (stripos($title, $query) !== false || stripos($description, $query) !== false) {
            $books[] = [
                'Name' => $title,
                'Description' => $description,
                'Image' => $image,
                'Rating' => $rating
            ];
        }
    }

    if (count($books) > 0) {
        echo json_encode(['books' => $books]);
    } else {
        echo json_encode(['error' => 'No books found in external API.']);
    }
} else {
    echo json_encode(['error' => 'No books found in external API.']);
}
exit();
?>
