<?php

require_once 'config/config.php';
require_once 'controllers/MovieController.php';

// Indique que la réponse sera du JSON
header("Content-Type: application/json");

// Récupère le chemin de l'URL
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route racine / => simple message
if ($path === '/') {
    echo json_encode(["message" => "API Films opérationnelle"]);
    exit;
}

// /movies => liste de films
if ($path === '/movies') {
    $type = $_GET['type'] ?? 'popular';
    MovieController::list($type);
    exit;
}

// /movie/{id} => détails d’un film
if (preg_match('#^/movie/([0-9]+)$#', $path, $matches)) {
    $id = $matches[1];
    MovieController::details($id);
    exit;
}

// Si aucune route ne correspond
http_response_code(404);
echo json_encode(["error" => "Route inconnue"]);
