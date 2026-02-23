<?php

require_once __DIR__ . '/../services/TMDBService.php';

class MovieController { // Récup les films
    public static function list($type, $page = 1) { // Récup les films sur la page 1
        $movies = TMDBService::getMovies($type, $page);
        echo json_encode($movies);
    }
}
?>