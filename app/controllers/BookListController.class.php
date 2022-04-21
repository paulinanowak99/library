<?php


namespace app\controllers;


use app\forms\PageForm;
use core\App;
use core\ParamUtils;
use core\Utils;

class BookListController {
    private $records; //rekordy pobrane z bazy
    private $form;

    public function __construct(){
        $this->form = new PageForm();
    }

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
        $this->form->page = ParamUtils::getFromCleanURL(1, false, 'Błędne wywołanie aplikacji.');

        if (empty($this->form->page)) {$this->form->page = 1; }

        if (!is_numeric($this->form->page)) {
            Utils::addErrorMessage("Strona nie jest liczbą.");
        }
        try {
            $this->records = App::getDB()->select("books", [
                "id",
                "author",
                "title",
                "status",
            ], [
                "LIMIT" => [($this->form->page-1) * $this->form->limit, $this->form->limit]
            ]);

            $this->form->countRecords = App::getDB()->count("books");

        } catch (\PDOException $exception) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($exception->getMessage());
        }

        if($this->form->countRecords - $this->form->limit * ($this->form->page -1) > $this->form->limit) {
            $this->form->oneMorePage = true;

            if($this->form->countRecords - $this->form->limit * ($this->form->page -1) > $this->form->limit * 2) {
                $this->form->twoMorePages = true;
            }
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

//    public function action_availableBooks() {
//        try {
//            $this->records = App::getDB()->select("books", [
//                "id",
//                "author",
//                "title",
//                "status",
//            ], [
//                "status" => "dostępna"
//            ]);
//        } catch (\PDOException $exception) {
//            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
//            if (App::getConf()->debug)
//                Utils::addErrorMessage($exception->getMessage());
//        }
//        $this->generateViewUser();
//    }

    public function generateView() {
        App::getSmarty()->assign('books', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('BookList.tpl');
    }

    public function generateViewUser() {
        App::getSmarty()->assign('books', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->assign('id', $_SESSION['id']);
        App::getSmarty()->assign('page', $this->form->page);
        App::getSmarty()->assign('limit', $this->form->countRecords / $this->form->limit);
        App::getSmarty()->assign("oneMorePage", $this->form->oneMorePage);
        App::getSmarty()->assign("twoMorePages", $this->form->twoMorePages);
        App::getSmarty()->display('BookListUser.tpl');
    }
}