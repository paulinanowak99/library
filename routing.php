<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('bookList'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('hello', 'HelloCtrl');
//Utils::addRoute('action_name', 'controller_class_name');
Utils::addRoute('userList', 'UserListController', ['admin']);
Utils::addRoute('userNew', 'UserEditController', ['admin']);
Utils::addRoute('userEdit', 'UserEditController', ['admin']);
Utils::addRoute('userDelete', 'UserEditController', ['admin']);
Utils::addRoute('userSave', 'UserEditController', ['admin']);

Utils::addRoute('bookList', 'BookListController',['admin']);
Utils::addRoute('bookListPart', 'bookListController',['admin']);
Utils::addRoute('bookNew', 'BookEditController', ['admin']);
Utils::addRoute('bookEdit', 'BookEditController', ['admin']);
Utils::addRoute('bookDelete', 'BookEditController', ['admin']);
Utils::addRoute('bookSave', 'BookEditController', ['admin']);

Utils::addRoute('login', 'LoginController');
Utils::addRoute('loginShow', 'LoginController');
Utils::addRoute('logout', 'LoginController');
Utils::addRoute('registration', 'RegistrationController');
Utils::addRoute('registrationSave', 'RegistrationController');

Utils::addRoute('rentList', 'RentsController', ['admin']);
Utils::addRoute('rentDelete', 'RentsController', ['admin']);
Utils::addRoute('rentsListUser', 'RentsController', ['user']);

Utils::addRoute('bookListUser', 'BookListController', ['user']);
Utils::addRoute('bookListUserPart', 'BookListController', ['user']);
Utils::addRoute('bookRentUser', 'BookListController', ['user']);
// Utils::addRoute('availableBooks', 'BookListController', ['user']);
