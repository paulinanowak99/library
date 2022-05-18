<?php


namespace app\controllers;


use app\forms\CommentForm;
use core\App;
use core\Utils;

class CommentListController {
    private $records;

    public function action_commentList() {
        try {
            $this->records = App::getDB()->select("comments", [
                "id",
                "name",
                "comment",
                "date",
            ]);
        } catch (\PDOException $exception) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($exception->getMessage());
        }

        $this->generateView();
    }

    public function generateView() {
        App::getSmarty()->assign('comments', $this->records); // dane formularza dla widoku
        App::getSmarty()->display('CommentList.tpl');
    }

}