<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!$data || !isset($data['temp_input']) || !isset($data['conversion'])) {
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

$input = trim($data['temp_input']);
$conversion = $data['conversion'];

if (!is_numeric($input)) {
    echo json_encode(['error' => 'Please enter a valid numeric temperature.']);
    exit;
}

$temp = floatval($input);
$result = "";

if ($conversion === "c-to-f") {
    $converted = $temp * 9/5 + 32;
    $result = "{$temp} °C = " . round($converted, 2) . " °F";
} elseif ($conversion === "f-to-c") {
    $converted = ($temp - 32) * 5/9;
    $result = "{$temp} °F = " . round($converted, 2) . " °C";
} else {
    echo json_encode(['error' => 'Invalid conversion type.']);
    exit;
}

echo json_encode(['result' => $result]);
exit;
