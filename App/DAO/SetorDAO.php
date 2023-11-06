<?php

namespace App\DAO;

use App\Core\DAO;
use App\Model\SetorModel;
use \PDO;

class SetorDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(SetorModel $model)
    {
        $sql = "INSERT INTO setores (name) VALUES (?);";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $model->name);

        $stmt->execute();
    }

    public function update(SetorModel $model)
    {
        $sql = "UPDATE setores SET name = ? WHERE id = ?;";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $model->name);
        $stmt->bindValue(2, $model->id);

        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM setores;";

        $stmt = $this->connection->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectBySetor(int $id)
    {
        $sql = "SELECT * FROM setores WHERE id = ?;";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject('App\\Model\\SetorModel');
    }

    public function selectSetorByUser(int $id)
    {
        $sql = "SELECT setor_id FROM user_setores WHERE user_id = ?;";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return array_map('intval', $stmt->fetchAll(PDO::FETCH_COLUMN, 0));
    }

    public function selectUserBySetor(int $id)
    {
        if (isset($id)) {
            $sql = "SELECT users.id AS user_id, users.name AS user_name, users.email AS user_email, setores.id AS setor_id, setores.name AS setor_name FROM users INNER JOIN user_setores ON users.id = user_setores.user_id INNER JOIN setores ON user_setores.setor_id = setores.id WHERE setores.id = ?;";

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(1, $id);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM setores WHERE id = ?;";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}
