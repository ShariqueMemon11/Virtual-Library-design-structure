<?php
include '../includes/connection.php';
header('Content-Type: application/json');

// Parse the input data
$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['id']) && isset($input['role'])) {
    $id = intval($input['id']);
    $role = $input['role'];

    // Role toggling logic
    $query = "SELECT Role FROM users WHERE Sno = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $currentRole = $user['Role'];

    if ($role === 'RemoveAll') {
        // Revoke all roles
        $updateQuery = "UPDATE users SET Role = '' WHERE Sno = ?";
    } else {
        // Toggle the role
        if (strpos($currentRole, $role) !== false) {
            // Remove role
            $newRole = str_replace($role, '', $currentRole);
            $newRole = trim(str_replace(',,', ',', $newRole), ',');
        } else {
            // Add role
            $newRole = $currentRole ? $currentRole . ",$role" : $role;
        }
        $updateQuery = "UPDATE users SET Role = ? WHERE Sno = ?";
    }

    $stmt = $conn->prepare($updateQuery);
    if ($role === 'RemoveAll') {
        $stmt->bind_param("i", $id);
    } else {
        $stmt->bind_param("si", $newRole, $id);
    }

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Role updated successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update role.']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
}

$conn->close();
?>
