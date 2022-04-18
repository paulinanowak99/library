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
        if($this->validate()) {

            Utils::addErrorMessage('Poprawnie zalogowany do systemu');
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

        $this->form->role = App::getDB()->select("users", "role", [
            "login" => $this->form->login,
            "password" => $this->form->password
        ]);

        $this->form->id = App::getDB()->select("users", "id", [
            "login" => $this->form->login,
            "password" => $this->form->password
        ]);

        $this->form->role = implode($this->form->role);
        $this->form->id = implode($this->form->id);

        $_SESSION['id'] = $this->form->id;

        // sprawdzenie, czy dane logowania poprawne
        // (takie informacje najczęściej przechowuje się w bazie danych)
        if ($this->form->role == "admin") {
            RoleUtils::addRole('admin');
            $this->form->forward = "bookList";
        } else if ($this->form->role == "user") {
            RoleUtils::addRole('user');
            $this->form->forward = "bookListUser";
        } else {
            Utils::addErrorMessage('Niepoprawny login lub hasło');
        }

        return !App::getMessages()->isError();
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
        App::getSmarty()->display('LoginView.tpl');
    }
}