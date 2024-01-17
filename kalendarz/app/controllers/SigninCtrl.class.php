<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\SigninForm;
use core\SessionUtils;

class SigninCtrl {
    private $form;

    public function __construct() {
        $this->form = new SigninForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->password = ParamUtils::getFromRequest('password');
        $this->form->password_repeat = ParamUtils::getFromRequest('password_repeat');

        if (empty($this->form->login)) {
            Utils::addErrorMessage('Login jest wymagany');
        }
        if (empty($this->form->password)) {
            Utils::addErrorMessage('Wpisz hasło');
        }
        if (empty($this->form->password_repeat)) {
            Utils::addErrorMessage('Powtórz hasło');
        }

        if (App::getMessages()->isError())
            return false;

        $loginCheck = App::getDB()->has("users", ["login" => $this->form->login]);

        if (!$loginCheck) {
            if ($this->form->password != $this->form->password_repeat) {
                Utils::addErrorMessage('Podane hasła się różnią');
            }
        } else {
            Utils::addErrorMessage('Użytkownik o podanym loginie już istnieje');
        }

        return !App::getMessages()->isError();
    }

    public function action_signinShow() {
        $this->generateView();
    }

    public function action_signin() {
        if ($this->validate()) {
            App::getDB()->insert("users", [
                "login" => $this->form->login, 
                "password" => $this->form->password
            ]);

            $user_id = App::getDB()->select("users", "id_user", [
                "login" => $this->form->login
            ]);

            $role_id = App::getDB()->select("roles", "id_role", [
                "name" => "user"
            ]);

            App::getDB()->insert("users_roles", [
                "id_user" => $user_id[0],
                "id_role" => $role_id[0],
                "access_date" => date('Y-m-d H:i:s')
            ]);

            Utils::addInfoMessage('Konto utworzone pomyślnie');
            RoleUtils::addRole("user");
            SessionUtils::store("loggedUserId", $user_id[0]);
            App::getRouter()->redirectTo('series');
        } else {
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('SigninView.tpl');
    }
}
