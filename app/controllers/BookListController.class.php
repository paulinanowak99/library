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
        try {
            // wyciągnięcie wszystkich rekordów z bazy
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
        // pobranie wybranej przez klienta strony
        $this->pagination->page = ParamUtils::getFromCleanURL(1, false, 'Błędne wywołanie aplikacji.');

        // jeżeli nie została wybrana żadna strona ustaw 1
        if (empty($this->pagination->page)) {$this->pagination->page = 1; }

        if (!is_numeric($this->pagination->page)) {
            Utils::addErrorMessage("Strona nie jest liczbą.");
        }
        try {
            // pobranie rekordów na jedną stronę
            $this->records = App::getDB()->select("books", [
                "id",
                "author",
                "title",
                "status",
            ], [
                "LIMIT" => [($this->pagination->page-1) * $this->pagination->limit, $this->pagination->limit]
            ]);

            // pobranie liczby rekordów z bazy
            $this->pagination->countRecords = App::getDB()->count("books");

        } catch (\PDOException $exception) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($exception->getMessage());
        }

        // jeżeli kolejna strona jest dostępna ustaw oneMorePage na true
        if($this->pagination->countRecords - $this->pagination->limit * ($this->pagination->page -1) > $this->pagination->limit) {
            $this->pagination->oneMorePage = true;

            // jeżeli kolejna strona jest dostępna ustaw twoMorePage na true
            if($this->pagination->countRecords - $this->pagination->limit * ($this->pagination->page -1) > $this->pagination->limit * 2) {
                $this->pagination->twoMorePages = true;
            }
        }


        $this->generateViewUser();
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

    public function action_bookListUserPart() {
        $this->form->title = ParamUtils::getFromRequest('sf_title');

        if (empty($this->pagination->page)) {$this->pagination->page = 1; }

        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->title) && strlen($this->form->title) > 0) {
            $search_params['title[~]'] = $this->form->title . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }

        $where = &$search_params;
        //dodanie frazy sortującej po nazwisku
        $where ["ORDER"] = "title";

        //wykonanie zapytania
        try {
            $this->records = App::getDB()->select("books", [
                "id",
                "author",
                "title",
                "status",
            ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        // jeżeli kolejna strona jest dostępna ustaw oneMorePage na true
        if($this->pagination->countRecords - $this->pagination->limit * ($this->pagination->page -1) > $this->pagination->limit) {
            $this->pagination->oneMorePage = true;

            // jeżeli kolejna strona jest dostępna ustaw twoMorePage na true
            if($this->pagination->countRecords - $this->pagination->limit * ($this->pagination->page -1) > $this->pagination->limit * 2) {
                $this->pagination->twoMorePages = true;
            }
        }

        App::getSmarty()->assign('page', $this->pagination->page);
        App::getSmarty()->assign('limit', $this->pagination->countRecords / $this->pagination->limit);
        App::getSmarty()->assign("oneMorePage", $this->pagination->oneMorePage);
        App::getSmarty()->assign("twoMorePages", $this->pagination->twoMorePages);
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('books', $this->records);
        App::getSmarty()->display('TableBookListUser.tpl');
    }

    public function generateView() {
        App::getSmarty()->assign('books', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->assign('id', $_SESSION['id']);
        App::getSmarty()->display('BookList.tpl');
    }

    public function generateViewUser() {
        App::getSmarty()->assign('books', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->assign('id', $_SESSION['id']);
        App::getSmarty()->assign('page', $this->pagination->page);
        App::getSmarty()->assign('limit', $this->pagination->countRecords / $this->pagination->limit);
        App::getSmarty()->assign("oneMorePage", $this->pagination->oneMorePage);
        App::getSmarty()->assign("twoMorePages", $this->pagination->twoMorePages);
        App::getSmarty()->display('BookListUser.tpl');
    }
}