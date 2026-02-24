<?php
// 1. On active le bouclier : PHP garde tout l'affichage en mémoire
ob_start();

// 2. On charge tes fichiers (les espaces indésirables des seront piégés ici)
require_once 'config/config.php';
require_once 'controllers/MovieController.php';
require_once 'controllers/FavoritesController.php';

// 3. On nettoie la mémoire ! Tous les espaces cachés sont détruits.
ob_clean();

// 4. On peut maintenant envoyer nos Headers CORS en toute sécurité
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// MOVIE ROUTES
if (str_starts_with($path, '/movies')) {
    $type = $_GET['type'] ?? 'popular';
    $page = $_GET['page'] ?? 1;

    MovieController::list($type, $page);
    exit;
}

<<<<<<< HEAD
// --- FAVORITES ROUTES ---
if (str_starts_with($path, '/favorites')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        $movieId = $data['id'] ?? null;
        FavoritesController::add($movieId);
    } else {
        FavoritesController::list();
    }
=======
// FAVORITES ROUTES
if (str_starts_with($path, '/favorites/add')) {
    $movieId = $_GET['id'] ?? null;
    FavoritesController::add($movieId);
    exit;
}

if (str_starts_with($path, '/favorites/list')) {
    FavoritesController::list();
>>>>>>> test
    exit;
}

// ERROR 404
http_response_code(404);
echo json_encode(["error" => "Route inconnue"]);