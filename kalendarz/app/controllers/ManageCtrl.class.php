<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\ManageForm;

class ManageCtrl {
    private $users;
    private $form;

    public function __construct() {
        $this->form = new ManageForm();
    }

    public function validateDelete() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function load_data() {
        $this->users = App::getDB()->select("users", "*");
    }

    public function action_manageDeleteUser() {
        if ($this->validateDelete()) {
            try {
                App::getDB()->delete("users_series", [
                    'id_user' => $this->form->id
                ]);

                App::getDB()->delete("users_roles", [
                    'id_user' => $this->form->id
                ]);
                
                App::getDB()->delete("users", [
                    'id_user' => $this->form->id
                ]);

                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');

                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('manage');
    }
    
    public function action_manage() {
		$this->load_data();
        App::getSmarty()->assign('users', $this->users);
        App::getSmarty()->display('Manage.tpl');
    }
}
