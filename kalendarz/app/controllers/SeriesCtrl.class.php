<?php

namespace app\controllers;

use core\App;

class SeriesCtrl {
    private $series;

    public function load_data() {
        $this->series = App::getDB()->select("series", "*");
    }
    
    public function action_series() {
		$this->load_data();
        App::getSmarty()->assign('series', $this->series);
        App::getSmarty()->display('SeriesView.tpl');
    }
}
