<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;
use core\SessionUtils;
use core\ParamUtils;
use app\forms\LoginForm;

class LoginCtrl {
    private $form;

    public function __construct() {
        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->password = ParamUtils::getFromRequest('password');

        if (!isset($this->form->login)) {
            return false;
        }

        if (empty($this->form->login)) {
            Utils::addErrorMessage('Login jest wymagany');
        }

        if (empty($this->form->password)) {
            Utils::addErrorMessage('Hasło jest wymagane');
        }

        if (App::getMessages()->isError()) {
            return false;
        }

        $user = App::getDB()->select("users", "*", [
            "login" => $this->form->login
        ]);

        if (!$user) {
            App::getMessages()->addMessage(new Message('Nieprawidłowy login lub hasło.', Message::ERROR));
            App::getSmarty()->assign('login', $this->form->login);

            return false;
        }

        if($user[0]['password'] == $this->form->password) {
            $roles_ids = App::getDB()->select("users_roles", "*", [
                "id_user" => $user[0]['id_user']
            ]);

            usort($roles_ids, function($a, $b) {return -1 * strcmp($a['id_role'], $b['id_role']);});
            
            $role = App::getDB()->select("roles", "name", [
                "id_role" => $roles_ids[0]['id_role']
            ]);

            RoleUtils::addRole($role[0]);
            SessionUtils::store("loggedUser", $user[0]['login']);
            SessionUtils::store("loggedUserId", $user[0]['id_user']);

            return true;
        }

        App::getMessages()->addMessage(new Message('Nieprawidłowy login lub hasło.', Message::ERROR));
        App::getSmarty()->assign('login', $this->form->login);

        return !App::getMessages()->isError();
    }

    public function action_loginShow() {
        $this->generateView();
    }

    public function action_login() {
        if ($this->validate()) {
            Utils::addInfoMessage('Poprawnie zalogowano do systemu');
            App::getRouter()->redirectTo('series');
        } else {
            $this->generateView();
        }
    }

    public function action_logout() {
        session_destroy();
        App::getRouter()->redirectTo('series');
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('LoginView.tpl');
    }
}
