<?php
session_start();

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

// Check CSRF token
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'Invalid CSRF token']);
    exit;
}

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'contact_form_db');
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}

// Sanitize & validate inputs
function cleanInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

$name = isset($_POST['name']) ? cleanInput($_POST['name']) : '';
$message = isset($_POST['message']) ? cleanInput($_POST['message']) : '';

// Allow Unicode letters + numbers + basic punctuation
if (!preg_match("/^[\p{L}0-9\s\.,!?'\-]+$/u", $name) || !preg_match("/^[\p{L}0-9\s\.,!?'\-]+$/u", $message)) {
    echo json_encode(['status' => 'error', 'message' => 'Only letters, numbers, and basic punctuation are allowed.']);
    exit;
}

// Validate name length (min 3 and max 20 characters)
if (strlen($name) < 3 || strlen($name) > 20) {
    echo json_encode(['status' => 'error', 'message' => 'Name must be between 3 and 20 characters long.']);
    exit;
}

// Validate message length (max 400 characters)
if (strlen($message) > 400) {
    echo json_encode(['status' => 'error', 'message' => 'Message must not exceed 400 characters.']);
    exit;
}

// Insert into database
$stmt = $conn->prepare("INSERT INTO contacts (name, message) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $message);

if ($stmt->execute()) {
    // Send back the response with just the name (no message)
    echo json_encode(['status' => 'success', 'name' => $name]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to send message. Please try again.']);
}

$stmt->close();
$conn->close();
?>
