<?php

namespace App\Model;

use App\Core\Model;
use App\DAO\UserDAO;

class UserModel extends Model
{
    public $id, $name, $email, $setores;

    public function update()
    {
        $dao = new UserDAO();
        
        $dao->update($this);
    }

    public function register()
    {
        $dao = new UserDAO();

        $dao->insert($this);
    }

    public function removeSetoresFromUser($setores, $user_id)
    {
        $dao = new UserDAO();

        $dao->removeSetorFromUser($setores, $user_id);
    }

    public function insertSetoresToUser($setores, $user_id)
    {
        $dao = new UserDAO();

        $dao->insertSetorToUser($setores, $user_id);
    }

    public function getAllRows()
    {

        $dao = new UserDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {

        $dao = new UserDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new UserModel();
    }

    public function delete(int $id)
    {
        $dao = new UserDAO();

        $dao->delete($id);
    }
}
