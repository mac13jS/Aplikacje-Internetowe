<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\SeriesForm;
use core\SessionUtils;

class SeriesEditCtrl {
    private $form;

    public function __construct() {
        $this->form = new SeriesForm();
    }

    public function validateSave() {
        $this->form->id = ParamUtils::getFromPost('id', true, 'Błędne wywołanie aplikacji');

        $valid = new Validator();

        $this->form->name = $valid->validateFromPost('name', [
            'required' => true,
            'validator_message' => 'Nazwa serii nie może być pusta'
        ]);

        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function validateDelete() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        
        $countRounds = App::getDB()->count("series_calendar", [
            'id_series' => $this->form->id
        ]);

        if ($countRounds > 0) {
            $rounds = App::getDB()->select("series_calendar", "*", [
                'id_series' => $this->form->id
            ]);

            App::getDB()->delete("series_calendar", [
                'id_series' => $this->form->id
            ]);

            foreach ($rounds as $round) {
                App::getDB()->delete("calendar", [
                    'id_calendar' => $round['id_calendar']
                ]);
            }
        }

        return !App::getMessages()->isError();
    }
    
    public function action_seriesAdd() {
		$this->generateView();
    }
    
    public function action_seriesEdit() {
		if ($this->validateEdit()) {
            try {
                $series = App::getDB()->get("series", "*", [
                    "id_series" => $this->form->id
                ]);

                $this->form->id = $series['id_series'];
                $this->form->name = $series['name'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');

                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            }
        }

        $this->generateView();
    }
    
    public function action_seriesDelete() {
		if ($this->validateDelete()) {
            try {
                App::getDB()->delete("users_series", [
                    "id_series" => $this->form->id
                ]);

                App::getDB()->delete("series", [
                    "id_series" => $this->form->id
                ]);

                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');

                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('series');
    }
    
    public function action_seriesSave() {
		if ($this->validateSave()) {
            try {
                if ($this->form->id == '') {
                    $count = App::getDB()->count("series");

                    if ($count <= 50) {
                        App::getDB()->insert("series", [
                            "name" => $this->form->name
                        ]);
                    } else {
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nową serię, usuń wybraną inną.');
                        $this->generateView();
                        exit();
                    }
                } else {
                    App::getDB()->update("series", [
                        "name" => $this->form->name
                    ], [
                        "id_series" => $this->form->id
                    ]);
                }

                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');

                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            }

            App::getRouter()->forwardTo('series');
        } else {
            $this->generateView();
        }
    }

    public function action_seriesFavouriteAdd() {
        if ($this->validateEdit()) {
            try {
                $series = App::getDB()->get("series", "*", [
                    "id_series" => $this->form->id
                ]);

                $already_favourite = App::getDB()->select("users_series", "*", [
                    "id_user" => SessionUtils::load("loggedUserId", true),
                    "id_series" => $series['id_series']
                ]);

                if (!$already_favourite) {
                    App::getDB()->insert("users_series", [
                        "id_user" => SessionUtils::load("loggedUserId", true),
                        "id_series" => $series['id_series']
                    ]);
    
                    Utils::addInfoMessage('Seria dodana do ulubionych');
                } else {
                    Utils::addWarningMessage('Seria już jest na liście ulubionych');
                }
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas dodawania do ulubionych');

                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('series');
    }

    public function action_seriesFavouriteDelete() {
        if ($this->validateEdit()) {
            try {
                App::getDB()->delete("users_series", [
                    "id_user" => SessionUtils::load("loggedUserId", true),
                    "id_series" => $this->form->id
                ]);

                Utils::addInfoMessage('Seria usunięta z ulubionych');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas dodawania do ulubionych');

                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('favourites');
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('SeriesEdit.tpl');
    }
}
