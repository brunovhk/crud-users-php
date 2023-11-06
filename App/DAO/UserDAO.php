<?php

namespace App\DAO;

use App\Core\DAO;
use App\Model\UserModel;
use \PDO;

class UserDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(UserModel $model)
    {
        $sql = "INSERT INTO users (name, email) VALUES (?, ?);";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $model->name);
        $stmt->bindValue(2, $model->email);

        $stmt->execute();
    }

    public function insertSetorToUser($setores, $user_id)
    {
        foreach ($setores as $setor) {
            $sql = "INSERT INTO user_setores (setor_id, user_id) VALUES (?, ?);";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(1, $setor);
            $stmt->bindValue(2, $user_id);

            $stmt->execute();
        }

    }

    public function update(UserModel $model)
    {
        $sql = "UPDATE users SET name = ?, email = ? WHERE id = ?;";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $model->name);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->id);

        $stmt->execute();
    }

    public function removeSetorFromUser($setores, $user_id)
    {
        foreach ($setores as $setor) {
            $sql = "DELETE FROM user_setores WHERE user_id = ? AND setor_id = ?;";

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(1, $user_id);
            $stmt->bindValue(2, $setor);

            $stmt->execute();
        }
    }
    
    public function select()
    {
        $sql = "SELECT * FROM users;";

        $stmt = $this->connection->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM users WHERE id = ?;";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject('App\\Model\\UserModel');
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM users WHERE id = ?;";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

    }
}
