<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;
use core\Utils;

class FavouritesCtrl {
    private $series = [];

    public function load_data() {
        $series_ids = App::getDB()->select("users_series", "*", [
            "id_user" => SessionUtils::load("loggedUserId", true)
        ]);

        foreach ($series_ids as $series_id) {
            $serie = App::getDB()->select("series", "*", [
                "id_series" => $series_id['id_series']
            ]);

            array_push($this->series, $serie[0]);
        }
    }
    
    public function action_favourites() {
		$this->load_data();
        App::getSmarty()->assign('series', $this->series);
        App::getSmarty()->display('FavouritesView.tpl');
    }
}
