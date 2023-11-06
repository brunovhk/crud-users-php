<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\SetorModel;
use App\Model\UserModel;

class UserController extends Controller
{
    // Index da página de registros de Usuários
    public static function index()
    {
        $model = new UserModel();
        $model->getAllRows();

        $modelSetor = new SetorModel;
        $modelSetor->getAllRows();

        $model->setores = $modelSetor->rows;

        parent::render('User/ListUsers', $model);
    }
    // Index do formulário de edição de usuário
    public static function edit()
    {
        $model = new UserModel();

        if (isset($_GET['id'])) {
            $model = $model->getById((int) $_GET['id']);

            $modelSetor = new SetorModel;
            $modelSetor->getAllRows();

            $model->setores = $modelSetor->rows;

            $model->userSetores = $modelSetor->getSetorByUser((int) $_GET['id']);
        }
        parent::render('User/EditUser', $model);
    }

    // Salvar alterações nos registros e setores de um usuário
    public static function update()
    {
        $model = new UserModel();

        $model->id = $_POST['id'];
        $model->name = $_POST['name'];
        $model->email = $_POST['email'];

        $modelSetor = new SetorModel;
        $modelSetor->getSetorByUser($model->id);

        $model->setores = $modelSetor->rows;

        $setoresSelectedByUser = array_map('intval', $_POST['setores']);
        // Setores a serem removidos do usuário
        $setoresToRemoveFromUser = array_diff($model->setores, $setoresSelectedByUser);

        // Remoção de setores do usuário de acordo com a diferença no array de setores selecionados e setores do database
        (!empty($setoresSelectedByUser)) ? $model->removeSetoresFromUser($setoresToRemoveFromUser, $model->id) : null;
        // Remoção de todos os setores vinculados a um usuário caso sejam removidos todos do formulário
        (empty($setoresSelectedByUser) && !empty($model->setores)) ? $model->removeSetoresFromUser($model->setores, $model->id) : null;
        // Remoção de setores já vinculados ao usuário
        $newSetores = array_diff($setoresSelectedByUser, $model->setores);
        // Inserção de setores a um usuário
        !empty($newSetores) ? $model->insertSetoresToUser($newSetores, $model->id) : null;
        // Salvando dados do usuário
        $model->update();

        header("Location: /");
    }
    // Index do formulário de cadastro de usuários
    public static function register()
    {

        $model = new UserModel();

        $modelSetor = new SetorModel;
        $modelSetor->getAllRows();

        $model->setores = $modelSetor->rows;

        parent::render('User/RegisterUser', $model);
    }

    // Salvar registros de um novo usuário
    public static function save()
    {
        $model = new UserModel();

        $model->name = $_POST['name'];
        $model->email = $_POST['email'];

        // Salvando dados do usuário
        $model->register();
        
        header("Location: /");
    }
    
    // Deleção de um usuário
    public static function delete()
    {
        $model = new UserModel();

        $model->delete((int) $_GET['id']);

        header("Location: /");
    }
}
