<?php


namespace app\controllers;


use app\forms\CommentForm;
use core\App;
use core\ParamUtils;
use core\Utils;

class CommentAddController {
    private $form;

    public function __construct(){
        $this->form = new CommentForm();
    }

    public function action_commentNew() {
        $this->generateView();
    }

    public function action_commentSave() {
        if($this->validate()) {
            try {
                App::getDB()->insert("comments", [
                    "name" => $this->form->name,
                    "comment" => $this->form->comment,
                    "date" => $this->form->date
                ]);
            } catch (\PDOException $exception) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug) {
                    Utils::addErrorMessage($exception->getMessage());
                }
            }
            App::getRouter()->forwardTo('commentList');
        } else {
            //Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function validate() {
        $this->form->name = ParamUtils::getFromRequest('name', true, 'Błędne wywołanie aplikacjji.');
        $this->form->comment = ParamUtils::getFromRequest('comment', true, 'Błędne wywołanie aplikacjji.');
        $this->form->date = date("Y-m-d", time());

        if (App::getMessages()->isError()) {
            return false;
        }

        if(empty(trim($this->form->name))) {
            Utils::addErrorMessage('Wprowadź imię.');
        }
        if(empty(trim($this->form->comment))) {
            Utils::addErrorMessage('Wprowadź komentarz.');
        }

        if (App::getMessages()->isError()) {
            return false;
        }

        return !App::getMessages()->isError();
    }

    public function generateView() {
        App::getSmarty()->display('CommentAdd.tpl');
    }

}