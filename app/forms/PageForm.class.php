<?php


namespace app\forms;


class PageForm {
    public $page;
    public $limit = 2;
    public $countRecords;
    public $previousPage = false;
    public $oneMorePage = false;
    public $lastPage;

}