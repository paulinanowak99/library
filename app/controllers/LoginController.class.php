<?php


namespace app\controllers;


use app\forms\LoginForm;
use core\App;
use core\ParamUtils;
use core\RoleUtils;
use core\Utils;

class LoginController {
    private $form;

    public function __contruct() {
        $this->form = new LoginForm();
    }

    public function action_login() {
        if (!isset($_SESSION["loginFailed"])) {
            $_SESSION["loginFailed"] = 0;
        }

        if($this->validate()) {
            Utils::addErrorMessage('Poprawnie zalogowany do systemu');
            $_SESSION['loginFailed'] = 0;
            App::getRouter()->redirectTo($this->form->forward);
        } else {
            $this->generateView();
        }
    }

    public function action_loginShow() {
        $this->generateView();
    }

    public function action_logout() {
        session_destroy();
        App::getRouter()->redirectTo("bookList");
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->password = ParamUtils::getFromRequest('password');

        if ($_SESSION["loginFailed"] > 4) {
            $this->form->captcha = ParamUtils::getFromRequest('captcha');
        }

        //nie ma sensu walidować dalej, gdy brak parametrów
        if (!isset($this->form->login))
            return false;

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->password)) {
            Utils::addErrorMessage('Nie podano hasła');
        }

        //nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError())
            return false;

        $this->form->passwordHash = App::getDB()->select("users", "password", [
            "login" => $this->form->login
        ]);

        if(password_verify($this->form->password, $this->form->passwordHash[0])) {

            $this->form->role = App::getDB()->select("users", "role", [
                "login" => $this->form->login
            ]);

            $this->form->id = App::getDB()->select("users", "id", [
                "login" => $this->form->login
            ]);

            $this->form->role = implode($this->form->role);
            $this->form->id = implode($this->form->id);

            $_SESSION['id'] = $this->form->id;

            if ($this->form->role == "admin") {
                RoleUtils::addRole('admin');
                $this->form->forward = "bookList";
            } else if ($this->form->role == "user") {
                RoleUtils::addRole('user');
                $this->form->forward = "bookListUser";
            }
        } else {
            $_SESSION['loginFailed']++;
            Utils::addErrorMessage("Nieprawidłowy użytkownik lub hasło");
        }

        if ($_SESSION["loginFailed"] > 4) {
            if ($this->form->captcha !== $_SESSION['captcha']) {
                Utils::addErrorMessage("Błędna captcha");
            }
        }

        return !App::getMessages()->isError();
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
        App::getSmarty()->assign('loginFailed', $_SESSION['loginFailed']);
        App::getSmarty()->display('LoginView.tpl');
    }
}