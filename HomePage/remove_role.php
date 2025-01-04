<?php
include '../includes/connection.php';
header('Content-Type: application/json');

// Get input data
$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['id']) && isset($input['role'])) {
    $id = intval($input['id']);
    $role = $input['role'];

    if ($role === 'RemoveAll') {
        // SQL query to remove all roles
        $query = "UPDATE users SET Role = '' WHERE Sno = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'All roles removed successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to remove roles.']);
        }
        $stmt->close();
    } else {
        // Existing logic for toggling roles
        $currentRole = $role; // Update to handle your specific toggle logic
        // Add your toggle role logic here
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}

$conn->close();
?>
