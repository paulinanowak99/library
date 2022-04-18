<?php


namespace app\controllers;


use app\forms\BookForm;
use core\App;
use core\ParamUtils;
use core\Utils;

class BookEditController {
    private $form;

    public function __construct(){
        $this->form = new BookForm();
    }

    public function action_bookEdit() {
        //Walidacja id książki do edycji
        if($this->validateEdit()) {
            try {
                $record = App::getDB()->get("books", "*", [
                    "id" => $this->form->id
                ]);

                //Jeżeli osoba istnieje wpisz jej dane do formularza
                $this->form->author = $record["author"];
                $this->form->title = $record["title"];
            } catch (\PDOException $exception) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($exception->getMessage());
            }
        }
        $this->generateView();
    }

    public function action_bookSave() {
        if($this->validateSave()) {
            try {
                if($this->form->id == '') {
                    //Dodanie nowego rekordu
                    App::getDB()->insert("books", [
                        "author" => $this->form->author,
                        "title" => $this->form->title,
                        "status" => "dostępna"
                    ]);
                } else {
                    //Edycja rekordu o danym ID
                    App::getDB()->update("books", [
                        "author" => $this->form->author,
                        "title" => $this->form->title,
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

            //Po zapisie przejdź na stronę listy książek (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('bookList');
        } else {
            //Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function action_bookDelete() {
        //Walidacja ID książki do usunięcia
        if($this->validateEdit()) {
            try {
                //Usunięcie rekordu
                App::getDB()->delete("books", [
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
        App::getRouter()->forwardTo('bookList');
    }

    public function action_bookNew() {
        $this->generateView();
    }

    public function validateSave() {
        //Pobranie danych z formulaarza
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacjji.');
        $this->form->author = ParamUtils::getFromRequest('author', true, 'Błędne wywołanie aplikacjji.');
        $this->form->title = ParamUtils::getFromRequest('title', true, 'Błędne wywołanie aplikacjji.');

        if (App::getMessages()->isError()) {
            return false;
        }

        //Sprawdzenie czy wartości wymagane nie są puste
        if(empty(trim($this->form->author))) {
            Utils::addErrorMessage('Wprowadź autora.');
        }
        if(empty(trim($this->form->title))) {
            Utils::addErrorMessage('Wprowadź tytuł.');
        }

        if (App::getMessages()->isError()) {
            return false;
        }

        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('BookEdit.tpl');
    }

}