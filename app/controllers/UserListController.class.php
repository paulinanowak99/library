<?php


namespace app\controllers;


use core\App;
use core\Utils;

class UserListController{
    private $records; // rekordy pobrane z bazy

    public function action_userList() {
        // pobranie rekordów z bazy
        try {
            $this->records = App::getDB()->select("users", [
                "id",
                "firstname",
                "lastname",
                "login",
                "password",
                "role"
            ]);
        } catch (\PDOException $exception) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($exception->getMessage());
        }

        // generowanie widoku
        App::getSmarty()->assign('users', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('UserList.tpl');
    }
}