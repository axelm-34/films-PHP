<?php

require_once __DIR__ . '/../services/TMDBService.php';

class FavoritesController {

    private static $file = __DIR__ . '/../favorites.json';

    public static function list() {
        if (!file_exists(self::$file)) {
            file_put_contents(self::$file, "[]");
        }

        $favoriteIds = json_decode(file_get_contents(self::$file), true);
        $fullMovies = [];

        foreach ($favoriteIds as $id) {
            $movie = TMDBService::getMovieById($id);
            if ($movie) {
                $fullMovies[] = $movie;
            }
        }

        echo json_encode($fullMovies);
    }

    public static function add($movieId) {
        if (!$movieId) {
            http_response_code(400);
            echo json_encode(["error" => "ID manquant"]);
            return;
        }

        if (!file_exists(self::$file)) {
            file_put_contents(self::$file, "[]");
        }

        $favorites = json_decode(file_get_contents(self::$file), true);

        if (!in_array($movieId, $favorites)) {
            $favorites[] = $movieId;
            file_put_contents(self::$file, json_encode($favorites, JSON_PRETTY_PRINT));
        }

        echo json_encode(["success" => true, "favorites" => $favorites]);
    }
}
?>