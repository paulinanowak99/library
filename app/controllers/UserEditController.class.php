<?php


namespace app\controllers;


use app\forms\UserForm;
use core\App;
use core\ParamUtils;
use core\Utils;

class UserEditController{

    private $form; //Dane z formularza

    //Tworzenie obiektów
    public function __construct(){
        $this->form = new UserForm();
    }

    public function action_userEdit() {
        //Walidacja id osoby do edycji
        if($this->validateEdit()) {
            try {
                //Odczyt z bazy danych osoby o podanym ID
                $record = App::getDB()->get("users", "*", [
                    "id" => $this->form->id
                ]);

                //Jeżeli osoba istnieje wpisz jej dane do formularza
                $this->form->id = $record["id"];
                $this->form->firstname = $record["firstname"];
                $this->form->lastname = $record["lastname"];
                $this->form->login = $record["login"];
                $this->form->password = $record["password"];
                $this->form->role = $record["role"];
            }catch (\PDOException $exception) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($exception->getMessage());
            }
        }

        //Generowanie widoku
        $this->generateView();
    }

    public function action_userDelete() {
        //Walidacja ID osoby do usunięcia
        if($this->validateEdit()) {
            try {
                //Usunięcie rekordu
                App::getDB()->delete("users", [
                    "id" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord.');
            } catch (\PDOException $exception) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if(App::getConf()->debug) {
                    Utils::addErrorMessage($exception->getMessage());
                }
            }
        }

        //Przekierowanie na stronę listy osób
        App::getRouter()->forwardTo('userList');
    }

    public function action_userNew() {
        $this->generateView();
    }

    public function action_userSave() {
        //Walidacja danych z formularza z pobraniem
        if($this->validateSave()) {
            try {
                if($this->form->id == '') {
                    //Dodanie nowego rekordu
                    App::getDB()->insert("users", [
                        "firstname" => $this->form->firstname,
                        "lastname" => $this->form->lastname,
                        "login" => $this->form->login,
                        "password" => $this->form->password,
                        "role" => $this->form->role
                    ]);
                } else {
                    //Edycja rekordu o danym ID
                    App::getDB()->update("users", [
                        "firstname" => $this->form->firstname,
                        "lastname" => $this->form->lastname,
                        "login" => $this->form->login,
                        "password" => $this->form->password,
                        "role" => $this->form->role
                    ], [
                        "id" => $this->form->id
                    ]);
                }

                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $exception) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug) {
                    Utils::addErrorMessage($exception->getMessage());
                }
            }

            //Po zapisie przejdź na stronę listy użytkowników (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('userList');
        } else {
            //Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }

    }

    //Walidacja danych przed wyświetleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function validateSave() {
        //Pobranie danych z formularza
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacjji.');
        $this->form->firstname = ParamUtils::getFromRequest('firstname', true, 'Błędne wywołanie aplikacjji.');
        $this->form->lastname = ParamUtils::getFromRequest('lastname', true, 'Błędne wywołanie aplikacjji.');
        $this->form->login = ParamUtils::getFromRequest('login', true, 'Błędne wywołanie aplikacjji.');
        $this->form->password = ParamUtils::getFromRequest('password', true, 'Błędne wywołanie aplikacjji.');
        $this->form->role = ParamUtils::getFromRequest('role', true, 'Błędne wywołanie aplikacjji.');

        if (App::getMessages()->isError()) {
            return false;
        }

        //Sprawdzenie czy wartości wymagane nie są puste
        if(empty(trim($this->form->firstname))) {
            Utils::addErrorMessage('Wprowadź imię.');
        }
        if(empty(trim($this->form->lastname))) {
            Utils::addErrorMessage('Wprowadź nazwisko');
        }
        if(empty(trim($this->form->login))) {
            Utils::addErrorMessage('Wprowadź login');
        }
        if(empty(trim($this->form->password))) {
            Utils::addErrorMessage('Wprowadź hasło.');
        }
        if(empty(trim($this->form->role))) {
            Utils::addErrorMessage('Wprowadź rolę.');
        }

        if (App::getMessages()->isError()) {
            return false;
        }

        return !App::getMessages()->isError();
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('userEdit.tpl');
    }

}