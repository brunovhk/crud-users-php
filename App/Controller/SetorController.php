<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\SetorModel;

class SetorController extends Controller
{
    // Index da página de registros de Setores
    public static function index()
    {

        $model = new SetorModel();
        $model->getAllRows();

        parent::render('Setor/ListSetores', $model);
    }
    // Index do formulário de edição de Setor
    public static function form()
    {
        $model = new SetorModel();

        if (isset($_GET['id'])) {
            $model = $model->getById((int) $_GET['id']);
        }
        parent::render('Setor/FormSetor', $model);
    }
    // Salvar alterações nos registros de um setor
    public static function save()
    {
        $model = new SetorModel();

        $model->id = $_POST['id'];
        $model->name = $_POST['name'];

        $model->save();

        header("Location: /setores");
    }
    // Filtro de usuários por setor
    public static function search()
    {
        if (isset($_GET['id'])) {

            $model = new SetorModel;
            $model->getUserBySetor($_GET['id']);

            echo json_encode(array("filter_setores" => $model->rows));
        }
    }
    // Deleção de um setor
    public static function delete()
    {
        $model = new SetorModel();

        $model->delete((int) $_GET['id']);

        header("Location: /setores");
    }
}
