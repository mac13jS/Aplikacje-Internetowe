<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\CalendarForm;
use core\SessionUtils;

class CalendarEditCtrl {
    private $form;

    public function __construct() {
        $this->form = new CalendarForm();
    }

    public function validateSave() {
        $this->form->id = ParamUtils::getFromPost('id', true, 'Błędne wywołanie aplikacji');

        $valid = new Validator();

        $this->form->name = $valid->validateFromPost('name', [
            'required' => true,
            'validator_message' => 'Nazwa rundy nie może być pusta'
        ]);

        $this->form->circuit = $valid->validateFromPost('circuit', [
            'required' => true,
            'validator_message' => 'Nazwa obiektu nie może być pusta'
        ]);

        $date = $valid->validateFromPost('date', [
            'required' => true,
            'required_message' => 'Data wystąpienia rundy nie może być pusta',
            'date_format' => 'Y-m-d',
            'validator_message' => "Niepoprawny format daty. Przykład: 2024-01-25"
        ]);

        if ($valid->isLastOK()) {
            $this->form->date = $date->format('Y-m-d');
        }

        $round = $valid->validateFromPost('round', [
            'required' => true,
            'required_message' => 'Numer rundy nie może być pusty',
            'int' => true,
            'validator_message' => 'Numer rundy powinien być liczbą całkowitą. Przykład: 12'
        ]);

        if ($valid->isLastOK()) {
            $this->form->round = intval($round);
        }

        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }
    
    public function action_calendarAdd() {
		$this->generateView();
    }
    
    public function action_calendarEdit() {
		if ($this->validateEdit()) {
            try {
                $calendar = App::getDB()->get("calendar", "*", [
                    "id_calendar" => $this->form->id
                ]);

                $this->form->id = $calendar['id_calendar'];
                $this->form->name = $calendar['name'];
                $this->form->circuit = $calendar['circuit'];
                $this->form->date = $calendar['date'];
                $this->form->round = $calendar['round'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');

                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            }
        }

        $this->generateView();
    }
    
    public function action_calendarDelete() {
		if ($this->validateEdit()) {
            try {
                App::getDB()->delete("calendar", [
                    "id_calendar" => $this->form->id
                ]);

                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');

                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            }
        }

        $series_id = SessionUtils::load("selectedSeries", true);
        App::getRouter()->redirectTo('calendar/' . $series_id);
    }
    
    public function action_calendarSave() {
		if ($this->validateSave()) {
            try {
                if ($this->form->id == '') {
                    App::getDB()->insert("calendar", [
                        "name" => $this->form->name,
                        "circuit" => $this->form->circuit,
                        "date" => $this->form->date,
                        "round" => $this->form->round
                    ]);

                    $calendar = App::getDB()->select("calendar", "*", [
                        "name" => $this->form->name,
                        "circuit" => $this->form->circuit,
                        "date" => $this->form->date,
                        "round" => $this->form->round
                    ]);

                    $series_id = SessionUtils::load("selectedSeries", true);
                    echo var_dump($series_id);

                    App::getDB()->insert("series_calendar", [
                        "id_calendar" => $calendar[0]["id_calendar"],
                        "id_series" => $series_id
                    ]);
                } else {
                    App::getDB()->update("calendar", [
                        "name" => $this->form->name,
                        "circuit" => $this->form->circuit,
                        "date" => $this->form->date,
                        "round" => $this->form->round
                    ], [
                        "id_calendar" => $this->form->id
                    ]);
                }

                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');

                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            }

            $series_id = SessionUtils::load("selectedSeries", true);
            App::getRouter()->redirectTo('calendar/' . $series_id);
        } else {
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('CalendarEdit.tpl');
    }
}
