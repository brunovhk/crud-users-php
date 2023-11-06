<?php

namespace App\Model;

use App\Core\Model;
use App\DAO\SetorDAO;

class SetorModel extends Model
{
    public $id, $name;

    public function save()
    {

        $dao = new SetorDAO();

        if (empty($this->id)) {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }

    public function getAllRows()
    {

        $dao = new SetorDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new SetorDAO();

        $obj = $dao->selectBySetor($id);

        return ($obj) ? $obj : new SetorModel();
    }

    public function getSetorByUser(int $id)
    {

        $dao = new SetorDAO();

        $obj = $dao->selectSetorByUser($id);
        $this->rows = $dao->selectSetorByUser($id);

        return ($obj) ? $obj : new SetorModel();
    }

    public function getUserBySetor(int $id)
    {
        $dao = new SetorDAO();

        $obj = $dao->selectUserBySetor($id);
        $this->rows = $dao->selectUserBySetor($id);

        return ($obj) ? $obj : new SetorModel();
    }

    public function delete(int $id)
    {
        $dao = new SetorDAO();

        $dao->delete($id);
    }
}
