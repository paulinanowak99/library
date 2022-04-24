<?php


namespace app\controllers;


use app\forms\BookSearchForm;
use app\forms\PageForm;
use core\App;
use core\ParamUtils;
use core\Utils;

class BookListController {
    private $records;           // rekordy pobrane z bazy
    private $pagination;        // dane do paginacji
    private $form;              // dane zz formularza wyszukiwania

    public function __construct(){
        $this->pagination = new PageForm();
        $this->form = new BookSearchForm();
    }

    public function action_bookList() {
        $this->loadData();
        $this->assignToSmarty();
        App::getSmarty()->display('BookList.tpl');
    }

    public function action_bookListPart() {
        $this->loadData();
        $this->assignToSmarty();
        App::getSmarty()->display('TableBookList.tpl');
    }

    public function action_bookListUser() {
        $this->loadData();
        $this->assignToSmarty();
        App::getSmarty()->display('BookListUser.tpl');
    }

    public function action_bookListUserPart() {
        $this->validate();
        $this->loadData();
        $this->validate();
        App::getSmarty()->display('TableBookListUser.tpl');
    }

    public function action_bookRentUser() {
        // pobranie ID wypożyczanej książki
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');

        // zmiana statusu książki w bazie
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

    public function validate() {
        $this->form->title = ParamUtils::getFromRequest('sf_title');
        $this->pagination->page = ParamUtils::getFromRequest('page');

        if (empty($this->pagination->page)) {$this->pagination->page = 1; }

        if (!is_numeric($this->pagination->page)) {
            Utils::addErrorMessage("Strona nie jest liczbą.");
        }

        return !App::getMessages()->isError();
    }

    public function loadData() {
        $this->validate();
        //wykonanie zapytania
        try {
            $this->records = App::getDB()->select("books", [
                "id",
                "author",
                "title",
                "status",
            ], [
                "title[~]" => ($this->form->title . '%'),
                "LIMIT" => [($this->pagination->page-1) * $this->pagination->limit, $this->pagination->limit]
            ]);

            $this->pagination->countRecords = App::getDB()->count("books", [
                "title[~]" => ($this->form->title . '%')
            ]);

        } catch (\PDOException $exception) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($exception->getMessage());
        }

        // jeżeli kolejna strona jest dostępna ustaw oneMorePage na true
        if($this->pagination->countRecords - $this->pagination->limit * ($this->pagination->page -1) > $this->pagination->limit) {
            $this->pagination->oneMorePage = true;
        }

        if($this->pagination->page > 1) {
            $this->pagination->previousPage = true;
        }

        $this->pagination->lastPage = ceil($this->pagination->countRecords / $this->pagination->limit);
    }

    public function assignToSmarty() {
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('searchTitle', $this->form->title);
        App::getSmarty()->assign('books', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->assign('id', $_SESSION['id']);
        App::getSmarty()->assign('page', $this->pagination->page);
        App::getSmarty()->assign('limit', $this->pagination->countRecords / $this->pagination->limit);
        App::getSmarty()->assign("oneMorePage", $this->pagination->oneMorePage);
        App::getSmarty()->assign("previousPage", $this->pagination->previousPage);
        App::getSmarty()->assign("lastPage", $this->pagination->lastPage);
    }
}