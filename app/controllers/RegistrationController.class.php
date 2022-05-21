<?php


namespace app\controllers;


use app\forms\UserForm;
use core\App;
use core\ParamUtils;
use core\Utils;

class RegistrationController {
    private $form;
    private $records;

    public function __contruct() {
        $this->form = new UserForm();
    }

    public function validateSave() {
        //Pobranie danych z formulaarza
        //$this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji.');
        $this->form->firstname = ParamUtils::getFromRequest('firstname', true, 'Błędne wywołanie aplikacji.');
        $this->form->lastname = ParamUtils::getFromRequest('lastname', true, 'Błędne wywołanie aplikacji.');
        $this->form->login = ParamUtils::getFromRequest('login', true, 'Błędne wywołanie aplikacji.');
        $this->form->email = ParamUtils::getFromRequest('mail', true, 'Błędne wywołanie aplikacji');
        $this->form->password = ParamUtils::getFromRequest('password', true, 'Błędne wywołanie aplikacji.');
        $this->form->captcha = ParamUtils::getFromRequest('captcha', true, 'Błędne wywołanie aplikacji.');
        $repeatedPassword = ParamUtils::getFromRequest('repeatedPassword', true, 'Błędne wywołanie aplikacji.');


        if (App::getMessages()->isError()) {
            return false;
        }

        //Sprawdzenie czy wartości wymagane nie są puste
        if(empty(trim($this->form->firstname))) {
            Utils::addErrorMessage('Wprowadź imię.');
        }
        if(empty(trim($this->form->lastname))) {
            Utils::addErrorMessage('Wprowadź nazwisko.');
        }
        if(empty(trim($this->form->login))) {
            Utils::addErrorMessage('Wprowadź nazwę użytkownika.');
        }

        try {
            $records = App::getDB()->count("users", ['login' => $this->form->login]);

            if($records > 0) {
                Utils::addErrorMessage("Taki użytkownik już istnieje.");
            }
        } catch (\PDOException $exception) {
            Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($exception->getMessage());
            }
        }

        if(empty(trim($this->form->email))) {
            Utils::addErrorMessage('Wprowadź adres e-mail.');
        }
        if(!preg_match('/^[a-z]+[0-9]*@[a-z]+\\.[a-z]+$/', $this->form->email)) {
            Utils::addErrorMessage('Wprowadzono niepoprawny adres e-mail');
        }
        if(empty(trim($this->form->password))) {
            Utils::addErrorMessage('Wprowadź hasło.');
        }
        if(empty(trim($repeatedPassword))) {
            Utils::addErrorMessage('Powtórz hasło.');
        }
        if(strcmp($this->form->password, $repeatedPassword)) {
            Utils::addErrorMessage('Hasła nie są takie same');
        }
        if ($this->form->captcha !== $_SESSION['captcha']) {
            Utils::addErrorMessage("Błędna captcha");
        }

        if (App::getMessages()->isError()) {
            return false;
        }

        return !App::getMessages()->isError();
    }

    public function action_registrationSave() {
        if($this->validateSave()) {
            try {
                if($this->form->id == '') {
                    $this->form->passwordHash = password_hash($this->form->password, PASSWORD_BCRYPT);
                    //Dodanie nowego rekordu
                    App::getDB()->insert("users", [
                        "firstname" => $this->form->firstname,
                        "lastname" => $this->form->lastname,
                        "login" => $this->form->login,
                        "password" => $this->form->passwordHash,
                        "role" => "user"
                    ]);
                }

                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $exception) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug) {
                    Utils::addErrorMessage($exception->getMessage());
                }
            }

            //Po zapisie przejdź na stronę logowania (w ramach tego samego żądania http)
            $this->generateView();
        } else {
            //Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function action_registration() {
        App::getSmarty()->display('RegistrationView.tpl');
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('RegistrationView.tpl');
    }
}