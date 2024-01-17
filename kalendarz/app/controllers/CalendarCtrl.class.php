<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\SessionUtils;
use core\Utils;

class CalendarCtrl {
    private $calendar = [];

    public function load_data() {
        try {
            $series_id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
            SessionUtils::store("selectedSeries", $series_id);
            
            $calendar_ids = App::getDB()->select("series_calendar", "*", [
                "id_series" => $series_id
            ]);

            foreach ($calendar_ids as $calendar_id) {
                $round = App::getDB()->select("calendar", "*", [
                    "id_calendar" => $calendar_id['id_calendar']
                ]);

                array_push($this->calendar, $round[0]);
            }
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odczytu kalendarza');
            
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
        }   
    }
    
    public function action_calendar() {
		$this->load_data();
        App::getSmarty()->assign('calendar', $this->calendar);
        App::getSmarty()->display('CalendarView.tpl');
    }
}
