<?php

require_once("./GenericView.php");
require_once("Model_Search.php");

class ViewSearch extends GenericView
{

    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelSearch;
    }

    public function show_searchResults()
    {
        if (isset($_GET['query']) && !empty($_GET['query'])) {

            $showsResults = $this->model->getTmdbSearchResults();
            
            $resultsString = '';
            foreach($showsResults['results'] as $index => $value) {
                $resultsString .= '<div class="grid-item"><a href="./?module=shows&action=overview&id=' . $value['id'] . '"><img src="https://image.tmdb.org/t/p/w200' . $value['poster_path'] . '"></a></div>';
            }

            $query = htmlspecialchars($_GET['query']);

            echo '<div class="searchContainer">';
                echo '<h1>Résultats de la recherche pour : ' . $query . '</h1>';

                echo '<div class="resultsContainer">';

                echo $resultsString;

                echo '</div>';

            echo '</div>';
        } else {
            echo "<container>Id non définie</container>";
        }
    }
}