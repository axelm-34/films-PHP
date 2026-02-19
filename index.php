<?php

require_once 'config/config.php';
require_once 'controllers/MovieController.php';

// Indique que la réponse sera du JSON
header("Content-Type: application/json");

// Récupère le chemin de l'URL sans les paramètres query
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Route racine / => message de bienvenue
if ($path === '/' || $path === '/index.php') {
    echo json_encode(["message" => "API Films opérationnelle"]);
    exit;
}

// /movies => liste de films
if ($path === '/movies' && $method === 'GET') {
    $type = $_GET['type'] ?? 'popular'; // 'popular' par défaut
    MovieController::list($type);
    exit;
}

// /favorites => AJOUTER un favori 
if ($path === '/favorites' && $method === 'POST') {
    MovieController::addFavorite();
    exit;
}

// /movie/{id} => détails d’un film
if (preg_match('#^/movie/([0-9]+)$#', $path, $matches) && $method === 'GET') {
    $id = $matches[1];
    MovieController::details($id);
    exit;
}

// Si aucune route ne correspond
http_response_code(404);
echo json_encode(["error" => "Route inconnue ou méthode non autorisée"]);