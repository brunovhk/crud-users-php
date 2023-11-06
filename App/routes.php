<?php

use App\Controller\SetorController;
use App\Controller\UserController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
        UserController::index();
        break;
    case '/user/register':
        UserController::register();
        break;
    case '/user/register/save':
        UserController::save();
        break;
    case '/user/edit':
        UserController::edit();
        break;
    case '/user/edit/save':
        UserController::update();
        break;
    case '/user/delete':
        UserController::delete();
        break;
    case '/setores':
        SetorController::index();
        break;
    case '/setores/register':
        SetorController::form();
        break;
    case '/setores/register/save':
        SetorController::save();
        break;
    case '/setores/delete':
        SetorController::delete();
        break;
    case '/user/setores/search':
        SetorController::search();
        break;
    default:
        echo 'ERROR 404';
        http_response_code(404);
        break;
}
