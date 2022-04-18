<?php


namespace app\controllers;


use core\App;
use core\ParamUtils;
use core\Utils;

class BookListController {
    private $records; //rekordy pobrane z bazy

    public function action_bookList() {
        try {
            $this->records = App::getDB()->select("books", [
                "id",
                "author",
                "title",
                "status",
            ]);
        } catch (\PDOException $exception) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($exception->getMessage());
        }

        $this->generateView();
    }

    public function action_bookListUser() {
        try {
            $this->records = App::getDB()->select("books", [
                "id",
                "author",
                "title",
                "status",
            ]);
        } catch (\PDOException $exception) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($exception->getMessage());
        }
        $this->generateViewUser();
    }

    public function action_bookRentUser() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');

        App::getDB()->update("books", [
            "status" => "wypożyczona"
        ], [
            "id" => $this->form->id
        ]);

        App::getDB()->insert("rents", [
            "user_id" => $_SESSION['id'],
            "book_id" => $this->form->id
        ]);

        App::getRouter()->forwardTo('bookListUser');
    }

    public function action_availableBooks() {
        try {
            $this->records = App::getDB()->select("books", [
                "id",
                "author",
                "title",
                "status",
            ], [
                "status" => "dostępna"
            ]);
        } catch (\PDOException $exception) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($exception->getMessage());
        }
        $this->generateViewUser();
    }

    public function generateView() {
        App::getSmarty()->assign('books', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('BookList.tpl');
    }

    public function generateViewUser() {
        App::getSmarty()->assign('books', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->assign('id', $_SESSION['id']);
        App::getSmarty()->display('BookListUser.tpl');
    }
}