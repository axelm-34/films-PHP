<?php
require_once 'config/config.php';
require_once 'controllers/MovieController.php';
require_once 'controllers/FavoritesController.php';

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// --- MOVIE ROUTES ---
if (str_starts_with($path, '/movies')) {
    $type = $_GET['type'] ?? 'popular';
    $page = $_GET['page'] ?? 1;

    MovieController::list($type, $page);
    exit;
}

// --- FAVORITES ROUTES ---
if (str_starts_with($path, '/favorites/add')) {
    $movieId = $_GET['id'] ?? null;
    FavoritesController::add($movieId);
    exit;
}

if (str_starts_with($path, '/favorites/list')) {
    FavoritesController::list();
    exit;
}

// --- 404 ---
http_response_code(404);
echo json_encode(["error" => "Route inconnue"]);
