<?php

header('Content-Type: application/json');

$response = ['status' => 'success', 'message' => 'API working'];

echo json_encode($response);
