<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\ManageForm;
use core\SessionUtils;

class ManageEditCtrl {
    private $form;
    private $roles;
    private $userRoles = [];
    private $updateLogin;
    private $updateRole;

    public function __construct() {
        $this->form = new ManageForm();
    }

    public function validateSave() {
        $this->form->id = ParamUtils::getFromPost('id', true, 'Błędne wywołanie aplikacji');

        $valid = new Validator();

        $this->form->login = $valid->validateFromPost('login', [
            'required' => true,
            'validator_message' => 'Login użytkownika nie może być pusty'
        ]);

        $this->form->role = $valid->validateFromPost('role');

        $oldLogin = SessionUtils::load('editedUserLogin', true);
        $this->updateLogin = $oldLogin == $this->form->login ? false : true;

        $oldRolesNames = [];
        $oldUserRoles = SessionUtils::load('editedUserRoles', true);

        foreach ($oldUserRoles as $role) {
            array_push($oldRolesNames, $role['id_role']);
        }

        $this->updateRole = in_array($this->form->role, $oldRolesNames) ? false : true;

        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }
    
    public function action_manageEdit() {
		if ($this->validateEdit()) {
            try {
                $user = App::getDB()->get("users", "*", [
                    "id_user" => $this->form->id
                ]);

                $this->form->id = $user['id_user'];
                $this->form->login = $user['login'];
                SessionUtils::store('editedUserId', $this->form->id);
                SessionUtils::store('editedUserLogin', $this->form->login);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');

                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            }
        }

        $this->generateView();
    }
    
    public function action_manageDelete() {
		if ($this->validateEdit()) {
            try {
                $uid = SessionUtils::load('editedUserId', true);

                App::getDB()->delete("users_roles", [
                    'id_user' => $uid,
                    'id_role' => $this->form->id
                ]);

                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');

                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('manage');
    }
    
    public function action_manageSave() {
		if ($this->validateSave()) {
            try {
                if ($this->updateLogin) {
                    App::getDB()->update("users", [
                        'login' => $this->form->login
                    ], [
                        'id_user' => $this->form->id
                    ]);
                }

                if ($this->updateRole) {
                    App::getDB()->insert("users_roles", [
                        'id_user' => $this->form->id,
                        'id_role' => $this->form->role,
                        'access_date' => date('Y-m-d H:i:s')
                    ]);
                }

                if (!$this->updateLogin && !$this->updateRole) {
                    Utils::addWarningMessage('Nie dokonano żadnych zmian');
                } else {
                    Utils::addInfoMessage('Pomyślnie zapisano rekord');
                }

                
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');

                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            }
        } 
        
        $this->generateView();
    }

    public function load_data() {
        $this->roles = App::getDB()->select("roles", "*");

        $oldRoles = App::getDB()->select("users_roles", ["id_role", "access_date"], [
            'id_user' => $this->form->id
        ]);

        foreach ($oldRoles as $oldRole) {
            $oldRoleName = App::getDB()->select("roles", "*", [
                'id_role' => $oldRole['id_role']
            ]);

            $roleEntry = [
                'name' => $oldRoleName[0]['name'],
                'id_role' => $oldRole['id_role'],
                'access_date' => $oldRole['access_date']
            ];

            array_push($this->userRoles, $roleEntry);
        }

        SessionUtils::store('editedUserRoles', $this->userRoles);
    }

    public function generateView() {
        $this->load_data();
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->assign('roles', $this->roles);
        App::getSmarty()->assign('userRoles', $this->userRoles);
        App::getSmarty()->display('ManageEdit.tpl');
    }
}
