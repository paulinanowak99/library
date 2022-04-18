<?php


namespace app\controllers;


use core\App;
use core\ParamUtils;
use core\Utils;

class RentsController {
    private $records;
    public function action_rentList() {
        try {
            $this->records = App::getDB()->select("rents", [
                "[><]users" => ["user_id" => "id"],
                "[><]books" => ["book_id" => "id"]
            ], [
                "rents.id",
                "users.firstname",
                "users.lastname",
                "books.author",
                "books.title"
            ]);
        } catch (\PDOException $exception) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($exception->getMessage());
        }

        $this->generateView();
    }

    public function action_rentDelete() {
        $id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        $idBook = App::getDB()->select("rents", "book_id", [
            "id" => $id
        ]);

        try {
            //Usunięcie rekordu
            App::getDB()->delete("rents", [
                "id" => $id
            ]);
            App::getDB()->update("books", [
                "status" => "dostępna"
            ], [
                "id" => $idBook
            ]);
            Utils::addInfoMessage('Pomyślnie zwrócono książkę.');
        } catch (\PDOException $exception) {
            Utils::addErrorMessage('Wystąpił błąd podczas zwracania książki');
            if(App::getConf()->debug) {
                Utils::addErrorMessage($exception->getMessage());
            }
        }

        //Przekierowanie na stronę listy wypożyczeń
        App::getRouter()->forwardTo('rentList');
    }

    public function action_rentsListUser() {
        try {
            $this->records = App::getDB()->select("rents", [
                "[><]users" => ["user_id" => "id"],
                "[><]books" => ["book_id" => "id"]
            ], [
                "rents.id",
                "books.author",
                "books.title"
            ], [
                "rents.user_id" => $_SESSION['id']
            ]);
        } catch (\PDOException $exception) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($exception->getMessage());
        }

        $this->generateViewUser();
    }

    public function generateView() {
        App::getSmarty()->assign('rents', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('RentList.tpl');
    }

    public function generateViewUser() {
        App::getSmarty()->assign('rents', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('RentListUser.tpl');
    }
}