<?php

require_once __DIR__ . '/../config/config.php';

class TMDBService {
// Récup les films et leur détails qui son dans la page 1
    public static function getMovies($type, $page = 1) {
        $url = TMDB_BASE_URL . "/movie/" . $type . "?api_key=" . TMDB_API_KEY . "&language=fr-FR&page=" . $page;

        $response = file_get_contents($url);
        return json_decode($response, true);
    }
// Récup le film et ses details via son ID
    public static function getMovieById($id) {
        $url = TMDB_BASE_URL . "/movie/" . $id . "?api_key=" . TMDB_API_KEY . "&language=fr-FR";

        $response = file_get_contents($url);
        return json_decode($response, true);
    }
}
?>  