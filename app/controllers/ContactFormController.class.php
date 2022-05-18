<?php


namespace app\controllers;


use app\forms\ContactForm;
use core\App;
use core\ParamUtils;
use core\Utils;

class ContactFormController{
    private $form;

    public function __construct(){
        $this->form = new ContactForm();
    }

    public function action_contactFormSend() {
        if($this->validate()) {
            mail("nowakpaulina319@gmail.com",
                "Formularz kontaktowy",
                "Treść wiadomości: ".$this->form->message,
                "From: ".$this->form->firstname." ".$this->form->lastname." ".$this->form->email);
            Utils::addInfoMessage('Pomyślnie przesłano formularz kontaktowy');
            App::getRouter()->forwardTo('LoginView.tpl');
        } else {
            $this->generateView();
        }
    }

    public function action_contactForm() {
        $this->generateView();
    }

    public function validate() {
        $this->form->firstname = ParamUtils::getFromRequest('firstname', true, 'Błędne wywołanie aplikacjji1.');
        $this->form->lastname = ParamUtils::getFromRequest('lastname', true, 'Błędne wywołanie aplikacjji.2');
        $this->form->email = ParamUtils::getFromRequest('mail', true, 'Błędne wywołanie aplikacjji.3');
        $this->form->message = ParamUtils::getFromRequest('message', true, 'Błędne wywołanie aplikacjji.4');

        if (App::getMessages()->isError()) {
            return false;
        }

        if(empty(trim($this->form->firstname))) {
            Utils::addErrorMessage('Wprowadź imię.');
        }
        if(empty(trim($this->form->lastname))) {
            Utils::addErrorMessage('Wprowadź nazwisko.');
        }
        if(empty(trim($this->form->email))) {
            Utils::addErrorMessage('Wprowadź adres e-mail.');
        }
        if(!preg_match('/^[a-z]+[0-9]*@[a-z]+\\.[a-z]+$/', $this->form->email)) {
            Utils::addErrorMessage('Wprowadzono niepoprawny adres e-mail');
        }
        if(empty(trim($this->form->message))) {
            Utils::addErrorMessage('Wprowadź treść wiadomości.');
        }

        if (App::getMessages()->isError()) {
            return false;
        }

        return !App::getMessages()->isError();
    }

    public function generateView() {
        App::getSmarty()->display('ContactForm.tpl');
    }

}