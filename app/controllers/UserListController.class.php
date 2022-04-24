<?php


namespace app\controllers;


use app\forms\PageForm;
use app\forms\UserForm;
use core\App;
use core\ParamUtils;
use core\Utils;

class UserListController{
    private $records; // rekordy pobrane z bazy
    private $pagination;
    private $form;

    public function __construct(){
        $this->pagination = new PageForm();
        $this->form = new UserForm();
    }

    public function action_userList() {
        $this->load_data();
        $this->assignToSmarty();
        App::getSmarty()->display('UserList.tpl');
    }

    public function action_userListPart() {
        $this->load_data();
        $this->assignToSmarty();
        App::getSmarty()->display('TableUserList.tpl');
    }

    public function validate() {
        $this->form->lastname = ParamUtils::getFromRequest('sf_lastname');
        $this->pagination->page = ParamUtils::getFromRequest('page');

        if (empty($this->pagination->page)) {$this->pagination->page = 1; }

        if (!is_numeric($this->pagination->page)) {
            Utils::addErrorMessage("Strona nie jest liczbą.");
        }

        return !App::getMessages()->isError();
    }

    public function load_data() {
        $this->validate();
        try {
            $this->records = App::getDB()->select("users", [
                "id",
                "firstname",
                "lastname",
                "login",
                "password",
                "role"
            ], [
                "lastname[~]" => ($this->form->lastname . '%'),
                "LIMIT" => [($this->pagination->page-1) * $this->pagination->limit, $this->pagination->limit]
            ]);

            $this->pagination->countRecords = App::getDB()->count("users", [
                "lastname[~]" => ($this->form->lastname . '%')
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
        App::getSmarty()->assign('users', $this->records);
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('searchLastname', $this->form->lastname);
        App::getSmarty()->assign('id', $_SESSION['id']);
        App::getSmarty()->assign('page', $this->pagination->page);
        App::getSmarty()->assign('limit', $this->pagination->countRecords / $this->pagination->limit);
        App::getSmarty()->assign("oneMorePage", $this->pagination->oneMorePage);
        App::getSmarty()->assign("previousPage", $this->pagination->previousPage);
        App::getSmarty()->assign("lastPage", $this->pagination->lastPage);
    }
}